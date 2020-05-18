@extends('admin.master')
@push('css')
<style>
    .dropify-wrapper {
        height: 79px !important;
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
        background: currentColor;
        
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
                <p class="m-1 p-0"><b><i class="fas fa-signature"></i> Name : </b><span style=" text-transform:uppercase;">{{ $employee->adminname }}</span></p>
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
            </div>
            <div class="col-md-2">
                <a class="btn btn-sm btn-success float-right" href="{{ route('admin.employee.all.'.$role) }}">Back</a>
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
                    <div class="card-body no-padding">
                        <form action="{{ route('admin.employee.update.basic.details', $employee->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="panel">
                                <div class="panel_body">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="inputEmail3" class="text-center">Employee ID <span
                                                    style="color:red">*</span></label>
                                            <input readonly type="text" id="employee_id"
                                                value="{{ $employee->employee_id }}" class="form-control"
                                                 required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="inputEmail3" class="text-center">Name<span
                                                    style="color: red">*</span></label>
                                            <input type="text" id="name" value="{{ $employee->adminname }}"
                                                class="form-control" name="name" required>
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="inputEmail3" class="text-center">Gender<span
                                                    style="color: red">*</span></label>
                                            <select class="form-control" name="gender" id="gender" required>
                                                <option value="">--Selecet gender--</option>
                                                @foreach($genders as $gender)
                                                <option {{ $gender->name == old('gender') ? 'SELECTED' : '' }}
                                                    {{ $gender->name == $employee->gender ? 'SELECTED' : '' }}
                                                    value="{{ $gender->name }}">{{ $gender->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="text-center">Religion<span
                                                    style="color: red">*</span></label>
                                            <input type="text" id="religion" value="{{ $employee->religion }}"
                                                class="form-control" name="religion" required>
                                            <span class="text-danger">{{ $errors->first('religion') }}</span>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="text-center">Blood Group<span
                                                    style="color: red">*</span></label>
                                            <select id="blood_group" class="form-control" name="blood_group" required>
                                                <option value="">--Select Blood Group--</option>
                                                @foreach($bloodGroups as $bloodGroup)
                                                <option {{ $bloodGroup->id == old('blood_group') ? "SELECTED" : "" }}
                                                    {{ $bloodGroup->id == $employee->blood_group_id ? "SELECTED" : "" }}
                                                    value="{{ $bloodGroup->id }}">{{ $bloodGroup->group_name }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="text-center">Date Of Birth<span
                                                    style="color: red">*</span></label>
                                            <input type="date" class="form-control pick_date_of_birth" id="date_of_birth"
                                                name="date_of_birth"
                                                value="{{ $employee->date_of_birth }}"
                                                required>
                                            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="text-center">Mobile No<span
                                                    style="color:red">*</span></label>
                                            <input type="number" value="{{ $employee->phone }}" class="form-control"
                                                name="mobile_no" required>
                                            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="inputEmail3" class="text-center">Present Address <span
                                                    style="color: red">*</span></label>
                                            <textarea name="present_address" class="form-control" id="present_address"
                                                placeholder="Present address" cols="8" rows="3"
                                                required>{{ $employee->present_address }}</textarea>
                                            <span class="text-danger">{{ $errors->first('present_address') }}</span>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="inputEmail3" class="text-center">Permanent Address <span
                                                    style="color: red">*</span></label>
                                            <textarea name="permanent_address" id="permanent_address"
                                                class="form-control" placeholder="Present address" cols="8" rows="3"
                                                required>{{ $employee->permanent_address }}</textarea>
                                            <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="inputEmail3" class="text-center">Photo<span
                                                    style="color: red">*</span></label>
                                            <input
                                                data-default-file="{{ asset('public/uploads/employee/'.$employee->avater) }}"
                                                accept=".jpg, .jpeg, .png, .gif" type="file" id="photo" name="photo"
                                                id="input-file-now" class="form-control dropify" size="20" />
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
                    <div class="card-body no-padding">
                        <form action="{{ route('admin.employee.update.academic.details', $employee->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="panel">
                                <div class="panel_body">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="text-center">Designation<span
                                                    style="color: red">*</span></label>
                                            <select id="designation" class="form-control" name="designation" required>
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
                                            <label for="inputEmail3" class="text-center">Group/Department<span
                                                    style="color: red">*</span></label>
                                            <select id="group" id="group" class="form-control" name="group" required>
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
                                            <label for="inputEmail3" class="text-center">Joining Date <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="joining_date" id="joining_date"
                                                class="form-control date_picker"
                                                value="{{ $employee->joining_date }}"
                                                required />
                                            <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="text-center">Qualification <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="qualification" value="{{ $employee->qualification }}"
                                                id="qualification" class="form-control" required />
                                            <span class="text-danger">{{ $errors->first('qualification') }}</span>
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="inputEmail3" class="text-center">Role<span
                                                    style="color: red">*</span></label>
                                            <select required id="role" class="form-control" name="role">
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
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree"
                            aria-expanded="true" aria-controls="collapseOne">
                            Bank Details
                        </button>
                    </h2>
                </div>

                <div id="collapseThree" class="collapse {{ Session::has('update_bank_info') ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body no-padding">
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
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour"
                            aria-expanded="true" aria-controls="collapseOne">
                            Social Links
                        </button>
                    </h2>
                </div>

                <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="inputEmail3" class="text-center">Facebook Link</label>
                                    <input type="text" placeholder="eg:https://www.facebook.com/username"
                                        value="{{ old('facebook_link') }}" name="facebook_link" id="facebook_link"
                                        class="form-control" />
                                    <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputEmail3" class="text-center">linkedIn Link</label>
                                    <input type="text" placeholder="eg:https://www.facebook.com/username"
                                        value="{{ old('linkedIn_link') }}" name="linkedIn_link" id="linkedIn_link"
                                        class="form-control" />
                                    <span class="text-danger">{{ $errors->first('linkedIn_link') }}</span>
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputEmail3" class="text-center">Twitter Link</label>
                                    <input type="text" placeholder="eg:https://www.facebook.com/username"
                                        value="{{ old('twitter_link') }}" name="twitter_link" id="twitter_link"
                                        class="form-control"  />
                                    <span class="text-danger">{{ $errors->first('twitter_link') }}</span>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-blue float-right mb-2" type="submit">Update</button>
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
@endpush