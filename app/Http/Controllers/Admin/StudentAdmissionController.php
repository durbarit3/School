<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Group;
use App\Route;
use App\Gender;
use App\Hostel;
use App\Classes;
use App\Section;
use App\Vehicle;
use App\Category;
use App\FeesType;
use Carbon\Carbon;
use App\BloodGroup;
use App\FeesMaster;
use App\HostelRoom;
use App\ClassSection;
use App\RouteVehicle;
use App\FeesCollection;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\Service\FeesContiner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class StudentAdmissionController extends Controller
{
    public $fees;
    public function __construct(FeesContiner $fees){
        $this->fees = $fees;
        $this->middleware('auth:admin');

    }
    //
    public function index(){
        $allstudent=StudentAdmission::with(['Classes','Gender','Category'])->OrderBy('id','DESC')->active();
        return view('admin.student.index',compact('allstudent'));
    }
    
    //create
    public function create(){

    	$classes = Cache::rememberForever('all-classes', function(){
            return $classes = Classes::where('status', 1)->where('deleted_status', NULL)->get();
        });

        $gender = Cache::rememberForever('all-genders', function(){
            return $gender = Gender::select(['id','name'])->get();
        });

    	$category = Category::where('status',1)->select(['id','name'])->active();
    	$routes = Cache::rememberForever('all-routes', function(){
            return $classes = Route::where('status', 1)->where('deleted_status', NULL)->get();
        });
        
    	$hostel = Hostel::where('status',1)->select(['id','hostel_name'])->get();
        $bloodgroup = BloodGroup::select(['id','group_name'])->get();
        $groups = Group::OrderBy('id','DESC')->select(['id','name'])->get();
        return view('admin.student.add',compact('classes','gender','category','routes','hostel','bloodgroup','groups'));
        
    }
    // get section
    public function getsection($id){
    	$Sections = ClassSection::with(['section'])->where('class_id', $id)->get();
        return response()->json($Sections);
    }
    // get bus
    public function getbus($id){
    	$data = RouteVehicle::with(['vehicle'])->where('route_id',$id)->get();
    	return response()->json($data);
    }
    // get room
    public function getroom($id){
    	//echo "ok";
    	$data = HostelRoom::where('hostel_type',$id)->get();
    	//dd($data);
    	return response()->json($data);
    }
    // store
    public function store(Request $request){
        //return $request;
        
        $this->validate($request,[
            'roll_no' => 'required',
            'admission_no' => 'required',
            'select_class' => 'required',
            'first_name' => 'required',
            'date_of_birth' => 'required',
            'national_id' => 'required',
            'father_name' => 'required',
            'father_phone' => 'required',
            'mother_name' => 'required',
            'guardian_is' => 'required',
            'guardian_name' => 'required',
            'guardian_phone' => 'required',
            'stu_pic' => 'required',

        ],[
            'admission_no.required' => 'Admission_Num must not be empty!',
            'roll_no.required' => 'Roll_No must not be empty!',
            'select_class.required' => 'Class must not be empty!',
            'first_name.required' => 'First name must not be empty!',
            'date_of_birth.required' => 'Birth Date name must not be empty!',
            'national_id.required' => 'This Field must not be empty!',
            'father_name.required' => 'This Field must not be empty!',
            'father_phone.required' => 'This Field must not be empty!',
            'mother_name.required' => 'This Field must not be empty!',
            'guardian_is.required' => 'Please Cheak Guardian status!',
            'guardian_name.required' => 'This Field must not be empty!',
            'guardian_phone.required' => 'This Field must not be empty!',
            'stu_pic.required' => 'This Field must not be empty!',
        ]);

        $currentSessionId = Session::where('is_current_session', 1)->first();
        $data = new StudentAdmission;
        $data->admission_no = $request->admission_no;
        $data->roll_no = $request->roll_no;
        $data->class = $request->select_class;
        $data->section = $request->section;
        $data->session_id = $currentSessionId->id;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->gender = $request->gender;
        $data->date_of_birth = $request->date_of_birth;
        $data->category = $request->category;
        $data->religion = $request->religion;
        $data->student_mobile = $request->student_mobile;
        $data->student_email = $request->student_email;
        $data->blood_group = $request->blood_group;
        $data->group_id = $request->group_id;
        $data->height = $request->height;
        $data->weight = $request->weight;
        $data->admission_date = $request->admission_date;
        $data->nid_or_birthid = $request->nid_or_birthid;

        if($request->hasFile('stu_pic')) {
            $image = $request->file('stu_pic');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/uploads/student/' . $ImageName);
            $data->student_photo = $ImageName;
        }

        

        $data->father_name = $request->father_name;
        $data->father_phone = $request->father_phone;
        $data->father_occupation = $request->father_occupation;

        if($request->hasFile('father_pic')) {
            $image = $request->file('father_pic');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/uploads/student/' . $ImageName);
            $data->father_photo = $ImageName;
        }

        $data->mother_name = $request->mother_name;
        $data->mother_phone = $request->mother_phone;
        $data->mother_occupation = $request->mother_occupation;

        if($request->hasFile('mother_pic')) {
            $image = $request->file('mother_pic');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/uploads/student/' . $ImageName);
            $data->mother_photo = $ImageName;
        }

        $data->if_guardian_is = $request->guardian_is;
        $data->guardian_name = $request->guardian_name;
        $data->guardian_relation = $request->guardian_relation;
        $data->guardian_email = $request->guardian_email;

        if($request->hasFile('guardian_pic')) {
            $image = $request->file('guardian_pic');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/uploads/student/' . $ImageName);
            $data->guardian_photo = $ImageName;
        }

        $data->guardian_phone = $request->guardian_phone;
        $data->guardian_occupation = $request->guardian_occupation;
        $data->guardian_address = $request->guardian_address;
        $data->current_address = $request->current_address;
        $data->permanent_address = $request->permanent_address;
        $data->route_id = $request->route_id;
        $data->sibling_student_id = $request->sibling_id; 
        $data->vehicle_id = $request->vehicle_id;
        $data->hostel_id = $request->hostel_id;
        $data->room_num = $request->rooom_number;

        $data->vehicle_id = $request->bus_id;

        $data->previous_school_detail = $request->previous_school_detail;
        $data->previous_school_note = $request->previous_school_note;
                // file 1
        $data->docu_title1 = $request->docu_title1;
        $data->docu_title2 = $request->docu_title2;
        $data->docu_title3 = $request->docu_title3;
        $data->docu_title4 = $request->docu_title4;

        if ($request->hasFile('docu_1')){
            $data->docu_1 = $request->file('docu_1')->store('public/uploads/student/file/');
        }
            // file 2
    
        if ($request->hasFile('docu_2')){
            $data->docu_2 = $request->file('docu_2')->store('public/uploads/student/file/');
        }
            // file 3
        
        if ($request->hasFile('docu_3')){
            $data->docu_3 = $request->file('docu_3')->store('public/uploads/student/file/');
        }
            // file 3
        
        if ($request->hasFile('docu_4')){
            $data->docu_4 = $request->file('docu_4')->store('public/uploads/student/file/');
        }


        if($data->save()){
            // fees collection
            $this->fees->insertFeesAmount($data);

            $notification = array(
                'messege' => 'Student Insert success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Student Insert Failed',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

    public function details($studentId)
    {
        $student =StudentAdmission::with(['sibling', 'Gender', 'bloodGroup', 'route', 'vehicle', 'Class', 'Section', 'sibling.Class', 'sibling.Section', 'feesCollection', 'attendances'])
        ->where('id',$studentId)
        ->withCount('attendances')
        ->first();
        return view('admin.student.details',compact('student'));
    }

    public function StatusUpdate($studentId)
    {
        $statusChange = StudentAdmission::where('id', $studentId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Student is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Student is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // 
    public function edit($id){

        $data=StudentAdmission::with('sibling')->where('id',$id)->first();
        $allClass=Classes::where('deleted_status', NULL)->where('status',1)->select(['id','name'])->get();
        $gender= Gender::select(['id','name'])->get();
        $category= Category::where('status',1)->select(['id','name'])->active();
        $routes= Route::where('status',1)->select(['id','name'])->get();
        //$hostel= Hostel::where('status',1)->select(['id','hostel_name'])->get();
        $bloodgroup = BloodGroup::select(['id','group_name'])->get();
        $groups=Group::OrderBy('id','DESC')->select(['id','name'])->get();
        $section=Section::select(['id','name'])->get();
        $bus=Vehicle::select(['id','vehicle_number'])->get();
        //$room=HostelRoom::select(['id','room_number'])->get();

        return view('admin.student.edit',compact('data', 'allClass', 'gender', 'category', 'routes', 'bloodgroup','groups', 'section', 'bus'));
    }
    // update
    public function update(Request $request,$id){

        $data = StudentAdmission::findOrFail($id);
        $data->admission_no = $request->admission_no;
        $data->roll_no = $request->roll_no;
        $data->class = $request->select_class;
        $data->section = $request->section;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->gender = $request->gender;
        $data->date_of_birth = $request->date_of_birth;
        $data->category = $request->category;
        $data->religion = $request->religion;
        $data->student_mobile = $request->student_mobile;
        $data->student_email = $request->student_email;
        $data->blood_group = $request->blood_group;
        $data->group_id = $request->group_id;
        $data->height = $request->height;
        $data->weight = $request->weight;
        $data->admission_date = $request->admission_date;
        $data->nid_or_birthid = $request->nid_or_birthid;

        if($request->hasFile('stu_pic')) {
            $image = $request->file('stu_pic');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/uploads/student/' . $ImageName);
            $data->student_photo = $ImageName;
        }

        $data->father_name = $request->father_name;
        $data->father_phone = $request->father_phone;
        $data->father_occupation = $request->father_occupation;

        if($request->hasFile('father_pic')) {
            $image = $request->file('father_pic');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/uploads/student/' . $ImageName);
            $data->father_photo = $ImageName;
            }

        $data->mother_name = $request->mother_name;
        $data->mother_phone = $request->mother_phone;
        $data->mother_occupation = $request->mother_occupation;

        if($request->hasFile('mother_pic')) {
            $image = $request->file('mother_pic');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/uploads/student/' . $ImageName);
            $data->mother_photo = $ImageName;
            }

        $data->if_guardian_is = $request->guardian_is;
        $data->guardian_name = $request->guardian_name;
        $data->guardian_relation = $request->guardian_relation;
        $data->guardian_email = $request->guardian_email;

        if($request->hasFile('guardian_pic')) {
            $image = $request->file('guardian_pic');
            $ImageName = 'th' . '_' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/uploads/student/' . $ImageName);
            $data->guardian_photo = $ImageName;
            }

        $data->guardian_phone = $request->guardian_phone;
        $data->guardian_occupation = $request->guardian_occupation;
        $data->guardian_address = $request->guardian_address;
        $data->current_address = $request->current_address;
        $data->permanent_address = $request->permanent_address;
        $data->route_id = $request->route_id;
        $data->sibling_student_id = $request->sibling_id;
        $data->vehicle_id = $request->vehicle_id;
        $data->hostel_id = $request->hostel_id;
        $data->room_num = $request->rooom_number;

        $data->vehicle_id = $request->bus_id;

        $data->previous_school_detail = $request->previous_school_detail;
        $data->previous_school_note = $request->previous_school_note;
                // file 1
            $data->docu_title1 = $request->docu_title1;
            $data->docu_title2 = $request->docu_title2;
            $data->docu_title3 = $request->docu_title3;
            $data->docu_title4 = $request->docu_title4;

        if ($request->hasFile('docu_1')){
            $data->docu_1 = $request->file('docu_1')->store('public/uploads/student/file/');
        }
                // file 2
        
        if ($request->hasFile('docu_2')){
            $data->docu_2 = $request->file('docu_2')->store('public/uploads/student/file/');
        }
                // file 3
        
        if ($request->hasFile('docu_3')){
            $data->docu_3 = $request->file('docu_3')->store('public/uploads/student/file/');
        }
                // file 3
        
        if ($request->hasFile('docu_4')){
            $data->docu_4 = $request->file('docu_4')->store('public/uploads/student/file/');
        }

        if($data->save()){
            $notification = array(
                'messege' => 'Student Update success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Student Update Faild',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function getSectionsByClassId($classId)
    {
        $sections = ClassSection::with('section')->where('class_id', $classId)->where('deleted_status', NULL)->get();
        return response()->json($sections);
        
    }
    
    public function getStudentsByClassIdAndSectionId($classId, $sectionId)
    {
        $students = StudentAdmission::select(['id', 'first_name', 'last_name'])->where('class', $classId)->where('section', $sectionId)->get();
        return response()->json($students);
        
    }
    
    public function getStudentByStudentId($studentId)
    {
        $student = StudentAdmission::select(['id', 'first_name', 'last_name'])
        ->where('id', $studentId)->first();
        return response()->json($student);
    }
}
