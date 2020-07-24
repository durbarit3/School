<?php

namespace App\Http\Controllers\Admin;

use App\BookIssue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibraryReportController extends Controller
{
    public function index()
    {
        return view('admin.report.library_report.index');
    }

    public function getBookIssueReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }
        $bookIssueReports = '';
        if ($request->select_type === 'today') {
          $bookIssueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->whereDate('created_at', Carbon::today())
            ->get();
        }elseif($request->select_type === 'this_week') {
            $bookIssueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $bookIssueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->whereBetween('created_at', [$start_week, $end_week])
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'this_month') {
            $bookIssueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $bookIssueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->whereMonth('created_at', $lastMonth)->get();
        }elseif($request->select_type === 'this_year') {
            $bookIssueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $bookIssueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->whereYear('created_at', $lastYear)->get();
        }elseif($request->select_type === 'period') {
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }
           $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
           $dateToFormat = date('Y-m-d', strtotime($request->date_to));
           $bookIssueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->get();
        }

        return view('admin.report.library_report.ajax_view.book_issue_report', compact('bookIssueReports'));
    }
    
    public function getBookIssueReturnReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }
        $bookIssueReturnReports = '';
        if ($request->select_type === 'today') {
          $bookIssueReturnReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])
          ->where('returned_status', 1)->whereDate('created_at', Carbon::today())
            ->get();
        }elseif($request->select_type === 'this_week') {
            $bookIssueReturnReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 1)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $bookIssueReturnReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 1)->whereBetween('created_at', [$start_week, $end_week])
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'this_month') {
            $bookIssueReturnReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 1)->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $bookIssueReturnReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 1)->whereMonth('created_at', $lastMonth)->get();
        }elseif($request->select_type === 'this_year') {
            $bookIssueReturnReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 1)->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $bookIssueReturnReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 1)->whereYear('created_at', $lastYear)->get();
        }elseif($request->select_type === 'period') {
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }
           $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
           $dateToFormat = date('Y-m-d', strtotime($request->date_to));
           $bookIssueReturnReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 1)->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->get();
        }

        return view('admin.report.library_report.ajax_view.book_issue_return_report', compact('bookIssueReturnReports'));
    }
    
    public function getBookDueReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }

        $bookDueReports = '';
        if ($request->select_type === 'today') {
          $bookDueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])
          ->where('returned_status', 1)->whereDate('created_at', Carbon::today())
            ->get();
        }elseif($request->select_type === 'this_week') {
            $bookDueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 0)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $bookDueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 0)->whereBetween('created_at', [$start_week, $end_week])
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'this_month') {
            $bookDueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 0)->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $bookDueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 0)->whereMonth('created_at', $lastMonth)->get();
        }elseif($request->select_type === 'this_year') {
            $bookDueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 0)->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $bookDueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 0)->whereYear('created_at', $lastYear)->get();
        }elseif($request->select_type === 'period') {
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }
           $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
           $dateToFormat = date('Y-m-d', strtotime($request->date_to));
           $bookDueReports = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->where('returned_status', 0)->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->get();
        }

        return view('admin.report.library_report.ajax_view.book_due_report', compact('bookDueReports'));
    }

    
}
