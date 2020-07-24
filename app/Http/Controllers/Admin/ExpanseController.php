<?php

namespace App\Http\Controllers\Admin;

use App\Expanse;
use Carbon\Carbon;
use App\ExpanseHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        session()->flash('successMsg', 'Expanse inserted successfully:)');
        return response()->json('Expanse inserted successfully:)');
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
        ],
        [
            'header_id.required' => 'Expanse header is required.', 
        ]
    );

        date_default_timezone_set('Asia/Dhaka');
        $updateExpanse = Expanse::where('id', $expanseId)->first();

        $updateExpanse->expanse_header_id = $request->header_id;
        $updateExpanse->amount = $request->amount;
        $updateExpanse->date = $request->date;
        $updateExpanse->month = date('F');
        $updateExpanse->year = date('Y');
        $updateExpanse->note = $request->note;
        $updateExpanse->save();

        session()->flash('successMsg', 'Expanse updated successfully:)');
        return response()->json('Expanse updated successfully:)');
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

    public function searchIndex()
    {
       return view('admin.expanse.search_expanse');
    }

    public function searchAction(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }

        $expanse_search = '';
        if ($request->select_type === 'today') {
          $expanse_search = Expanse::with(['expanseHeader'])->whereDate('created_at', Carbon::today())
            ->get();
        }elseif($request->select_type === 'this_week') {
            $expanse_search = Expanse::with(['expanseHeader'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $expanse_search = Expanse::with(['expanseHeader'])->whereBetween('created_at', [$start_week, $end_week])
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'this_month') {
           
            $expanse_search = Expanse::with(['expanseHeader'])->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $expanse_search = Expanse::with(['expanseHeader'])->whereMonth('created_at', $lastMonth)->get();
        }elseif($request->select_type === 'this_year') {
            $expanse_search = Expanse::with(['expanseHeader'])->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $expanse_search = Expanse::with(['expanseHeader'])->whereYear('created_at', $lastYear)->get();
        }elseif($request->select_type === 'period') {
            
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }
           $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
           $dateToFormat = date('Y-m-d', strtotime($request->date_to));
           $expanse_search = Expanse::with(['expanseHeader'])->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->get();

        }

        return view('admin.expanse.ajax_view.expanse_search', compact('expanse_search'));
    }


}
