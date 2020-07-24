@extends('admin.master')
@push('css')
    <style>
        .loading {margin: 0px;padding: 0px;background: white;padding-bottom: 1px;}
        .loading h4 {margin-left: 24px;}
        td {line-height: 11px;}
        a.report_menu_link {width: 100%;display: block;padding: 4px 7px;color: #444;margin-left: 19px;}
        li.report_menu_list {display: block;margin-top: 4px;}
        .list_background {background: #dceeff;}
        li.report_menu_list a:hover {color:black;}
        a.report_menu_link svg {font-size: 16px;}
        .report_list_area {box-shadow: 0 2px 10px rgba(0, 0, 0, .2);background-color: #fff;}
    </style>
@endpush
@section('content')
    <div class="middle_content_wrapper">
        <section class="page_content">
            <!-- panel -->
            <div class="panel mb-0">
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"><i class="fas fa-border-all"></i></span>
                                        <span>Select criteria for finance report</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="report_list_area">
                            <div class="report_list">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="report_menu_ul">
                                            <li class="report_menu_list">
                                                <a class="report_menu_link text-dark book_issue_report" href="#">
                                                    <i class="fas fa-file-alt"></i>
                                                    <b>Book issue report</b> 
                                                </a>
                                            </li>

                                            <li class="report_menu_list">
                                                <a class="report_menu_link text-dark book_issue_return_report" href="#">
                                                    <i class="fas fa-file-alt"></i>
                                                    <b>Book issue return report</b> 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-4">
                                        <ul class="report_menu_ul">
                                            <li class="report_menu_list">
                                                <a class="report_menu_link text-dark book_due_report" href="#">
                                                    <i class="fas fa-file-alt"></i> 
                                                    <b>Book due report</b>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        
                        <div class="panel_body form_field_body">

                            <form class="report_form book_issue_report_form pb-2" action="{{ route('admin.report.library.book.issue.report') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="text-dark"><b>Book issue report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <label class="m-0">Search Type :</label>
                                        <select required name="select_type" id="select_type"
                                            class="form-control form-control-sm select_section section_id">
                                            <option value="">--- Select Type ---</option>
                                            <option value="today">Today</option>
                                            <option value="this_week">This Week</option>
                                            <option value="last_week">Last Week</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                            <option value="this_year">This Year</option>
                                            <option value="last_year">Last Year</option>
                                            <option value="period">Period</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 period_field_area">
                                        <label class="m-0">Date From :</label>
                                        <input type="text" class="form-control form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_from">
                                    </div>

                                    <div class="col-md-4 period_field_area">
                                        <label class="m-0">Date To :</label>
                                        <input type="text" class="form-control form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_to">
                                    </div>

                                </div>
                                <button style="margin-top: 15px;" type="submit" class="btn btn-sm btn-blue float-right">Search</button>
                            </form>
                            
                            <form class="report_form book_issue_return_report_form pb-2" action="{{ route('admin.report.library.book.issue.return.report') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="text-dark"><b>Book issue return report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="m-0">Search Type :</label>
                                        <select required name="select_type" id="select_type"
                                            class="form-control form-control-sm">
                                            <option value="">--- Select Type ---</option>
                                            <option value="today">Today</option>
                                            <option value="this_week">This Week</option>
                                            <option value="last_week">Last Week</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                            <option value="this_year">This Year</option>
                                            <option value="last_year">Last Year</option>
                                            <option value="period">Period</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 period_field_area">
                                        <label class="m-0">Date From :</label>
                                        <input type="text" class="form-control form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_from">
                                    </div>

                                    <div class="col-md-4 period_field_area">
                                        <label class="m-0">Date To :</label>
                                        <input type="text" class="form-control form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_to">
                                    </div>
                                </div>

                                <button style="margin-top: 15px;" type="submit" class="btn btn-sm btn-blue float-right">Search</button>
                            </form>
                            
                            <form class="report_form book_due_report_form pb-2" action="{{ route('admin.report.library.book.due.report') }}" method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="text-dark"><b>Book due report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="m-0">Search Type :</label>
                                        <select required name="select_type" id="select_type"
                                            class="form-control form-control-sm">
                                            <option value="">--- Select Type ---</option>
                                            <option value="today">Today</option>
                                            <option value="this_week">This Week</option>
                                            <option value="last_week">Last Week</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                            <option value="this_year">This Year</option>
                                            <option value="last_year">Last Year</option>
                                            <option value="period">Period</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 period_field_area">
                                        <label class="m-0">Date From :</label>
                                        <input type="text" class="form-control form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_from">
                                    </div>

                                    <div class="col-md-4 period_field_area">
                                        <label class="m-0">Date To :</label>
                                        <input type="text" class="form-control form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_to">
                                    </div>
                                </div>

                                <button style="margin-top: 15px;" type="submit" class="btn btn-sm btn-blue float-right">Search</button>
                            </form>
                        </div>

                        <div class="panel_body table_body mt-3">
                            <div class="loading"><h4>Loading...</h4></div>
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

    <script>

        $('.report_form').hide();
        $('.table_body').hide();
        $('.form_field_body').hide();
        $('.period_field_area').hide();
        $(document).ready(function () {
            $('.book_issue_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.book_issue_report_form')[0].reset();
                $('.book_issue_report_form').show();
                $('.form_field_body').show(100);
                $('.period_field_area').hide(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });

            $('.book_issue_return_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide();
                $('.book_issue_return_report_form')[0].reset();
                $('.book_issue_return_report_form').show(100);
                $('.form_field_body').show(100);
                $('.period_field_area').hide(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            }); 
            
            $('.book_due_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.book_due_report_form')[0].reset();
                $('.book_due_report_form').show();
                $('.form_field_body').show(100);
                $('.period_field_area').hide(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });

            $(document).on('change', '#select_type',function(){
                var value = $(this).val();
                if(value === 'period'){
                    $('.period_field_area').show();
                }else{
                    $('.period_field_area').hide(); 
                }
            });
        });
    </script> 

    <script>
        $(document).ready(function () {
            $('.book_issue_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });
    </script>  

    <script>
        $(document).ready(function () {

            $('.book_issue_return_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });
    </script>   
    
    <script>
        $(document).ready(function () {
            $('.book_due_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });
    </script> 
   
    <script>
        $(document).ready(function () {
            $('.report_menu_list').on('click', function(){
                $('.report_menu_list').removeClass('list_background');
                $(this).addClass('list_background');
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
    </script>
@endpush