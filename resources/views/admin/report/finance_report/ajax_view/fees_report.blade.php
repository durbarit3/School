<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if (count($collectionArrays) > 0)

    <div class="text-left">
        <div class="row">
            <div class="col-md-12">
                <h6 style="color:black; border-bottom:1px solid;"><b>Fees report</b></h6>
            </div>
        </div>
    </div>
    
    <table id="dataTableExample1" class="table table-bordered mb-2">
        
        <thead>
            <tr class="text-center">
                <th>Studnet</th>
                <th>Class</th>
                <th>Role</th>
                <th>Fees type</th>
                <th>Fees group</th>
                <th>Month</th>
                <th>Mode</th>
                <th>Year</th>
                <th>P.ID</th>
                <th>P.date</th>
                <th>status</th>
                <th>Amount</th>
                <th>Discount</th>
                <th>Fine</th>
                <th>Paid</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalAmount = 0;
                $totalDiscount = 0;
                $totalFine = 0;
                $totalPaid = 0;
            @endphp

            @foreach($collectionArrays as $collectionArray)
            
                <tr class="text-center">
                    
                    <td>{{ $collectionArray['name'] }}</td>
                    <td>{{ $collectionArray['class'] }} ({{ $collectionArray['section'] }})</td>
                    <td>{{ $collectionArray['roll'] }}</td>
                    <td>{{ $collectionArray['fees'][0]['fees_type'] }}</td>
                    <td>{{ $collectionArray['fees'][0]['fees_groups'] }}</td>
                    <td>{{ $collectionArray['fees'][0]['month'] }}</td>
                    @if($collectionArray['fees'][0]['mode'] == 1)
                        <td>Cash</td>
                    @elseif($collectionArray['fees'][0]['mode'] == 2)
                        <td>fee</td>
                    @elseif($collectionArray['fees'][0]['mode'] == 3)
                        <td>DD</td>
                    @else
                        <td>N/A</td>
                    @endif
                    <td>{{ $collectionArray['fees'][0]['year'] }}</td>
                    <td>{{ $collectionArray['fees'][0]['payment_id']}}</td>
                    <td>{{ $collectionArray['fees'][0]['paid_date'] ? $collectionArray['fees'][0]['paid_date'] : 'N/A' }}</td>
                    <td>{!!$collectionArray['fees'][0]['is_paid'] ? '<span class="badge badge-success py-1">Paid</span>':'<span class="badge badge-danger py-1">UnPaid</span>' !!}</td>
                    <td>
                        {{ $collectionArray['fees'][0]['amount']}}
                        @php $totalAmount += $collectionArray['fees'][0]['amount']; @endphp
                    </td>
                    
                    <td>
                        {{ $collectionArray['fees'][0]['discount'] == null ? 0 : $collectionArray['fees'][0]['discount'] }}
                        @php 
                            $totalDiscount += $collectionArray['fees'][0]['discount'] == null ? 0 : $collectionArray['fees'][0]['discount']; 
                        @endphp
                    </td>
                    
                    <td>
                        {{ $collectionArray['fees'][0]['fine'] == null ? 0 : $collectionArray['fees'][0]['fine'] }}
                        @php 
                            $totalFine += $collectionArray['fees'][0]['fine'] == null ? 0 : $collectionArray['fees'][0]['fine'];
                        @endphp
                    </td>
                        
                    <td>
                        {{ $collectionArray['fees'][0]['paid'] == null ? 0 : $collectionArray['fees'][0]['paid'] }}
                        @php 
                            $totalPaid += $collectionArray['fees'][0]['paid'] == null ? 0 : $collectionArray['fees'][0]['paid'];
                        @endphp
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="text-center">
                <th colspan="11"class="text-right" colspan="4"><b>Grand Total</b> </th>
                <th><b>{{ $totalAmount }}</b></th>
                <th><b>{{ $totalDiscount }}</b></th>
                <th><b>{{ $totalFine }}</b></th>
                <th><b>{{ $totalPaid }}</b></th>
            </tr>   
    </tfoot>
    </table>  
       
@else
    <span class="alert alert-danger mt-3 d-block">NO DATA FOUND</span>
@endif
    <script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
    <script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>