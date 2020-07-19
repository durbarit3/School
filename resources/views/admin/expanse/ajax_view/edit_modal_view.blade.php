<form class="form-horizontal" action="{{ route('admin.expanse.update', $expanse->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="invoice_no"> <b>Invoice Number</b> : </label>
            <input readonly type="text" class="form-control" id="invoice_no"  value="{{ $expanse->invoice_no }}" name="invoice_no" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="amount"><b>Date</b> : </label>
            <input type="text" class="form-control date_picker" value="{{$expanse->date}}" name="date" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="invoice_no"><b>Header</b> : </label>
            <select required class="form-control" name="header_id" id="">
                <option value="">Select header</option>
                @foreach ($headers as $header)
                <option {{ $header->id == $expanse->expanse_header_id ? 'SELECTED' : '' }} value="{{ $header->id }}">{{ $header->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="amount"><b>Amount</b> : </label>
            <input  type="number" class="form-control" id="amount"  value="{{ $expanse->amount }}" name="amount" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="note"><b>Note</b> : </label>
            <textarea name="note" id="note" cols="10" placeholder="Note" rows="3" class="form-control">{{ $expanse->note }}</textarea>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
        @if (json_decode($userPermits->expanse_module, true)['expanse']['edit'] == 0)
            <button type="submit" class="btn btn-blue">Update</button>
        @endif
    </div>
</form>

<script>
    $(document).ready(function(){
        $(".date_picker").flatpickr({
            dateFormat: "d-m-Y",
        });
    
        $(".pick_date_of_birth").flatpickr({
            dateFormat: "Y-m-d",
            readonly:false,
        });
    });
</script>

