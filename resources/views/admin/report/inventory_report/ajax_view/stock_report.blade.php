    <style>
        th{line-height: 14px;}
        td{line-height: 11px;}
    </style>
@if ($stockItems->count() > 0)
    
    <div class="text-left">
        <h6 style="color:black; border-bottom:1px solid;"><b>Inventory stock report</b></h6>
    </div>
    
    <div class="table-responsive">
        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
            <thead>
                <tr class="text-center">
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Store</th>
                    <th>Quantity</th>
                    <th>Purchase Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stockItems as $stockItem)
                <tr class="text-center">
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $stockItem->inventoryitem ? $stockItem->inventoryitem->name : 'N/A' }}</td>
                    <td>{{ $stockItem->category ? $stockItem->category->category : 'N/A' }}</td>
                    <td>{{ $stockItem->supplier ? $stockItem->supplier->item_supplier : 'N/A' }}</td>
                    <td>{{ $stockItem->store ? $stockItem->store->item : 'N/A' }}</td>
                    <td>{{ $stockItem->quantity }}</td>
                    <td>{{ $stockItem->purchase }}</td>
                    <td>{{ $stockItem->data }}</td>
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