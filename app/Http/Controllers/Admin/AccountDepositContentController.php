<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\BankAccount;
use App\BankDeposit;
use App\VoucherHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountDepositContentController extends Controller
{
    public function index()
    {
        $invoiceId = 0;
        $lastRow = BankDeposit::orderBy('id', 'DESC')->first();
        if (!$lastRow) {
            $invoiceId = date('dmy') . '1';
        } else {
            $invoiceId = date('dmy') . ++$lastRow->id;
        }
        $banks = Bank::where('deleted_status', NULL)->latest()->get();
        $voucherHeaders = VoucherHeader::select('id', 'name')->where('status', 1)
        ->where('deleted_status', NULL)->get();

        return view('admin.office_accounting.deposit.index', compact('banks', 'invoiceId', 'voucherHeaders'));
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
            $addBankDeposit = new BankDeposit();
            $addBankDeposit->invoice_no = $request->invoice_no;
            $addBankDeposit->date = $request->date;
            $addBankDeposit->voucher_header_id = $request->voucher_id;
            $addBankDeposit->bank_id = $request->bank_id;
            $addBankDeposit->bank_account_id = $request->account_id;
            $addBankDeposit->deposit_amount = $request->amount;
            $addBankDeposit->remarks = $request->remarks;
            $addBankDeposit->save();

            $balanceAccount = BankAccount::where('id', $request->account_id)->first();
            $balanceAccount->balance += $request->amount;
            $balanceAccount->save();

            return response()->json(['success' => 'Bank deposit added successfully']);
            
        }else {
            $addBankDeposit = new BankDeposit();
            $addBankDeposit->invoice_no = $request->invoice_no;
            $addBankDeposit->date = $request->date;
            $addBankDeposit->voucher_header_id = $request->voucher_id;
            $addBankDeposit->bank_id = $request->bank_id;
            $addBankDeposit->bank_account_id = $request->account_id;
            $addBankDeposit->deposit_amount = $request->amount;
            $addBankDeposit->remarks = $request->remarks;
            $addBankDeposit->save();
            $balanceAccount = BankAccount::where('id', $request->account_id)->first();
            $balanceAccount->balance += $request->amount;
            $balanceAccount->save();
            return view('admin.office_accounting.deposit.ajax_view.direct_print_template', compact('addBankDeposit'));
        }
        
    }


    public function allDeposits()
    {
        $deposits = BankDeposit::with(['bank', 'account', 'voucherHeader'])
        ->where('deleted_status', NULL)
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.office_accounting.deposit.ajax_view.all_deposit_view', compact('deposits'));
    }

    public function edit($depositId)
    {
        $deposit = BankDeposit::with(['bank', 'account', 'voucherHeader'])
        ->where('id', $depositId)
        ->first();

        $voucherHeaders = VoucherHeader::select('id', 'name')->where('status', 1)
        ->where('deleted_status', NULL)->get();

        return view('admin.office_accounting.deposit.ajax_view.edit_modal_view', compact('deposit', 'voucherHeaders'));
    }

    public function update(Request $request, $depositId)
    {
        $this->validate($request, [
            'date' => 'required',
            'voucher_id' => 'required',
        ]);

        
        $updateBankDeposit = BankDeposit::where('id', $depositId)->first();
        
        $updateBankDeposit->date = $request->date;
        $updateBankDeposit->voucher_header_id = $request->voucher_id;
        $updateBankDeposit->remarks = $request->remarks;
        $updateBankDeposit->save();

        return response()->json(['success' => 'Bank deposit updated successfully']);
            
       
    }

    public function changeStatus($depositId)
    {
        $statusChange = BankDeposit::where('id', $depositId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            return response()->json('Bank deposit status is changed');
        } else {
            $statusChange->status = 1;
            $statusChange->save();
          return response()->json('Bank deposit status is changed');
        }
    }

    public function delete($depositId)
    {
        BankDeposit::where('id', $depositId)->singleDelete();
        return response()->json('Bank deposit is deleted successfully');
    }

}
