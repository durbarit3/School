<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\BankAccount;
use App\BankWithdraw;
use App\VoucherHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountWithdrawController extends Controller
{
    public function index()
    {
        $invoiceId = 0;
        $lastRow = BankWithdraw::orderBy('id', 'DESC')->first();

        if (!$lastRow) {
            $invoiceId = date('dmy') . '1';
        } else {
            $invoiceId = date('dmy') . ++$lastRow->id;
        }

        $banks = Bank::where('deleted_status', NULL)->latest()->get();
        $voucherHeaders = VoucherHeader::select('id', 'name')->where('status', 1)
        ->where('deleted_status', NULL)->get();

        return view('admin.office_accounting.withdraw.index', compact('banks', 'invoiceId', 'voucherHeaders'));
    }

    public function getAccountsByAjax($bankId)
    {
        $accounts = BankAccount::select('id', 'holder_name')->where('bank_id', $bankId)->where('status', 1)->where('deleted_status', NULL)->get();
        return response()->json($accounts);
    }

    public function getAccountNumberByAjax($accountId)
    {
        $accounts = BankAccount::select('account_no')->where('id', $accountId)->first();
        return response()->json($accounts);
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'invoice_no' => 'required',
            'voucher_id' => 'required',
            'date' => 'required',
            'bank_id' => 'required',
            'account_id' => 'required',
            'amount' => 'required',
        ]);

        if ($request->direction === 'Save') {
            $addBankWithdraw = new BankWithdraw();
            $addBankWithdraw->invoice_no = $request->invoice_no;
            $addBankWithdraw->date = $request->date;
            $addBankWithdraw->voucher_header_id = $request->voucher_id;
            $addBankWithdraw->bank_id = $request->bank_id;
            $addBankWithdraw->bank_account_id = $request->account_id;
            $addBankWithdraw->withdraw_amount = $request->amount;
            $addBankWithdraw->remarks = $request->remarks;
            $addBankWithdraw->save();

            $balanceAccount = BankAccount::where('id', $request->account_id)->first();
            $balanceAccount->balance -= $request->amount;
            $balanceAccount->save();

            return response()->json(['success' => 'Bank withdraw added successfully']);
            
        }else {
            $addBankWithdraw = new BankWithdraw();
            $addBankWithdraw->invoice_no = $request->invoice_no;
            $addBankWithdraw->date = $request->date;
            $addBankWithdraw->voucher_header_id = $request->voucher_id;
            $addBankWithdraw->bank_id = $request->bank_id;
            $addBankWithdraw->bank_account_id = $request->account_id;
            $addBankWithdraw->withdraw_amount = $request->amount;
            $addBankWithdraw->remarks = $request->remarks;
            $addBankWithdraw->save();
            $balanceAccount = BankAccount::where('id', $request->account_id)->first();
            $balanceAccount->balance -= $request->amount;
            $balanceAccount->save();
            return view('admin.office_accounting.withdraw.ajax_view.direct_print_template', compact('addBankWithdraw'));
        }
        
    }


    public function allWithdraws()
    {
        $withdraws = BankWithdraw::with(['bank', 'account', 'voucherHeader'])
        ->where('deleted_status', NULL)
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.office_accounting.withdraw.ajax_view.all_withdraw_view', compact('withdraws'));
    }

    public function edit($withdrawId)
    {
        $withdraw = BankWithdraw::with(['bank', 'account', 'voucherHeader'])
        ->where('id', $withdrawId)
        ->first();

        $voucherHeaders = VoucherHeader::select('id', 'name')->where('status', 1)
        ->where('deleted_status', NULL)->get();

        return view('admin.office_accounting.withdraw.ajax_view.edit_modal_view', compact('withdraw', 'voucherHeaders'));
    }

    public function update(Request $request, $withdrawId)
    {
        $this->validate($request, [
            'date' => 'required',
            'voucher_id' => 'required',
        ]);

        $updateBankWithdraw = BankWithdraw::where('id', $withdrawId)->first();
        $updateBankWithdraw->date = $request->date;
        $updateBankWithdraw->voucher_header_id = $request->voucher_id;
        $updateBankWithdraw->remarks = $request->remarks;
        $updateBankWithdraw->save();

        return response()->json(['success' => 'Bank withdraw updated successfully']);
            
       
    }

    public function changeStatus($withdrawId)
    {
        $statusChange = BankWithdraw::where('id', $withdrawId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            return response()->json('Bank withdraw status is changed');
        } else {
            $statusChange->status = 1;
            $statusChange->save();
          return response()->json('Bank withdraw status is changed');
        }
    }

    public function delete($withdrawId)
    {
        BankWithdraw::where('id', $withdrawId)->singleDelete();
        return response()->json('Bank deposit is deleted successfully');
    }
}
