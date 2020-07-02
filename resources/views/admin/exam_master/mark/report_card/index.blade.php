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
 
    {{-- Details modal style --}}
    .modal-title {
        color: black;
    }

    .modal-header {
        background-color: white;
    }
    .details_content {
        width: 800px;
    }

    .modal-header button {
        padding: 0px 10px;
        outline: none;
        border-radius: 7px;
        border-style: none;
        border: 1px solid lightgray;
        color: black!important;
        background: white;
        font-size: 14px;
    }
    .modal-header button:hover {
        background: lightgray;
    }
    
    .td-small{
        padding: 1px 3px!important;
        font-size: 13px!important;
    }
    .student_details_table{
        width: 31%!important;
    } 
    .mark_sheet_table{
        width: 93%!important; 
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
                        <form class="search_form" action="{{ route('admin.exam.master.report.card.search.student.class.section.wise') }}"
                            method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="p-0 m-0">Session</label>
                                    <select required name="session_id" id="session_id" class="form-control form-control-sm select_session">
                                        <option value="">Session</option>
                                        @foreach ($sessions as $session)
                                            <option value="{{ $session->id }}">{{ $session->session_year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-3">
                                    <label class="p-0 m-0">Exam Name</label>
                                    <select required name="exam_id" id="exams" class="form-control form-control-sm">
                                        <option value="">Select Exam Name</option>
                                        
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="p-0 m-0">Class</label>
                                    <select required name="class_id" class="select_class class_id form-control form-control-sm">
                                        <option value="">Select class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class="p-0 m-0">Section</label>
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
                    <div class="panel_body mt-3 student_list">
                                         
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal" id="report_card_details"  aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content details_content">
            <div class="modal-header">
                <h6 class="modal-title  text-left" id="exampleModalLabel">Schedule Details</h6>
                <button type="button" class="text-primary print_button"><i class="fas fa-print"></i>&nbsp;<b>Print</b></span>
                </button>
            </div>
            <div class="modal-body report_card_details_modal_body">
                
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
    <script src="{{ asset('public/admins/plugins/print_this/printThis.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.select_session').on('change', function () {
                var sessionId = $(this).val();
                $.ajax({
                    url: "{{ url('admin/exam/master/mark/report/card/get/exams/by') }}" + "/" + sessionId,
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
        $('.loading').hide();
        $(document).ready(function () {
            $('.select_class').on('change', function () {
                var classId = $(this).val();
                $.ajax({
                    url: "{{ url('admin/exam/master/mark/report/card/get/sections/by') }}" + "/" + classId,
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
            $('.search_form').on('submit', function (e) {
                e.preventDefault();
                $('.student_list').empty();
                $('.loading').show(100);
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
                            $('.student_list').html(data);
                            $('.loading').hide(100);
                        }
                    }
                })
            })
        });

    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $(document).on('click', '.show_report_card', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'get',
                    success: function (data) {
                        //console.log(data);
                        if (!$.isEmptyObject(data)) {
                            $('.report_card_details_modal_body').empty();
                            $('.report_card_details_modal_body').html(data);
                            $('#report_card_details').modal('show');
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
            $(document).on('submit', '#multiple_print_from', function (e) {
                e.preventDefault();
                $('.print_loading_button').show();
                $('.print_generate_button').hide();
                
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var request = $(this).serialize(); 
                //console.log(request);
                $.ajax({
                    url: url,
                    type: method,
                    data:request,
                    success: function (data) {
                        
                        if(!$.isEmptyObject(data.errorMsg)){
                            $('.print_loading_button').hide();
                            $('.print_generate_button').show();
                            toastr.error(data.errorMsg);
                        }
                        $(data).printThis({
                            debug: true,                   
                            importCSS: true,                
                            importStyle: false,             
                            printContainer: true,           
                            loadCSS: "{{asset('public/admins/css/report_card_print_style.css')}}",      
                            pageTitle: "Exam schedule",                  
                            removeInline: true,            
                            removeInlineSelector: "body *",  
                            printDelay: 333,                
                            header: null,                   
                            footer: null,
                            base: true,                    
                            formValues: true,              
                            canvas: true,                  
                            doctypeString: '...',           
                            removeScripts: true,          
                            copyTagClasses: true,       
                            beforePrintEvent: null,         
                            beforePrint: null,              
                            afterPrint: null  
                        });
                        $('.print_loading_button').hide();
                        $('.print_generate_button').show();
                    }
                })
            })
        });

    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $(document).on('click', '.print_button', function (e) {
                var header = $('.print_main_header_area').html();
                var footer = $('.print_footer_main_area').html();

                $('.print_area').printThis({
                    debug: true,                   
                    importCSS: true,                
                    importStyle: false,             
                    printContainer: true,           
                    loadCSS: "{{asset('public/admins/css/report_card_print_style.css')}}",      
                    pageTitle: "Exam schedule",                  
                    removeInline: true,            
                    removeInlineSelector: "body *",  
                    printDelay: 333,                
                    header: header,                   
                    footer: footer,
                    base: true,                    
                    formValues: true,              
                    canvas: true,                  
                    doctypeString: '...',           
                    removeScripts: true,          
                    copyTagClasses: true,       
                    beforePrintEvent: null,         
                    beforePrint: null,              
                    afterPrint: null  
                });
            })
        });

    </script>

@endpush