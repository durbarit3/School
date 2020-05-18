<table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
    <thead>
        <tr class="text-center">
            
            <th>Invoice No</th>
            <th>Date</th>
            <th>Voucher Header</th>
            <th>Bank Name</th>
            <th>Account Name</th>
            <th>Account No</th>
            <th>Deposit Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="">
    @foreach($deposits as $deposit)

    <tr class="text-center">
        
        <td>{{ $deposit->invoice_no }}</td>
        <td>{{ $deposit->date }}</td>
        <td>{{ $deposit->voucherHeader->name }}</td>
        <td>{{ $deposit->bank->bank_name }}</td>
        <td>{{ $deposit->account->holder_name }}</td>
        <td>{{ $deposit->account->account_no }}</td>
        <td>{{ $deposit->deposit_amount }}</td>
        @if($deposit->status==1)
        <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
        @else
        <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
        @endif
        <td data-id="{{$loop->index}}">
            @if($deposit->status==1)
            <a id="chenge_status_button" href="{{ route('admin.office.account.deposit.change.status', $deposit->id ) }}"
                class="btn btn-success btn-sm ">
                <i class="fas fa-thumbs-up"></i></a>
            @else
            <a id="chenge_status_button" href="{{ route('admin.office.account.deposit.change.status', $deposit->id ) }}"
                class="btn btn-danger btn-sm">
                <i class="fas fa-thumbs-down"></i>
            </a>
            @endif
        | <a href="#" data-id="{{ $deposit->id }}" title="edit" class="edit_deposit btn btn-sm btn-blue text-white">
            <i class="fas previous-{{ $loop->index }} fa-pencil-alt"></i>
            <img height="13" style="display:none;" width="13" class="button_loader-{{ $loop->index }} loading" src="{{asset('public/admins/images/preloader4.gif')}}" alt="">
        </a> |
            <a id="delete_deposit" href="{{ route('admin.office.account.deposit.delete', $deposit->id) }}"
                class="btn btn-danger btn-sm text-white" title="Delete">
                <i class="far fa-trash-alt"></i>
            </a>
        </td>
    </tr>
    @endforeach 
    </tbody>
</table>

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>

