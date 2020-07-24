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
                                    <span>Select Criteria For Current day Attendance</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form" onsubmit="event.preventDefault();searchStudent(this);" action="{{ route('admin.attendance.current.day.attendance.search') }}"
                            method="get">
                            @csrf
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <label class="p-0 m-0"><b>class :</b></label>
                                    <select required name="class_id" class="select_class class_id form-control form-control-sm">
                                        <option value="">--- Select class ---</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="p-0 m-0"><b>Section : </b></label>
                                    <select required name="section_id" id="sections"
                                        class="form-control form-control-sm select_section section_id">
                                        <option value="">--- Select section ---</option>
                                    </select>
                                    <small class="text-danger is_subjects"> </small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>

                    <div class="panel_body mt-3">
                        <div class="text-left">
                            <h6 style="color:black; border-bottom:1px solid;"><b>Today : {{ date('d-F-Y') }}</b></h6>
                        </div>
                        <div class="loading"><h4>Loading....</h4> </div>
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
    $(document).ready(function () {
        $('.select_class').on('change', function () {
            var classId = $(this).val();
            $.ajax({
                url: "{{ url('admin/ajax/class/sections/') }}" + "/" + classId,
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
    
            $(document).on('submit', '.current_day_attendance_from', function (e) {
                e.preventDefault();
                console.log('GET');
                
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    type: type,
                    data: request,
                    success: function (data) {
                        if (!$.isEmptyObject(data.successMsg)) {
                            var search_from = document.getElementsByClassName('search_form');
                            searchStudent(search_from)
                            {{-- $('.table_area').empty();
                            $('.table_area').html('<span class="alert alert-success float-left w-100 d-block">' + data.successMsg + '</span>'); --}}
                            toastr.success(data.successMsg);
                        }else{
                            toastr.error(data.errorMsg); 
                        }
                    }
                })
            });
        }) 
        
    </script>

<script>
   
    function searchStudent(data) {
        $('.table_area').empty();
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


@endpush