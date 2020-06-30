<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($incomeGroupReports->count() > 0)

        <div class="text-left">
            <div class="row">
                <div class="col-md-12">
                    <h6 style="color:black; border-bottom:1px solid;"><b>Student report</b></h6>
                </div>
                
            </div>
           
            
        </div>
       
            <table id="dataTableExample1" class="table table-bordered mb-2">
                
                <thead>
                    <tr class="text-center">
                        <th>Serial</th>
                        <th>Date</th>
                        <th>Income Header</th>
                        <th>Invoice No</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                   @php
                        $grandTotal = 0;
                   @endphp

                    @foreach($incomeGroupReports as $incomeGroupReport)
                        
                        <tr  class="text-center">
                            <td>{{ $loop->index + 1 }}</td>                   
                            <td>{{ $incomeGroupReport->date }}</td>                   
                            <td>{{ $incomeGroupReport->incomeHeader->name }}</td>                   
                            <td>{{ $incomeGroupReport->invoice_no }}</td>                   
                            <td>{{ $incomeGroupReport->amount }}</td>                   
                        </tr>
                        @php
                        $grandTotal += $incomeGroupReport->amount;
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="text-center">
                        <th class="text-right" colspan="4"><b>Grand Total</b> </th>
                        <th><b>{{ $grandTotal }}</b></th>
                        
                    </tr>   
                </tfoot>
            </table>
           
        <div class="row">
            <div class="col-md-6">
                <b>Grand Total</b> : <b><span id="grand_total">{{ $grandTotal }}.00 tk. only</span></b> 
            </div>
        </div>
@else
        <span class="alert alert-danger mt-3 d-block">NO DATA FOUND</span>
@endif

    <script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
    <script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>
    
   