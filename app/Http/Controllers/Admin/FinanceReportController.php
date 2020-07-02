<?php

namespace App\Http\Controllers\Admin;

use App\Year;
use App\Income;
use App\Classes;
use App\Expanse;
use Carbon\Carbon;
use App\BankAccount;
use App\IncomeHeader;
use App\ExpanseHeader;
use App\EmployeeSalary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinanceReportController extends Controller
{
    public function index()
    {
        $incomeHeaders = IncomeHeader::where('status', 1)->where('deleted_status', NULL)->get(['id', 'name']);
        $expanseHeaders = ExpanseHeader::where('status', 1)->where('deleted_status', NULL)->get(['id', 'name']);
        $classes = Classes::select(['id', 'name'])->where('deleted_status', NULL)->where('status', 1)->get();
        $years = Year::all();
        return view('admin.report.finance_report.index', compact('classes', 'incomeHeaders', 'expanseHeaders', 'years'));
    }

    public function incomeReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }
        $income_reports = '';
        if ($request->select_type === 'today') {
          $income_reports = Income::with(['incomeHeader'])->whereDate('created_at', Carbon::today())
            ->get();
        }elseif($request->select_type === 'this_week') {
            $income_reports = Income::with(['incomeHeader'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $income_reports = Income::with(['incomeHeader'])->whereBetween('created_at', [$start_week, $end_week])
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'this_month') {
           
            $income_reports = Income::with(['incomeHeader'])->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $income_reports = Income::with(['incomeHeader'])->whereMonth('created_at', $lastMonth)->get();
        }elseif($request->select_type === 'this_year') {
            $income_reports = Income::with(['incomeHeader'])->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $income_reports = Income::with(['incomeHeader'])->whereYear('created_at', $lastYear)->get();
        }elseif($request->select_type === 'period') {
            
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }
           $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
           $dateToFormat = date('Y-m-d', strtotime($request->date_to));
          $income_reports = Income::with(['incomeHeader'])->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->get();

        }

        return view('admin.report.finance_report.ajax_view.income_report', compact('income_reports'));
    }

    public function incomeGroupReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }
        $incomeGroupReports = '';
        if ($request->select_type === 'today') {
          $incomeGroupReports = Income::with(['incomeHeader'])->whereDate('created_at', Carbon::today())
            ->where('income_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'this_week') {
            $incomeGroupReports = Income::with(['incomeHeader'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->where('income_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $incomeGroupReports = Income::with(['incomeHeader'])->whereBetween('created_at', [$start_week, $end_week])
            ->whereYear('created_at', date('Y'))->where('income_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'this_month') {
           
            $incomeGroupReports = Income::with(['incomeHeader'])->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->where('income_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $incomeGroupReports = Income::with(['incomeHeader'])->whereMonth('created_at', $lastMonth)
            ->where('income_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'this_year') {
            $incomeGroupReports = Income::with(['incomeHeader'])->whereYear('created_at', date('Y'))
            ->where('income_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $incomeGroupReports = Income::with(['incomeHeader'])->whereYear('created_at', $lastYear)
            ->where('income_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'period') {
            
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }
           $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
           $dateToFormat = date('Y-m-d', strtotime($request->date_to));
          $incomeGroupReports = Income::with(['incomeHeader'])->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->where('income_header_id', $request->header_id)->get();

        }

        return view('admin.report.finance_report.ajax_view.income_group_report', compact('incomeGroupReports'));
    }

    public function expenseReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }
        $expanse_reports = '';
        if ($request->select_type === 'today') {
          $expanse_reports = Expanse::with(['expanseHeader'])->whereDate('created_at', Carbon::today())
            ->get();
        }elseif($request->select_type === 'this_week') {
            $expanse_reports = Expanse::with(['expanseHeader'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $expanse_reports = Expanse::with(['expanseHeader'])->whereBetween('created_at', [$start_week, $end_week])
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'this_month') {
           
            $expanse_reports = Expanse::with(['expanseHeader'])->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $expanse_reports = Expanse::with(['expanseHeader'])->whereMonth('created_at', $lastMonth)->get();
        }elseif($request->select_type === 'this_year') {
            $expanse_reports = Expanse::with(['expanseHeader'])->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $expanse_reports = Expanse::with(['expanseHeader'])->whereYear('created_at', $lastYear)->get();
        }elseif($request->select_type === 'period') {
            
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }
           $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
           $dateToFormat = date('Y-m-d', strtotime($request->date_to));
           $expanse_reports = Expanse::with(['expanseHeader'])->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->get();

        }

        return view('admin.report.finance_report.ajax_view.expanse_report', compact('expanse_reports'));
    }
    
    public function expenseGroupReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }
        $expanseGroupReports = '';
        if ($request->select_type === 'today') {
          $expanseGroupReports = Expanse::with(['expanseHeader'])->whereDate('created_at', Carbon::today())
            ->where('expanse_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'this_week') {
            $expanseGroupReports = Expanse::with(['expanseHeader'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->where('expanse_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $expanseGroupReports = Expanse::with(['expanseHeader'])->whereBetween('created_at', [$start_week, $end_week])
            ->where('expanse_header_id', $request->header_id)->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'this_month') {
            $expanseGroupReports = Expanse::with(['expanseHeader'])->whereMonth('created_at', date('m'))
            ->where('expanse_header_id', $request->header_id)->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $expanseGroupReports = Expanse::with(['expanseHeader'])->whereMonth('created_at', $lastMonth)
            ->where('expanse_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'this_year') {
            $expanseGroupReports = Expanse::with(['expanseHeader'])->whereYear('created_at', date('Y'))
            ->where('expanse_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $expanseGroupReports = Expanse::with(['expanseHeader'])->whereYear('created_at', $lastYear)
            ->where('expanse_header_id', $request->header_id)->get();
        }elseif($request->select_type === 'period') {
            
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }
            $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
            $dateToFormat = date('Y-m-d', strtotime($request->date_to));
            $expanseGroupReports = Expanse::with(['expanseHeader'])->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->where('expanse_header_id', $request->header_id)->get();

        }

        return view('admin.report.finance_report.ajax_view.expanse_group_report', compact('expanseGroupReports'));
    }

    public function accountBalanceReport()
    {
       $accounts = BankAccount::with(['bank','bank_deposits', 'bank_withdraws'])->get();

       return view('admin.report.finance_report.ajax_view.account_balance_report', compact('accounts'));
    }

    public function salaryReport(Request $request)
    {
        //return $request->paid_status;
        $salarySheets = "";
        $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
        $dateToFormat = date('Y-m-d', strtotime($request->date_to));
        if ($request->select_type === "period") {
            if ($request->paid_status == 'all') {
                $salarySheets = EmployeeSalary::whereBetween('paid_date', [$dateFromFormat, $dateToFormat])->get();
            }elseif ($request->paid_status === 'paid') {
                $salarySheets = EmployeeSalary::whereBetween('paid_date', [$dateFromFormat, $dateToFormat])->where('is_paid', 1)->get();
            }elseif($request->paid_status === 'no_paid'){
                $salarySheets = EmployeeSalary::whereBetween('created_at', [$dateFromFormat, $dateToFormat])->where('is_paid', 0)->get();
            }
        
        }else{
            if ($request->paid_status == 'all') {
                $salarySheets = EmployeeSalary::where('month', $request->month)->where('year', $request->year)->get();
            }elseif($request->paid_status === 'paid'){
                $salarySheets = EmployeeSalary::where('month', $request->month)->where('year', $request->year)->where('is_paid', 1)->get();
            }elseif ($request->paid_status === 'no_paid') {
               $salarySheets = EmployeeSalary::where('month', $request->month)->where('year', $request->year)->where('is_paid', 0)->get();
            }
            
        }

        return view('admin.report.finance_report.ajax_view.salary_report', compact('salarySheets'));
    }
}
