<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($accounts->count() > 0)

        <div class="text-left">
            <div class="row">
                <div class="col-md-12">
                    <h6 style="color:black; border-bottom:1px solid;"><b>Account balance report</b></h6>
                </div>
               
            </div>
           
            
        </div>
       
            <table id="dataTableExample1" class="table table-bordered mb-2">
                
                <thead>
                    <tr class="text-left">
                        <th>Serial</th>
                        <th>Bank Name</th>
                        <th>Account Name</th>
                        <th>Account No</th>
                        <th>Total Deposit</th>
                        <th>Total Withdraw</th>
                        <th>Current Balance</th>
                    </tr>
                </thead>
                <tbody>
                   @php
                        $grandTotal = 0;
                   @endphp

                    @foreach($accounts as $account)
                        
                        <tr  class="text-left">
                            <td>{{ $loop->index + 1 }}</td>                   
                            <td>{{ $account->bank->bank_name }}</td>                   
                            <td>{{ $account->holder_name }}</td>                   
                            <td>{{ $account->account_no }}</td>                   
                            <td>
                                @php
                                    $totalDeposit = 0;
                                @endphp    
                                    @foreach ($account->bank_deposits as $bankDeposit)
                                        @php
                                            $totalDeposit += $bankDeposit->deposit_amount;
                                        @endphp
                                    @endforeach
                                
                                {{ $totalDeposit }}.00
                            </td>                   
                            <td>
                                @php
                                    $totalWithdraw = 0;
                                @endphp    
                                    @foreach ($account->bank_withdraws as $bankWithdraw)
                                        @php
                                            $totalWithdraw += $bankWithdraw->withdraw_amount;
                                        @endphp
                                    @endforeach
                               
                                {{ $totalWithdraw }}.00
                            </td> 
                            <td>{{ $account->balance }}.00</td>                
                        </tr>
                        @php
                            $grandTotal += $account->balance; 
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="6" class="text-right"><b>Grand Total :</b> </td>
                        <td><b>{{ $grandTotal }}.00</b></td>
                    </tr>
                </tbody>
            </table>
           
@else
    <span class="alert alert-danger mt-3 d-block">No data found.</span>
@endif

