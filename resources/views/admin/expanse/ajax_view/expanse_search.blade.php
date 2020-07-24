<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($expanse_search->count() > 0)

    <div class="text-left">
        <div class="row">
            <div class="col-md-12">
                <h6 style="color:black; border-bottom:1px solid;"><b>Expanses</b></h6>
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

            @foreach($expanse_search as $expanse)
                
                <tr  class="text-center">
                    <td>{{ $loop->index + 1 }}</td>                   
                    <td>{{ $expanse->date }}</td>                   
                    <td>{{ $expanse->expanseHeader->name }}</td>                   
                    <td>{{ $expanse->invoice_no }}</td>                   
                    <td>{{ $expanse->amount }}</td>                   
                </tr>
                @php
                $grandTotal += $expanse->amount;
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
    
 