@extends('admin.master')
@push('css')
    <style>
        .panel .panel_body {
            display: block;
            overflow: hidden;
            padding: 1px 26px;
            background-color: #fff;
        }

        .loading {
            margin: 0px;
            padding: 0px;
            background: white;
            padding-bottom: 1px;
        }
        
        .loading h4 {
            margin-left: 24px;
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
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel_header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel_title">
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Select Criteria For Creating Exam Schedule</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body pb-2">
                        <form class="search_form" action="{{ route('admin.exam.master.schedule.search.class.section.wise.subjects') }}"
                            method="get">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <label>Exam Name</label>
                                    <select required name="exam_id" id="exams" class="form-control form-control-sm">
                                        <option value="">Select Exam Name</option>
                                        @foreach ($exams as $exam)
                                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Class</label>
                                    <select required name="class_id" class="select_class class_id form-control form-control-sm">
                                        <option value="">Select class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>Section</label>
                                    <select required name="section_id" id="sections"
                                        class="form-control form-control-sm select_section section_id">
                                        <option value="">Select section</option>
                                    </select>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>

                    <div class="loading"><h4>Loading...</h4> </div>
                    <div class="panel_body subject_list mt-2">
                          
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
                    url: "{{ url('admin/exam/master/schedules/create/get/sections/by/') }}" + "/" + classId,
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
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select_session').on('change', function () {
                var sessionId = $(this).val();
                $.ajax({
                    url: "{{ url('admin/exam/master/schedules/create/get/exams/by/') }}" + "/" + sessionId,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('#exams').empty();
                        $('#exams').append(' <option value="">--Select exam name--</option>');
                        $.each(data, function (key, val) {
                            $('#exams').append(' <option value="' + val.id + '">' + val.name + '</option>');
                        })
                    }
                })
            })
        });

    </script>



    <script type="text/javascript">
        $(document).ready(function () {
            $('.search_form').on('submit', function (e) {
                e.preventDefault();
                $('.subject_list').empty();
                $('.loading').show();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var request = $(this).serialize(); 
                //console.log(request);
                $.ajax({
                    url: url,
                    type: method,
                    data:request,
                    success: function (data) {
                        //console.log(data);
                        if (!$.isEmptyObject(data)) {
                            $('.subject_list').html(data);
                            $('.loading').hide();
                        }
                    }
                })
            })
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $(document).on('submit', '#create_schedule_from', function (e) {
                e.preventDefault();
                
                $('.loading_button').show();
                $('.create_button').hide();
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var request = $(this).serialize(); 
                //console.log(request);
                $.ajax({
                    url: url,
                    type: method,
                    dataType:'json',
                    data:request,
                    success: function (data) {
                        toastr.success(data);
                        $('.loading_button').hide();
                        $('.create_button').show();
                    }
                })
            })
        });
    </script>
@endpush