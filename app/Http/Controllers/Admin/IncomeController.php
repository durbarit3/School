<?php

namespace App\Http\Controllers\Admin;

use App\Income;
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

        return \response()->json('Income inserted successfully:)');
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
        ]);

        date_default_timezone_set('Asia/Dhaka');
        $updateIncome = Income::where('id', $incomeId)->first();

        $updateIncome->income_header_id = $request->header_id;
        $updateIncome->amount = $request->amount;
        $updateIncome->date = $request->date;
        $updateIncome->month = date('F');
        $updateIncome->year = date('Y');
        $updateIncome->note = $request->note;
        $updateIncome->save();

        $notification = array(
            'messege' => 'Income updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
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

    public function search(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        $searchIncomes = Income::where('year', $request->year)->where('date', date('d-m-Y', strtotime($request->date)))->get();

       return view('admin.income.search_income', compact('searchIncomes'));
    }

}
