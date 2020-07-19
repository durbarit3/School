<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Admin;
use Carbon\Carbon;
use App\EmployeeSalary;
use App\EmployeeAttendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeSalaryController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.human_resource.employee_salary.index', compact('roles'));
    }

    public function search(Request $request)
    {
        //return $request->all();
        $role_known_id = $request->role_known_id;
        $month = $request->month;
        $year = $request->year;
        $employees = Admin::where('role', $role_known_id)->get();
        return view('admin.human_resource.employee_salary.ajax_views.employee_list', compact('employees', 'month', 'year'));

    }

    public function generateView($employeeId, $month, $year)
    {
        $month = $month;
        $year = $year;

        $employee = Admin::where('id', $employeeId)->first();
        $attendances = EmployeeAttendance::where('employee_id', $employeeId)
                ->where('month', $month)
                ->where('year', $year)
                ->get();
        $presentCount = 0;
        $absentCount = 0;
        $lateCount = 0;
        $halfDayCount = 0;
        if ($attendances) {
            foreach ($attendances as $attendance) {
                if ($attendance->attendance_status == 'present') {
                    $presentCount += 1;
                }elseif ($attendance->attendance_status == 'absent') {
                    $absentCount += 1;
                }elseif ($attendance->attendance_status == 'late') {
                    $lateCount += 1;
                }elseif ($attendance->attendance_status == 'half_day') {
                    $halfDayCount += 1;
                }
            }
        }

        return view('admin.human_resource.employee_salary.ajax_views.salary_generator_view', compact('employee', 'month', 'year', 'presentCount', 'absentCount', 'lateCount', 'halfDayCount'));
    }

    public function salaryGenerate(Request $request, $employeeId)
    {
        date_default_timezone_set('Asia/Dhaka');
        $this->validate($request, [
            'vat' => 'required|numeric'
        ]);
        //return $request->all();
        $generateSalary = new EmployeeSalary();
        $generateSalary->employee_id = $employeeId;
        $generateSalary->basic_salary = $request->basic_salary;
        $generateSalary->total_earn = $request->total_earn;
        $generateSalary->total_earn = $request->total_earn;
        $generateSalary->total_deduction = $request->total_deduction;
        $generateSalary->gross_pay = $request->gross_pay;
        $generateSalary->vat = $request->vat;
        $generateSalary->payable = $request->net_total;
        $generateSalary->month = $request->month;
        $generateSalary->year = $request->year;
        $generateSalary->created_at = Carbon::now();
        if ($request->earn_types !== [null]) {
            $earns = [];
            $earn_type_names = [];
            $earn_amounts = $request->earn_amounts;
            $index = 0;
            foreach ($request->earn_types as $earn_type) {

                if ($earn_type !== null) {
                    array_push($earns,[$earn_type => $earn_amounts[$index] == null ? 0 : $earn_amounts[$index]]);
                    $index++;
                    array_push($earn_type_names, $earn_type);
                }                
            }
            $generateSalary->earns = json_encode($earns);
            $generateSalary->earn_types = json_encode($earn_type_names);
        }else {
            $generateSalary->earns = NULL; 
        }
        
        if ($request->deduction_types != [null]) {
            $deductions = [];
            $deduction_types_names = [];
            $deduction_amounts = $request->deduction_amounts;
            $key = 0;
            foreach ($request->deduction_types as $deduction_type) {
                array_push($deductions,[$deduction_type => $deduction_amounts[$key] == null ? 0 : $deduction_amounts[$key]]);
                $key++;
                array_push($deduction_types_names, $deduction_type);  
            }
            $generateSalary->deductions = json_encode($deductions); 
            $generateSalary->deduction_types = json_encode($deduction_types_names); 
        }else {
            $generateSalary->deductions = NULL; 
        }
        $generateSalary->save();

        return response()->json(['successMsg' => 'Salary generated successfully.']);
        
    }

    public function salaryPayView($employeeId, $month, $year)
    {
        $i = 6;
        $a = 0;
        $invoiceId = ''; 
        while ($a < $i) {
            $invoiceId .= rand(1, 9);
            $a++; 
        }
        
        $generatedSalary = EmployeeSalary::with(['employee'])->where('employee_id', $employeeId)->where('month', $month)->where('year', $year)->first();
        return view('admin.human_resource.employee_salary.ajax_views.salary_pay_view', compact('generatedSalary','invoiceId', 'month', 'year'));
    }

    public function salaryPay(Request $request, $employeeId)
    {
        $this->validate($request, [
            'payable_amount' => 'required|numeric',
            'pay_mode' => 'required',
        ]);
        
        date_default_timezone_set('Asia/Dhaka');
        $paySalary = EmployeeSalary::where('employee_id', $employeeId)->where('month', $request->month)->where('year', $request->year)->first();
        $paySalary->invoice_no = $request->invoice_no;
        $paySalary->total_paid = $request->payable_amount;
        $paySalary->note = $request->note;
        $paySalary->due = 0;
        $paySalary->is_paid = 1;
        $paySalary->date = date('d-m-Y');
        $paySalary->paid_date = Carbon::now();
        $paySalary->save();
        return response()->json(['successMsg' => 'Salary is paid successfully.']);
    }

    public function salaryPaySlip($employeeId, $month, $year)
    {
        $salaryPaySlip = EmployeeSalary::with(['employee'])->where('employee_id', $employeeId)->where('month', $month)->where('year', $year)->firstOrFail();
        return view('admin.human_resource.employee_salary.ajax_views.salary_pay_slip', compact('salaryPaySlip', 'month', 'year'));
    }
}
