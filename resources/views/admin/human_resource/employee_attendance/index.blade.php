@extends('admin.master')
@section('content')
@php
date_default_timezone_set('Asia/Dhaka');
@endphp
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">

            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel_header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel_title">
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span>
                                    <span>Select Criteria Employee Attendance</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form" onsubmit="event.preventDefault();searchEmployee(this);" action="{{ route('admin.hr.employee.attendance.search') }}"
                            method="get">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="m-0 p-0"><b>Role :</b> </label>
                                    <select required name="role_known_id" class="select_class class_id form-control form-control-sm">
                                        <option value="">--- Select role ---</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->role_known_id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <div class="col-md-6">
                                    <label class="m-0 p-0"><b>Date :</b> </label> 
                                    <input type="text" required name="date" class="datepicker form-control form-control-sm" value="{{  date('d-m-Y') }}" data-date-format="dd-mm-yyyy">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>


                    <div style="display:none;" class="panel_body table_body mt-3">
                        
                        <div style="display:none;" class="loading"><h4>Loading...</h4> </div>
                        <div  class="table_area">
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    
            $(document).on('submit', '.employee_attendance_from', function (e) {
                e.preventDefault();
                //console.log('GET');
                $('.save_button').hide();
                $('.loading_button').show();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    type: type,
                    data: request,
                    success: function (data) {
                        
                        if(!$.isEmptyObject(data.successMsg)){

                            toastr.success(data.successMsg);
                            $('.save_button').show();
                            $('.loading_button').hide();
                            
                            $('.table_area').empty();
                            $('.table_area').html('<span class="alert alert-success d-block">Successfully employee attendance has been taken in this date. Now you can edit these.</span>');

                        }
                        
                    }
                })
            });
        })   
        
        $(document).on('submit', '.employee_attendance_update_from', function (e) {
                e.preventDefault();
                //console.log('GET');
                $('.save_button').hide();
                $('.loading_button').show();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    type: type,
                    data: request,
                    success: function (data) {
                        
                        if(!$.isEmptyObject(data.successMsg)){

                            toastr.success(data.successMsg);
                            $('.save_button').show();
                            $('.loading_button').hide();
                            $('.message_area').empty();

                        }
                        
                    }
                })
        });
     
        
    </script>

<script>

    function searchEmployee(data) {
        $('.table_area').empty();
        $('.table_body').show(); 
        $('.loading').show(100);
        var url = $(data).attr('action');
        var type = $(data).attr('method');
        var request = $(data).serialize();
        $.ajax({
            url: url,
            type: type,
            data: request,
            success: function (data) {
                
                if (!$.isEmptyObject(data)) {
                    $('.table_area').html(data); 
                    $('.loading').hide(100);  
                }
               
            }
        })
    }
   
</script>

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker(
            {
                format: 'dd-mm-yyyy',
                autoclose:true
            }
        );
    })
</script>

@endpush