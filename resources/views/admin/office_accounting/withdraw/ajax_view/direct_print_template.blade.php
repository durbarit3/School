
<style>
    td {
        font-size: 18px!important;
    }
    th {
        font-size: 18px!important;
    }
</style>



{{-- Print Page Header --}}
<div style="color:black!important;" class="print_page_heading_heading">
    <div class="exam_name text-center">
        <img src="{{ asset('public/admins/images/logo.png') }}" alt=""><br><br><br>
        <h4><b>XYZ High School</b></h4>
        <h5>Mirpur 1, Block: F, Dhaka</h5>
        <h5>Bank Withdraw Invoice</h5>
    </div>
</div>
{{-- Print Page Header End--}}
<hr>
<div class="table_area table-responsive">
    <div class="printing_content">
        <table style="color:black;" class="table table-sm table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Invoice No</th>
                    <th>Voucher Header</th>
                    <th>Bank</th>
                    <th>Account</th>
                    <th>Account No</th>
                    <th>Withdraw Amount</th>
                </tr>
            </thead>
            <tbody>
               
                <tr class="text-center">
                    <td>{{ $addBankWithdraw->invoice_no }}</td>
                    <td>{{ $addBankWithdraw->voucherHeader->name }}</td>
                    <td>{{ $addBankWithdraw->bank->bank_name }}</td>
                    <td>{{ $addBankWithdraw->account->holder_name }}</td>
                    <td>{{ $addBankWithdraw->account->account_no }}</td>
           
                    <td>{{ $addBankWithdraw->withdraw_amount }}</td>
                </tr>
            
            </tbody>
        </table>
    </div>

    <div style="padding-top:50px; color:black;" class="footer">
        <hr>
        <h5 style="text-align: left;">Printing Data : {{ date('d.M.Y') }}</h5>
        <h5 style="text-align: right;">Principal Signature</h5>
    </div>
</div>