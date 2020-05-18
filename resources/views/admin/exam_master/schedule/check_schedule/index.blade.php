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
        color: white;
    }

    .modal-header {
        background-color: #353C48;
    }
    .details_content {
        width: 800px;
    }

    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
        padding: 3px!important;
        border-top: 1px solid #e4e5e7;
        vertical-align: middle;
        font-size: 13px;
        
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
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Select Criteria For Checking Exam Schedule</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form" action="{{ route('admin.exam.master.schedule.search.class.section.wise') }}"
                            method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Select Class</label>
                                    <select required name="class_id" class="select_class class_id form-control form-control-sm">
                                        <option value="">Select class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Select Section</label>
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
                    <div class="panel_body exam_list">
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal" id="schedule_details"  aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content details_content">
            <div class="modal-header">
                <h6 class="modal-title  text-left" id="exampleModalLabel">Schedule Details</h6>
                <button type="button" class="text-primary print_button"><i class="fas fa-print"></i>&nbsp;<b>Print</b></span>
                </button>
            </div>
            <div class="modal-body schedule_details_modal_body">
                
            </div>
            <div class="modal-footer">
                <button type="button" id="dismissModal"  class="btn m btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
            </div>
        </div>
    </div>
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
                url: "{{ url('admin/exam/master/schedules/check/get/sections/by/') }}" + "/" + classId,
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
            $('.exam_list').empty();
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
                        $('.exam_list').html(data);
                        $('.loading').hide();
                    }
                }
            })
        })
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.details_schedule', function (e) {
            
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'get',
                success: function (data) {
                    //console.log(data);
                    if (!$.isEmptyObject(data)) {
                        $('.schedule_details_modal_body').empty();
                        $('.schedule_details_modal_body').html(data);
                        $("#schedule_details").modal("show");
                    }
                }
            })
        })
    });

</script>

<script type="text/javascript">

    $(document).ready(function () {
        
        $(document).on('click', '.print_button', function (e) {
            var heading = $('.print_page_heading_heading').html();
            console.log(heading);
            $('.printing_content').printThis({
                debug: true,                   
                importCSS: true,                
                importStyle: false,             
                printContainer: true,           
                loadCSS: "{{asset('public/admins/css/schedule_details_print_style.css')}}",      
                pageTitle: "Exam schedule",                  
                removeInline: true,            
                removeInlineSelector: "body *",  
                printDelay: 333,                
                header: heading,                   
                footer: '<h3 style="text-align:right; margin-top:100px;">Principal\'s Signature</h3>',
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
        });
    });
</script>

<script>
        $(document).on("click", "#delete_class_schedule", function (e) {
            e.preventDefault();
            var url = $(this).attr("href");
            swal({
                title: "Are you sure to delete all?",
                text: "Once Delete, This will be Deleted Permanently!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).closest('tr').remove();
                    $.ajax({
                        url: url,
                        type: 'get',
                        success: function (data) {
                            //console.log(data);
                            if (!$.isEmptyObject(data)) {
                                toastr.success(data);
                            }
                        }
                    })
                } else {
                    swal("Safe Data!");
                }
            });
        });
</script>
@endpush