<?php

namespace App\Http\Controllers\Admin;

use App\IncomeHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeHeaderController extends Controller
{
    public function index()
    {
        $headers =IncomeHeader::latest()->active();
        return view('admin.income.header.index', compact('headers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:income_headers,name'
        ]);
        
        $addClass = new IncomeHeader();
        $addClass->name = $request->name;
        $addClass->note = $request->note;
        $addClass->save();

        $notification = array(
            'messege' => 'Income header inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($headerId)
    {
        $statusChange = IncomeHeader::where('id', $headerId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Income header is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Income header is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:income_headers,name,'.$request->id
        ]);
        $addClass =  IncomeHeader::where('id', $request->id)->first();
        $addClass->name = $request->name;
        $addClass->note = $request->note;
        $addClass->save();

        $notification = array(
            'messege' => 'Income header update successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($headerId)
    {
        IncomeHeader::where('id', $headerId)->singleDelete();
        $notification = array(
            'messege' => 'Income header is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any category',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $headerId) {
                IncomeHeader::where('id', $headerId)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Header is deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }



    public function getHeaderByAjax($headerId)
    {
        $header = IncomeHeader::where('id', $headerId)->first();
        return response()->json($header);
    }
}
