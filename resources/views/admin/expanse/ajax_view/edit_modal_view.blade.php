<form id="edit_expanse_form" action="{{ route('admin.expanse.update', $expanse->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <div class="col-sm-12">
            <label> <b>Invoice Number</b> : </label>
            <input readonly type="text" class="form-control" id="invoice_no"  value="{{ $expanse->invoice_no }}" name="invoice_no" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label><b>Date</b> : </label>
            <input type="text" class="form-control date_picker" value="{{$expanse->date}}" name="date" id="e_date">
            <div class="error e_error_date"></div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label><b>Header</b> : </label>
            <select class="form-control" name="header_id" id="e_header_id">
                <option value="">Select header</option>
                @foreach ($headers as $header)
                <option {{ $header->id == $expanse->expanse_header_id ? 'SELECTED' : '' }} value="{{ $header->id }}">{{ $header->name }}</option>
                @endforeach
            </select>
            <div class="error e_error_header_id"></div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label><b>Amount</b> : </label>
            <input type="number" class="form-control" id="e_amount"  value="{{ $expanse->amount }}" name="amount">
            <div class="error e_error_amount"></div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label><b>Note</b> : </label>
            <textarea name="note" id="note" cols="10" placeholder="Note" rows="3" class="form-control">{{ $expanse->note }}</textarea>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label="">Close</button>
        <button type="button" class="btn btn-sm loading_button btn-blue">Loading...</button>
        @if (json_decode($userPermits->expanse_module, true)['expanse']['edit'] == 1)
            <button type="submit" class="btn btn-blue btn-sm submit_button">Update</button>
        @endif
    </div>
</form>

<script>
    $(document).ready(function(){
        $('.loading_button').hide();
        $(".date_picker").flatpickr({
            dateFormat: "d-m-Y",
        });
    
        $(".pick_date_of_birth").flatpickr({
            dateFormat: "Y-m-d",
            readonly:false,
        });
    });
</script>

