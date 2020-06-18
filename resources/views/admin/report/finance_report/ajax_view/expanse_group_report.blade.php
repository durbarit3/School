<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($expanseGroupReports->count() > 0)

        <div class="text-left">
            <div class="row">
                <div class="col-md-6">
                    <h6 style="color:black; border-bottom:1px solid;"><b>Student report</b></h6>
                </div>
                <div class="col-md-6">
                    <h6 style="color:black; border-bottom:1px solid;"><b>Grand Total: <span id="top_grand_total_value"></span></b></h6>
                </div>
            </div>
        </div>
       
            <table id="dataTableExample1" class="table table-striped table-bordered mb-2">
            
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

            </table>
           
        <div class="row">
            <div class="col-md-6">
                <b>Grand Total</b> : <b><span id="grand_total">{{ $grandTotal }}.00 tk. only</span></b> 
            </div>
        </div>
@else
    <span class="alert alert-danger mt-3 d-block">There is no student in this class section</span>
@endif

    <script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
    <script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>
    
    <script>
        $(document).ready(function () {
           
            var grandTotal = $('#grand_total').html();
            var topGrandTotal = $('#top_grand_total_value').html(grandTotal);
            
        });
    </script>