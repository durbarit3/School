<form id="deposit_update_form" class="form-horizontal" action="{{ route('admin.office.account.deposit.update', $deposit->id) }}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0">Invoice No  :</label>
            <input type="text" class="form-control invoice_no form-control-sm" value="{{ $deposit->invoice_no }}" name="invoice_no" readonly>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0">Date  :</label>
            <input readonly type="text" autocomplete="off" placeholder="dd-mm-yyyy" class="form-control add_dipo_date_picker readonly_field edit_date form-control-sm" name="date" value="{{ $deposit->date }}" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label  class="col-form-label p-0 m-">  Voucher Header  :</label>
            <select required name="voucher_id" class="form-control edit_voucher_id form-control-sm">
                <option value="">Select voucher header</option>
                @foreach ($voucherHeaders as $voucherHeader)
                    <option {{ $deposit->voucher_header_id == $voucherHeader->id ? 'SELECTED' : ''}} value="{{ $voucherHeader->id }}">{{ $voucherHeader->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12"> 
            <label  class="col-form-label p-0 m-0"> Bank :</label>
            <input readonly value="{{ $deposit->bank->bank_name }}" class="form-control form-control-sm">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label  class="col-form-label p-0 m-0"> Account :</label>
            <input readonly value="{{ $deposit->account->holder_name }}" class="form-control form-control-sm">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"> Account No :</label>
            <input readonly type="text" placeholder="Account number" class="form-control form-control-sm account_number" value="{{ $deposit->account->account_no }}" name="account_no">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"> Pay Amount :</label>
            <input type="text" placeholder="Deposit amount" class="form-control amount form-control-sm" value="{{ $deposit->deposit_amount }}"  readonly>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"> Remarks (Optional) :</label>
            <input type="text" name="remarks" value="{{ $deposit->remarks }}" class="form-control edit_remarks form-control-sm">
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close </button>
        @if (json_decode($userPermits->office_accounts_module, true)['deposit']['edit'])
            <input type="submit" value="Update" class="btn save btn-sm btn-blue">
        @endif 
    </div>
</form>

<script>
    $(document).ready(function(){
        $(".add_dipo_date_picker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose:true
        });
    });
</script>