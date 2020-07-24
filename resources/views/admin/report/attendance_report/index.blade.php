@extends('admin.master')
@push('css')
    <style>
        .loading {margin: 0px;padding: 0px;background: white;padding-bottom: 1px;}
        section {display: block;overflow: hidden;padding: 0px 0px;}
        .loading h4 {margin-left: 24px;}
        td {line-height: 11px;}
        a.report_menu_link {width: 100%;display: block;padding: 4px 7px;color: #444;margin-left: 19px;}
        li.report_menu_list {display: block;margin-top: 4px;}
        .list_background{background: #dceeff;}
        li.report_menu_list a:hover {color:black;}
        a.report_menu_link svg {font-size: 16px;}
        .report_list_area {box-shadow: 0 2px 10px rgba(0, 0, 0, .2);background-color: #fff;}
        .student_attendance_report_table th{line-height: 15px;}
        .table_area {overflow-x: scroll;}
        .attendance_status_marking_area {border: 1px solid gray;padding: 1px 10px;margin-bottom: 7px;border-radius: 5px;width: 450px;}
        .attendance_status_marking_area h6 {margin-top: 5px;margin-bottom: 5px;}
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
                                                <a data-value="student_attendance_report" class="report_menu_link text-dark student_attendance_report" href="#">
                                                    <i class="fas fa-file-alt"></i> <b>Student Attendance Report</b> 
                                                </a>
                                            </li>

                                            <li class="report_menu_list">
                                                <a data-value="employee_attendance_report" class="report_menu_link text-dark employee_attendance_report" href="#">
                                                    <i class="fas fa-file-alt"></i> <b>Employee Attendance Report</b> 
                                                </a>
                                            </li>
                                            
                                            <li class="report_menu_list">
                                                <a class="report_menu_link text-dark exam_attendance_report" data-value="exam_attendance_report"  href="#"><i class="fas fa-file-alt"></i> <b>Exam Attendance Report</b></a>
                                            </li>
                                        </ul>
                                    </div>
                           
                                </div>
                            </div>
                            <hr>
                        </div>
                        
                        <div class="panel_body form_field_body">

                            <form class="report_form student_attendance_report_form pb-2" action="{{ route('admin.reports.attendance.report.student.attendance') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><b>Student Attendance Report Form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">

                                    <div class="col-md-3">
                                        <label class="m-0"> Session :</label>
                                        <select name="session_id" class="form-control form-control-sm" required>
                                            <option value="">Select session</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}">{{ $session->session_year }}</option> 
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="m-0">Class :</label>
                                        <select name="class_id" class="form-control form-control-sm select_class" required>
                                            <option value="">Select class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="m-0">Section :</label>
                                        <select name="section_id" id="student_attn_section" class="form-control form-control-sm" required>
                                            <option value="">Select section</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="m-0">Month :</label>
                                        <input required type="text" class="form-control form-control-sm date_picker" placeholder="YYYY-M" value="{{ date('Y-F') }}" name="year_month">
                                    </div>

                                </div>
                                <button  type="submit" class="btn btn-sm btn-blue mt-2 float-right">Search</button>
                            </form>
                            
                            <form class="report_form employee_attendance_report_form pb-2" action="{{ route('admin.reports.attendance.report.employee.attendance') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><b>Employee Attendance Report Form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="m-0">Role :</label>
                                        <select name="role_known_id" class="form-control form-control-sm" required>
                                            <option value="">---Select role---</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->role_known_id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="m-0">Month :</label>
                                        <input required type="text" class="form-control form-control-sm date_picker" placeholder="YYYY-M" value="{{ date('Y-F') }}" name="year_month">
                                    </div>
                                
                                </div>
                                <button  type="submit" class="btn btn-sm btn-blue mt-2 float-right">Search</button>
                            </form>
                            
                            <form class="report_form exam_attendance_report_form pb-2" action="{{ route('admin.reports.attendance.report.exam.attendance.report') }}"
                                method="get">
                                <div class="heading_area">
                                    <div class="heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><b>Exam Attendance Report Form</b><hr class="m-0 p-0"></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="m-0"> Session :</label>
                                        <select name="session_id" class="form-control select_session form-control-sm" required>
                                            <option value="">Select session</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}">{{ $session->session_year }}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label class="m-0">Exam :</label>
                                        <select name="exam_id" id="exams" class="form-control form-control-sm" required>
                                            <option value="">---Select exam---</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label class="m-0">Class :</label>
                                        <select name="class_id" class="form-control form-control-sm class_id select_class" required>
                                            <option value="">Select class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="m-0">Section :</label>
                                        <select name="section_id" id="exam_attn_section" class="form-control form-control-sm select_section" required>
                                            <option value="">Select section</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label class="m-0">Subject :</label>
                                        <select name="subject_id" id="subjects" class="form-control form-control-sm" required>
                                            <option value="">Select subject</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <button  type="submit" class="btn btn-sm btn-blue mt-2 float-right">Search</button>
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

    <script>

        var menu = '';

        $('.report_form').hide();
        $('.table_body').hide();
        $('.form_field_body').hide();
        $('.period_field_area').hide();

        $(document).ready(function () {

            $('.student_attendance_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.student_attendance_report_form')[0].reset();
                $('.student_attendance_report_form').show();
                $('.form_field_body').show(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });
            
            $('.exam_attendance_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.exam_attendance_report_form')[0].reset();
                $('.exam_attendance_report_form').show();
                $('.form_field_body').show(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });
            
            $('.employee_attendance_report').on('click', function(e){
                e.preventDefault();
                $('.report_form').hide(100);
                $('.employee_attendance_report_form')[0].reset();
                $('.employee_attendance_report_form').show();
                $('.form_field_body').show(100);
                $('.table_area').empty();
                $('.table_body').hide(100);
            });

            $(document).on('click', '.report_menu_link', function (e){
                menu = $(this).data('value');
            });

        });

    </script> 

    <script>
      
        $(document).ready(function () {

            $('.student_attendance_report_form').on('submit', function(e){
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

            $('.employee_attendance_report_form').on('submit', function(e){
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

            $('.exam_attendance_report_form').on('submit', function(e){
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
                    url: "{{ url('admin/reports/attendance_report/get/sections') }}" + "/" + classId,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if(menu == "student_attendance_report"){
                            //console.log(menu);
                            $('#student_attn_section').empty();
                            $('#student_attn_section').append(' <option value="">--Select Section--</option>');
                            $.each(data, function (key, val) {
                                $('#student_attn_section').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                            })
                        }
                        if(menu == "exam_attendance_report"){
                            //console.log(menu);
                            $('#exam_attn_section').empty();
                            $('#exam_attn_section').append(' <option value="">--Select Section--</option>');
                            $.each(data, function (key, val) {
                                $('#exam_attn_section').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                            })
                        }
                         
                    }
                })
            })
        });

    </script>  
    
    <script type="text/javascript">
        
        $(document).ready(function () {
            $(document).on('change', '.select_section', function () {
                var classId = $('.class_id').val();
                var sectionId = $(this).val();
                $.ajax({
                    url: "{{ url('admin/reports/attendance_report/get/subjects') }}" + "/" + classId + "/" + sectionId,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        $('#subjects').empty();
                        $('#subjects').append(' <option value="">--Select subject--</option>');
                        $.each(data, function (key, val) {
                            $('#subjects').append(' <option value="' + val.subject_id + '">' + val.subject.name + '</option>');
                        })
                    }
                })
            })
        });

    </script>
    
    <script type="text/javascript">
        
        $(document).ready(function () {
            $(document).on('change', '.select_session', function () {
                var sessionId = $(this).val();
             
                $.ajax({
                    url: "{{ url('admin/reports/attendance_report/get/exams/by') }}" + "/" + sessionId,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        $('#exams').empty();
                        $('#exams').append(' <option value="">--Select exam--</option>');
                        $.each(data, function (key, val) {
                            $('#exams').append(' <option value="' + val.id + '">' + val.name + '</option>');
                        })
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
                format: "yyyy-MM",
                viewMode: "months", 
                minViewMode: "months",
                autoclose:true
            });
        })
    </script>

 
@endpush