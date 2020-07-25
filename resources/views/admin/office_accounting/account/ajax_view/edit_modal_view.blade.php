<form id="edit_bank_account" action="{{ route('admin.office.account.bank.account.update', $account->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12">
                <label><b>Bank :</b></label>
                <select name="bank_id" id="e_bank_id" class="form-control">
                    <option value="">Select bank</option>
                    @foreach ($banks as $bank)
                        <option {{ $bank->id == $account->bank_id ? 'SELECTED' : '' }} value="{{ $bank->id }}"> {{ $bank->bank_name }} </option>
                    @endforeach
                </select>
                <span class="error e_error_bank_id"></span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="holder_name"> <b>Holder Name</b> : </label>
                <input type="text" class="form-control" id="e_holder_name"  value="{{ $account->holder_name }}" name="holder_name" >
                <span class="error e_error_holder_name"></span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="branch_name"><b>Branch Name</b> : </label>
                <input  type="text" class="form-control" id="e_bank_branch"  value="{{ $account->bank_branch }}" name="bank_branch">
                <span class="error e_error_bank_branch"></span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="account_no"><b>Account No</b> : </label>
                <input  type="text" class="form-control" id="e_account_no"  value="{{ $account->account_no }}" name="account_no">
                <span class="error e_error_account_no"></span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="opening_balance"><b>Opening Balance</b> : </label>
                <input  type="text" class="form-control" id="e_opening_balance" value="{{ $account->opening_balance }}" name="opening_balance" required>
                <span class="error e_error_opening_balance"></span>
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="address"><b>Address</b> : </label>
                <textarea name="address" id="e_address" cols="10" placeholder="Note" rows="3" class="form-control">{{ $account->address }}</textarea>
                <span class="error e_error_address"></span>
            </div>
        </div>
    
        <div class="form-group text-right">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
            <button type="submit" class="btn btn-sm loading_button btn-blue">Loading...</button>
            @if (json_decode($userPermits->office_accounts_module, true)['account']['edit'] == 1)
                <button type="submit" class="btn btn-sm submit_button btn-blue">Update</button>
            @endif
        </div>
    </form>

    <script>
        $('.loading_button').hide();
    </script>

    