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
                                    <span>Select Criteria For Current day Attendance By Date</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form" onsubmit="event.preventDefault();searchStudent(this);" action="{{ route('admin.attendance.current.day.by.date.attendance.search') }}"
                            method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label>class</label>
                                    <select required name="class_id" class="select_class class_id form-control form-control-sm">
                                        <option value="">--- Select Class ---</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Section</label>
                                    <select required name="section_id" id="sections"
                                        class="form-control form-control-sm select_section section_id">
                                        
                                    </select>
                                    <small class="text-danger is_subjects"> </small>
                                </div>
                                <div class="col-md-4">
                                
                                        <label>Select Date</label>
                                        <input type="text" required name="date" class="datepicker form-control form-control-sm" value="{{  date('d-m-Y') }}" data-date-format="dd-mm-yyyy">
                                   
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>


                    <div class="panel_body table_body mt-3">
                        
                        <div class="loading"><h4>Loading...</h4> </div>
                        <div class="table_area">
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@push('js')
<script type="text/javascript">
    $('.loading').hide();
    $('.table_body').hide();
    $('.update_loding').hide();
    $(document).ready(function () {
        $('.select_class').on('change', function () {
            var classId = $(this).val();
            $.ajax({
                url: "{{ url('admin/attendance/current/day/by/date/get/sections/by/') }}" + "/" + classId,
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    $('#sections').empty();
                    $('#sections').append(' <option value="">--Select Section--</option>');
                    $.each(data, function (key, val) {
                        $('#sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                    })
                }
            })
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
    
            $(document).on('submit', '.current_day_by_date_attendance_from', function (e) {
                e.preventDefault();
                console.log('GET');
                $('.save_button').hide();
                $('.update_loding').show();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    type: type,
                    data: request,
                    success: function (data) {
                        
                        if (!$.isEmptyObject(data.successMsg)) {
                            toastr.success(data.successMsg);
                            $('.save_button').show();
                            $('.update_loding').hide();
                        }else{
                            toastr.error(data.errorMsg); 
                            $('.save_button').show();
                            $('.update_loding').hide();
                        }
                        
                    }
                })
            });
        }) 
        
    </script>

<script>
    function searchStudent(data) {
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