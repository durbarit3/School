@extends('admin.master')
@push('css')
    {{-- <link rel="stylesheet" href="{{asset('public/admins/admin.employee.employee_list.create.css')}}"> --}}
    <style>
        .dropify-wrapper {
            height: 67px!important;
        }

        .border_red{
            border: 1px solid red;
            border-radius: 3px;
        }

        label {
            font-size: 13px;
        }

        .dropify-wrapper .dropify-message p {
            margin: -7px 0 0;
        }

        .dropify-wrapper {
            border-radius: 3px;
        }

        .form_section_heading h6 {
            letter-spacing: 2px;
        }

        .text-black{
            color:#222533;
        }
    </style>
@endpush
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- content wrpper -->

<!--middle content wrapper-->
<div class="middle_content_wrapper">
    <section class="page_area">
    <form id="employee_add_form"action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel">
                <div class="panel_header">
                    <div class="row">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-plus-square"></i></span>
                            <span>Add Employee</span>
                        </div>
                    </div>
                </div>
                <div class="panel_body">
                    <div class="form_section_heading"><h6 class="m-0 text-black"><b>Employee Details</b></h6></div>
                    <hr class="p-0 m-0 mb-1">
                    <div class="form-group">

                        <div class="row">

                            <div class="col-sm-4">
                                <label class="text-center m-0"><b>Employee ID</b><span
                                        style="color:red">*</span></label>
                                <input autocomplete="off" readonly type="text" id="employee_id" value="{{ $employeeId }}" class="form-control form-control-sm" name="employee_id" required>
                            </div>

                            <div class="col-sm-4">
                                <label class="text-center m-0"><b>Name</b> <span
                                    style="color: red">*</span></label>
                                <input autocomplete="off" type="text" id="name" class="form-control form-control-sm" name="name" placeholder="Employee name">
                                <span class="error name_error"></span>
                            </div>

                            <div class="col-sm-4">
                                <label class="text-center m-0"><b>Gender</b> <span
                                    style="color: red">*</span></label>
                                <select class="form-control form-control-sm" name="gender" id="gender">
                                    <option value="">Selecet gender</option>
                                    @foreach($genders as $gender)
                                    <option {{ $gender->name == old('gender') ? 'SELECTED' : '' }}
                                        value="{{ $gender->name }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                                <span class="error gender_error"></span>
                            </div>

                            
                            <div class="col-sm-4">
                                <label class="text-center m-0"><b>Religion</b> <span
                                    style="color: red">*</span></label>
                                <input autocomplete="off" type="text" id="religion" class="form-control form-control-sm"
                                    name="religion" placeholder="Employee religion">
                                <span class="error religion_error"></span>
                            </div>

                            <div class="col-sm-4">
                                <label class="text-center m-0"><b>Blood group</b> <span
                                    style="color: red">*</span></label>
                                <select id="blood_group" class="form-control form-control-sm" name="blood_group">
                                    <option value="">Select Blood Group</option>
                                    @foreach($bloodGroups as $bloodGroup)
                                    <option value="{{ $bloodGroup->id }}">{{ $bloodGroup->group_name }}</option>
                                    @endforeach
                                </select>
                                <span class="error blood_group_error"></span>
                            </div>

                            <div class="col-sm-4">
                                <label class="text-center m-0"><b>Date of birth</b>  <span
                                    style="color: red">*</span></label>
                                <input readonly autocomplete="off" type="text" autocomplete="off" class="form-control form-control-sm pick_date_of_birth" id="date_of_birth" name="date_of_birth" placeholder="yyyy-mm-dd">
                                <span class="error date_of_birth_error"></span>
                            </div>
                           
                            <div class="col-sm-4">
                                <label class="text-center m-0"><b>Mobile No</b> <span
                                        style="color:red">*</span></label>
                                <input autocomplete="off" type="number" id="mobile_no" class="form-control form-control-sm" name="mobile_no" placeholder="Emp mobile_no">
                                <span class="error mobile_no_error"></span>
                            </div>
                        </div>

                        <div class="row">
                    
                            <div class="col-sm-4">
                                <label class="text-center m-0"><b>Permanent address</b> <span
                                        style="color: red">*</span></label>
                                <textarea autocomplete="off" name="permanent_address" id="permanent_address" class="form-control form-control-sm"
                                    placeholder="Present address" cols="8" rows="3"></textarea>
                                    <span class="error permanent_address_error"></span>
                            </div>

                            <div class="col-sm-4">
                                <label class="text-center m-0"><b>Present address</b> <span
                                        style="color: red">*</span></label>
                                <textarea autocomplete="off" name="present_address" class="form-control form-control-sm" id="present_address"
                                    placeholder="Present address" cols="8" rows="3"></textarea>
                                    <span class="error present_address_error"></span>
                            </div>

                            <div class="col-sm-4">
                                <label class="text-center m-0"><b>Photo</b> <span
                                    style="color: red">*</span></label>
                                <input  accept=".jpg, .jpeg, .png, .gif" type="file" id="photo" name="photo" id="input-file-now"
                                    class="form-control form-control-sm dropify" size="20"/>
                                <span class="error photo_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form_section_heading"><h6 class="m-0 text-black">Login Details</h6></div>
                    <hr class="p-0 m-0 mb-1">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Email address</b> <span
                                    style="color: red">*</span></label>
                            <input autocomplete="off" type="email" id="email"
                                name="email" placeholder="Employee email address" class="form-control form-control-sm"/>
                            <span class="error email_error"></span>
                        </div>
                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Password</b> <span
                                    style="color: red">*</span></label>
                            <input autocomplete="off" type="password" id="password"
                                name="password" class="form-control form-control-sm" placeholder="Login password"/>
                            <span class="error password_error"></span>    
                        </div>
                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Confirm password</b>  <span
                                    style="color: red">*</span></label>
                            <input autocomplete="off" type="password" id="pasword_confirmation"
                                name="password_confirmation"  class="form-control form-control-sm"
                                 placeholder="Confirmation password"/>
                        </div>
                    </div>
                    
                    <div class="form_section_heading"><h6 class="m-0 text-black"> Academic Details</h6></div>
                    <hr class="p-0 m-0 mb-1">
                    <div class="form-group row">

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Designation</b> <span
                                style="color: red">*</span></label>
                            <select id="designation" class="form-control form-control-sm" name="designation">
                                <option value="">Select Designation</option>
                                @foreach($designations as $designation)
                                <option value="{{ $designation->name }}">
                                    {{ $designation->name }}
                                </option>
                                @endforeach
                            </select>
                            <span class="error designation_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Group/Department</b> <span
                                style="color: red">*</span></label>
                            <select id="group" id="group" class="form-control form-control-sm" name="group">
                                <option value="">Selecet Group/Department</option>
                                @foreach($groups as $group)
                                <option value="{{ $group->id }}">
                                    {{ $group->name }}</option>
                                @endforeach
                            </select>
                            <span class="error group_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Joining date</b> <span
                                    style="color: red">*</span></label>
                            <input readonly autocomplete="off" type="text" value="{{ date('d-m-Y') }}" name="joining_date" id="joining_date" class="form-control form-control-sm date_picker"/>
                            <span class="error joining_date_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Qualification</b> <span
                                    style="color: red">*</span></label>
                            <input autocomplete="off" type="text" name="qualification"
                                id="qualification" class="form-control form-control-sm" placeholder="Employee qualification"/>
                                <span class="error qualification_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Role</b> <span
                                style="color: red">*</span></label>
                            <select id="role" class="form-control form-control-sm" name="role">
                                <option value="">Selecet Role</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->role_known_id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <span class="error role_error"></span>
                        </div>
                    </div>

                    <div class="form_section_heading"><h6 class="m-0 text-black">Social Links</h6></div>
                    <hr class="p-0 m-0 mb-1">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Facebook link</b></label>
                            <input autocomplete="off" type="text" placeholder="eg:https://www.facebook.com/username" name="facebook_link" class="form-control form-control-sm"/>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>linkedIn link</b> </label>
                            <input autocomplete="off" type="text" placeholder="eg:https://www.facebook.com/username" name="linkedIn_link" class="form-control form-control-sm"/>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Twitter link</b> </label>
                            <input autocomplete="off" type="text" placeholder="eg:https://www.facebook.com/username" name="twitter_link" class="form-control form-control-sm"/>
                        </div>
                    </div>

                    <div class="form_section_heading"><h6 class="m-0 text-black"> Bank Details </h6></div>
                    <hr class="p-0 m-0 mb-1">

                    <div class="form-group row">

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Bank name</b></label>
                            <input autocomplete="off" type="text" class="form-control form-control-sm" name="bank_name"
                                id="bank_name">
                            <span class="error bank_name_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Account holder</b></label>
                            <input autocomplete="off" type="text"  class="form-control form-control-sm"
                                name="account_holder" id="account_holder">
                            <span class="error account_holder_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Bank branch</b> </label>
                            <input autocomplete="off" type="text" class="form-control form-control-sm" name="bank_branch"
                                id="bank_branch" >
                            <span class="error bank_branch_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Bank address</b></label>
                            <input autocomplete="off" type="text" class="form-control form-control-sm"
                                name="bank_address" id="bank_address">
                                <span class="error bank_address_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>IFSC code</b></label>
                            <input autocomplete="off" type="text" class="form-control form-control-sm" id="ifsc_code"
                                name="ifsc_code">
                                <span class="error ifsc_code_error"></span>
                        </div>

                        <div class="col-sm-4">
                            <label class="text-center m-0"><b>Account number</b> </label>
                            <input autocomplete="off" type="text" class="form-control form-control-sm" name="account_no">
                            <span class="error account_no_error"></span>
                        </div>

                    </div>
                    <button class="btn btn-sm btn-blue submit_button float-right" type="submit">Submit</button>
                    <button class="btn btn-sm btn-blue display_none loading_button float-right" type="button">Loading...</button>
                </>
            </div>
        </form>
    </section>
