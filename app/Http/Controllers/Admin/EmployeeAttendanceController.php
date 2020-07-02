<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Admin;
use App\EmployeeAttendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeAttendanceController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.human_resource.employee_attendance.index', compact('roles'));
    }

    public function search(Request $request)
    {

        $role_known_id = $request->role_known_id;
        $date = $request->date;

        $employeeAttendances = EmployeeAttendance::with(['employee'])->where('role_known_id', $role_known_id)
        ->where('date', $date)->get();

        $employees = Admin::where('role', $role_known_id)->get();

        return view('admin.human_resource.employee_attendance.ajax_views.employee_list', compact('employeeAttendances', 'employees', 'role_known_id', 'date'));

    }

    public function store(Request $request)
    {
        $notes = $request->notes;
        //return $request->employee_ids;
        date_default_timezone_set('Asia/Dhaka');
        foreach ($request->employee_ids as $employee_id => $attendance_status) {

            $addEmployeeAttendance = new EmployeeAttendance();
            $addEmployeeAttendance->employee_id = $employee_id;
            $addEmployeeAttendance->role_known_id = $request->role_known_id;
            $addEmployeeAttendance->date = $request->date;
            $addEmployeeAttendance->year = date('Y');
            $addEmployeeAttendance->month = date('F');
            $addEmployeeAttendance->attendance_status = $attendance_status;
            $addEmployeeAttendance->note = $notes[$employee_id] ? $notes[$employee_id] : NULL;
            $addEmployeeAttendance->save();
           
        }

        return \response()->json(['successMsg' => 'Successfully employee attendance has been taken.']);
    }
    
    public function update(Request $request)
    {
        $notes = $request->notes;
        //return $request->employee_ids;
        date_default_timezone_set('Asia/Dhaka');
        foreach ($request->attendance_ids as $attendance_id => $attendance_status) {

            $updateEmployeeAttendance = EmployeeAttendance::where('id', $attendance_id)->first();
            $updateEmployeeAttendance->attendance_status = $attendance_status;
            $updateEmployeeAttendance->note = $notes[$attendance_id] ? $notes[$attendance_id] : NULL;
            $updateEmployeeAttendance->save();
           
        }

        return \response()->json(['successMsg' => 'Successfully employee attendance has been taken.']);
    }
}
