<form class="form-horizontal" action="{{ route('admin.office.account.bank.update', $bank->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="name"><b>Bank Name</b> : </label>
                <input required type="text" class="form-control" id="name"  value="{{ $bank->bank_name }}" name="name" required>
            </div>
        </div>
    
        <div class="form-group text-right">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
            @if (json_decode($userPermits->office_accounts_module, true)['bank']['add'])
                <button type="submit" class="btn btn-blue">Update</button>
            @endif
        </div>
    </form>

    