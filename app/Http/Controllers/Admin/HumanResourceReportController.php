<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Admin;
use Carbon\Carbon;
use App\LeaveApply;
use App\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HumanResourceReportController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $designations = Designation::all();
        return view('admin.report.human_resource_report.index', compact('roles', 'designations'));
    }

    public function employeeReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }

        $emp_reports = '';
        if ($request->select_type === 'today') {
            $employee_reports = Admin::whereDate('joining_date_for_report', Carbon::today());
            $request->status ? $employee_reports->where('status', $request->status) : '';
            $request->role ? $employee_reports->where('role', $request->role) : '';
            $request->designation ? $employee_reports->where('designation', $request->designation) : '';
           $emp_reports = $employee_reports->get(); 
           
        }elseif($request->select_type === 'this_week') {
           $employee_reports = Admin::whereBetween('joining_date_for_report', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            $request->status ? $employee_reports->where('status', $request->status) : '';
            $request->role ? $employee_reports->where('role', $request->role) : '';
            $request->designation ? $employee_reports->where('designation', $request->designation) : '';
            $emp_reports = $employee_reports->get();   
            
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $employee_reports = Admin::whereBetween('joining_date_for_report', [$start_week, $end_week]);
            $request->status ? $employee_reports->where('status', $request->status) : '';
            $request->role ? $employee_reports->where('role', $request->role) : '';
            $request->designation ? $employee_reports->where('designation', $request->designation) : '';
            $emp_reports = $employee_reports->get();  
           
        }elseif($request->select_type === 'this_month') {
           
            $employee_reports = Admin::whereMonth('joining_date_for_report', date('m'));
            $request->status ? $employee_reports->where('status', $request->status) : '';
            $request->role ? $employee_reports->where('role', $request->role) : '';
            $request->designation ? $employee_reports->where('designation', $request->designation) : '';
            $emp_reports = $employee_reports->get(); 
            
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $employee_reports = Admin::whereMonth('joining_date_for_report', $lastMonth);
            $request->status ? $employee_reports->where('status', $request->status) : '';
            $request->role ? $employee_reports->where('role', $request->role) : '';
            $request->designation ? $employee_reports->where('designation', $request->designation) : '';
            $emp_reports = $employee_reports->get(); 
            
        }elseif($request->select_type === 'last_six_month') {
            $lastSixMonth = date('m', strtotime('-6 month'));
            $employee_reports = Admin::whereMonth('joining_date_for_report', $lastSixMonth);
            $request->status ? $employee_reports->where('status', $request->status) : '';
            $request->role ? $employee_reports->where('role', $request->role) : '';
            $request->designation ? $employee_reports->where('designation', $request->designation) : '';
            $emp_reports = $employee_reports->get(); 
            
        }elseif($request->select_type === 'this_year') {
            $employee_reports = Admin::whereYear('joining_date_for_report', date('Y'));
            $request->status ? $employee_reports->where('status', $request->status) : '';
            $request->role ? $employee_reports->where('role', $request->role) : '';
            $request->designation ? $employee_reports->where('designation', $request->designation) : '';
            $emp_reports = $employee_reports->get(); 
            
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $employee_reports = Admin::whereYear('joining_date_for_report', $lastYear);
            $request->status ? $employee_reports->where('status', $request->status) : '';
            $request->role ? $employee_reports->where('role', $request->role) : '';
            $request->designation ? $employee_reports->where('designation', $request->designation) : '';
            $emp_reports = $employee_reports->get(); 
            
        }elseif($request->select_type === 'period') {
            
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }

            $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
            $dateToFormat = date('Y-m-d', strtotime($request->date_to));
            $employee_reports = Admin::whereBetween('joining_date_for_report', [$dateFromFormat, $dateToFormat]);
            $request->status ? $employee_reports->where('status', $request->status) : '';
            $request->role ? $employee_reports->where('role', $request->role) : '';
            $request->designation ? $employee_reports->where('designation', $request->designation) : '';
            $emp_reports = $employee_reports->get(); 
            
        }
        
        return view('admin.report.human_resource_report.ajax_view.employee_report', compact('emp_reports'));
    }

    public function leaveApplyReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        //return $request->approval_status;
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }

        $leaveApplyReports = '';
        if ($request->select_type === 'today') {

            $query = LeaveApply::with(['employee', 'leaveType'])->whereDate('created_at', Carbon::today());
            $request->approval_status !== null ? $query->where('approval', $request->approval_status) : '';
            $leaveApplyReports = $query->get(); 
           
        }elseif($request->select_type === 'this_week') {

            $query = LeaveApply::with(['employee', 'leaveType'])
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            $request->approval_status !== null ? $query->where('approval', $request->approval_status) : '';
            $leaveApplyReports = $query->get(); 
            
        }elseif($request->select_type === 'last_week') {

            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $query = LeaveApply::with(['employee', 'leaveType'])
            ->whereBetween('created_at', [$start_week, $end_week]);
            $request->approval_status !== null ? $query->where('approval', $request->approval_status) : '';
            $leaveApplyReports = $query->get(); 

        }elseif($request->select_type === 'this_month') {
           
            $query = LeaveApply::with(['employee', 'leaveType'])->whereMonth('created_at', date('m'));
            $request->approval_status !== null ? $query->where('approval', $request->approval_status) : '';
            $leaveApplyReports = $query->get(); 
            
        }elseif($request->select_type === 'last_month') {

            $lastMonth = date('m', strtotime('-1 month'));
            $query = LeaveApply::with(['employee', 'leaveType'])->whereMonth('created_at', $lastMonth);
            $request->approval_status !== null ? $query->where('approval', $request->approval_status) : '';
            $leaveApplyReports = $query->get();
            
        }elseif($request->select_type === 'last_six_month') {

            $lastSixMonth = date('m', strtotime('-6 month'));
            $query = LeaveApply::with(['employee', 'leaveType'])->whereMonth('created_at', $lastSixMonth);
            $request->approval_status !== null ? $query->where('approval', $request->approval_status) : '';
            $leaveApplyReports = $query->get();
            
        }elseif($request->select_type === 'this_year') {

            $query = LeaveApply::with(['employee', 'leaveType'])->whereYear('created_at', date('Y'));
            $request->approval_status !== null ? $query->where('approval', $request->approval_status) : '';
            $leaveApplyReports = $query->get();
            
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $query = LeaveApply::with(['employee', 'leaveType'])->whereYear('created_at', $lastYear);
            $request->approval_status !== null ? $query->where('approval', $request->approval_status) : '';
            $leaveApplyReports = $query->get();
            
        }elseif($request->select_type === 'period') {
            
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }

            $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
            $dateToFormat = date('Y-m-d', strtotime($request->date_to));
            $query = LeaveApply::with(['employee', 'leaveType'])->whereBetween('created_at', [$dateFromFormat, $dateToFormat]);
            $request->approval_status !== null ? $query->where('approval', $request->approval_status) : '';
            $leaveApplyReports = $query->get(); 
            
        }
        
        return view('admin.report.human_resource_report.ajax_view.leave_apply_reports', compact('leaveApplyReports'));
    }
}
