    <style>
        th{line-height: 14px;}
        td{line-height: 11px;}
    </style>
@if ($inventoryIssues->count() > 0)

    <div class="text-left">
        <h6 style="color:black; border-bottom:1px solid;"><b>Inventory issue item reports</b></h6>
    </div>

    <div class="table-responsive">
        <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
            <thead>
                <tr>
                    <th>
                        SL
                    </th>
                    <th>Item</th>
                    <th>Item Category</th>
                    <th>Issue-Return </th>
                    <th>Issue To</th>
                    <th>Issued By</th>
                    <th>Quantity</th>
                    <th>Return status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($inventoryIssues as $inventoryIssue)
                <tr>
                    <td>{{ $loop->index +1 }}</td>
                    <td>{{$inventoryIssue->inventoryItem ? $inventoryIssue->inventoryItem->item : 'N/A'}}</td>
                    <td>{{$inventoryIssue->inventoryCategory ? $inventoryIssue->inventoryCategory->category : 'N/A'}}</td>
                    <td>{{ $inventoryIssue->isuereturn }}</td>
                   
                    <td>
                        {{ $inventoryIssue->inventoryStudent ? $inventoryIssue->inventoryStudent->name : 'N/A'}}
                    </td>
                    
                    <td>
                        {{ $inventoryIssue->inventoryAdmin ? $inventoryIssue->inventoryAdmin->adminname : 'N/A'}}
                    </td>
                    <td>{{ $inventoryIssue->qty }}</td>
                    <td>
                        @if ($inventoryIssue->returned_status == 0)
                        <span class="badge badge-danger pb-1"><b>Item due</b> </span> 
                        @else
                            <span class="badge badge-success pb-1"><b>Item returned</b> </span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <span class="alert alert-danger d-block">No data found.</span>
@endif

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>