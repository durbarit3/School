    <style>
        .text_active {color: cornflowerblue!important;font-size: 0.9em !important;font-weight: 600 !important;letter-spacing: 0.6px;font-family: unset;}
        .text_active:hover {background: white !important;}
    </style>
@php
    function jsn($data) {
        return json_decode($data, true);
    }  
@endphp
<aside class="sidebar-wrapper ">
    <nav class="sidebar-nav">
        <ul class="metismenu" id="menu1">
            <li class="single-nav-wrapper">
                <a href="{{ route('admin.home') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Home</span>
                </a>
            </li>

            @if (jsn($userPermits->student_module)['add'] == 0 AND jsn($userPermits->student_module)['view'] == 0)
                <li></li>
            @else 
                <li class="single-nav-wrapper {{ Request::is('admin/student*') ? 'mm-active' : '' }}">
                    <a class="has-arrow menu-item" href="#" aria-expanded="false">
                        <span class="left-icon"><i class="fas fa-user-edit"></i></span>
                        <span class="menu-text">Student</span>
                    </a>
                    <ul class="dashboard-menu">
                        <li>
                            @if ( jsn($userPermits->student_module, true)['view'] == 1)
                                <a class="{{ Request::is('admin/student/create') ? 'text_active' : '' }}" href="{{ route('student.create') }}"> Student Admission</a>
                            @endif
                            {{-- {{ Request::is('admin/student/all') ? 'text_active' : '' }} --}}
                            @if (jsn($userPermits->student_module, true)['add'] == 1 )
                                <a class="
                                @if(Request::is('admin/student/all') OR Request::is('admin/student/details*') OR Request::is('admin/student/edit*'))
                                    text_active
                                @endif
                                " href="{{ route('student.index') }}"> Student Details</a>
                            @endif
                        </li>
                    </ul>
                </li>
            @endif

            <li class="single-nav-wrapper">
                <a href="{{ route('category.index') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Categories</span>
                </a>
            </li>

            @if (jsn($userPermits->academic_module)['class']['view'] == 0 AND jsn($userPermits->academic_module)['session']['view'] == 0 AND jsn($userPermits->academic_module)['section']['view'] == 0 AND jsn($userPermits->academic_module)['subject']['view'] == 0 AND jsn($userPermits->academic_module)['assign_class_teacher']['view'] == 0 AND jsn($userPermits->academic_module)['assign_subject']['view'] == 0 AND jsn($userPermits->academic_module)['Assign_teacher_to_subject']['view'] == 0 AND jsn($userPermits->academic_module)['class_timetable']['view'] == 0 AND jsn($userPermits->academic_module)['teacher_timetable']['view'] == 0)
                <li></li>
            @else 
                <li class="single-nav-wrapper {{ Request::is('admin/academic*') ? 'mm-active' : '' }}">
                    <a class="has-arrow menu-item" href="#" aria-expanded="false">
                        <span class="left-icon"><i class="fas fa-school"></i></span>
                        <span class="menu-text">Academic</span>
                    </a>
                    <ul class="dashboard-menu">

                        <li>
                            @if (jsn($userPermits->academic_module)['class']['view'] == 1)
                                <a class="{{ Request::is('admin/academic/class') ? 'text_active' : '' }}" href="{{ route('admin.class.index') }}"> Class</a>
                            @endif

                            @if (jsn($userPermits->academic_module)['section']['view'] == 1)
                                <a class="{{ Request::is('admin/academic/section') ? 'text_active' : '' }}" href="{{ route('admin.academic.section.index') }}"> Section </a>
                            @endif

                            @if (jsn($userPermits->academic_module)['subject']['view'] == 1)
                                <a class="{{ Request::is('admin/academic/subject') ? 'text_active' : '' }}" href="{{ route('admin.academic.subject.index') }}"> Subject </a>
                            @endif  

                        </li>

                        <li>
                            @if (jsn($userPermits->academic_module)['assign_class_teacher']['view'] == 1)
                                <a class="{{ Request::is('admin/academic/assign/class/teachers') ? 'text_active' : '' }}" href="{{ route('academic.assign.class.teacher.index') }}"> Asign class teacher</a>
                            @endif
                        </li>
                        <li>
                            @if (jsn($userPermits->academic_module)['assign_subject']['view'] == 1)
                                <a class="{{ Request::is('admin/academic/assign/subjects') ? 'text_active' : '' }}" href="{{ route('admin.academic.assign.all.assigned.subject') }}"> Asign subject to class</a>
                            @endif

                            @if (jsn($userPermits->academic_module)['Assign_teacher_to_subject']['view'] == 1)
                                <a class="{{ Request::is('admin/academic/assign/subject/teachers') ? 'text_active' : '' }}"  href="{{ route('academic.assign.subject.teacher.index') }}">Asign Teacher to Subject</a>
                            @endif
                        </li>
                        <li>
                            @if (jsn($userPermits->academic_module)['class_timetable']['view'] == 1)
                                <a class="{{ Request::is('admin/academic/class/timetable*') ? 'text_active' : '' }}"  href="{{ route('admin.class.timetable.search') }}"> Class Timetable </a>
                            @endif
                        </li>
                        <li>
                            @if (jsn($userPermits->academic_module)['teacher_timetable']['view'] == 1)
                                <a class="{{ Request::is('admin/academic/teacher/timetable') ? 'text_active' : '' }}"  href="{{ route('admin.academic.teacher.timetable.index') }}"> Teacher Timetable </a>
                            @endif
                        </li>

                    </ul>
                </li>
            @endif

            <li class="single-nav-wrapper {{ Request::is('admin/exam/master*') ? 'mm-active' : '' }} ">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-diagnoses"></i></span>
                    <span class="menu-text">Exam master</span>
                </a>
                <ul style="border-left:2px solid white; border-bottom:2px solid white;" class="dashboard-menu mb-2">
                    <li class="p-0">

                        @if (jsn($userPermits->exam_module)['exam']['term']['view'] == 0 AND jsn($userPermits->exam_module)['exam']['hall']['view'] == 0 AND jsn($userPermits->exam_module)['exam']['distribution']['view'] == 0 AND jsn($userPermits->exam_module)['exam']['exam_setup']['view'] == 0)
                            <li></li>  
                        @else 
                            <li class="{{ Request::is('admin/exam/master/exam*') ? 'mm-active' : '' }} my-1 ml-2 p-0">
                                <a class="has-arrow {{ Request::is('admin/exam/master/exam*') ? 'menu-item' : '' }}" href="#" aria-expanded="false">
                                    <span class="left-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <span class="menu-text">&nbsp;&nbsp;Exam</span>
                                </a>
                                <ul class=" ml-2">
                                    @if (jsn($userPermits->exam_module)['exam']['term']['view'] == 1)
                                    <a class="{{ Request::is('admin/exam/master/exam/terms') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.exam.term.index') }}">
                                        Term
                                    </a>
                                    @endif

                                    @if (jsn($userPermits->exam_module)['exam']['hall']['view'] == 1)
                                        <a class="{{ Request::is('admin/exam/master/exam/halls') ? 'text_active' : '' }}"
                                        href="{{ route('admin.exam.master.exam.hall.index') }}">
                                            Hall
                                        </a>
                                    @endif

                                    @if (jsn($userPermits->exam_module)['exam']['distribution']['view'] == 1)
                                    <a class="{{ Request::is('admin/exam/master/exam/distributions') ? 'text_active' : '' }}"
                                    href="{{ route('admin.exam.master.exam.distribution.index') }}">
                                        Distribution
                                    </a>
                                    @endif

                                    @if (jsn($userPermits->exam_module)['exam']['exam_setup']['view'] == 1)
                                    <a class="{{ Request::is('admin/exam/master/exam/exams') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.exam.index') }}">Exam Setup</a>
                                    @endif
                                </ul>
                            </li>   
                        @endif

                        @if (jsn($userPermits->exam_module)['exam_schedule']['create_schedule']['view'] == 0 AND jsn($userPermits->exam_module)['exam_schedule']['check_schedule']['view'] == 0)
                            <li></li> 
                        @else 
                            
                            <li class="{{ Request::is('admin/exam/master/schedules*') ? 'mm-active' : '' }} my-1 ml-2 p-0">
                                <a class="has-arrow {{ Request::is('admin/exam/master/schedules*') ? 'menu-item' : '' }}" href="#" aria-expanded="false">
                                    <span class="left-icon"><i class="far fa-calendar-alt"></i></span>
                                    <span class="menu-text">&nbsp;&nbsp;Exam Schedule</span>
                                </a>

                                <ul class=" ml-2">
                                    
                                    @if (jsn($userPermits->exam_module)['exam_schedule']['create_schedule']['add'] == 1)
                                        <a class="{{ Request::is('admin/exam/master/schedules/create') ? 'text_active' : '' }}"  href="{{ route('admin.exam.master.schedule.create') }}">
                                            Create Schedule
                                        </a>
                                    @endif

                                    @if (jsn($userPermits->exam_module)['exam_schedule']['create_schedule']['view'] == 1)
                                        <a class="{{ Request::is('admin/exam/master/schedules/check') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.schedule.check.index') }}">Check Schedule</a>
                                    @endif
                                </ul>
                            </li>  
                        @endif

                        @if (jsn($userPermits->exam_module)['mark']['mark_entire']['view'] == 0 AND jsn($userPermits->exam_module)['mark']['grade_range']['view'] == 0 AND jsn($userPermits->exam_module)['mark']['exam_report_card']['view'] == 0)
                        <li></li> 
                        @else
                            <li class="{{ Request::is('admin/exam/master/mark*') ? 'mm-active' : '' }} my-1 ml-2 p-0">
                                <a class="{{ Request::is('admin/exam/master/mark*') ? 'menu-item' : '' }} has-arrow" href="#" aria-expanded="false">
                                    <span class="left-icon"><i class="fas fa-marker"></i></span>
                                    <span class="menu-text">&nbsp;&nbsp;Marks</span>
                                </a>
                                <ul class=" ml-2">
                                    @if(jsn($userPermits->exam_module)['mark']['mark_entire']['view'] == 1)
                                    <a class="{{ Request::is('admin/exam/master/mark/entires') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.mark.entire.index') }}">
                                        Mark Entries
                                    </a>
                                    @endif

                                    @if(jsn($userPermits->exam_module)['mark']['grade_range']['view'] == 1)
                                    <a class="{{ Request::is('admin/exam/master/mark/grade/range') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.mark.grade.range.index') }}">
                                        Greads Range
                                    </a>
                                    @endif

                                    @if(jsn($userPermits->exam_module)['mark']['exam_report_card']['view'] == 1)
                                        <a class="{{ Request::is('admin/exam/master/mark/report/card') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.report.card.index') }}">
                                            Report Card
                                        </a>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if (jsn($userPermits->exam_module)['admit_card']['design_admit_card']['view'] == 0 AND jsn($userPermits->exam_module)['admit_card']['print_admit_card']['view'] == 0)
                            <li></li>
                        @else 
                            <li class="{{ Request::is('admin/exam/master/admit/card*') ? 'mm-active' : '' }} my-1 ml-2 p-0">
                                <a class="{{ Request::is('admin/exam/master/admin/card*') ? 'menu-item' : '' }} has-arrow" href="#" aria-expanded="false">
                                    <span class="left-icon"><i class="fas fa-marker"></i></span>
                                    <span class="menu-text">&nbsp;&nbsp;Admit Card</span>
                                </a>
                                <ul class=" ml-2">
                                    <a class="{{ Request::is('admin/exam/master/admit/card/designees') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.admit.card.design.index') }}">
                                        Design Admit Card
                                    </a>
                                    <a class="{{ Request::is('admin/exam/master/admit/card/print') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.admit.card.print.index') }}">
                                        Print Admit Card
                                    </a>
                                </ul>
                            </li>
                        @endif

                    </li>
                </ul>
            </li>
            
            @if (jsn($userPermits->attendance_module)['attendance']['view'] == 0 AND jsn($userPermits->attendance_module)['period_attendance']['view'] == 0 AND jsn($userPermits->attendance_module)['exam_attendance']['view'] == 0)
                <li></li> 
            @else
                @if ($generalSettings->current_day_attendance == 1 OR $generalSettings->period_attendance == 1 OR $generalSettings->exam_attendance == 1)
                    <li class="single-nav-wrapper {{ Request::is('admin/attendance*') ? 'mm-active' : '' }}">
                        <a class="has-arrow menu-item" href="#" aria-expanded="false">
                            <span class="left-icon"> <i class="fas fa-hand-paper"></i></span>
                            <span class="menu-text">Attendance</span>
                        </a>

                        <ul class="dashboard-menu">

                            @if ($generalSettings->current_day_attendance == 1)

                                @if (jsn($userPermits->attendance_module)['attendance']['add'] == 1)
                                    <li>
                                        <a class="{{ Request::is('admin/attendance/current/day') ? 'text_active' : '' }}"
                                            href="{{ route('admin.attendance.current.day.attendance.select.criteria') }}">Attendance</a>
                                    </li>
                                @endif

                                @if (jsn($userPermits->attendance_module)['attendance']['view'] == 1)
                                <li>
                                    <a style="font-size:12.5px"
                                        class="{{ Request::is('admin/attendance/current/day/by/date') ? 'text_active' : '' }}"
                                        href="{{ route('admin.attendance.current.day.by.date.attendance.select.criteria') }}">Attendance By Date</a>
                                </li>
                                @endif

                            @endif

                            @if ($generalSettings->period_attendance == 1)
                                @if (jsn($userPermits->attendance_module)['period_attendance']['add'] == 1)
                                    <li>
                                        <a class="{{ Request::is('admin/attendance/period') ? 'text_active' : '' }}"
                                            href="{{ route('admin.attendance.period.attendance.search') }}">Period Attendance
                                        </a>
                                    </li>
                                @endif

                                @if (jsn($userPermits->attendance_module)['period_attendance']['view'] == 1)
                                    <li>
                                        <a class="{{ Request::is('admin/attendance/period/by/date/search*') ? 'text_active' : '' }}"
                                            href="{{ route('admin.attendance.period.by.date.attendance.search') }}">period attendance By Date</a>
                                    </li>
                                @endif
                            @endif
                            @if ($generalSettings->exam_attendance == 1)

                                @if (jsn($userPermits->attendance_module)['exam_attendance']['add'] == 1)   
                                <li>
                                    <a class="{{ Request::is('admin/attendance/exam/attendance') ? 'text_active' : '' }}" href="{{ route('admin.attendance.exam.attendance.index') }}">Exam attendance</a>
                                </li>
                                @endif

                                @if (jsn($userPermits->attendance_module)['exam_attendance']['view'] == 1) 
                                <li>
                                    <a class="{{ Request::is('admin/attendance/exam/attendance/modify') ? 'text_active' : '' }}" href="{{ route('admin.attendance.exam.attendance.modify.index') }}">Exam attendance By date</a>
                                </li>
                                @endif
                            @endif

                        </ul>
                        
                @endif
            @endif

            @if (jsn($userPermits->transport_module)['route']['view'] == 0 AND jsn($userPermits->transport_module)['vehicle']['view'] == 0 AND jsn($userPermits->transport_module)['assign_vehicle']['view'] == 0 AND jsn($userPermits->transport_module)['assign_driver']['view'] == 0)
                <li></li> 
            @else  
            <li class="single-nav-wrapper {{ Request::is('admin/transport*') ? 'mm-active' : '' }}">

                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <i class="fas fa-shuttle-van"></i><span class="menu-text">Transport</span>
                </a>
                
                <ul class="dashboard-menu">
                    @if (jsn($userPermits->transport_module)['route']['view'] == 1)
                        <li><a class="{{ Request::is('admin/transport/route') ? 'text_active' : '' }}" href="{{ route('admin.route.index') }}">Routes</a></li>
                    @endif

                    @if (jsn($userPermits->transport_module)['vehicle']['view'] == 1)
                        <li><a class="{{ Request::is('admin/transport/vehicles') ? 'text_active' : '' }}" href="{{ route('admin.vehicle.index') }}">Vehicles</a></li>
                    @endif

                    @if (jsn($userPermits->transport_module)['assign_vehicle']['view'] == 1)
                        <li><a class="{{ Request::is('admin/transport/assign/vehicle') ? 'text_active' : '' }}" href="{{ route('admin.assign.vehicle.index') }}">Assign Vehicle</a></li>
                    @endif

                    @if (jsn($userPermits->transport_module)['assign_driver']['view'] == 1)
                        <li><a class="{{ Request::is('admin/transport/assign/vehicle/driver') ? 'text_active' : '' }}" href="{{ route('admin.assign.vehicle.driver.index') }}">Assign Driver</a></li>
                    @endif
                </ul>
            </li>  
            @endif

            @if (jsn($userPermits->event_module)['view'] == 0 AND jsn($userPermits->event_module)['view'] == 0)
                <li></li>
            @else 
                <li class="single-nav-wrapper {{ Request::is('admin/event*') ? 'mm-active' : '' }}">
                    <a class="has-arrow menu-item" href="#" aria-expanded="false">
                        <span class="left-icon"><i class="far fa-calendar-alt"></i></span>
                        <span class="menu-text">Event</span>
                    </a>
                    <ul class="dashboard-menu">

                        @if (jsn($userPermits->event_module)['view'] == 1)
                            <li><a class="{{ Request::is('admin/event/all') ? 'text_active' : '' }}" href="{{ route('event.index.all') }}">All Event</a></li>
                        @endif

                        @if (jsn($userPermits->event_module)['add'] == 1)
                            <li><a class="{{ Request::is('admin/event/create') ? 'text_active' : '' }}" href="{{ route('event.create') }}">Add Event</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            
            @if (jsn($userPermits->employee_module)['view'] == 0 AND jsn($userPermits->employee_module)['add'] == 0)
                <li></li>
            @else   
                <li class="single-nav-wrapper {{ Request::is('admin/employee*') ? 'mm-active' : '' }}">
                    <a class="has-arrow menu-item" href="#" aria-expanded="false">
                        <span class="left-icon"><i class="fas fa-users"></i></span>
                        <span class="menu-text">Emplyees</span>
                    </a>
                    <ul class="dashboard-menu">

                        @if (jsn($userPermits->employee_module)['view'] == 1)
                            <li><a class="{{ Request::is('admin/employees/all*') ? 'text_active' : '' }}" href="{{ route('admin.employee.all.admins') }}">Employee List</a></li>
                        @endif

                        @if (jsn($userPermits->employee_module)['add'] == 1)
                        <li><a class="{{ Request::is('admin/employees/create') ? 'text_active' : '' }}" href="{{ route('admin.employee.create') }}">Add Employee</a></li>
                        @endif

                        <li><a class="{{ Request::is('admin/employees/department*') ? 'text_active' : '' }}" href="{{ route('admin.employee.department.index') }}">Department</a></li>
                    </ul>
                </li>
            @endif

            @if (jsn($userPermits->human_resource_module)['employee_attendance']['view'] == 0 AND jsn($userPermits->human_resource_module)['employee_salary']['view'] == 0 AND jsn($userPermits->human_resource_module)['leave_approval']['view'] == 0 AND jsn($userPermits->human_resource_module)['leave_apply']['view'] == 0 AND jsn($userPermits->human_resource_module)['leave_type']['view'] == 0)
                <li></li>
            @else
             <li class="single-nav-wrapper {{ Request::is('admin/human_resource*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                    <span class="menu-text">Human Resorce</span>
                </a>
                <ul class="dashboard-menu">

                    @if (jsn($userPermits->human_resource_module)['employee_attendance']['view'] == 1)
                    <li><a class="{{ Request::is('admin/human_resource/employee/attendance*') ? 'text_active' : '' }}" href="{{ route('admin.hr.employee.attendance.index') }}">Employee attendance</a></li>
                    @endif

                    @if (jsn($userPermits->human_resource_module)['employee_salary']['view'] == 1)
                    <li><a class="{{ Request::is('admin/human_resource/employee/salary*') ? 'text_active' : '' }}" href="{{ route('admin.hr.employee.salary.index') }}">Employee salary</a></li>
                    @endif

                    @if (jsn($userPermits->human_resource_module)['leave_apply']['view'] == 1)
                    <li><a class="{{ Request::is('admin/human_resource/leave/apply*') ? 'text_active' : '' }}" href="{{ route('admin.hr.leave.apply.index') }}">Leave apply</a></li>
                    @endif

                    @if (jsn($userPermits->human_resource_module)['leave_approval']['view'] == 1)
                    <li><a class="{{ Request::is('admin/human_resource/leave/approval*') ? 'text_active' : '' }}" href="{{ route('admin.hr.leave.approval.index') }}">Leave approval</a></li>
                    @endif

                    @if (jsn($userPermits->human_resource_module)['leave_type']['view'] == 1)
                    <li><a class="{{ Request::is('admin/human_resource/leave/type*') ? 'text_active' : '' }}" href="{{ route('admin.hr.leave.type.index') }}">Leave type</a></li>
                    @endif
                </ul>
            </li>
            @endif

            @if (jsn($userPermits->income_module)['income']['view'] == 0 AND jsn($userPermits->income_module)['income_search']['view'] == 0 AND jsn($userPermits->income_module)['income_header']['view'] == 0)
                <li></li>
            @else
            <li class="single-nav-wrapper {{ Request::is('admin/incomes*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-hand-holding-usd"></i></span>
                    <span class="menu-text">Incomes</span>
                </a>
                <ul class="dashboard-menu">

                    @if (jsn($userPermits->income_module)['income']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/incomes/all') ? 'text_active' : '' }}" href="{{ route('admin.income.index') }}">Income</a>
                        </li>
                    @endif

                    @if (jsn($userPermits->income_module)['income_search']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/incomes/search') ? 'text_active' : '' }}" href="{{ route('admin.income.search.index') }}">Search income</a>
                        </li>
                    @endif

                    @if (jsn($userPermits->income_module)['income_header']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/incomes/headers') ? 'text_active' : '' }}" href="{{ route('admin.income.header.all') }}">Income header</a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif

            @if (jsn($userPermits->expanse_module)['expanse']['view'] == 0 AND jsn($userPermits->expanse_module)['expanse_search']['view'] == 0 AND jsn($userPermits->expanse_module)['expanse_header']['view'] == 0)
                <li></li>
            @else
            <li class="single-nav-wrapper {{ Request::is('admin/expanses*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-file-invoice-dollar"></i></span>
                    <span class="menu-text">Expanses</span>
                </a>
                <ul class="dashboard-menu">
                    @if (jsn($userPermits->expanse_module)['expanse']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/expanses/all') ? 'text_active' : '' }}" href="{{ route('admin.expanse.index') }}">
                                expanse
                            </a>
                        </li>
                    @endif  

                    @if (jsn($userPermits->expanse_module)['expanse_search']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/expanses/search') ? 'text_active' : '' }}"  href="{{ route('admin.expanse.search.index') }}">Search expanse
                            </a>
                        </li>
                    @endif

                    @if (jsn($userPermits->expanse_module)['expanse_header']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/expanses/headers') ? 'text_active' : '' }}"  href="{{ route('admin.expanse.header.all') }}">expanse header</a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif

            @if (jsn($userPermits->attachment_book_module)['attachment_type']['view'] == 0 AND jsn($userPermits->attachment_book_module)['upload_content']['view'] == 0)
                <li></li>
            @else
            <li class="single-nav-wrapper {{ Request::is('admin/attachment*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-file-invoice-dollar"></i></span>
                    <span class="menu-text">Attachment Book</span>
                </a>
                <ul class="dashboard-menu">

                    @if (jsn($userPermits->attachment_book_module)['attachment_type']['view'] == 1)
                        <li>
                            <a href="{{ route('admin.attachment.type.index') }}" class="{{ Request::is('admin/attachment/types') ? 'text_active' : '' }}">
                                Attachment Type
                            </a>
                        </li>
                    @endif
                    @if (jsn($userPermits->attachment_book_module)['upload_content']['view'] == 1)
                        <li>
                            <a href="{{ route('admin.attachment.upload.content.index') }}" class="{{ Request::is('admin/attachment/upload/contents') ? 'text_active' : '' }}">
                                Upload Content 
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            @endif

            @if (jsn($userPermits->office_accounts_module)['bank']['view'] == 0 AND jsn($userPermits->office_accounts_module)['account']['view'] == 0 AND jsn($userPermits->office_accounts_module)['deposit']['view'] == 0 AND jsn($userPermits->office_accounts_module)['withdraw']['view'] == 0 AND jsn($userPermits->office_accounts_module)['voucher_header']['view'] == 0)
                <li></li>
            @else
            <li class="single-nav-wrapper {{ Request::is('admin/office/accounts*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-calculator"></i></span>
                    <span class="menu-text">Office Accounts</span>
                </a>
                <ul class="dashboard-menu">

                    @if (jsn($userPermits->office_accounts_module)['bank']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/office/accounts/bank') ? 'text_active' : '' }}" href="{{ route('admin.office.account.bank.index') }}">Bank</a>
                        </li>
                    @endif

                    @if (jsn($userPermits->office_accounts_module)['account']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/office/accounts/bank_accounts') ? 'text_active' : '' }}" href="{{ route('admin.office.account.bank.account.index') }}">Accounts</a>
                        </li>
                    @endif

                    @if (jsn($userPermits->office_accounts_module)['deposit']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/office/accounts/deposits') ? 'text_active' : '' }}" href="{{ route('admin.office.account.deposit.index') }}">Deposits</a>
                        </li>
                    @endif
                    
                    @if (jsn($userPermits->office_accounts_module)['withdraw']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/office/accounts/withdraws') ? 'text_active' : '' }}" href="{{ route('admin.office.account.withdraw.index') }}">Witdraws</a>
                        </li>
                    @endif

                    @if (jsn($userPermits->office_accounts_module)['voucher_header']['view'] == 1)
                        <li>
                            <a class="{{ Request::is('admin/office/accounts/voucher/header') ? 'text_active' : '' }}" href="{{ route('admin.office.account.voucher_header.index') }}">Voucher Header</a>
                        </li>
                   @endif

                </ul>
            </li>
            @endif
            
            <!-- Menus Area start from here -->

            <li class="single-nav-wrapper {{ Request::is('admin/communication*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="far fa-comments"></i></span>
                    <span class="menu-text">Communication</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a class="{{ Request::is('admin/communication/message') ? 'text_active' : '' }}" href="{{ route('admin.communication.message.inbox') }}">Message Via Mail</a></li>
                    <li><a class="" href="">Message Via Sms</a></li>
                </ul>
            </li>
            
            <!-- Menus area end from here -->


            <!-- Hostel area start -->
            
            <li class="single-nav-wrapper {{ Request::is('admin/hostel*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Hostel</span>
                </a>

                <ul class="dashboard-menu">
                    <li><a class="{{ Request::is('admin/hostel/add/room') ? 'text_active' : '' }}" href="{{route('hostel.addroom')}}">Hostel Room</a></li>
                    <li><a class="{{ Request::is('admin/hostel/room/type*') ? 'text_active' : '' }}" href="{{route('room.type')}}">Room Type</a></li>
                    <li><a class="{{ Request::is('admin/hostel') ? 'text_active' : '' }}" href="{{route('admin.hostel')}}">Hostel</a></li>
                </ul>
            </li>

            <!-- Hostel area end -->

            <!-- Hostel area start -->
            @if (jsn($userPermits->inventory_module)['inventory_issue']['view'] == 0 AND jsn($userPermits->inventory_module)['add_item_stock']['view'] == 0 AND jsn($userPermits->inventory_module)['item_category']['view'] == 0 AND jsn($userPermits->inventory_module)['item_store']['view'] == 0 AND jsn($userPermits->inventory_module)['item_supplier']['view'] == 0 AND
            jsn($userPermits->inventory_module)['add_item']['view'] == 0)
                <li></li>
            @else 
            <li class="single-nav-wrapper {{ Request::is('admin/inventory*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Inventory</span>
                </a>
                <ul class="dashboard-menu">
                    <li>
                        <a class="{{ Request::is('admin/inventory/issue') ? 'text_active' : '' }}" href="{{route('admin.inventory.issue')}}">Issue Inventory</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/inventory/item/stock') ? 'text_active' : '' }}" href="{{route('inventory.item.stock.index')}}">Add Item Stock</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/inventory/category') ? 'text_active' : '' }}" href="{{route('inventory.category.index')}}">Item Category</a>
                    </li>
                    <li>
                        <a {{ Request::is('admin/inventory/item') ? 'text_active' : '' }} href="{{route('item.index')}}">Items Store</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/inventory/supplier') ? 'text_active' : '' }}" href="{{route('admin.inventory.supplier')}}">Supplier</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/inventory/item/add/items') ? 'text_active' : '' }}" href="{{route('admin.item.index')}}">Add Items</a>
                    </li>
                </ul>
            </li>
            @endif
            <!-- Hostel area end -->

            @if (jsn($userPermits->library_module)['book_list']['view'] == 0 AND jsn($userPermits->library_module)['library_member']['view'] == 0 AND jsn($userPermits->library_module)['library_staff']['view'] == 0 AND jsn($userPermits->library_module)['book_issue']['view'] == 0)
                <li></li>
            @else 
               <li class="single-nav-wrapper {{ Request::is('admin/library*') ? 'mm-active' : '' }}">
                    <a class="has-arrow menu-item" href="#" aria-expanded="false">
                        <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                        <span class="menu-text">Library</span>
                    </a>
                    <ul class="dashboard-menu">
                        @if (jsn($userPermits->library_module)['book_issue']['view'] == 1)
                            <li><a class="{{ Request::is('admin/library/issue') ? 'text_active' : '' }}" href="{{route('admin.book.issue')}}">Book Issue</a></li>
                        @endif

                        @if (jsn($userPermits->library_module)['book_list']['view'] == 1)
                            <li><a class="{{ Request::is('admin/library/books') ? 'text_active' : '' }}" href="{{route('admin.book.index')}}">Book List</a></li>
                        @endif

                        @if (jsn($userPermits->library_module)['library_member']['view'] == 1)
                            <li><a class="{{ Request::is('admin/library/member') ? 'text_active' : '' }}" href="{{route('admin.library.members')}}">Library Member</a></li>
                        @endif

                        @if (jsn($userPermits->library_module)['library_staff']['view'] == 1)
                            <li><a class="{{ Request::is('admin/library/staff') ? 'text_active' : '' }}" href="{{route('admin.library.staff')}}">Library Staff</a></li>
                        @endif
                    </ul>
                </li>
            @endif

           
            @if (jsn($userPermits->fees_collection_module)['fees_remember']['view'] == 0 AND jsn($userPermits->fees_collection_module)['fees_type']['view'] == 0 AND jsn($userPermits->fees_collection_module)['fees_discount']['view'] == 0 AND jsn($userPermits->fees_collection_module)['fees_discount']['view'] == 0 AND jsn($userPermits->fees_collection_module)['fees_group']['view'] == 0 AND jsn($userPermits->fees_collection_module)['fees_master']['view'] == 0 AND jsn($userPermits->fees_collection_module)['fees_collection']['view'] == 0)
                <li></li>
            @else
                <li class="single-nav-wrapper {{ Request::is('admin/fees*') ? 'mm-active' : '' }}">
                    <a class="has-arrow menu-item" href="#" aria-expanded="false">
                        <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                        <span class="menu-text">Fees Collection</span>
                    </a>
                    <ul class="dashboard-menu">
                        @if (jsn($userPermits->fees_collection_module)['fees_remember']['view'] == 1)
                            <li><a class="{{ Request::is('admin/fees/reminder') ? 'text_active' : '' }}" href="{{route('admin.fees.reminder')}}">Fees Reminder</a></li>
                        @endif

                        @if (jsn($userPermits->fees_collection_module)['fees_type']['view'] == 1)
                            <li><a class="{{ Request::is('admin/fees/type') ? 'text_active' : '' }}" href="{{route('admin.fees.type')}}">Fees Types</a></li>
                        @endif

                        @if (jsn($userPermits->fees_collection_module)['fees_discount']['view'] == 1)
                            <li><a class="{{ Request::is('admin/fees/discount') ? 'text_active' : '' }}" href="{{route('admin.fees.discount')}}">Fees Discount</a></li>
                        @endif

                        @if (jsn($userPermits->fees_collection_module)['fees_group']['view'] == 1)
                            <li><a class="{{ Request::is('admin/fees/group') ? 'text_active' : '' }}" href="{{route('admin.fees.group')}}">Fees Group</a></li>
                        @endif

                        @if (jsn($userPermits->fees_collection_module)['fees_master']['view'] == 1)
                            <li><a class="{{ Request::is('admin/fees/master') ? 'text_active' : '' }}" href="{{route('admin.fees.master')}}">Fees Master</a></li>
                        @endif

                        @if (jsn($userPermits->fees_collection_module)['fees_collection']['view'] == 1)
                            <li><a class="{{ Request::is('admin/fees/collect*') ? 'text_active' : '' }}" href="{{route('admin.fees.collect')}}">Fees Collect</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            <li class="single-nav-wrapper {{ Request::is('admin/reports*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-file-invoice"></i></span>
                    <span class="menu-text">Reports</span>
                </a>
                <ul class="dashboard-menu">
                    <li>
                        <a class="{{ Request::is('admin/reports/student_report*') ? 'text_active' : '' }}" href="{{ route('admin.reports.student.report.index') }}">Student Report</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/reports/finance_report*') ? 'text_active' : '' }}" href="{{ route('admin.reports.finance.report.index') }}">Finance Report</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/reports/attendance_report*') ? 'text_active' : '' }}" href="{{ route('admin.reports.attendance.report.index') }}">Attendance Report</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/reports/human_resource_report*') ? 'text_active' : '' }}" href="{{ route('admin.report.human.resource.report.index') }}">Human resource</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/reports/hostel/report*') ? 'text_active' : '' }}" href="{{ route('admin.report.hostel.report.index') }}">Hostel report</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/reports/transport/report*') ? 'text_active' : '' }}" href="{{ route('admin.report.transport.report.index') }}">Transport report</a>
                    </li>
                    
                    <li>
                        <a class="{{ Request::is('admin/reports/library/report*') ? 'text_active' : '' }}" href="{{ route('admin.report.library.report.index') }}">Library report</a>
                    </li>
                    
                    <li>
                        <a class="{{ Request::is('admin/reports/inventory/report*') ? 'text_active' : '' }}" href="{{ route('admin.report.inventory.report.index') }}">Inventory report</a>
                    </li>
                </ul>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/settings*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Setting</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('admin.menu.setting')}}">Menus</a></li>
                    <li><a class="{{ Request::is('admin/settings/general') ? 'text_active' : '' }}" href="{{route('admin.settings.general.index')}}">General settings</a></li>

                    <li><a class="{{ Request::is('admin/settings/role_permission*') ? 'text_active' : '' }}" href="{{ route('admin.gen.settings.role.permit.index') }}">Role Permissions</a></li>
                    <li>
                        <a class="{{ Request::is('admin/settings/session') ? 'text_active' : '' }}" href="{{ route('admin.setting.session.index') }}"> Session</a>
                    </li>
                    <li><a href="{{route('admin.notification.setting')}}">Nofification settings</a></li>
                    <li><a href="{{route('admin.sms.setting')}}">SMS settings</a></li>
                </ul>
            </li>

            <!-- front cms -->
            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-shuttle-van"></i></span>
                    <span class="menu-text">Front CMS</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{ route('admin.event.list') }}">Events</a></li>
                    <li><a href="{{ route('admin.gallery.list') }}">Gallery</a></li>
                    <li><a href="{{ route('admin.news.list') }}">News</a></li>
                    <li><a href="{{ route('admin.page.list') }}">Pages</a></li>
                </ul>
            </li>
            <!-- end front cms -->

            <!-- online user -->
            <li class="single-nav-wrapper">
                <a href="{{ route('online.user') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-user"></i></span>
                    <span class="menu-text">Online User</span>
                </a>
            </li>
            <!-- end online user -->

        </ul>
    </nav>
</aside><!-- /sidebar Area