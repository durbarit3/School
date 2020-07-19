<form class="form-horizontal" action="{{ route('admin.income.update', $income->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        
        <div class="col-sm-12">
            <label for="invoice_no"><b>Invoice No :</b></label>
            <input readonly type="text" class="form-control" id="invoice_no"  value="{{ $income->invoice_no }}" name="invoice_no" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="invoice_no"><b>Date : </b></label>
            <input type="text" class="form-control date_picker" value="{{$income->date}}" name="date" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="invoice_no"><b>Header : </b></label>
            <select required class="form-control" name="header_id" id="">
                <option value="">Select header</option>
                @foreach ($headers as $header)
                <option {{ $header->id == $income->income_header_id ? 'SELECTED' : '' }} value="{{ $header->id }}">{{ $header->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="invoice_no"><b>Amount : </b></label>   
            <input type="number" class="form-control" id="amount"  value="{{ $income->amount }}" name="amount" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="invoice_no"><b>Note : </b></label>  
            <textarea name="note" id="" cols="10" placeholder="Note" rows="3" class="form-control">{{ $income->note }}</textarea>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
        @if (json_decode($userPermits->income_module, true)['income']['edit'] == 1)
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

