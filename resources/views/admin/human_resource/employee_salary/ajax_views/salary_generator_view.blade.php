    <form id="salary_generate_form" class="form-horizontal" action="{{ route('admin.hr.employee.salary.generate', $employee->id) }}" method="POST">
        @csrf
        <input type="hidden" name="month" value="{{ $month }}">
        <input type="hidden" name="year" value="{{ $year }}">
        <div class="top_area">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-9">
                        <div class="employee_info_area">
                            <div class="heading_area">
                                <h6><b>Employee basic information</b></h6>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-3 no-gutters">
                                    <div class="employee_photo">
                                    <img loading="lazy" height="120" width="120" src="{{ asset('public/uploads/employee/'. $employee->avater) }}">
                                    </div>
                                </div>
                                <div class="col-md-9 no-gutters">
                                    <div class="employee_info">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table w-100 table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Name :</b> </td>
                                                            <td>{{ $employee->adminname }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>Phone :</b> </td>
                                                            <td>{{ $employee->phone }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><b>Emp ID :</b></td>
                                                            <td>{{ $employee->employee_id }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Designation :</b> </td>
                                                            <td>{{ $employee->designation }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>Email :</b> </td>
                                                            <td>{{ $employee->email }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><b>Department :</b></td>
                                                            <td>Teacher</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="attendance_count_area">
                            <div class="heading_area">
                                <h6><b>Attendance summery of {{ $month }} {{ $year }}</b></h6>
                            </div>
                            <div class="attendance_count_table">
                                <table class="table table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Present</th>
                                            <th>Absent</th>
                                            <th>Late</th>
                                            <th>Half-day</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>{{ $presentCount }}</td>
                                            <td>{{ $absentCount }}</td>
                                            <td>{{ $lateCount }}</td>
                                            <td>{{ $halfDayCount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="m-0 p-0">
            </div>
        </div>
    
        <div class="salary_calculation_area mt-3">
            <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="add_earns_area">
                        <div class="heading_area">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Earns</h6>
                                </div>
                                <div class="col-md-6">
                                    <a class="float-right add_more_earn_button" href="">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="earns_fields_area">
                            <div class="row">
                                <div class="col-md-12 earn_fields">
                                    <div class="earn_field">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <input type="text"  placeholder="Type" name="earn_types[]" id="earn_type0" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" placeholder="amount" value="0" name="earn_amounts[]" id="earn_amount" data-id="0" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="add_deduction_area">
                        <div class="heading_area">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Deductions</h6>
                                </div>
                                <div class="col-md-6">
                                    <a class="float-right add_more_deduction_button" href="">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="deduction_fields_area">
                            <div class="row">
                                <div class="col-md-12 deduction_fields">
                                    <div class="deduction_field">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <input type="text" placeholder="Type" name="deduction_types[]" id="deduction_type0" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-5">
                                                <input required type="text" placeholder="amount" data-id="0" value="0" id="deduction_amount" name="deduction_amounts[]"class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="salary_summary_area">
                        <div class="heading_area">
                            <h6>Salary summary (TK)</h6>
                        </div>
                        <div class="deduction_fields_area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="earn_field">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for=""><b>Basic salary :</b> </label>
                                            </div>
                                            <div class="col-md-5">
                                                <input readonly type="number" placeholder="amount" name="basic_salary" value="{{ $employee->basic_salary }}" class="form-control form-control-sm" id="basic_salary">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for=""><b>Earning :</b> </label>
                                            </div>
                                            <div class="col-md-5">
                                                <input readonly type="text" placeholder="amount" name="total_earn" id="total_earn" value="0" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for=""><b>Deductions :</b> </label>
                                            </div>
                                            <div class="col-md-5">
                                                <input readonly required type="text" placeholder="amount" name="total_deduction" value="0" id="total_deduction" class="form-control text-danger form-control-sm">
                                            </div>
                                        </div> 
                                        
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for=""><b>Gross pay :</b> </label>
                                            </div>
                                            <div class="col-md-5">
                                                <input readonly required type="text" placeholder="amount" name="gross_pay" value="{{ $employee->basic_salary }}" id="gross_pay" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for=""><b>Vat :</b> </label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" placeholder="amount" name="vat" id="vat_amount" autocomplete="off" value="0" class="form-control text-danger form-control-sm">
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-7">
                                                <label for=""><b>Net salary :</b> </label>
                                            </div>
                                            <div class="col-md-5">
                                                <input readonly required type="text" placeholder="amount" name="net_total" id="net_total" value="{{ $employee->basic_salary }}" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="form-group text-right">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-label=""> Close</button>
            
            <button type="submit" class="btn btn-blue btn-sm generate_button">Generate</button>
            <button style="display: none;" type="button" class="btn btn-blue btn-sm generate_loading">Loading...</button>
        </div>
    </form>

    