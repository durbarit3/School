@extends('admin.master')
@push('css')
    <style>

        .dropify-wrapper{
            max-height: 50px;
        }

        .dropify-wrapper.has-error .dropify-message .dropify-error, .dropify-wrapper.has-preview .dropify-clear {
            display: block;
            margin-top: -5px;
        }

        @media (min-width: 576px){
            .leave_applye_details_modal_dialog {
                max-width: 800px;
                margin: 1.75rem auto;
            }
        }
        

    </style>
@endpush
@section('content')
@php
date_default_timezone_set('Asia/Dhaka');
@endphp

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Leave applies</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Apply leave</span></a>
                        </div>
                    </div>
                </div>

            </div>
      
                <div class="panel_body">
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
                                @foreach($leaveApplies as $leaveApply)
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
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Apply leave form</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="leave_apply_add_form" class="form-horizontal" action="{{ route('admin.hr.leave.apply.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Apply date </b>:</label>
                            <input type="text" autocomplete="off" class="form-control date_ficker form-control-sm apply_date" value="{{ date('d-m-Y') }}" name="apply_date">
                            <span class="error apply_date_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Available leave</b> :</label>
                            <select class="form-control form-control-sm leave_type" name="leave_type">
                                <option value="">Select available leave</option>
                                @foreach($leaveTypes as $leaveType)
                                <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>
                                @endforeach
                            </select>
                            <span class="error leave_type_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Leave start date </b>: </label>
                            <input readonly type="text" placeholder="dd-mm-yyyy" autocomplete="off" class="form-control date_ficker form-control-sm start_date" name="start_date">
                            <span class="error start_date_error"></span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Leave end date </b>: </label>
                            <input readonly type="text" autocomplete="off" placeholder="dd-mm-yyyy" class="form-control date_ficker form-control-sm end_date" name="end_date">
                            <span class="error end_date_error"></span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Reason </b>: </label>
                            <textarea class="form-control form-control-sm reason" name="reason" cols="2" rows="3" placeholder="Reason will be go here..."></textarea>
                            <span class="error reason_error"></span>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Attachment </b>: </label>
                            <input accept=".jpg, .jpeg, .png, .gif, .txt, .csv, .xlsx" type="file" id="photo" name="attachment_file" id="input-file-now"
                                class="form-control dropify" size="20"/>
                            <span class="error attachment_file_error"></span>    
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="button" id="submit_loading" class="btn btn-sm btn-blue ">Loading...</button>
                        <button type="submit" class="btn btn-sm btn-blue submit_button">Submit</button>
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

    <script type="text/javascript">

        $(document).ready(function () {

            $('#submit_loading').hide();

        });

    </script>
    
    <script type="text/javascript">

        $(document).ready(function () {
            
            $('.modal_close_button').on('click', function(){
                $('.error').html('');
                $('.form-control').removeClass('is-invalid');
            })

        });

    </script>

    <script>
        $(document).ready(function () {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#leave_apply_add_form', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                $('.submit_button').hide();
                $('#submit_loading').show();
                $.ajax({
                    url:url,
                    type:type,
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){

                        $('.error').html('');
                        $('#leave_apply_add_form')[0].reset();
                        $('#submit_loading').hide();
                        $('.submit_button').show();
                        $('#myModal1').modal('hide');
                        toastr.success(data.successMsg);
                        setInterval(function(){
                            window.location = "{{ url()->current() }}";
                        }, 700)
                        
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                    
                        if(err.responseJSON.errors.apply_date){
                            $('.apply_date_error').html(err.responseJSON.errors.apply_date[0]);
                            $('.name').addClass('is-invalid');
                        }else{
                            $('.apply_date').html('');
                            $('.apply_date').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.leave_type){
                            $('.leave_type_error').html(err.responseJSON.errors.leave_type[0]);
                            $('.leave_type').addClass('is-invalid');
                        }else{
                            $('.leave_type_error').html('');
                            $('.leave_type').removeClass('is-invalid');
                        }
                        
                        if(err.responseJSON.errors.start_date){
                            $('.start_date_error').html(err.responseJSON.errors.start_date[0]);
                            $('.start_date').addClass('is-invalid');
                        }else{
                            $('.start_date_error').html('');
                            $('.start_date').removeClass('is-invalid');
                        }
                        
                        if(err.responseJSON.errors.end_date){
                            $('.end_date_error').html(err.responseJSON.errors.end_date[0]);
                            $('.end_date').addClass('is-invalid');
                        }else{
                            $('.end_date_error').html('');
                            $('.end_date').removeClass('is-invalid');
                        }
                        
                        if(err.responseJSON.errors.reason){
                            $('.reason_error').html(err.responseJSON.errors.reason[0]);
                            $('.reason').addClass('is-invalid');
                        }else{
                            $('.reason_error').html('');
                            $('.reason').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.attachment_file){
                            $('.attachment_file_error').html(err.responseJSON.errors.attachment_file[0]);
                            
                        }else{
                            $('.attachment_file_error').html(''); 
                        }

                        $('#submit_loading').hide();
                        $('.submit_button').show();
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
    
    <script>
        $(document).ready(function(){
            $('.date_ficker').datepicker(
                {
                    format: 'dd-mm-yyyy',
                    autoclose:true
                }
            );
        })
    </script>

@endpush
