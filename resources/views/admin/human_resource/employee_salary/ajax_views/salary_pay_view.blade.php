<form id="pay_salary_form" action="{{ route('admin.hr.employee.salary.pay',$generatedSalary->employee_id) }}" method="POST">
    @csrf
    <input type="hidden" name="month" value="{{ $month }}">
    <input type="hidden" name="year" value="{{ $year }}">

    <div class="form-group">
        <label class="m-0 p-0"><b>Invoice No :</b></label>
        <input readonly type="text" name="invoice_no" class="form-control form-control-sm" value="ES{{ $invoiceId }}">
    </div>
    <div class="form-group">
        <label class="m-0 p-0"><b>Employee :</b></label>
        <input type="text" class="form-control form-control-sm" value="{{ $generatedSalary->employee->adminname }} ({{ $generatedSalary->employee->employee_id }})">
    </div>

    <div class="form-group">
        <label class="m-0 p-0"><b>Payable amount :</b></label>
        <input readonly type="text" name="payable_amount" class="form-control form-control-sm" value="{{ $generatedSalary->payable }} ">
    </div>
    
    <div class="form-group">
        <label class="m-0 p-0"><b>Total earn :</b></label>
        <input readonly type="text"  class="form-control form-control-sm" value="{{ $generatedSalary->total_earn }} ">
    </div>
    
    <div class="form-group">
        <label class="m-0 p-0"><b>Total deduction :</b></label>
        <input readonly type="text"  class="form-control form-control-sm" value="{{ $generatedSalary->total_deduction }} ">
    </div>
    
    <div class="form-group">
        <label class="m-0 p-0"><b>Month year :</b></label>
        <input type="text" class="form-control form-control-sm" value="{{ $generatedSalary->month }} - {{ $generatedSalary->year }} ">
    </div>
    
    <div class="form-group">
        <label class="m-0 p-0"><b>Pay mode :</b></label>
        <select required name="pay_mode" class="form-control form-control-sm">
            <option value="">Select pay mode</option>
            <option value="Cash">Cash</option>
            <option value="Cheque">Cheque</option>
            <option value="transfer_to_bank_account">Transfer to bank account</option>
        </select>
    </div>
    
    <div class="form-group">
        <label class="m-0 p-0"><b>Note :</b></label>
        <textarea name="note" class="form-control form-control-sm" cols="3" rows="2"></textarea>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-label=""> Close</button>
        
        <button type="submit" class="btn btn-blue btn-sm pay_button">Pay</button>
        <button type="submit" class="btn btn-blue btn-sm pay_button">Pay and print</button>
        <button style="display: none;" type="button" class="btn btn-blue btn-sm pay_loading">Loading...</button>
    </div>
</form>