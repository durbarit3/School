<?php

namespace App\Http\Controllers\Admin;

use App\VoucherHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountVoucherHeaderController extends Controller
{
    public function index()
    {
        $voucherHeaders = VoucherHeader::active();
        return view('admin.office_accounting.voucher_header.index', compact('voucherHeaders'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:voucher_headers,name'
        ]);

        $addVoucherHeader = new VoucherHeader();
        $addVoucherHeader->name = $request->name;
        $addVoucherHeader->save();

        $notification = array(
            'messege' => 'Voucher header inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:voucher_headers,name,'.$request->id
        ]);
        $updateVoucherHeader = VoucherHeader::where('id', $request->id)->first();
        $updateVoucherHeader->name = $request->name;
        $updateVoucherHeader->save();

        $notification = array(
            'messege' => 'Voucher header updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($voucherHeaderId)
    {
        $statusChange = VoucherHeader::where('id', $voucherHeaderId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Voucher header is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Voucher header is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


    public function delete($voucherHeaderId)
    {
        VoucherHeader::where('id', $voucherHeaderId)->singleDelete();
        $notification = array(
            'messege' => 'Voucher header is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function edit($voucherHeaderId)
    {
        $voucherHeader = VoucherHeader::where('id', $voucherHeaderId)->first();
        return response()->json($voucherHeader);
    }
}
