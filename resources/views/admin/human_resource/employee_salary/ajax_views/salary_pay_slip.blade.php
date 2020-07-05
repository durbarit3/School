<div class="print_area">

    <div class="hearder_area d-none">
        <div class="col-md-12">
            <div class="row">
                <div style="width: 20%">
                    <div class="school_logo_area">
                        <img src="{{ asset('public/uploads/logos/'.$generalSettings->print_logo) }}" alt="">
                    </div>
                </div>
                <div style="width: 80%">
                    <div style="margin-bottom:50px;" class="school_info_area text-right">
                        <h6 style="padding:0px!important;margin:0px!important;color:black!important;">{{ $generalSettings->school_name }}</h6>
                        <h6 style="padding:0px!important;margin:0px!important;color:black!important;">{{ $generalSettings->school_address }}</h6>
                        <h6 style="padding:0px!important;margin:0px!important;color:black!important;">Email : {{ $generalSettings->email }}</h6>
                        <h6 style="padding:0px!important;margin:0px!important;color:black!important;">Website : {{ $generalSettings->website }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slip_heading_area">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="slip_heading ">
                        <h5  class="text-center text-dark"><b>Pay slip of {{ $month }} {{ $year }}</b></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="date_and_invoice_area">
        <div class="col-md-12">
            <div class="row">
                <div style="width: 50%" class="text-dark">
                    <h6><b>#Invoice No: {{ $salaryPaySlip->invoice_no }}</b></h6>
                </div>
                <div style="width: 50%" class="text-right text-dark">
                    <h6 class="text"><b>Payment date: {{ $salaryPaySlip->date }}</b></h6> 
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="employee_info_area">
        <div class="col-md-12">
            <div class="row no-gutters">
                <div style="width: 50%">
                    <div class="employee_info">
                        <table class="table table-sm table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-dark"><b>Employee :</b></td>
                                    <td class="text-dark"><b>{{ $salaryPaySlip->employee->adminname }}</b> </td>
                                </tr>
                                <tr>
                                    <td class="text-dark"><b>Designation :</b></td>
                                    <td class="text-dark"><b>{{ $salaryPaySlip->employee->designation }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="width: 50%">
                    <table class="table table table-sm table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-dark"><b>Employee ID:</b></h6></td>
                                <td class="text-dark"><b>{{ $salaryPaySlip->employee->employee_id }}</b></h6> </td>
                            </tr>
                            <tr>
                                <td class="text-dark"><b>Phone :</b></td>
                                <td class="text-dark"><b>{{ $salaryPaySlip->employee->phone }}</b></td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="earn_and_deduction_area">
        <div class="col-md-12">
            
            <div class="row no-gutters">
                <div style="width: 48%">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr class="text-dark">
                                <th>Earning</th>
                                <th class="text-right">Amount (TK)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($salaryPaySlip->earns !== NULL)
                                @php
                                    $index = 0;
                                @endphp
                                @foreach (json_decode($salaryPaySlip->earn_types) as $earn_type)
                                    <tr class="text-dark">
                                        <td><b>{{ $earn_type }}</b> </td>
                                        <td class="text-right"> <b>{{ json_decode($salaryPaySlip->earns, true)[$index][$earn_type] }}</b></td>
                                    </tr>
                                    @php
                                        $index++;
                                    @endphp
                                @endforeach 
                            @else 
                            <tr>
                                <td colspan="2"><b>Not available</b> </td>
                            </tr>   
                            @endif
                            <tr class="text-dark">
                                <td><b>Total Earning :</b></td>
                                <td class="text-right"><b>{{ $salaryPaySlip->total_earn == NULL ? 0 : $salaryPaySlip->total_earn }}</b></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div style="width: 48%; margin-left:4%">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr class="text-dark">
                                <th>Deductions</th>
                                <th class="text-right">Amount (TK)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($salaryPaySlip->deductions !== NULL)
                                @php
                                    $key = 0;
                                @endphp
                                @foreach (json_decode($salaryPaySlip->deduction_types) as $deduction_type)
                                    <tr class="text-dark">
                                        <td><b>{{ $deduction_type }}</b> </td>
                                        <td class="text-right"> <b>{{ json_decode($salaryPaySlip->deductions, true)[$key][$deduction_type] }}</b></td>
                                    </tr>
                                    @php
                                        $key++;
                                    @endphp
                                @endforeach 
                            @else 
                            <tr>
                                <td colspan="2"><b>Not available</b> </td>
                            </tr>   
                            @endif
                            <tr class="text-dark">
                                <td><b>Total Deduction :</b></td>
                                <td class="text-right text-danger"> <b>({{ $salaryPaySlip->total_deduction == NULL ? 0 : $salaryPaySlip->total_deduction }})</b></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="salary_amount_details">
        <div style="width: 100%;">
            <table class="table table-sm">
                <thead>
                    <tr class="text-dark">
                        <th><b>Pay mode</b> </th>
                        <th class="text-center">Cheque</th>
                    </tr>

                    <tr class="text-dark">
                        <th><b>Basic salary (TK)</b> </th>
                        <th class="text-center">{{ $salaryPaySlip->basic_salary }}</th>
                    </tr>

                    <tr class="text-dark">
                        <th><b>Vat (TK)</b> </th>
                        <th class="text-center text-danger">({{ $salaryPaySlip->vat }})</th>
                    </tr>

                    <tr class="text-dark">
                        <th><b>Net salary (TK)</b> </th>
                        <th class="text-center">{{ $salaryPaySlip->total_paid }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="form-group text-right">
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" aria-label=""> Close</button>
</div>
