<form class="form-horizontal" action="{{ route('admin.office.account.bank.account.update', $account->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12">
                <label><b>Bank :</b></label>
                <select required name="bank_id" class="form-control">
                    <option value="">Select bank</option>
                    @foreach ($banks as $bank)
                        <option {{ $bank->id == $account->bank_id ? 'SELECTED' : '' }} value="{{ $bank->id }}"> {{ $bank->bank_name }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="holder_name"> <b>Holder Name</b> : </label>
                <input required type="text" class="form-control" id="holder_name"  value="{{ $account->holder_name }}" name="holder_name" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="branch_name"><b>Branch Name</b> : </label>
                <input required type="text" class="form-control" id="bank_branch"  value="{{ $account->bank_branch }}" name="bank_branch" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="account_no"><b>Account No</b> : </label>
                <input required type="text" class="form-control" id="account_no"  value="{{ $account->account_no }}" name="account_no" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="opening_balance"><b>Opening Balance</b> : </label>
                <input required type="text" class="form-control" id="opening_balance" value="{{ $account->opening_balance }}" name="opening_balance" required>
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="address"><b>Address</b> : </label>
                <textarea name="address" id="" cols="10" placeholder="Note" rows="3" class="form-control">{{ $account->address }}</textarea>
            </div>
        </div>
    
        <div class="form-group text-right">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
            <button type="submit" class="btn btn-blue">Update</button>
        </div>
    </form>

    