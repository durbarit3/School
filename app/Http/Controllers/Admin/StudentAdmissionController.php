<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes;
use App\Gender;
use App\Route;
use App\HostelRoom;
use App\Hostel;
use App\RouteVehicle;
use App\StudentAdmission;
use App\Category;
use App\ClassSection;
use App\BloodGroup;
use App\Group;
use App\Vehicle;

use App\Section;
use Session;
use Carbon\Carbon;
use Image;

class StudentAdmissionController extends Controller
{
    public function __construct(){

    }
    //
    public function index(){
        $allstudent=StudentAdmission::with(['Classes','Gender','Category'])->OrderBy('id','DESC')->active();
        return view('admin.student.index',compact('allstudent'));
    }
    //create
    public function create(){

    	$allClass=Classes::where('deleted_status', NULL)->where('status',1)->select(['id','name'])->get();
    	$gender=Gender::select(['id','name'])->get();
    	$category=Category::where('status',1)->select(['id','name'])->active();
    	$routes=Route::where('status',1)->select(['id','name'])->get();
    	$hostel=Hostel::where('status',1)->select(['id','hostel_name'])->get();
        $bloodgroup=BloodGroup::select(['id','group_name'])->get();
        $groups=Group::OrderBy('id','DESC')->select(['id','name'])->get();
    	return view('admin.student.add',compact('allClass','gender','category','routes','hostel','bloodgroup','groups'));
    }
    // get section
    public function getsection($id){
    	$Sections = ClassSection::with(['section'])->where('class_id', $id)->get();
        return response()->json($Sections);
    }
    // get bus
    public function getbus($id){
    	$data=RouteVehicle::with(['vehicle'])->where('route_id',$id)->get();
    	return response()->json($data);
    }
    // get room
    public function getroom($id){
    	//echo "ok";
    	$data=HostelRoom::where('hostel_type',$id)->get();
    	//dd($data);
    	return response()->json($data);
    }
    // store
    public function store(Request $request){
        //return $request;
        // $this->validate($request,[
        //     'roll_no' => 'required',
        //     'admission_no' => 'required',
        //     'select_class' => 'required',
        //     'first_name' => 'required',
        //     'date_of_birth' => 'required',
        //     'national_id' => 'required',
        //     'father_name' => 'required',
        //     'father_phone' => 'required',
        //     'mother_name' => 'required',
        //     'guardian_is' => 'required',
        //     'guardian_name' => 'required',
        //     'guardian_phone' => 'required',
        //     'stu_pic' => 'required',

        // ],[
        //     'admission_no.required' => 'Admission_Num must not be empty!',
        //     'roll_no.required' => 'Roll_No must not be empty!',
        //     'select_class.required' => 'Class must not be empty!',
        //     'first_name.required' => 'First name must not be empty!',
        //     'date_of_birth.required' => 'Birth Date name must not be empty!',
        //     'national_id.required' => 'This Field must not be empty!',
        //     'father_name.required' => 'This Field must not be empty!',
        //     'father_phone.required' => 'This Field must not be empty!',
        //     'mother_name.required' => 'This Field must not be empty!',
        //     'guardian_is.required' => 'Please Cheak Guardian status!',
        //     'guardian_name.required' => 'This Field must not be empty!',
        //     'guardian_phone.required' => 'This Field must not be empty!',
        //     'stu_pic.required' => 'This Field must not be empty!',
        // ]);

            $data = new StudentAdmission;
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
            $data->sibling = $request->sibling;
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
                    'messege' => 'Student Insert success',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'messege' => 'Student Insert Faild',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }

    }
    // 
    public function edit($id){
        $data=StudentAdmission::where('id',$id)->first();
        $allClass=Classes::where('is_deleted',0)->where('status',1)->select(['id','name'])->get();
        $gender=Gender::select(['id','name'])->get();
        $category=Category::where('status',1)->select(['id','name'])->active();
        $routes=Route::where('status',1)->select(['id','name'])->get();
        $hostel=Hostel::where('status',1)->select(['id','hostel_name'])->get();
        $bloodgroup=BloodGroup::select(['id','group_name'])->get();
        $groups=Group::OrderBy('id','DESC')->select(['id','name'])->get();

        $section=Section::select(['id','name'])->get();

        $bus=Vehicle::select(['id','vehicle_number'])->get();
        $room=HostelRoom::select(['id','room_number'])->get();

        return view('admin.student.edit',compact('data','allClass','gender','category','routes','hostel','bloodgroup','groups','section','bus','room'));
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
            $data->sibling = $request->sibling;
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
}
