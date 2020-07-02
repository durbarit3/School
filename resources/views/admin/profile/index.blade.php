@extends('admin.master')
@push('css')
    <style>
        .photo img {
            border-radius: 165px;
            padding: 3px;
            background-color: gray;
        }

        .profile_tab_list ul {
            display: inline-flex;
        }
        
        .profile_tab_list ul li {
            margin-left: 16px;
        }
        .profile_tab_list ul li:first-child {
            margin-left: 0px;
        }

        .profile_tab_list ul li a {
            padding: 0px 6px;
            color: black;
        }
        .profile_tab_list ul li a:hover{
            border-bottom: 1px solid navy;
        }
        .active{
            border-bottom: 1px solid navy;
            
        }

        .all_information_body td{
            line-height: 13px;
        }

        .card-header {
            padding: 0.50rem 1.25rem!important;
        }

        .salary_top_card {
            padding: 5px;
            background: #efeff0;
            border-radius: 4px;
            
        }

        .text-black{
            color: #222533;
        }

        @media (min-width: 576px){

            
            .pay_slip_modal_dialog {
                max-width: 900px!important;
                margin: 1.75rem auto;
            }

            .leave_applye_details_modal_dialog {
                max-width: 650px;
                margin: 1.75rem auto;
            }

        }
        
        .earn_and_deduction_area table tbody tr td {
            line-height: 11px;
        }

        .salary_sheets th {
            line-height: 14px;
        }

        svg.svg-inline--fa.fa-money-bill-alt.fa-w-20 {
            font-size: 22px;
        }

        .card_heading h6 {
            font-size: 14px;
            font-family: initial;
        }
        
    </style>
    
