@extends('admin.master')
@push('css')
    <style>
        .dropify-wrapper {
            height: 67px !important;
        }

        button.btn.btn-link {
            color: black;
            font-size: 16px;
            font-weight: 700;
        }

        .no-padding{
            padding:0px 5px!important;
            padding: 
        }

        .employee_photo img {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .employee_initial_details {
            position: relative;
            background-color: white;
            height: 350px;
            box-sizing: border-box;
            padding: 6px 20px;
            border-radius: 6px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 692px;
            font-size: 14px;
            color: #222533;
        }

        .background_photo {
            position: absolute;
            top: 39%;
            bottom: 0px;
            right: 18%;
        }
        
        .background_photo img {
            height: 61px;
            opacity: 0.3;
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }

        span.text_style {
            margin-left: 31px;
            font-size: 14px;
            font-weight: 700;
        }

        .card-header {
          
            background-color: rgba(0,0,0,.0)!important;
            padding: 6px;
        }

        .panel {
            margin-top: 33px;
            padding: 3px 19px;
        }

        @media (min-width: 576px){
            .pay_slip_modal_dialog {
                max-width: 900px!important;
                margin: 1.75rem auto;
            }
        }
        
        .earn_and_deduction_area table tbody tr td {
            line-height: 11px;
        }

        .card-body {
            padding: 0rem 0rem!important;
        }

        label {
            font-size: 14px;
        }
    
    </style>
@endpush
@section('content')
@php
    $role = '';
    if($employee->role == 2){
        $role = 'admins';
    }elseif($employee->role == 3){
        $role = 'teacher';
    }elseif($employee->role == 4){
        $role = 'accountant';
    }elseif($employee->role == 5){
        $role = 'librarian';
    }elseif($employee->role == 6){
        $role = 'driver';
    }elseif($employee->role == 7){
        $role = 'clerk';
    }elseif($employee->role == 8){
        $role = 'guard';
    }elseif($employee->role == 1){
        $role = 'super.admins';
    }
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- content wrpper -->
{{-- http://localhost/git/School/admin/employees/edit/11 --}}
<!--middle content wrapper-->
<div class="middle_content_wrapper">
    <section class="page_area">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="employee_photo mb-2">
                    <img height="350" width="300" class="p-1 rounded" src="{{ asset('public/uploads/employee/'.$employee->avater) }}" alt="">
                </div>    
            </div>
          
            <div class="col-md-6">
                <div class="employee_initial_details">

                    <p class="m-1 p-0"><b><i class="fas fa-signature"></i> Name : </b><span>{{ $employee->adminname }}</span></p>
                    <p class="m-1 p-0"><b><i class="fas fa-restroom"></i> Gender : </b>{{ $employee->gender }}</p>
                    <p class="m-1 p-0"><b><i class="fas fa-pray"></i></i> Religion : </b>{{ $employee->religion }}</p>
                    <p class="m-1 p-0"><b><i class="far fa-envelope"></i> Email : </b>{{ $employee->email }}</p>
                    <p class="m-1 p-0"><b><i class="fas fa-phone"></i> phone : </b>{{ $employee->phone }}</p>
                    <p class="m-1 p-0"><b><i class="fab fa-dyalog"></i> Designation : </b>{{ $employee->designation }}</p>
                    <p class="m-1 p-0"><b><i class="fas fa-building"></i> Department : </b>{{ $employee->group->name }}</p>
                    <p class="m-1 p-0"><b><i class="fas fa-equals"></i> Qualification : </b>{{ $employee->qualification }}</p>
                    <p class="m-1 p-0"><b><i class="fab fa-facebook-f"></i> Facebook : </b>{{ $employee->facebook_link ? $employee->facebook_link : 'N/A' }}</p>
                    <p class="m-1 p-0"><b><i class="fab fa-linkedin"></i> LinkedIn : </b>{{ $employee->linkedIn_link ? $employee->linkedIn_link : 'N/A' }}</p>
                    <p class="m-1 p-0"><b><i class="fab fa-twitter"></i> LinkedIn : </b>{{ $employee->twitter_link ? $employee->twitter_link : 'N/A' }}</p>
                    <div class="background_photo">
                        <img src="{{ asset('public/uploads/logos/'.$generalSettings->print_logo) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a class="btn btn-sm btn-info float-right" href="{{ route('admin.employee.all.'.$role) }}">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="" data-id="{{ $employee->id }}" title="Authentication" data-toggle="modal" data-target="#authenticationModal" class="btn btn-sm btn-primary float-right mb-1">
                   {!! $employee->status == 1 ? '<i class="fas fa-lock-open"></i>' : '<i class="fas fa-lock"></i>' !!}   Authentication 
                </a>
            </div>
            
        </div>

        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            Basic Details
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse {{ Session::has('update_basic_info') ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="{{ route('admin.employee.update.basic.details', $employee->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="panel">
                                <div class="panel_body">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="m-0 text-center"><b>Employee ID</b>  <span
                                                    style="color:red">*</span></label>
                                            <input readonly type="text" id="employee_id"
                                                value="{{ $employee->employee_id }}" class="form-control form-control-sm"
                                                 required>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="m-0 text-center"><b>Name</b> <span
                                                    style="color: red">*</span></label>
                                            <input type="text" id="name" value="{{ $employee->adminname }}"
                                                class="form-control form-control-sm" name="name" required>
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="m-0 text-center"><b>Gender</b>  <span
                                                    style="color: red">*</span></label>
                                            <select class="form-control form-control-sm" name="gender" id="gender" required>
                                                <option value="">--Selecet gender--</option>
                                                @foreach($genders as $gender)
                                                <option {{ $gender->name == old('gender') ? 'SELECTED' : '' }}
                                                    {{ $gender->name == $employee->gender ? 'SELECTED' : '' }}
                                                    value="{{ $gender->name }}">{{ $gender->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="m-0 text-center"><b>Religion</b> <span
                                                    style="color: red">*</span></label>
                                            <input type="text" id="religion" value="{{ $employee->religion }}"
                                                class="form-control form-control-sm" name="religion" required>
                                            <span class="text-danger">{{ $errors->first('religion') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="m-0 text-center"><b>Blood Group</b> <span
                                                    style="color: red">*</span></label>
                                            <select id="blood_group" class="form-control form-control-sm" name="blood_group" required>
                                                <option value="">--Select Blood Group--</option>
                                                @foreach($bloodGroups as $bloodGroup)
                                                <option {{ $bloodGroup->id == old('blood_group') ? "SELECTED" : "" }}
                                                    {{ $bloodGroup->id == $employee->blood_group_id ? "SELECTED" : "" }}
                                                    value="{{ $bloodGroup->id }}">{{ $bloodGroup->group_name }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="m-0 text-center"><b>Date Of Birth</b> <span
                                                    style="color: red">*</span></label>
                                            <input type="date" class="form-control form-control-sm pick_date_of_birth" id="date_of_birth"
                                                name="date_of_birth"
                                                value="{{ $employee->date_of_birth }}"
                                                required>
                                            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="m-0 text-center"><b>Mobile No</b> <span
                                                    style="color:red">*</span></label>
                                            <input type="number" value="{{ $employee->phone }}" class="form-control form-control-sm"
                                                name="mobile_no" required>
                                            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label class="m-0 text-center"><b>Present Address</b>  <span
                                                    style="color: red">*</span></label>
                                            <textarea name="present_address" class="form-control form-control-sm" id="present_address"
                                                placeholder="Present address" cols="8" rows="3"
                                                required>{{ $employee->present_address }}</textarea>
                                            <span class="text-danger">{{ $errors->first('present_address') }}</span>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="inputEmail3" class="m-0 text-center"><b>Permanent Address</b>  <span
                                                    style="color: red">*</span></label>
                                            <textarea name="permanent_address" id="permanent_address"
                                                class="form-control form-control-sm" placeholder="Present address" cols="8" rows="3"
                                                required>{{ $employee->permanent_address }}</textarea>
                                            <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="inputEmail3" class="m-0 text-center"><b>Photo</b> <span
                                                    style="color: red">*</span></label>
                                            <input
                                                data-default-file="{{ asset('public/uploads/employee/'.$employee->avater) }}"
                                                accept=".jpg, .jpeg, .png, .gif" type="file" id="photo" name="photo"
                                                id="input-file-now" class="form-control form-control-sm dropify" size="20" />
                                            <span class="text-danger">{{ $errors->first('photo') }}</span>
                                        </div>
                                    </div>

                                    <button class="btn btn-sm btn-blue float-right" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseOne">
                            Academic Details
                        </button>
                    </h2>
                </div>

                <div id="collapseTwo" class="collapse {{ Session::has('update_academic_info') ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="{{ route('admin.employee.update.academic.details', $employee->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="panel">
                                <div class="panel_body">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label class="m-0 text-center"><b>Designation</b>  <span
                                                        style="color: red">*</span></label>
                                            <select id="designation" class="form-control form-control-sm" name="designation" required>
                                                <option value="">--Select Designation--</option>
                                                @foreach($designations as $designation)
                                                <option {{ $designation->name == old('designation') ? "SELECTED" : "" }}
                                                    {{ $designation->name == $employee->designation ? "SELECTED" : "" }}
                                                    value="{{ $designation->name }}">{{ $designation->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('designation') }}</span>
                                        </div>

                                        <div class="col-sm-3">
                                            <label class="m-0 text-center"><b>Group/Department</b> <span
                                                        style="color: red">*</span></label>        
                                            <select id="group" id="group" class="form-control form-control-sm" name="group" required>
                                                <option value="">--Selecet Group/Department--</option>
                                                @foreach($groups as $group)
                                                <option {{ $group->id == old('group') ? "SELECTED" : "" }}
                                                    {{ $group->id == $employee->group_id ? "SELECTED" : "" }}
                                                    value="{{ $group->id }}">
                                                    {{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('group') }}</span>
                                        </div>

                                        <div class="col-sm-3">
                                            <label class="m-0 text-center"><b>Joining Date</b> <span
                                                        style="color: red">*</span></label>       
                                            <input type="text" name="joining_date" id="joining_date"
                                                class="form-control form-control-sm date_picker"
                                                value="{{ $employee->joining_date }}"
                                                required />
                                            <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                                        </div>

                                        <div class="col-sm-3">
                                            <label class="m-0 text-center"><b>Qualification</b> <span
                                                        style="color: red">*</span></label>        
                                            <input type="text" name="qualification" value="{{ $employee->qualification }}"
                                                id="qualification" class="form-control form-control-sm" required />
                                            <span class="text-danger">{{ $errors->first('qualification') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label class="m-0 text-center"><b>Role</b> <span style="color: red">*</span></label>        
                                            <select required id="role" class="form-control form-control-sm" name="role">
                                                <option value="">--Selecet Role--</option>
                                                @foreach($roles as $role)
                                                <option {{ $role->role_known_id == old('role') ? "SELECTED" : "" }}
                                                    {{ $role->role_known_id == $employee->role ? "SELECTED" : "" }}
                                                    value="{{ $role->role_known_id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('role') }}</span>
                                        </div>
                                    </div>

                                    <button class="btn btn-sm btn-blue float-right" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseContractDetails"
                            aria-expanded="true" aria-controls="collapseOne">
                            Contract Details
                        </button>
                    </h2>
                </div>
                
                <div id="collapseContractDetails" class="collapse {{ Session::has('update_contract_details') ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="{{ route('admin.employee.update.contract.details', $employee->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="panel">
                                <div class="panel_body">
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-4">
                                            <label class="m-0 text-center"><b>Basic salary</b> <span style="color: red">*</span></label>        
                                            <input type="text" name="basic_salary" id="basic_salary"
                                                class="form-control form-control-sm"
                                                value="{{ $employee->basic_salary }}"
                                                required />
                                            <span class="text-danger">{{ $errors->first('basic_salary') }}</span>
                                        </div>

                                        <div class="col-sm-4">
                                            <label class="m-0 text-center"><b>Contract type</b> <span style="color: red">*</span></label>        
                                            <select id="contract_type" class="form-control form-control-sm" name="contract_type" required>
                                                <option value="">--Select contract type--</option>
                                                <option {{ $employee->contract_type === "Permanent" ? 'SELECTED' : '' }} value="Permanent">
                                                    Permanent
                                                </option>
                                                <option {{ $employee->contract_type === "Temporary" ? 'SELECTED' : '' }} value="Temporary">
                                                    Temporary
                                                </option>
                                            </select>
                                            <span class="text-danger">{{ $errors->first('contract_type') }}</span>
                                        </div>

                                        <div class="col-sm-4">
                                            <label class="m-0 text-center"><b>Work sift</b></label> 
                                            <input type="text" name="work_sift" value="{{ $employee->work_sift }}"
                                                id="work_sift" class="form-control form-control-sm" required />
                                            <span class="text-danger">{{ $errors->first('work_sift') }}</span>
                                        </div>

                                    </div>

                                    <button class="btn btn-sm btn-blue float-right" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="true" aria-controls="collapseOne">
                            Bank Details
                        </button>
                    </h2>
                </div>

                <div id="collapseThree" class="collapse {{ Session::has('update_bank_info') ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="panel">
                        <div class="panel_body">
                            <div class="card-body">
                                <table class="table table-bordered mt-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Bank Name</th>
                                            <th>Account Holder</th>
                                            <th>Branch</th>
                                            <th>Bank Address</th>
                                            <th>IFSC Code</th>
                                            <th>Account No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>{{ $employee->bank_name ? $employee->bank_name : "N/A"}}</td>
                                            <td>{{$employee->account_holder ? $employee->account_holder : "N/A"}}</td>
                                            <td>{{$employee->bank_branch ? $employee->bank_branch : "N/A"}}</td>

                                            <td>{{$employee->bank_address ? $employee->bank_address : "N/A"}}</td>
                                            <td>{{$employee->ifsc_code ? $employee->ifsc_code : "N/A"}}</td>
                                            <td>{{$employee->account_no ? $employee->account_no : "N/A"}}</td>
                                            <td><a href="#" data-id="{{ $employee->id }}" title="edit" data-toggle="modal" data-target="#editModal" class="edit_bank btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSalary"
                            aria-expanded="true" aria-controls="collapseOne">
                            Salary sheet
                        </button>
                    </h2>
                </div>

                <div id="collapseSalary" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="panel">
                        <div class="panel_body">
                            <div class="card-body">
                                <table class="table table-bordered table-sm">
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
                                                    <td>{{ $salary->invoice_no }}</td>
                                                    <td>{{ $salary->month ." - ". $salary->year }}</td>
                                                    <td>{{ $salary->date }}</td>
                                                    <td>{{ $salary->pay_mode ? $salary->pay_mode : 'N/A' }}</td>
                                                    <td>{{ $salary->payable }}</td>
                                                    <td>{!! $salary->is_paid == 0 ? "<span class='badge badge-warning'>GENERATED</span>" : "<span class='badge badge-success'>PAID</span>" !!}</td>
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
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour"
                            aria-expanded="true" aria-controls="collapseOne">
                            Social Links
                        </button>
                    </h2>
                </div>

                <div id="collapseFour" class="collapse {{ Session::has('update_social_links') ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="{{ route('admin.employee.social.links.update', $employee->id) }}" method="POST">
                            @csrf
                            <div class="panel">
                                <div class="panel_body">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="inputEmail3" class="text-center">Facebook Link</label>
                                    <input type="text" placeholder="eg:https://www.facebook.com/username"
                                        value="{{ $employee->facebook_link }}" name="facebook_link" id="facebook_link"
                                        class="form-control form-control-sm"/>
                                    <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputEmail3" class="text-center">linkedIn Link</label>
                                    <input type="text" placeholder="eg:https://www.facebook.com/username"
                                        value="{{ $employee->linkedIn_link }}" name="linkedIn_link" id="linkedIn_link"
                                        class="form-control form-control-sm"/>
                                    <span class="text-danger">{{ $errors->first('linkedIn_link') }}</span>
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputEmail3" class="text-center">Twitter Link</label>
                                    <input type="text" placeholder="eg:https://www.facebook.com/username"
                                        value="{{ $employee->twitter_link }}" name="twitter_link" id="twitter_link"
                                        class="form-control form-control-sm"/>
                                    <span class="text-danger">{{ $errors->first('twitter_link') }}</span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-blue float-right mb-2" type="submit">Update</button>
                        </div>
                    </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Bank Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit_modal_body">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="authenticationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Employee authentication</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit_modal_body">
                <form class="employee_authentication_update_form" action="{{ route('admin.employee.authentication.update', $employee->id) }}" method="POST">
                    @csrf
                    <div class="form-group ">
                        <label for="password" class="p-0 m-0"><b>Password :</b></label>
                            <input type="text" {{ $employee->status == 0 ? 'disabled' : ''}}  class="form-control password" name="password" placeholder="Employee authentication password">
                            <span class="error password_error"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="chech_container ml-1 mb-1 p-0">
                                    <input {{ $employee->status == 0 ? 'checked' : ''}} type="checkbox" name="authentication_status" id="authentication_check">
                                    <span class="checkmark"></span>
                                   <span class="text_style">Authentication permission deactive</span> 
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-blue float-right">Update</button>

                </form>
                
            </div>
        </div>
    </div>
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

<!--/middle content wrapper-->
<!-- hostel select rooom find -->
@endsection

@push('js')
    <script>
        @error('account_holder')
        toastr.error("{{ $errors->first('ifsc_code') }}");
        @enderror
        @error('bank_branch')
        toastr.error("{{ $errors->first('ifsc_code') }}");
        @enderror
        @error('bank_address')
        toastr.error("{{ $errors->first('ifsc_code') }}");
        @enderror
        @error('ifsc_code')
        toastr.error("{{ $errors->first('ifsc_code') }}");
        @enderror
        @error('account_no')
        toastr.error("{{ $errors->first('account_no') }}");
        @enderror
    </script>

    

    <script>
            $(document).ready(function () {
            $(document).on('click', '.edit_bank', function(){
                var employee_id = $(this).data('id');
                $.ajax({
                    url:"{{ url('admin/employees/bank/edit') }}" + "/" + employee_id,
                    type:'get',
                    success:function(data){
                        $('.edit_modal_body').empty();
                        $('.edit_modal_body').append(data);
                    }
                });
            });
        });
    </script>

    <script>

        $(document).ready(function(){
            $(".date_picker").flatpickr({
                dateFormat: "d-m-Y",
            });

            $(".pick_date_of_birth").flatpickr({
                dateFormat: "Y-m-d",
                readonly:false,
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

            $(document).on('submit', '.employee_authentication_update_form', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){

                        $('.error').html('');
                        $('.employee_authentication_update_form')[0].reset();
                        $('#authenticationModal').modal('hide');
                        toastr.success(data);
                        setInterval(function(){
                            window.location = "{{ url()->current() }}";
                        }, 700);
                        
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.password){
                            $('.password_error').html(err.responseJSON.errors.password[0]);
                            $('.password').addClass('is-invalid');
                        }else{
                            $('.password_error').html('');
                            $('.password').removeClass('is-invalid');
                        }
                        
                    }
                });
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
               })
            })
        })  
    </script>

    <script>

        $(document).ready(function(){
           $('.chech_container').on('click', function(){
                if($('#authentication_check').is(':checked', true)){
                    $('#authentication_check').prop('checked', false);
                    $('.password').prop('disabled', false);
                }else{
                    $('#authentication_check').prop('checked', true);
                    $('.password').prop('disabled', true);
                }
           });
        });

    </script>

    
@endpush