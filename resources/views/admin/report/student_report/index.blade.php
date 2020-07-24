@extends('admin.master')
@push('css')
    <style>
        .loading {margin: 0px;padding: 0px;background: white;padding-bottom: 1px;}
        .loading h4 {margin-left: 24px;}
        .form_field_body {margin-top: -8px;}
        a.report_menu_link {width: 100%;display: block;padding: 4px 7px;color: #444;margin-left: 19px;}
        li.report_menu_list {display: block;margin-top: 4px;}
        .list_background{background: #dceeff;}
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
                                        <span>Select criteria for student report</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="report_list_area">
                            <div class="report_list">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="report_menu_ul">
                                            <li class="report_menu_list">
                                                <a data-value="student_report" class="report_menu_link text-dark student_report" href="#">
                                                    <i class="fas fa-file-alt"></i>  
                                                    <b>Student report</b> 
                                                </a>
                                            </li>

                                            <li class="report_menu_list">
                                                <a data-value="sibling_report" class="report_menu_link text-dark sibling_report" href="#">
                                                    <i class="fas fa-file-alt"></i> 
                                                    <b>Sibling report</b>
                                                </a>
                                            </li>
                                            
                                            <li class="report_menu_list">
                                                <a class="report_menu_link text-dark guardian_report" data-value="guardian_report"  href="#">
                                                    <i class="fas fa-file-alt"></i>  
                                                    <b>Guardian report</b>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="report_menu_ul">
                                            <li class="report_menu_list">
                                                <a data-value="admission_report" class="report_menu_link text-dark admission_report" href="#">
                                                    <i class="fas fa-file-alt"></i> 
                                                    <b>Admission report</b> 
                                                </a>
                                            </li>

                                            <li class="report_menu_list">
                                                <a data-value="class_subject_report" class="report_menu_link text-dark class_subject_report" href="#">
                                                    <i class="fas fa-file-alt"></i> 
                                                    <b>Class subject report</b> 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        
                        <div class="panel_body form_field_body">
                            <form class="report_form student_report_form" action="{{ route('admin.reports.student.report') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="text-dark"><b>Student report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="p-0 m-0">Session <span class="text-danger">*</span> : </label>
                                        <select required name="session_id" id="session_id" class="form-control form-control-sm select_session">
                                            <option value="">Select session</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}">{{ $session->session_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="p-0 m-0">Class :</label>
                                        <select name="class_id" class="select_class class_id form-control form-control-sm">
                                            <option value="">--- Select Class ---</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option> 
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="p-0 m-0">Section :</label>
                                        <select name="section_id" id="sections"
                                            class="form-control form-control-sm select_section section_id">
                                            <option value="">--- Select section ---</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="p-0 m-0">Category :</label>
                                        <select name="category_id" id="categories"
                                            class="form-control form-control-sm select_category category_id">
                                            <option value="">--- Select category ---</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="p-0 m-0">Gender :</label>
                                        <select name="gender_id" id="genders"
                                            class="form-control form-control-sm select_gender gender_id">
                                            <option value="">--- Select gender ---</option>
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                            </form>
                            
                            <form class="report_form sibling_report_form" action="{{ route('admin.reports.student.report.sibling') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="text-dark"><b>Sibling report form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Class :</label>
                                        <select required name="class_id" class="select_class class_id form-control form-control-sm">
                                            <option value="">--- Select Class ---</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option> 
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Section :</label>
                                        <select name="section_id" id="sibling_sections"
                                            class="form-control form-control-sm select_section section_id">
                                            <option value="">--- Select section ---</option>
                                        </select>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                            </form>
                            
                            <form class="report_form guardian_report_form" action="{{ route('admin.reports.student.report.guardian') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="text-dark"><b>Guardian report form</b>
                                                <hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <label class="p-0 m-0">Session <span class="text-danger">*</span> : </label>
                                        <select required name="session_id" id="session_id" class="form-control form-control-sm select_session">
                                            <option value="">Select session</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}">{{ $session->session_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="p-0 m-0">Class :</label>
                                        <select name="class_id" class="select_class class_id form-control form-control-sm">
                                            <option value="">--- Select Class ---</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option> 
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="p-0 m-0">Section :</label>
                                        <select name="section_id" id="guardian_sections"
                                            class="form-control form-control-sm select_section section_id">
                                            <option value="">--- Select section ---</option>
                                        </select>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                            </form> 
                            
                            <form class="report_form admission_report_form pb-2" action="{{ route('admin.reports.student.report.admission') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="text-dark"><b>Admission report form</b>
                                                <hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">

                                    <div class="col-md-3">
                                        <label class="m-0">Search Type :</label>
                                        <select name="select_type" id="select_type"
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
                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date From :</label>
                                        <input type="text" class="form-control form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_from">
                                    </div>
                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date To :</label>
                                        <input type="text" class="form-control form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_to">
                                    </div>
                                    <div class="col-md-1">
                                        
                                        <button style="margin-top: 26px;" type="submit" class="btn btn-sm btn-blue float-left">Search</button>
                                    </div>
                                </div>
                                
                            </form>
                            
                            <form class="report_form class_subject_report_form" action="{{ route('admin.reports.student.report.class.subject') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="text-dark"><b>Class subject report form</b>
                                                    <hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Class :</label>
                                        <select name="class_id" class="select_class class_id form-control form-control-sm">
                                            <option value="">--- Select Class ---</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option> 
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Section :</label>
                                        <select name="section_id" id="class_subject_sections"
                                            class="form-control form-control-sm select_section section_id">
                                            <option value="">--- Select section ---</option>
                                        </select>
                                    </div>
                                  
                                </div>
                                <button style="margin-top: 26px;" type="submit" class="btn btn-sm btn-blue float-right">Search</button>
                            </form>
                        </div>


                        <div class="panel_body table_body mt-2">
                           
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

    <script>
        var menu = '';
        $('.report_form').hide();
        $('.table_body').hide();
        $('.form_field_body').hide();
        $('.period_field_area').hide();

        $(document).ready(function () {

            $('.student_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide();
                $('.student_report_form')[0].reset();
                $('.student_report_form').show();
                $('.form_field_body').show();
                $('.table_area').empty();
                $('.table_body').hide();
            });

            $('.sibling_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide();
                $('.sibling_report_form').show();
                $('.sibling_report_form')[0].reset();
                $('.form_field_body').show();
                $('.table_area').empty();
                $('.table_body').hide();
            });
        
            $('.guardian_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide();
                $('.guardian_report_form').show();
                $('.guardian_report_form')[0].reset();
                $('.form_field_body').show();
                $('.table_area').empty();
                $('.table_body').hide();
            });
            
            $('.admission_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide();
                $('.admission_report_form').show();
                $('.admission_report_form')[0].reset();
                $('.form_field_body').show();
                $('.table_area').empty();
                $('.table_body').hide();
                $('.period_field_area').hide();
            });

            $('.class_subject_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide();
                $('.class_subject_report_form').show();
                $('.class_subject_report_form')[0].reset();
                $('.form_field_body').show();
                $('.table_area').empty();
                $('.table_body').hide();
                $('.period_field_area').hide();
            });

            $(document).on('click', '.report_menu_link', function (e){
                menu = $(this).data('value');
            });

            $('#select_type').on('change', function(){
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

            $('.student_report_form').on('submit', function(e){
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

            $('.guardian_report_form').on('submit', function(e){
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

            $('.admission_report_form').on('submit', function(e){
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

            $('.class_subject_report_form').on('submit', function(e){
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


    <script type="text/javascript">
        
        $('.loading').hide(200);
        $(document).ready(function () {
            $(document).on('change','.select_class', function () {
                var classId = $(this).val();
                //console.log(menu);
                $.ajax({
                    url: "{{ url('admin/attendance/current/day/by/date/get/sections/by/') }}" + "/" + classId,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if(menu == "student_report"){
                            //console.log(menu);
                            $('#sections').empty();
                            $('#sections').append(' <option value="">--Select Section--</option>');
                            $.each(data, function (key, val) {
                                $('#sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                            })
                        }

                        if(menu == "sibling_report"){
                            $('#sibling_sections').empty();
                            $('#sibling_sections').append(' <option value="">--Select Section--</option>');
                            $.each(data, function (key, val) {
                                $('#sibling_sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                            })
                        }
                        
                        if(menu == "guardian_report"){
                            $('#guardian_sections').empty();
                            $('#guardian_sections').append(' <option value="">--Select Section--</option>');
                            $.each(data, function (key, val) {
                                $('#guardian_sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                            })
                        }
                        if(menu == "class_subject_report"){
                            $('#class_subject_sections').empty();
                            $('#class_subject_sections').append(' <option value="">--Select Section--</option>');
                            $.each(data, function (key, val) {
                                $('#class_subject_sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                            })
                        }
                        
                        
                    }
                })
            })
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
        })
    </script>

@endpush