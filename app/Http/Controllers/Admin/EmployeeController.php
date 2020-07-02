<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use DB;
use App\Admin;
use App\Group;
use App\Gender;
use Carbon\Carbon;
use App\BloodGroup;
use App\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = Admin::with(['group'])
            ->where('role', 2)
            ->select(['id', 'employee_status', 'adminname', 'employee_id', 'avater', 'gender', 'designation', 'group_id', 'email', 'phone'])
            ->get()->map(function ($admin) {
                return [
                    'id' => $admin->id,
                    'name' => $admin->adminname,
                    'employee_status' => $admin->employee_status,
                    'employee_id' => $admin->employee_id,
                    'avater' => $admin->avater,
                    'gender' => $admin->gender,
                    'designation' => $admin->designation,
                    'group_id' => $admin->group_id,
                    'email' => $admin->email,
                    'phone' => $admin->phone,
                    'department' => [
                       'name' => $admin->group->name
                    ],
                ];
            });

        return view('admin.employee.employee_list.all_admins', compact('admins'));
    } 
    
    public function superAdmins()
    {
        $superAdmins = Admin::with(['group'])
            ->where('role', 1)
            ->select(['id', 'employee_status', 'adminname', 'employee_id', 'avater', 'gender', 'designation', 'group_id', 'email', 'phone'])
            ->get()->map(function ($admin) {
                return [
                    'id' => $admin->id,
                    'name' => $admin->adminname,
                    'employee_status' => $admin->employee_status,
                    'employee_id' => $admin->employee_id,
                    'avater' => $admin->avater,
                    'gender' => $admin->gender,
                    'designation' => $admin->designation,
                    'group_id' => $admin->group_id,
                    'email' => $admin->email,
                    'phone' => $admin->phone,
                    'department' => [
                       'name' => $admin->group->name
                    ],
                ];
            });

        return view('admin.employee.employee_list.all_super_admins', compact('superAdmins'));
    }

    public function teachers()
    {
        $teachers = Admin::with(['group', 'salaries'])
        ->where('role', 3)
        ->select(['id', 'employee_status', 'adminname', 'employee_id', 'avater', 'gender', 'designation', 'group_id', 'email', 'phone'])
        ->get()->map(function ($admin) {
            return [
                'id' => $admin->id,
                'name' => $admin->adminname,
                'employee_status' => $admin->employee_status,
                'employee_id' => $admin->employee_id,
                'avater' => $admin->avater,
                'gender' => $admin->gender,
                'designation' => $admin->designation,
                'group_id' => $admin->group_id,
                'email' => $admin->email,
                'phone' => $admin->phone,
                'department' => [
                   'name' => $admin->group->name
                ],
            ];
        });
       
    return view('admin.employee.employee_list.all_teachers', compact('teachers'));
    }
    public function librarians()
    {
        $librarians = Admin::with('group')
        ->where('role', 5)
        ->select(['id', 'employee_status', 'adminname', 'employee_id', 'avater', 'gender', 'designation', 'group_id', 'email', 'phone'])
        ->get()->map(function ($admin) {
            return [
                'id' => $admin->id,
                'name' => $admin->adminname,
                'employee_status' => $admin->employee_status,
                'employee_id' => $admin->employee_id,
                'avater' => $admin->avater,
                'gender' => $admin->gender,
                'designation' => $admin->designation,
                'group_id' => $admin->group_id,
                'email' => $admin->email,
                'phone' => $admin->phone,
                'department' => [
                   'name' => $admin->group->name
                ],
            ];
        });

    return view('admin.employee.employee_list.all_librarians', compact('librarians'));
    }

    public function accountant()
    {
        $accountants = Admin::with('group')
        ->where('role', 4)
        ->select(['id', 'employee_status', 'adminname', 'employee_id', 'avater', 'gender', 'designation', 'group_id', 'email', 'phone'])
        ->get()->map(function ($admin) {
            return [
                'id' => $admin->id,
                'name' => $admin->adminname,
                'employee_status' => $admin->employee_status,
                'employee_id' => $admin->employee_id,
                'avater' => $admin->avater,
                'gender' => $admin->gender,
                'designation' => $admin->designation,
                'group_id' => $admin->group_id,
                'email' => $admin->email,
                'phone' => $admin->phone,
                'department' => [
                   'name' => $admin->group->name
                ],
            ];
        });

    return view('admin.employee.employee_list.all_accountants', compact('accountants'));
    }
    public function clerks()
    {
        $clerks = Admin::with('group')
        ->where('role', 7)
        ->select(['id', 'employee_status', 'adminname', 'employee_id', 'avater', 'gender', 'designation', 'group_id', 'email', 'phone'])
        ->get()->map(function ($admin) {
            return [
                'id' => $admin->id,
                'name' => $admin->adminname,
                'employee_status' => $admin->employee_status,
                'employee_id' => $admin->employee_id,
                'avater' => $admin->avater,
                'gender' => $admin->gender,
                'designation' => $admin->designation,
                'group_id' => $admin->group_id,
                'email' => $admin->email,
                'phone' => $admin->phone,
                'department' => [
                   'name' => $admin->group->name
                ],
            ];
        });

    return view('admin.employee.employee_list.all_clerk', compact('clerks'));
    }

    public function drivers()
    {
        $drivers = Admin::with('group')
        ->where('role', 6)
        ->select(['id', 'employee_status', 'adminname', 'employee_id', 'avater', 'gender', 'designation', 'group_id', 'email', 'phone'])
        ->get()->map(function ($admin) {
            return [
                'id' => $admin->id,
                'name' => $admin->adminname,
                'employee_status' => $admin->employee_status,
                'employee_id' => $admin->employee_id,
                'avater' => $admin->avater,
                'gender' => $admin->gender,
                'designation' => $admin->designation,
                'group_id' => $admin->group_id,
                'email' => $admin->email,
                'phone' => $admin->phone,
                'department' => [
                   'name' => $admin->group->name
                ],
            ];
        });

    return view('admin.employee.employee_list.all_driver', compact('drivers'));
    }

    public function guards()
    {
        $guards = Admin::with('group')
        ->where('role', 8)
        ->select(['id', 'employee_status', 'adminname', 'employee_id', 'avater', 'gender', 'designation', 'group_id', 'email', 'phone'])
        ->get()->map(function ($admin) {
            return [
                'id' => $admin->id,
                'name' => $admin->adminname,
                'employee_status' => $admin->employee_status,
                'employee_id' => $admin->employee_id,
                'avater' => $admin->avater,
                'gender' => $admin->gender,
                'designation' => $admin->designation,
                'group_id' => $admin->group_id,
                'email' => $admin->email,
                'phone' => $admin->phone,
                'department' => [
                   'name' => $admin->group->name
                ],
            ];
        });

    return view('admin.employee.employee_list.all_security_guard', compact('guards'));
    }

    public function create()
    {
        date_default_timezone_set('Asia/Dhaka');
        $employee = Admin::orderBy('id', 'desc')->select('id')->first();
        if (!$employee) {
            $employeeId = 'E' . date('m') . date('y') . '0' . '1';
        } else {
            $employeeId = 'E' . date('m') . date('y') . ($employee->id <= 8 ? '0' : '') . ++$employee->id;
        }
        $bloodGroups = DB::table('blood_groups')->select(['group_name', 'id'])->get();
        $groups = DB::table('groups')->select(['id', 'name'])->get();
        $designations = DB::table('designations')->select(['id', 'name'])->get();
        $roles = DB::table('roles')->select(['id', 'name', 'role_known_id'])->get();
        $genders = DB::table('genders')->select(['id', 'name'])->get();
        return view('admin.employee.create', compact('bloodGroups', 'groups', 'designations', 'roles', 'genders', 'employeeId'));
    }

    public function store(Request $request)
    {
       
        $this->validate($request, [
            'employee_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'date_of_birth' => 'required',
            'mobile_no' => 'required|unique:admins,phone',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'photo' => 'required|image|max:20480',
            'email' => 'required|unique:admins,email',
            'password' => 'required|confirmed',
            'designation' => 'required',
            'group' => 'required',
            'joining_date' => 'required',
            'qualification' => 'required',
            'role' => 'required',
            'blood_group' => 'required',
            'basic_salary' => 'required',
            'contract_type' => 'required',
        ]);

        if ($request->bank_name) {
            $this->validate(
                $request,
                [
                    'account_holder' => 'required',
                    'bank_branch' => 'required',
                    'bank_address' => 'required',
                    'ifsc_code' => 'required',
                    'account_no' => 'required',
                ],
                [
                    'account_holder.required' => 'You have given bank name, so now account holder is required',
                    'bank_branch.required' => 'You have given bank name, so now bank branch  is required',
                    'bank_address.required' => 'You have given bank name, so now bank address  is required',
                    'ifsc_code.required' => 'You have given bank name, so now ifsc code is required',
                    'account_no.required' => 'You have given bank name, so now account_no is required',
                ]
            );
        }

        date_default_timezone_set('Asia/Dhaka');

        if ($request->file('photo')) {
            $employeePhoto = $request->file('photo');
            $employeePhotoName = uniqid() . '.' . $employeePhoto->getClientOriginalExtension();
            Image::make($employeePhoto)->resize(500, 500)->save('public/uploads/employee/' . $employeePhotoName);
            Admin::insert([
                'employee_id' => $request->employee_id,
                'adminname' => $request->name,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'blood_group_id' => $request->blood_group,
                'date_of_birth' => $request->date_of_birth,
                'phone' => $request->mobile_no,
                'status' => 1,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'designation' => $request->designation,
                'group_id' => $request->group,
                'joining_date' => $request->joining_date,
                'qualification' =>  $request->qualification,
                'role' =>  $request->role,
                'facebook_link' =>  $request->facebook_link ?  $request->facebook_link : '',
                'linkedIn_link' =>  $request->linkedIn_link ?  $request->linkedIn_link : '',
                'twitter_link' =>  $request->twitter_link ?  $request->twitter_link : '',
                'bank_name' =>  $request->bank_name ?  $request->bank_name : '',
                'account_holder' =>  $request->account_holder ?  $request->account_holder : '',
                'bank_branch' =>  $request->bank_branch ?  $request->bank_branch : '',
                'bank_address' =>  $request->bank_address ?  $request->bank_address : '',
                'ifsc_code' =>  $request->ifsc_code ?  $request->ifsc_code : '',
                'account_no' =>  $request->account_no ?  $request->account_no : '',
                'avater' =>  $employeePhotoName,
                'basic_salary' =>  $request->basic_salary,
                'contract_type' =>  $request->contract_type,
                'contract_type' =>  $request->contract_type,
                'work_sift' =>  $request->work_sift,
                'joining_date_for_report' => date('Y-m-d', strtotime($request->joining_date)),
                'created_at' =>  Carbon::now(),
            ]);
        }
        
        return response()->json(['successMsg' => 'Employee added successfully:)']);
        
    }

    public function changeStatus($employeeId)
    {
        $statusChange = Admin::where('id', $employeeId)->first();
        if ($statusChange->employee_status == 1) {
            $statusChange->employee_status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Employee is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->employee_status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Employee is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($employeeId)
    {
        Classes::where('id', $employeeId)->singleDelete();
        $notification = array(
            'messege' => 'Employee is deleted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($employeeId)
    {
        
        $bloodGroups = BloodGroup::select(['group_name', 'id'])->get();
        $groups = Group::select(['id', 'name'])->get();
        $designations = Designation::select(['id', 'name'])->get();
        $roles = Role::select(['id', 'name', 'role_known_id'])->get();
        $genders = Gender::select(['id', 'name'])->get();
        $employee = Admin::with(['group', 'salaries'])->where('id', $employeeId)->firstOrFail();
 
        return view('admin.employee.show', compact('bloodGroups', 'groups', 'designations', 'roles', 'genders', 'employee'));

    }

    public function updateBasicDetails(Request $request,$employeeId)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'date_of_birth' => 'required',
            'mobile_no' => 'required|unique:admins,phone,'.$employeeId,
            'present_address' => 'required',
            'permanent_address' => 'required',
            'photo' => 'sometimes|image',
        ]);
        //dd($request->date_of_birth);
        date_default_timezone_set('Asia/Dhaka');
        $employee = Admin::where('id', $employeeId)->first();
        $employee->adminname = $request->name;
        $employee->gender = $request->gender;
        $employee->religion = $request->religion;
        $employee->blood_group_id = $request->blood_group;
        $employee->phone = $request->mobile_no;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->save();
       
        if ($request->file('photo')) {
            if ($employee->avater) {
                if ($employee->avater != "admin.jpg") {
                    if (file_exists(public_path('uploads/employee/'.$employee->avater))) {
                        unlink(public_path('uploads/employee/'.$employee->avater));
                    }
                }
            }
          
            $employeePhoto = $request->file('photo');
            $employeePhotoName = uniqid() . '.' . $employeePhoto->getClientOriginalExtension();
            Image::make($employeePhoto)->resize(500, 500)->save('public/uploads/employee/' . $employeePhotoName);
            $employee->avater =  $employeePhotoName;
            $employee->save();
           
        }

        session()->flash('update_basic_info', 'ok');
        $notification = array(
            'messege' => 'Employee basic info is updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    
    public function updateAcademicDetails(Request $request, $employeeId)
    {
        
        $this->validate($request, [
            'designation' => 'required',
            'group' => 'required',
            'joining_date' => 'required',
            'qualification' => 'required',
            'role' => 'required',
        ]);
        
        date_default_timezone_set('Asia/Dhaka');
        $employee = Admin::where('id', $employeeId)->first();
        $employee->designation = $request->designation;
        $employee->group_id = $request->group;
        $employee->joining_date = $request->joining_date;
        $employee->qualification = $request->qualification;
        $employee->role = $request->role;
        $employee->save();
       
       
        session()->flash('update_academic_info', 'ok');
        $notification = array(
            'messege' => 'Employee academic info is updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function editBank($employeeId)
    {
        $employee = DB::table('admins')->where('id', $employeeId)
        ->select('id', 'bank_name', 'bank_branch', 'account_holder', 'bank_address', 'account_no', 'ifsc_code')
        ->first();
        return view('admin.employee.ajax_view.bank_edit_modal_view', compact('employee'));
    }

    public function bankUpdate(Request $request, $employeeId)
    {
        
        $this->validate($request, [
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'account_holder' => 'required',
            'bank_address' => 'required',
            'account_no' => 'required',
            'ifsc_code' => 'required',
        ]);

        $employee = Admin::where('id', $employeeId)->first();
        $employee->bank_name = $request->bank_name;
        $employee->bank_branch = $request->bank_branch;
        $employee->account_holder = $request->account_holder;
        $employee->bank_address = $request->bank_address;
        $employee->account_no = $request->account_no;
        $employee->ifsc_code = $request->ifsc_code;
        $employee->save();
        
        session()->flash('update_bank_info', 'ok');
        $notification = array(
            'messege' => 'Employee bank details is updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function socialLinksUpdate(Request $request, $employeeId)
    {
        $employee = Admin::where('id', $employeeId)->first();
        $employee->facebook_link = $request->facebook_link;
        $employee->linkedIn_link = $request->linkedIn_link;
        $employee->twitter_link = $request->twitter_link;
        $employee->save();
        session()->flash('update_social_links', 'ok');
        $notification = array(
            'messege' => 'Employee social links is updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function authenticationUpdate(Request $request, $employeeId)
    {
        
        if (!$request->authentication_status) {
            $this->validate($request, [
                'password' => 'required',
            ]);
            $employee = Admin::where('id', $employeeId)->first();
            $employee->password = Hash::make($request->password);
            $employee->status = 1;
            $employee->save();
            return response()->json('Authentication password is updated.');
        }else{
            $employee = Admin::where('id', $employeeId)->first();
            $employee->status = 0;
            $employee->save();
            return response()->json('Authentication permission is off.');
        }  
    }

    public function updateContractDetails(Request $request, $employeeId)
    {
        $this->validate($request, [
            'basic_salary' => 'required',
            'contract_type' => 'required',
        ]);

        $employee = Admin::where('id', $employeeId)->first();
        $employee->basic_salary = $request->basic_salary;
        $employee->contract_type = $request->contract_type;
        $employee->work_sift = $request->work_sift;
        $employee->save();
        session()->flash('update_contract_details', 'ok');
        $notification = array(
            'messege' => 'Employee contract details is updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
