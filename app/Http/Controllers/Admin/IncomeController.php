<?php

namespace App\Http\Controllers\Admin;

use App\Income;
use Carbon\Carbon;
use App\IncomeHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeController extends Controller
{
    public function index()
    {
        $invoiceId = 0;
        $lastRow = Income::orderBy('id', 'DESC')->first();
        if (!$lastRow) {
            $invoiceId = date('dmy') . '1';
        } else {
            $invoiceId = date('dmy') . ++$lastRow->id;
        }
        $incomes = Income::with('incomeHeader')->where('deleted_status', NULL)->latest()->where('year', date('Y'))->get();
        $headers = IncomeHeader::where('status', 1)->where('deleted_status', NULL)->select(['id', 'name'])->latest()->get();
        return view('admin.income.index', compact('incomes', 'headers', 'invoiceId'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'header_id' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required',
        ]);

        date_default_timezone_set('Asia/Dhaka');
        $addIncome = new Income();
        $addIncome->invoice_no = $request->invoice_no;
        $addIncome->income_header_id = $request->header_id;
        $addIncome->amount = $request->amount;
        $addIncome->date = $request->date;
        $addIncome->month = date('F');
        $addIncome->year = date('Y');
        $addIncome->note = $request->note;
        $addIncome->save();

        session()->flash('successMsg', 'Successfully income added.');
        return response()->json('Class income successfully:)');
    }

    public function getIncomeByAjax($incomeId)
    {
        $income = Income::with('incomeHeader')->where('id', $incomeId)->firstOrFail();
        $headers = IncomeHeader::select(['id', 'name'])->latest()->get();
        return view('admin.income.ajax_view.edit_modal_view', compact('income', 'headers'));
    }

    public function update(Request $request, $incomeId)
    {
        $this->validate($request, [
            'header_id' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required',
        ],
        [
            'header_id.required' => 'Income header is required.'
        ]
    );

        date_default_timezone_set('Asia/Dhaka');
        $updateIncome = Income::where('id', $incomeId)->first();

        $updateIncome->income_header_id = $request->header_id;
        $updateIncome->amount = $request->amount;
        $updateIncome->date = $request->date;
        $updateIncome->month = date('F');
        $updateIncome->year = date('Y');
        $updateIncome->note = $request->note;
        $updateIncome->save();

        session()->flash('successMsg', 'Income updated successfully:)');
        return response()->json('Income updated successfully:)');
    }

    public function statusChange($incomeId)
    {
        $statusChange = Income::where('id', $incomeId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Income is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Income is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($incomeId)
    {
        Income::where('id', $incomeId)->singleDelete();
        $notification = array(
            'messege' => 'Income is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any income',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $incomeId) {
                Income::where('id', $incomeId)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'income is deleted permanently:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function searchIndex()
    {
       return view('admin.income.search_income',);
    }

    public function searchAction(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }

        $income_search = '';
        if ($request->select_type === 'today') {
          $income_search = Income::with(['incomeHeader'])->whereDate('created_at', Carbon::today())
            ->get();
        }elseif($request->select_type === 'this_week') {
            $income_search = Income::with(['incomeHeader'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $income_search = Income::with(['incomeHeader'])->whereBetween('created_at', [$start_week, $end_week])
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'this_month') {
           
            $income_search = Income::with(['incomeHeader'])->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $income_search = Income::with(['incomeHeader'])->whereMonth('created_at', $lastMonth)->get();
        }elseif($request->select_type === 'this_year') {
            $income_search = Income::with(['incomeHeader'])->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $income_search = Income::with(['incomeHeader'])->whereYear('created_at', $lastYear)->get();
        }elseif($request->select_type === 'period') {
            
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }
           $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
           $dateToFormat = date('Y-m-d', strtotime($request->date_to));
           $income_search = Income::with(['incomeHeader'])->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->get();

        }

        return view('admin.income.ajax_view.income_search', compact('income_search'));
    }

}
