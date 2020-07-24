@extends('admin.master')
@push('css')
    <style>
        td {
            line-height: 0px;
        }
    </style>
@endpush
@section('content')
@php
    function json($data) {
        return json_decode($data, true);
    }  
@endphp
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Check permission ( <b>{{ $roleName }}</b> )</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                       <a href="{{ route('admin.gen.settings.role.permit.index') }}" class="btn btn-sm btn-info float-right">Back</a>
                    </div>
                </div>
            </div>
          
            <div class="panel_body">
                <div class="table-responsive">
                    <form id="role_permission_form" action="{{ route('admin.gen.settings.role.permission', $permits->role_id) }}" method="POST">
                        @csrf
                        <table class="table mb-2">
                            <thead>
                                <tr class="text-left">
                                    <th>Module</th>
                                    <th>Section</th>
                                    <th>View</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <div class="student_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Student</b></td>
                                        <td>Addmission/details</td>
                                        <td>
                                            <input {{ json($permits->student_module)['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="student_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->student_module)['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="student_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->student_module)['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="student_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->student_module)['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="student_delete" value="1">
                                        </td>
                                    </tr>
                                </div>

                                <div class="academic_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Academic</b></td>
                                        <td>Class</td>
                                        <td>
                                            <input {{ json($permits->academic_module)['class']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="class_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['class']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="class_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['class']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="class_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['class']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="class_delete" value="1">
                                        </td>
                                    </tr>

                                   
                                    <tr class="text-left">
                                        <td class="text-dark"></td>
                                        <td>Section</td>
                                        <td>
                                            <input {{ json($permits->academic_module)['section']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="section_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['section']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="section_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['section']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="section_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['section']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="section_delete" value="1">
                                        </td>
                                    </tr>


                                    <tr class="text-left">
                                        <td class="text-dark"></td>
                                        <td>Subject</td>
                                        <td>
                                            <input {{ json($permits->academic_module)['subject']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="subject_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['subject']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="subject_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['subject']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="subject_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['subject']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="subject_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"></td>
                                        <td>Assign class teacher</td>
                                        <td>
                                            <input {{ json($permits->academic_module)['assign_class_teacher']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_class_teacher_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['assign_class_teacher']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_class_teacher_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['assign_class_teacher']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_class_teacher_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['assign_class_teacher']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_class_teacher_delete" value="1">
                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"></td>
                                        <td>Assign subject</td>
                                        <td>
                                            <input {{ json($permits->academic_module)['assign_subject']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_subject_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['assign_subject']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_subject_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['assign_subject']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_subject_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['assign_subject']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_subject_delete" value="1">
                                        </td>
                                    </tr> 
                                    <tr class="text-left">
                                        <td class="text-dark"></td>
                                        <td>Assign teacher to subject</td>
                                        <td>
                                            <input {{ json($permits->academic_module)['Assign_teacher_to_subject']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_teacher_subject_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['Assign_teacher_to_subject']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_teacher_subject_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['Assign_teacher_to_subject']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_teacher_subject_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['Assign_teacher_to_subject']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_teacher_subject_delete" value="1">
                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"></td>
                                        <td>Class time table</td>
                                        <td>
                                            <input {{ json($permits->academic_module)['class_timetable']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="class_timetable_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['class_timetable']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="class_timetable_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['class_timetable']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="class_timetable_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->academic_module)['class_timetable']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="class_timetable_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"></td>
                                        <td>Teacher timetable</td>
                                        <td>
                                            <input {{ json($permits->academic_module)['teacher_timetable']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="teacher_timetable_view" value="1">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                </div>

                                <div class="exam_master/exam_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Exam master/Exam</b></td>
                                        <td>Term</td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['term']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_term_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['term']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_term_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['term']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_term_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['term']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_term_delete" value="1">
                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Hall</td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['hall']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_hall_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['hall']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_hall_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['hall']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_hall_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['hall']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_hall_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"></td>
                                        <td>Distribution</td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['distribution']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_distribution_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['distribution']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_distribution_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['distribution']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_distribution_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['distribution']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_distribution_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"></td>
                                        <td>Exam setup</td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['exam_setup']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_setup_view" value="1"></td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['exam_setup']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_setup_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['exam_setup']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_setup_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['exam']['exam_setup']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_setup_delete" value="1">
                                        </td>
                                    </tr>
                                </div>
                                
                                <div class="exam_master/exam_schedule_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Exam master/Exam schedule</b></td>
                                        <td>Create schedule</td>
                                        <td><input {{ json($permits->exam_module)['exam_schedule']['create_schedule']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_schedule_create_view" value="1"></td>
                                        <td><input {{ json($permits->exam_module)['exam_schedule']['create_schedule']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_schedule_create_add" value="1"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Check schedule</td>
                                        <td><input {{ json($permits->exam_module)['exam_schedule']['check_schedule']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_schedule_check_view" value="1"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                
                                </div>
                                
                                <div class="exam_master/mark_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Exam master/Mark</b></td>
                                        <td>Mark entrie</td>
                                        <td>
                                            <input {{ json($permits->exam_module)['mark']['mark_entire']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_mark_entire_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['mark']['mark_entire']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_mark_entire_add" value="1">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Grade range</td>
                                        <td>
                                            <input {{ json($permits->exam_module)['mark']['grade_range']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_grande_view" value="1"></td>
                                        <td>
                                            <input {{ json($permits->exam_module)['mark']['grade_range']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_grande_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['mark']['grade_range']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_grande_edit" value="1">
                                        </td>
                                        <td><input {{ json($permits->exam_module)['mark']['grade_range']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_grande_delete" value="1"></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Report card</td>
                                        <td><input {{ json($permits->exam_module)['mark']['exam_report_card']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_report_card_view" value="1"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                
                                </div>  
                                
                                <div class="exam_master/admit_card_module">
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Exam master/Admit Card</b></td>
                                        <td>Design admit card</td>
                                        <td>
                                            <input {{ json($permits->exam_module)['admit_card']['design_admit_card']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_admit_card_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['admit_card']['design_admit_card']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_admit_card_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['admit_card']['design_admit_card']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_admit_card_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->exam_module)['admit_card']['design_admit_card']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_admit_card_delete" value="1">
                                        </td>
                                    </tr>

                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Print admit card</td>
                                        <td><input {{ json($permits->exam_module)['admit_card']['print_admit_card']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="print_admit_card_view" value="1"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                </div>
                                
                                <div class="attendance_module">                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Attendance</b></td>
                                        <td>Attendance & Attendance by date</td>
                                        <td>
                                            <input {{ json($permits->attendance_module)['attendance']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="attendance_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attendance_module)['attendance']['add'] == 1 ? 'CHECKED' : '' }}  type="checkbox" name="attendance_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attendance_module)['attendance']['edit'] == 1 ? 'CHECKED' : '' }}  type="checkbox" name="attendance_edit" value="1">
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Period attendance & Period attendance by date</td>
                                        <td>
                                            <input {{ json($permits->attendance_module)['period_attendance']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="period_attendance_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attendance_module)['period_attendance']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="period_attendance_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attendance_module)['period_attendance']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="period_attendance_edit" value="1">
                                        </td>
                                        <td></td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Exam attendance & Exam attendance Modify</td>
                                        <td>
                                            <input {{ json($permits->attendance_module)['exam_attendance']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_attendance_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attendance_module)['exam_attendance']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_attendance_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attendance_module)['exam_attendance']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="exam_attendance_edit" value="1">
                                        </td>
                                        <td></td>
                                    </tr>
                                </div>

                                <div class="transport_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Transport</b></td>
                                        <td>Route</td>
                                        <td>
                                            <input {{ json($permits->transport_module)['route']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="route_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['route']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="route_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['route']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="route_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['route']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="route_delete" value="1">
                                        </td>
                                    </tr>

                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Vehicles</td>
                                        <td>
                                            <input {{ json($permits->transport_module)['vehicle']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="vehicle_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['vehicle']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="vehicle_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['vehicle']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="vehicle_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['vehicle']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="vehicle_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Asign vehicle</td>
                                        <td>
                                            <input {{ json($permits->transport_module)['assign_vehicle']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_vehicle_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['assign_vehicle']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_vehicle_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['assign_vehicle']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_vehicle_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['assign_vehicle']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_vehicle_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Asign driver</td>
                                        <td>
                                            <input {{ json($permits->transport_module)['assign_driver']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_driver_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['assign_driver']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_driver_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['assign_driver']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_driver_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->transport_module)['assign_driver']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="assign_driver_delete" value="1">
                                        </td>
                                    </tr>
                                </div>

                                <div class="event_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Event</b></td>
                                        <td>All event & add event</td>
                                        <td>
                                            <input {{ json($permits->event_module)['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="event_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->event_module)['add'] == 1 ? 'CHECKED' : '' }}  type="checkbox" name="event_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->event_module)['edit'] == 1 ? 'CHECKED' : '' }}  type="checkbox" name="event_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->event_module)['delete'] == 1 ? 'CHECKED' : '' }}  type="checkbox" name="event_delete" value="1">
                                        </td>
                                    </tr>
                                </div>
                                
                                <div class="employee_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Employee</b></td>
                                        <td>Employee list & Add employee</td>
                                        <td>
                                            <input {{ json($permits->employee_module)['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="employee_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->employee_module)['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="employee_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->employee_module)['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="employee_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->employee_module)['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="employee_delete" value="1">
                                        </td>
                                    </tr>
                                </div>
                                
                                <div class="Human_resource_module">

                                    <tr class="text-left">
                                        <td class="text-dark"><b>Human_resource</b></td>
                                        <td>Employee attendance</td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['employee_attendance']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="emp_attendance_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['employee_attendance']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="emp_attendance_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['employee_attendance']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="emp_attendance_edit" value="1">
                                        </td>
                                        <td></td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Employee salary</td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['employee_salary']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="emp_salary_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['employee_salary']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="emp_salary_add" value="1">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Leave apply</td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['leave_apply']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="leave_apply_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['leave_apply']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="leave_apply_add" value="1">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Leave approval</td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['leave_approval']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="leave_approval_view" value="1">
                                        </td>
                                        <td></td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['leave_approval']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="leave_approval_edit" value="1">
                                        </td>
                                        <td></td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Leave type</td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['leave_type']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="leave_type_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['leave_type']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="leave_type_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['leave_type']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="leave_type_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->human_resource_module)['leave_type']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="leave_type_delete" value="1">
                                        </td>
                                    </tr>
                                </div> 

                                <div class="income_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Income</b></td>
                                        <td>Income</td>
                                        <td>
                                            <input {{ json($permits->income_module)['income']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="income_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->income_module)['income']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="income_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->income_module)['income']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="income_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->income_module)['income']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="income_delete" value="1">
                                        </td>
                                    </tr>

                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Income Search</td>
                                        <td>
                                            <input {{ json($permits->income_module)['income_search']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="income_search_view" value="1">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Income header</td>
                                        <td>
                                            <input {{ json($permits->income_module)['income_header']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="income_header_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->income_module)['income_header']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="income_header_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->income_module)['income_header']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="income_header_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->income_module)['income_header']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="income_header_delete" value="1">
                                        </td>
                                    </tr>
                                </div> 

                                <div class="expanse_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Expanse</b></td>
                                        <td>Expanse</td>
                                        <td>
                                            <input {{ json($permits->expanse_module)['expanse']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="expanse_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->expanse_module)['expanse']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="expanse_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->expanse_module)['expanse']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="expanse_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->expanse_module)['expanse']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="expanse_delete" value="1">
                                        </td>
                                    </tr>

                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Search</td>
                                        <td><input {{ json($permits->expanse_module)['expanse_search']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="expanse_search_view" value="1"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Expanse header</td>
                                        <td>
                                            <input {{ json($permits->expanse_module)['expanse_header']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="expanse_header_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->expanse_module)['expanse_header']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="expanse_header_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->expanse_module)['expanse_header']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="expanse_header_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->expanse_module)['expanse_header']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="expanse_header_delete" value="1">
                                        </td>
                                    </tr>
                                </div> 

                                <div class="attachment_module">  
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Attachment book</b></td>
                                        <td>Attachment type</td>
                                        <td>
                                            <input {{ json($permits->attachment_book_module)['attachment_type']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="attachment_type_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attachment_book_module)['attachment_type']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="attachment_type_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attachment_book_module)['attachment_type']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="attachment_type_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attachment_book_module)['attachment_type']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="attachment_type_delete" value="1">
                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Upload content</td>
                                        <td>
                                            <input {{ json($permits->attachment_book_module)['upload_content']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="upload_content_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attachment_book_module)['upload_content']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="upload_content_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attachment_book_module)['upload_content']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="upload_content_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->attachment_book_module)['upload_content']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="upload_content_delete" value="1">
                                        </td>
                                    </tr>
                                </div> 

                                <div class="office_account_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Office account</b></td>
                                        <td>Bank</td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['bank']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="bank_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['bank']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="bank_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['bank']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="bank_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['bank']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="bank_delete" value="1">
                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b> </b></td>
                                        <td>Accounts</td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['account']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="account_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['account']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="account_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['account']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="account_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['account']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="account_delete" value="1">
                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b> </b></td>
                                        <td>Deposit</td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['deposit']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="deposit_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['deposit']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="deposit_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['deposit']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="deposit_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['deposit']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="deposit_delete" value="1">
                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b> </b></td>
                                        <td>Withdraw</td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['withdraw']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="withdraw_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['withdraw']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="withdraw_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['withdraw']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="withdraw_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['withdraw']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="withdraw_delete" value="1">
                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b> </b></td>
                                        <td>Voucher header</td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['voucher_header']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="voucher_header_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['voucher_header']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="voucher_header_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['voucher_header']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="voucher_header_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->office_accounts_module)['voucher_header']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="voucher_header_delete" value="1">
                                        </td>
                                    </tr>  
                                </div> 

                                <div class="hostel_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b> Hostel </b></td>
                                        <td>Hostel room</td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['hostel_room']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="hostel_room_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['hostel_room']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="hostel_room_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['hostel_room']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="hostel_room_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['hostel_room']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="hostel_room_delete" value="1">
                                        </td>
                                    </tr>

                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Room type</td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['room_type']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="room_type_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['room_type']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="room_type_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['room_type']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="room_type_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['room_type']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="room_type_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Hostel</td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['hostel']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="hostel_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['hostel']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="hostel_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['hostel']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="hostel_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->hostel_module)['hostel']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="hostel_delete" value="1">
                                        </td>
                                    </tr>
                                </div>

                                <div class="library_module">
                                    <tr class="text-left">
                                        <td class="text-dark"><b>Library</b></td>
                                        <td>Book list</td>
                                        <td>
                                            <input {{ json($permits->library_module)['book_list']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="book_list_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->library_module)['book_list']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="book_list_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->library_module)['book_list']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="book_list_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->library_module)['book_list']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="book_list_delete" value="1">
                                        </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Library member</td>
                                        <td>
                                            <input {{ json($permits->library_module)['library_member']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="library_member_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->library_module)['library_member']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="library_member_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->library_module)['library_member']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="library_member_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->library_module)['library_member']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="library_member_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Library staff</td>
                                        <td>
                                            <input {{ json($permits->library_module)['library_staff']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="library_staff_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->library_module)['library_staff']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="library_staff_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->library_module)['library_staff']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="library_staff_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->library_module)['library_staff']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="library_staff_delete" value="1">
                                        </td>
                                    </tr>
                                </div> 
                                
                                <div class="fees_collection_module">

                                    <tr class="text-left">
                                        <td class="text-dark"><b>Fees collection</b></td>
                                        <td>Fees remember</td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_remember']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_remember_view" value="1">
                                        </td>
                                        <td></td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_remember']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_remember_edit" value="1">
                                        </td>
                                        <td></td>
                                    </tr>

                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Fees type</td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_type']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_type_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_type']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_type_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_type']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_type_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_type']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_type_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Fees discount</td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_discount']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_discount_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_discount']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_discount_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_discount']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_discount_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_discount']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_discount_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Fees group</td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_group']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_group_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_group']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_group_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_group']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_group_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_group']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_group_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Fees master</td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_master']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_master_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_master']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_master_add" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_master']['edit'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_master_edit" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_master']['delete'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_master_delete" value="1">
                                        </td>
                                    </tr>
                                    
                                    <tr class="text-left">
                                        <td class="text-dark"><b></b></td>
                                        <td>Fees collection</td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_collection']['view'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_collection_view" value="1">
                                        </td>
                                        <td>
                                            <input {{ json($permits->fees_collection_module)['fees_collection']['add'] == 1 ? 'CHECKED' : '' }} type="checkbox" name="fees_collection_add" value="1">
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </div> 
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-sm btn-blue float-right submit_button">Submit</button>
                        <button type="button" class="btn btn-sm btn-blue float-right display_none loading_button">Loading...</button>
                    </form>    
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@push('js')
    <script>
        $(document).ready(function () {
            
            $(document).on('submit', '#role_permission_form', function(e){
                e.preventDefault(); 
                $('.submit_button').hide();
                $('.loading_button').show();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data:request,
                    success:function(data){
                       $('.submit_button').show();
                       $('.loading_button').hide();
                       toastr.success(data);
                    }
                });
            
            });
        });  
    </script>
@endpush