</div>

<!--/middle content wrapper-->
<!-- hostel select rooom find -->
@endsection

@push('js')

    <script>
        $(document).ready(function () {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#employee_add_form', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                $('.submit_button').hide();
                $('.loading_button').show();
                //var form = document.querySelector('#employee_add_form');
                //var formData = new URLSearchParams(Array.from(new FormData(form))).toString();
                $.ajax({
                    url:url,
                    type:type,
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                        $('.form-control').removeClass('is-invalid');
                        $('.dropify-wrapper').removeClass('border_red'); 
                        $('.error').html('');
                        $('#employee_add_form')[0].reset();
                        $('.dropify-render img').attr('src', null);
                        $('.dropify-preview').hide();
                        $('.submit_button').show();
                        $('.loading_button').hide();
                        toastr.success(data.successMsg, 'Successfull');
                    },
                    error:function(err){

                        $('.submit_button').show();
                        $('.loading_button').hide();
                        toastr.error('Please check again all form field.','Some thing want wrong.');
                        $('.error').html('');
                        $('.form-control').removeClass('is-invalid');
                        $.each(err.responseJSON.errors,function(key, error){
                            //console.log(key);
                            $('.'+key+'_error').html(error[0]);
                            $('#'+key).addClass('is-invalid');
                        });
                        if(err.responseJSON.errors.photo){
                            $('.dropify-wrapper').addClass('border_red');
                        }else{
                            $('.dropify-wrapper').removeClass('border_red');   
                        }
                    }
                });
            });
        });

    </script> 

    <script>
        $(document).ready(function(){
            $('.date_picker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose:true
            });
        });
        
        $(document).ready(function(){
            $('.pick_date_of_birth').datepicker({
                format: 'yyyy-mm-dd',
                autoclose:true
            });
        });
    </script>


    
@endpush
