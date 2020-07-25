<form id="edit_income_form" action="{{ route('admin.income.update', $income->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <div class="col-sm-12">
            <label><b>Invoice No :</b></label>
            <input readonly type="text" class="form-control" id="invoice_no"  value="{{ $income->invoice_no }}" name="invoice_no">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label><b>Date : </b></label>
            <input readonly type="text" class="form-control readonly_field date_picker" id="e_date" value="{{$income->date}}" name="date">
            <span class="error e_error_date"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label><b>Header : </b></label>
            <select class="form-control" name="header_id" id="e_header_id">
                <option value="">Select header</option>
                @foreach ($headers as $header)
                <option {{ $header->id == $income->income_header_id ? 'SELECTED' : '' }} value="{{ $header->id }}">{{ $header->name }}</option>
                @endforeach
            </select>
            <span class="error e_error_header_id"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label><b>Amount : </b></label>   
            <input type="number" class="form-control" id="e_amount"  value="{{ $income->amount }}" name="amount">
            <span class="error e_error_amount"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label><b>Note : </b></label>  
            <textarea name="note" id="" cols="10" placeholder="Note" rows="3" class="form-control">{{ $income->note }}</textarea>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn btn-sm loading_button btn-blue">Loading...</button>
        @if (json_decode($userPermits->income_module, true)['income']['edit'] == 1)
            <button type="submit" class="btn btn-blue submit_button btn-sm">Update</button>
        @endif
    </div>
</form>

    <script>
        $(document).ready(function(){
            $('.loading_button').hide();
            $('.date_picker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose:true
            });
        });
    </script>