@endpush
@section('content')

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>User Profile</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="panel_body mt-2">
                        <div class="basic_information">
                            <div class="employee_photo_and_name_area">
                                <div class="photo ">
                                    <div class="row justify-content-center">
                                            <img height="180" width="180" class="" src="{{ asset('public/uploads/employee/'.$employee->avater) }}" alt="">
                                    </div>
                                </div>
                                <div class="name">
                                    <div class="row justify-content-center">
                                    <h5 class="mt-1 text-black">{{ $employee->adminname }}</h5>
                                    </div>
                                </div>
                                <div class="basic_information_list">
                                    <table class="table">
                                        <tbody>

                                            <tr>
                                              <th><b>Employee ID :</b> </th>  
                                              <td class="text-right">{{ $employee->employee_id }}</td>  
                                            </tr>

                                            <tr>
                                              <th><b>Role :</b> </th>  
                                              <td class="text-right">Super Admin</td>  
                                            </tr>

                                            <tr>
                                              <th><b>Designation :</b> </th>  
                                              <td class="text-right">{{ $employee->designation }}</td>  
                                            </tr>
                                            
                                            <tr>
                                              <th><b>Department :</b> </th>  
                                              <td class="text-right">Science</td>  
                                            </tr>
                                            
                                            <tr>
                                              <th><b>Basic salary :</b> </th>  
                                              <td class="text-right">{{ $employee->basic_salary }}</td>  
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="panel_body all_information_body mt-2">
                        <div class="profile_tab_list">
                            <div class="row">
                                <div class="col-md-8">
                                    <ul class="">
                                        <li><a data-class="profile_all_information" class="active tab_link" href="#"><b>Profile</b></a></li>
                                        
                                        <li><a data-class="salary_information" class="tab_link" href="#"><b>Salary sheets</b></a></li>

                                        <li><a data-class="leave_information" class="tab_link" href="#"><b>Leaves</b></a></li>
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                   <a data-target="#changePasswordModal" data-toggle="modal" class="float-right" href=""><i class="fas fa-key"></i></a> 
                                </div>
                                
                            </div>
                            
                        </div>
                        <hr class="p-0 m-0 mt-1">
                        <div class="profile_all_information tab_content">
                            <div class="another_basic_information">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="w-50"><b>Phone</b>  :</td>
                                            <td class="w-50">{{ $employee->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-50"><b>Email</b>  :</td>
                                            <td class="w-50">{{ $employee->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-50"><b>Gender</b>  :</td>
                                            <td class="w-50">{{ $employee->gender }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="w-50"><b>Date of birth</b>  :</td>
                                            <td class="w-50">{{ $employee->date_of_birth }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="w-50"><b>Religion</b>  :</td>
                                            <td class="w-50">{{ $employee->religion }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="w-50"><b>Qualification</b>  :</td>
                                            <td class="w-50">{{ $employee->qualification }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="address_info">
                                <div class="card-header">
                                    <h6 class="p-0 m-0">Address</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="w-50"><b>Present address</b>  :</td>
                                                <td class="w-50">{{ $employee->present_address }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Permanent address</b>  :</td>
                                                <td class="w-50">{{ $employee->permanent_address }}</td>
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </div> 
                            </div> 
                            
                            <div class="bank_info">
                                <div class="card-header">
                                    <h6 class="p-0 m-0">Bank Details</h6>
                                </div>
                                <div class="table-responsive">

                                
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="w-50"><b>Bank name</b>  :</td>
                                                <td class="w-50"> {{ $employee->bank_name }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Bank holder</b>  :</td>
                                                <td class="w-50">{{ $employee->account_holder }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Bank branch</b>  :</td>
                                                <td class="w-50">{{ $employee->bank_branch }}</td>
                                            </tr>

                                            <tr>
                                                <td class="w-50"><b>Account no</b>  :</td>
                                                <td class="w-50">{{ $employee->account_no }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>IFSC code </b>  :</td>
                                                <td class="w-50">{{ $employee->ifsc_code }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Bank Address </b>  :</td>
                                                <td class="w-50">{{ $employee->bank_address }}</td>
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="social_info">
                                <div class="card-header">
                                    <h6 class="p-0 m-0">Social links</h6>
                                </div>
                                <div class="table-responsive">

                                
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="w-50"><b>Facebook</b>  :</td>
                                                <td class="w-50"> {{ $employee->facebook_link }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>LinkedIn</b>  :</td>
                                                <td class="w-50"> {{ $employee->linkedIn_link }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Twitter</b>  :</td>
                                                <td class="w-50"> {{ $employee->twitter_link }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div  class="salary_information tab_content display_none mt-2">

                            @php
                                $totalPaidNetSalary = 0;
                                $totalPaidGrossPay = 0;
                                $totalPaidEarning = 0;
                                $totalPaidDeduction = 0;
                            @endphp

                            @if ($employee->salaries->count() > 0)
                                @foreach ($employee->salaries as $salary)
                                    @if ($salary->is_paid == 1)
                                        @php
                                            $totalPaidNetSalary += $salary->payable;
                                            $totalPaidGrossPay += $salary->gross_pay;
                                            $totalPaidEarning += $salary->total_earn;
                                            $totalPaidDeduction += $salary->total_deduction;
                                        @endphp 
                                    @endif   
                                @endforeach  
                            @endif                     
                            <div class="salary_top_card_area">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Net Salary Paid</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>৳ {{ round($totalPaidNetSalary, 2) }} /-</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Gross Pay</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>৳ {{ round($totalPaidGrossPay, 2) }} /-</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Earning</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>৳ {{ round($totalPaidEarning, 2) }} /-</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Deduction</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>৳ {{ round($totalPaidDeduction, 2) }} /-</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="p-0 m-0 mt-2">
                            <div class="salary_sheets mt-2">
                                <div class="table-responsive">
                                    <table id="dataTableExample1" class="table table-sm">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Invoice No</th>
                                                <th>Month - Year</th>
                                                <th>Date</th>
                                                <th>Pay mode</th>
                                                <th>Net salary</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($employee->salaries->count() > 0)
                                                @foreach ($employee->salaries as $salary)
                                                    <tr class="text-center">
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $salary->invoice_no ? $salary->invoice_no : "N/A" }}</td>
                                                        <td>{{ $salary->month ." - ". $salary->year }}</td>
                                                        <td>{{ $salary->date }}</td>
                                                        <td>{{ $salary->pay_mode ? $salary->pay_mode : 'N/A' }}</td>
                                                        <td>{{ $salary->payable }}</td>
                                                        <td>{!! $salary->is_paid == 0 ? "<span class='badge badge-warning pb-1'>GENERATED</span>" : "<span class='badge badge-success pb-1'>PAID</span>" !!}</td>
                                                        <td>
                                                            @if ($salary->is_paid == 0)
                                                                N/A
                                                            @else
                                                                <a data-id="{{ $salary->id }}" href="{{ route('admin.hr.employee.salary.pay.slip',[$salary->employee_id, $salary->month, $salary->year]) }}" class="paySlipButton btn btn-sm btn-info">Pay slip</a>
                                                            @endif
                                                            <button style="display: none;" class="btn btn-sm btn-blue loading_button{{ $salary->id }}" type="button">Please wait</button>
                                                        </td>
                                                    </tr>   
                                                @endforeach
                                            @else 
                                            <tr>
                                                <td colspan="8" class="text-center text-dark"><b>NO DATA FOUND...</b></td>
                                            </tr>   
                                            @endif 
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        
                        <div  class="leave_information tab_content display_none mt-2">

                            <div class="salary_top_card_area">
                                <div class="row">
                                    @php
                                        $totalApproved = 0;
                                        $totalPendding = 0;
                                        $totalRejected = 0;
                                        $totalDays = 0;
                                    @endphp
                                    @foreach($employee->leaveApplies as $leaveApply)
                                    
                                        @if ($leaveApply->approval == 0)
                                            @php
                                                $totalPendding += 1;
                                            @endphp
                                        @elseif($leaveApply->approval == 1)  
                                            @php
                                                $totalApproved += 1;
                                            @endphp
                                        @elseif($leaveApply->approval == 2) 
                                            @php
                                                $totalRejected += 1;
                                            @endphp 
                                        @endif
                                      
                                        @php
                                            $start_date = date_create($leaveApply->start_date);
                                            $end_date = date_create($leaveApply->end_date);
                                    
                                            //difference between two dates
                                            $diff = date_diff($start_date,$end_date);
                                    
                                            //count days
                                            $day_count = $diff->format("%a");
                                        
                                            $totalDays += $day_count + 1; 
                                        @endphp
                                    @endforeach
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Approved leave</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>{{ $totalApproved }}</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Pending</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>{{ $totalPendding }}</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Rejected</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>{{ $totalRejected }}</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Leaved Days</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>{{ $totalDays }}</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="p-0 m-0 mt-2">
                            <div class="salary_sheets mt-2">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Employee</th>
                                                    <th>Leave Type</th>
                                                    <th>Leave Date</th>
                                                    <th>Apply Date</th>
                                                    <th>Day</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($employee->leaveApplies as $leaveApply)
                                                    <tr class="text-center">
                                                        <td>{{ $leaveApply->employee->adminname }}</td>
                                                        <td>{{ $leaveApply->leaveType->name }}</td>
                                                        <td>{{ $leaveApply->start_date }} <b> - To -</b> {{ $leaveApply->end_date }}</td>
                                                        <td>{{ $leaveApply->apply_date }}</td>
                                                        <td>
                                                            @php
                                                                $start_date = date_create($leaveApply->start_date);
                                                                $end_date = date_create($leaveApply->end_date);
                                                        
                                                                //difference between two dates
                                                                $diff = date_diff($start_date,$end_date);
                                                        
                                                                //count days
                                                                $day_count =  $diff->format("%a");
                                                            @endphp
                                                            {{ $day_count + 1 }}
                                                        </td>
                                                        <td>
                                                            @if ($leaveApply->approval == 0)
                                                                <span class="badge badge-warning p-2">Pandding</span>
                                                            @elseif($leaveApply->approval == 1)  
                                                                <span class="badge badge-success p-2">Approved</span> 
                                                            @elseif($leaveApply->approval == 2)
                                                                <span class="badge badge-danger p-2">Rejected</span>    
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="Details btn btn-sm btn-blue text-white" 
                                                                title="Details" data-id="{{ $leaveApply->id }}" href="{{ route('admin.hr.leave.apply.details',$leaveApply->id) }}"><i class="fas fa-file-alt"></i>
                                                            </a>
                                                            <button style="display: none;" class="btn btn-sm button_loader{{ $leaveApply->id }} btn-blue">
                                                                <img height="13" width="13"  src="{{asset('public/admins/images/preloader4.gif')}}" alt="">
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg salaryPaySlipModal" id="salaryPaySlipModal">
    <div class="modal-dialog pay_slip_modal_dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header pay_slip_modal_header">
                <h5 class="modal-title">Pay slip</h5>
                <button type="button" class="modal_close_button close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body pay_slip_salary_modal_body">

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="change_password_from" action="{{ route('admin.user.profile.change.password') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="m-0 p-0"><b>Old password</b></label>
                            <input type="password" placeholder="Old password" id="old_password" class="form-control form-control-sm field_error" name="old_password">
                            <div class="text-danger error old_password_error"></div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="m-0 p-0"><b>New password</b></label>
                            <input type="password" id="password" placeholder="New password" class="form-control form-control-sm field_error" name="password">
                            <div class="text-danger error password_error"></div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="m-0 p-0"><b>Confirm password</b></label>
                            <input type="password" placeholder="Confirm password" class="form-control form-control-sm" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-sm btn-blue">Submit</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade LeaveApplyeDetails" id="LeaveApplyeDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog leave_applye_details_modal_dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Leave details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body leave_detatils_modal_body">
               
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

    <script>
        $(document).ready(function () {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#add_income_form', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        //log(data);
                        $('.error').html('');
                        $('#add_income_form')[0].reset();
                        $('#myModal1').modal('hide');
                        toastr.success(data);
                        setInterval(function(){
                            window.location = "{{ url()->current() }}";
                        }, 700)
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.header_id){
                            $('.header_error').html('Income header is required');
                            
                            $('.header').addClass('is-invalid');
                        }else{
                            $('.header_error').html('');
                            $('.header').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.amount){
                            $('.amount_error').html('');
                            $('.amount').removeClass('is-invalid');
                            $('.amount_error').html(err.responseJSON.errors.amount[0]);
                            
                            $('.amount').addClass('is-invalid');
                        }else{
                            $('.amount_error').html('');
                            $('.amount').removeClass('is-invalid');
                        }
                    }
                });
            });
        });

    </script>
    
    <script>
        $(document).ready(function () {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '.change_password_from', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        //log(data);
                        if(!data.successMsg){
                            toastr.error(data.errorMsg);
                            $('.error').html('');
                            $('.field_error').removeClass('is-invalid');
                            return;
                        }else{
                            toastr.success(data.successMsg);
                            $('.error').html('');
                            $('.change_password_from')[0].reset();
                            $('#changePasswordModal').modal('hide');
                            setInterval(function(){
                                window.location = "{{ url()->current() }}";
                            }, 800);
                        }
                        
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.old_password){
                            $('.old_password_error').html(err.responseJSON.errors.old_password[0]);
                            $('#old_password').addClass('is-invalid');
                        }else{
                            $('.old_password_error').html('');
                            $('#old_password').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.password){
                            $('.password_error').html(err.responseJSON.errors.password[0]);
                            $('#password').addClass('is-invalid');
                        }else{
                            $('.password_error').html('');
                            $('#password').removeClass('is-invalid');
                        }
                    }
                });
            });
        });

    </script> 

    <script>

        $(document).ready(function(){
            $(document).on('click', '.tab_link', function(e){
                e.preventDefault();
                console.log('GET');
                var className = $(this).data('class');
                console.log(className);
                $('.tab_link').removeClass('active');
                $('.tab_content').hide();
                $('.'+className).show();
                $(this).addClass('active');
            });
        });

    </script>

    <script>

        $(document).ready(function () {
            
            $(document).on('click', '.paySlipButton', function(e){
                e.preventDefault();
                console.log('GET');
                e.preventDefault();
                var url = $(this).attr('href');
                var data_id = $(this).data('id');
                var generateButton = $(this);
                    generateButton.hide();
                $('.loading_button'+data_id).show();
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        $('.pay_slip_salary_modal_body').html(data);
                        generateButton.show();
                        $('.loading_button'+data_id).hide();
                        $('.salaryPaySlipModal').modal('show');
                    }
                });
            });
        }); 

    </script>

    <script>
        $(document).ready(function () {
           $(document).on('click', '.Details', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                var data_id = $(this).data('id');
                var Details_button = $(this).hide();
                $('.button_loader'+data_id).show();
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        $('.leave_detatils_modal_body').empty();
                        $('.leave_detatils_modal_body').append(data);
                        $('.LeaveApplyeDetails').modal('show');
                        Details_button.show();
                        $('.button_loader'+data_id).hide(); 
                    }
                });
           });
        });
    </script>

@endpush