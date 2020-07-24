<?php

namespace App\Http\Controllers\Admin;

use App\InventoryIssue;
use App\StockItemIndex;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryReportController extends Controller
{
    public function index()
    {
        return view('admin.report.inventory_report.index');
    }

    public function stockReport()
    {
        $stockItems = StockItemIndex::with(['inventoryitem','category','supplier','store'])
        ->where('status', 1)->get(); 
        return view('admin.report.inventory_report.ajax_view.stock_report', compact('stockItems'));
    }

    public function issueReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }
        $inventoryIssues = '';
        if ($request->select_type === 'today') {
            $inventoryIssues = InventoryIssue::with(['inventoryItem', 'inventoryCategory', 'inventoryStudent','inventoryAdmin'])->whereDate('created_at', Carbon::today())
            ->get();
        }elseif($request->select_type === 'this_week') {
            $inventoryIssues = InventoryIssue::with(['inventoryItem', 'inventoryCategory', 'inventoryStudent','inventoryAdmin'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $inventoryIssues = InventoryIssue::with(['inventoryItem', 'inventoryCategory', 'inventoryStudent','inventoryAdmin'])->whereBetween('created_at', [$start_week, $end_week])
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'this_month') {
            $expanse_reports = InventoryIssue::with(['inventoryItem', 'inventoryCategory', 'inventoryStudent','inventoryAdmin'])->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $inventoryIssues = InventoryIssue::with(['inventoryItem', 'inventoryCategory', 'inventoryStudent','inventoryAdmin'])->whereMonth('created_at', $lastMonth)->get();
        }elseif($request->select_type === 'this_year') {
            $inventoryIssues = InventoryIssue::with(['inventoryItem', 'inventoryCategory', 'inventoryStudent','inventoryAdmin'])->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $inventoryIssues = InventoryIssue::with(['inventoryItem', 'inventoryCategory', 'inventoryStudent','inventoryAdmin'])->whereYear('created_at', $lastYear)->get();
        }elseif($request->select_type === 'period') {
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }
            $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
            $dateToFormat = date('Y-m-d', strtotime($request->date_to));
            $inventoryIssues = InventoryIssue::with(['inventoryItem', 'inventoryCategory', 'inventoryStudent','inventoryAdmin'])->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->get();
        }

        return view('admin.report.inventory_report.ajax_view.inventory_issue_report', compact('inventoryIssues'));
    }
}
