<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountBankControllerContentController extends Controller
{
    public function index()
    {
        $banks = Bank::where('deleted_status', NULL)->latest()->get();
        return view('admin.office_accounting.bank.index', compact('banks'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $addBank = new Bank();
        $addBank->bank_name = $request->name;
        $addBank->save();

        $notification = array(
            'messege' => 'Bank added successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($bankId)
    {
        $bank = Bank::where('id', $bankId)->firstOrFail();
        return view('admin.office_accounting.bank.ajax_view.edit_modal_view', compact('bank'));
    }

    public function update(Request $request, $bankId)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $updateBank = Bank::where('id', $bankId)->first();
        $updateBank->bank_name = $request->name;
        $updateBank->save();

        $notification = array(
            'messege' => 'Bank updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($bankId)
    {
        $statusChange = Bank::where('id', $bankId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Bank is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Bank is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($bankId)
    {
        Bank::where('id', $bankId)->singleDelete();
        $notification = array(
            'messege' => 'Bank is deleted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

}
