<?php

namespace App\Http\Controllers\Admin;

use App\Expanse;
use App\ExpanseHeader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpanseController extends Controller
{
    public function index()
    {
        $invoiceId = 0;
        $lastRow = Expanse::orderBy('id', 'DESC')->first();
        if (!$lastRow) {
            $invoiceId = date('dmy') . '1';
        } else {
            $invoiceId = date('dmy') . ++$lastRow->id;
        }
        $expanses = Expanse::with('ExpanseHeader')->latest()->where('year', date('Y'))->get();

        $headers = ExpanseHeader::select(['id', 'name'])->latest()->get();
        return view('admin.expanse.index', compact('expanses', 'headers', 'invoiceId'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'header_id' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required',
        ]);

        date_default_timezone_set('Asia/Dhaka');
        $addExpanse = new Expanse();
        $addExpanse->invoice_no = $request->invoice_no;
        $addExpanse->expanse_header_id = $request->header_id;
        $addExpanse->amount = $request->amount;
        $addExpanse->date = $request->date;
        $addExpanse->month = date('F');
        $addExpanse->year = date('Y');
        $addExpanse->note = $request->note;
        $addExpanse->save();

        $notification = array(
            'messege' => 'Expanse inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getExpanseByAjax($expanseId)
    {
        $expanse = Expanse::with('ExpanseHeader')->where('id', $expanseId)->firstOrFail();
        $headers = ExpanseHeader::select(['id', 'name'])->latest()->get();
        return view('admin.expanse.ajax_view.edit_modal_view', compact('expanse', 'headers'));
    }

    public function update(Request $request, $expanseId)
    {
        $this->validate($request, [
            'header_id' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required',
        ]);

        date_default_timezone_set('Asia/Dhaka');
        $updateExpanse = Expanse::where('id', $expanseId)->first();

        $updateExpanse->expanse_header_id = $request->header_id;
        $updateExpanse->amount = $request->amount;
        $updateExpanse->date = $request->date;
        $updateExpanse->month = date('F');
        $updateExpanse->year = date('Y');
        $updateExpanse->note = $request->note;
        $updateExpanse->save();

        $notification = array(
            'messege' => 'Expanse updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function statusChange($expanseId)
    {
        $statusChange = Expanse::where('id', $expanseId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Expanse is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Expanse is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($expanseId)
    {
        Expanse::where('id', $expanseId)->delete();
        $notification = array(
            'messege' => 'Expanse is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any expanse',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $expanseId) {
                Expanse::where('id', $expanseId)->delete();
            }
        }
        $notification = array(
            'messege' => 'Expanse is deleted permanently:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function search(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        $searchExpanses = Expanse::where('year', $request->year)->where('date', date('d-m-Y', strtotime($request->date)))->get();

       return view('admin.expanse.search_expanse', compact('searchExpanses'));
    }


}
