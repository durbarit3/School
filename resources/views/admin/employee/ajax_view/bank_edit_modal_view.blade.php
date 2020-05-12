<form class="form-horizontal" action="{{ route('admin.employee.bank.update', $employee->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="bank_name"> Bank Name: </label>
                <input type="text" class="form-control" name="bank_name" id="invoice_no"  value="{{ $employee->bank_name }}" required>
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="amount"> Bank Branch: </label>
                <input type="text" class="form-control" value="{{ $employee->bank_branch }}" name="bank_branch" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="account_holder"> Holder Name: </label>
                <input type="text" id="account_holder" class="form-control" value="{{ $employee->account_holder }}" name="account_holder" required>
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="bank_address"> Bank Address: </label>
                <input  type="text" id="bank_address" class="form-control" id="bank_address" value="{{ $employee->bank_address }}" name="bank_address" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="ifsc_code"> IFSC Code: </label>
                <input  type="text" id="ifsc_code" class="form-control" id="ifsc_code" value="{{ $employee->ifsc_code }}" name="ifsc_code" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="account_no"> account_no: </label>
                <input  type="text" class="form-control" id="account_no" value="{{ $employee->account_no }}" name="account_no" required>
            </div>
        </div>
    
        
        <div class="form-group text-right">
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
            <button type="submit" class="btn btn-blue">Update</button>
        </div>
    </form>