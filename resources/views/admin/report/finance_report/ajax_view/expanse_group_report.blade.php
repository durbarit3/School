    <style>
        th{line-height: 14px;}
        td{line-height: 11px;}
    </style>
@if ($expanseGroupReports->count() > 0)

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

                    @foreach($expanseGroupReports as $expanseGroupReport)
                        
                        <tr  class="text-center">
                            <td>{{ $loop->index + 1 }}</td>                   
                            <td>{{ $expanseGroupReport->date }}</td>                   
                            <td>{{ $expanseGroupReport->expanseHeader->name }}</td>                   
                            <td>{{ $expanseGroupReport->invoice_no }}</td>                   
                            <td>{{ $expanseGroupReport->amount }}</td>                   
                        </tr>
                        @php
                        $grandTotal += $expanseGroupReport->amount;
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
           
     
@else
        <span class="alert alert-danger mt-3 d-block">NO DATA FOUND</span>
@endif

    <script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
    <script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>
    
    