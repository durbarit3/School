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
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Select Criteria For Printing Admit Card</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form mt-2" action="{{ route('admin.exam.master.admit.card.print.search.student') }}"
                            method="get">
                            @csrf
                            <div class="row">

                                <div class="col-md-3">
                                    <label class=" p-0 m-0"><b>Select Exam Name :</b> </label>
                                    <select required name="exam_id" id="exam_id" class="form-control form-control-sm">
                                        <option value="">Select Exam Name</option>
                                        @foreach ($exams as $exam)
                                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-3">
                                    <label class=" p-0 m-0"><b>Select Class :</b> </label>
                                    <select required name="class_id" class="select_class class_id form-control form-control-sm">
                                        <option value="">Select class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class=" p-0 m-0"><b>Select Section :</b> </label>
                                    <select required name="section_id" id="sections"
                                        class="form-control form-control-sm select_section section_id">
                                        <option value="">Select section</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label class=" p-0 m-0"><b>Select Template :</b> </label>
                                    <select required name="template_id" id="template_id" class="form-control form-control-sm">
                                        <option value="">Select admit card template</option>
                                        @foreach ($templates as $template)
                                            <option value="{{ $template->id }}">{{ $template->template_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>

                    <div class="loading"><h4>Loading...</h4> </div>
                    <div class="panel_body student_list">
                                         
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection
@push('js')

<script src="{{ asset('public/admins/plugins/print_this/printThis.js') }}"></script>

<script type="text/javascript">
    $('.loading').hide();
    $(document).ready(function () {
        $('.select_class').on('change', function () {
            var classId = $(this).val();
            $.ajax({
                url: "{{ url('admin/exam/master/admit/card/print/get/sections/by') }}" + "/" + classId,
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
                        $('.student_list').html(data);
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
        $(document).on('submit', '#admit_card_print_from', function (e) {
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
                data:request,
                success: function (data) {
                    console.log(data);
                    $(data).printThis({
                        debug: true,                   
                        importCSS: true,                
                        importStyle: false,             
                        printContainer: true,           
                        loadCSS: "{{asset('public/admins/css/print_admit_card.css')}}",      
                        pageTitle: "Bank Deposit Invoice",                  
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