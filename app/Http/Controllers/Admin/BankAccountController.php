<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\BankAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankAccountController extends Controller
{
    public function index()
    {
        $accounts = BankAccount::with(['bank'])->where('deleted_status', NULL)->latest()->get();
        $banks = Bank::where('deleted_status', NULL)->where('status', 1)->latest()->get();
        return view('admin.office_accounting.account.index', compact('accounts', 'banks'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bank_id' => 'required',
            'bank_branch' => 'required',
            'holder_name' => 'required',
            'account_no' => 'required',
            'opening_balance' => 'required|numeric',
            'address' => 'required',
        ]);

        $addBankAccount = new BankAccount();
        $addBankAccount->bank_id = $request->bank_id;
        $addBankAccount->holder_name = $request->holder_name;
        $addBankAccount->bank_branch = $request->bank_branch;
        $addBankAccount->account_no = $request->account_no;
        $addBankAccount->opening_balance = $request->opening_balance;
        $addBankAccount->address = $request->address;
        $addBankAccount->balance = $request->opening_balance;
        $addBankAccount->save();

        return response()->json('Bank account added successfully:)');
        
    }

    public function changeStatus($accountId)
    {
        $statusChange = BankAccount::where('id', $accountId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Bank account is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Bank account is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($accountId)
    {
        $account = BankAccount::with(['bank'])->where('id', $accountId)->firstOrFail();
        $banks = Bank::where('deleted_status', NULL)->where('status', 1)->latest()->get();
        return view('admin.office_accounting.account.ajax_view.edit_modal_view', compact('account', 'banks'));
    }

    public function update(Request $request, $accountId)
    {
        $this->validate($request, [
            'bank_id' => 'required',
            'bank_branch' => 'required',
            'holder_name' => 'required',
            'account_no' => 'required',
            'opening_balance' => 'required|numeric',
            'address' => 'required',
        ]);

        $updateBankAccount = BankAccount::where('id', $accountId)->first();
        $updateBankAccount->bank_id = $request->bank_id;
        $updateBankAccount->holder_name = $request->holder_name;
        $updateBankAccount->bank_branch = $request->bank_branch;
        $updateBankAccount->account_no = $request->account_no;
        $updateBankAccount->opening_balance = $request->opening_balance;
        $updateBankAccount->address = $request->address;
        $updateBankAccount->save();

        $notification = array(
            'messege' => 'Bank account is updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($accountId)
    {
        BankAccount::where('id', $accountId)->singleDelete();
        $notification = array(
            'messege' => 'Bank account is deleted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
