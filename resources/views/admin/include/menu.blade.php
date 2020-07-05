
<style>
    .text_active {
        color: cornflowerblue!important;
        font-size: 0.9em !important;
        font-weight: 600 !important;
        letter-spacing: 0.6px;
        font-family: unset;
    }

    .text_active:hover {
        background: white !important;
    }
</style>
<aside class="sidebar-wrapper ">
    <nav class="sidebar-nav">
        <ul class="metismenu" id="menu1">
            <li class="single-nav-wrapper">
                <a href="{{ route('admin.home') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Home</span>
                </a>
            </li>
            <li class="single-nav-wrapper {{ Request::is('admin/student*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-user-edit"></i></span>
                    <span class="menu-text">Student</span>
                </a>
                <ul class="dashboard-menu">
                    <li>
                        <a href="{{ route('student.create') }}"> Student Admission</a>
                        <a href="{{ route('student.index') }}"> Student Details</a>
                    </li>

                </ul>
            </li>

            <li class="single-nav-wrapper">
                <a href="{{ route('category.index') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Categories</span>
                </a>
            </li>
            <li class="single-nav-wrapper {{ Request::is('admin/academic*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-school"></i></span>
                    <span class="menu-text">Academic</span>
                </a>
                <ul class="dashboard-menu">
                    <li>

                        <a class="{{ Request::is('admin/academic/session') ? 'text_active' : '' }}" href="{{ route('admin.academic.session.index') }}"> Session</a>
                        <a class="{{ Request::is('admin/academic/class') ? 'text_active' : '' }}" href="{{ route('admin.class.index') }}"> Class</a>
                        <a class="{{ Request::is('admin/academic/section') ? 'text_active' : '' }}" href="{{ route('admin.academic.section.index') }}"> Section </a>
                        <a class="{{ Request::is('admin/academic/subject') ? 'text_active' : '' }}" href="{{ route('admin.academic.subject.index') }}"> Subject </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/academic/assign/class/teachers') ? 'text_active' : '' }}" href="{{ route('academic.assign.class.teacher.index') }}"> Asign class teacher</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/academic/assign/subjects') ? 'text_active' : '' }}" href="{{ route('admin.academic.assign.all.assigned.subject') }}"> Asign subject to class</a>
                        <a class="{{ Request::is('admin/academic/assign/subject/teachers') ? 'text_active' : '' }}"  href="{{ route('academic.assign.subject.teacher.index') }}"> Asign Teacher to Subject</a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/academic/class/timetable*') ? 'text_active' : '' }}"  href="{{ route('admin.class.timetable.search') }}"> Class Timetable </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/academic/teacher/timetable') ? 'text_active' : '' }}"  href="{{ route('admin.academic.teacher.timetable.index') }}"> Teacher Timetable </a>
                    </li>

                </ul>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/exam/master*') ? 'mm-active' : '' }} ">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-diagnoses"></i></span>
                    <span class="menu-text">Exam master</span>
                </a>
                <ul style="border-left:2px solid white; border-bottom:2px solid white;" class="dashboard-menu mb-2">
                    <li class="p-0">

                        <li class="{{ Request::is('admin/exam/master/exam*') ? 'mm-active' : '' }} my-1 ml-2 p-0">
                            <a class="has-arrow {{ Request::is('admin/exam/master/exam*') ? 'menu-item' : '' }} " href="#" aria-expanded="false">
                                <span class="left-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                <span class="menu-text">&nbsp;&nbsp;Exam</span>
                            </a>
                            <ul class=" ml-2">
                                <a 
                                class="{{ Request::is('admin/exam/master/exam/terms') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.exam.term.index') }}">
                                    Term
                                </a>
                                <a class="{{ Request::is('admin/exam/master/exam/halls') ? 'text_active' : '' }}"
                                href="{{ route('admin.exam.master.exam.hall.index') }}">
                                    Hall
                                </a>
                                <a class="{{ Request::is('admin/exam/master/exam/distributions') ? 'text_active' : '' }}"
                                href="{{ route('admin.exam.master.exam.distribution.index') }}">
                                    Distribution
                                </a>
                                <a class="{{ Request::is('admin/exam/master/exam/exams') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.exam.index') }}">Exam Setup</a>
                            </ul>
                        </li>

                        <li class="{{ Request::is('admin/exam/master/schedules*') ? 'mm-active' : '' }} my-1 ml-2 p-0">
                            <a class="has-arrow {{ Request::is('admin/exam/master/schedules*') ? 'menu-item' : '' }}" href="#" aria-expanded="false">
                                <span class="left-icon"><i class="far fa-calendar-alt"></i></span>
                                <span class="menu-text">&nbsp;&nbsp;Exam Schedule</span>
                            </a>
                            <ul class=" ml-2">
                                <a class="{{ Request::is('admin/exam/master/schedules/create') ? 'text_active' : '' }}"  href="{{ route('admin.exam.master.schedule.create') }}">
                                    Create Schedule
                                </a>
                                <a class="{{ Request::is('admin/exam/master/schedules/check') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.schedule.check.index') }}">Check Schedule</a>
                            </ul>
                        </li>

                        <li class="{{ Request::is('admin/exam/master/mark*') ? 'mm-active' : '' }} my-1 ml-2 p-0">
                            <a class="{{ Request::is('admin/exam/master/mark*') ? 'menu-item' : '' }} has-arrow" href="#" aria-expanded="false">
                                <span class="left-icon"><i class="fas fa-marker"></i></span>
                                <span class="menu-text">&nbsp;&nbsp;Marks</span>
                            </a>
                            <ul class=" ml-2">
                                <a class="{{ Request::is('admin/exam/master/mark/entires') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.mark.entire.index') }}">
                                    Mark Entries
                                </a>
                                <a class="{{ Request::is('admin/exam/master/mark/grade/range') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.mark.grade.range.index') }}">
                                    Greads Range
                                </a>
                                <a class="{{ Request::is('admin/exam/master/mark/report/card') ? 'text_active' : '' }}" href="{{ route('admin.exam.master.report.card.index') }}">
                                    Report Card
                                </a>
                            </ul>
                        </li>

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

                    </li>
                </ul>
            </li>
            
            @if ($generalSettings->current_day_attendance == 1 OR $generalSettings->period_attendance == 1 OR $generalSettings->exam_attendance == 1)
                <li class="single-nav-wrapper {{ Request::is('admin/attendance*') ? 'mm-active' : '' }}">
                    <a class="has-arrow menu-item" href="#" aria-expanded="false">
                        <span class="left-icon"> <i class="fas fa-hand-paper"></i></span>
                        <span class="menu-text">Attendance</span>
                    </a>

                    <ul class="dashboard-menu">

                        @if ($generalSettings->current_day_attendance == 1)
                            <li>
                                <a class="{{ Request::is('admin/attendance/current/day') ? 'text_active' : '' }}"
                                    href="{{ route('admin.attendance.current.day.attendance.select.criteria') }}">Attendance</a>
                            </li>
                            <li>
                                <a style="font-size:12.5px"
                                    class="{{ Request::is('admin/attendance/current/day/by/date') ? 'text_active' : '' }}"
                                    href="{{ route('admin.attendance.current.day.by.date.attendance.select.criteria') }}">Attendance By Date</a>
                            </li>
                        @endif

                        @if ($generalSettings->period_attendance == 1)
                            <li>
                                <a class="{{ Request::is('admin/attendance/period') ? 'text_active' : '' }}"
                                    href="{{ route('admin.attendance.period.attendance.search') }}">Period Attendance
                                </a>
                            </li>
                        
                            <li>
                                <a class="{{ Request::is('admin/attendance/period/by/date/search*') ? 'text_active' : '' }}"
                                    href="{{ route('admin.attendance.period.by.date.attendance.search') }}">period attendance By Date</a>
                            </li>
                        @endif
                        @if ($generalSettings->exam_attendance == 1)
                            <li>
                                <a class="{{ Request::is('admin/attendance/exam/attendance') ? 'text_active' : '' }}" href="{{ route('admin.attendance.exam.attendance.index') }}">Exam attendance</a>
                            </li>
                        
                            <li>
                                <a class="{{ Request::is('admin/attendance/exam/attendance/modify') ? 'text_active' : '' }}" href="{{ route('admin.attendance.exam.attendance.modify.index') }}">Exam attendance Modify</a>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif
            <li class="single-nav-wrapper {{ Request::is('admin/transport*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-shuttle-van"></i></span>
                    <span class="menu-text">Transport</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{ route('admin.route.index') }}">Routes</a></li>
                    <li><a href="{{ route('admin.vehicle.index') }}">Vehicles</a></li>
                    <li><a href="{{ route('admin.assign.vehicle.index') }}">Assign Vehicle</a></li>
                    <li><a href="{{ route('admin.assign.vehicle.driver.index') }}">Assign Driver</a></li>
                    <li><a href="">Student transport report (pending)</a></li>
                </ul>
            </li>

             <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="far fa-calendar-alt"></i></span>
                    <span class="menu-text">Event</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{ route('event.index.all') }}">All Event</a></li>
                    <li><a href="{{ route('event.create') }}">Add Event</a></li>
                
                </ul>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/employee*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-users"></i></span>
                    <span class="menu-text">Emplyees</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a class="{{ Request::is('admin/employees/all*') ? 'text_active' : '' }}" href="{{ route('admin.employee.all.admins') }}">Employee List</a></li>
                    <li><a class="{{ Request::is('admin/employees/create') ? 'text_active' : '' }}" href="{{ route('admin.employee.create') }}">Add Employee</a></li>
                    <li><a class="{{ Request::is('admin/employees/department*') ? 'text_active' : '' }}" href="{{ route('admin.employee.department.index') }}">Department</a></li>
                </ul>
            </li>
            
             <li class="single-nav-wrapper {{ Request::is('admin/human_resource*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                    <span class="menu-text">Human Resorce</span>
                </a>
                <ul class="dashboard-menu">
                   
                    <li><a class="{{ Request::is('admin/human_resource/employee/attendance*') ? 'text_active' : '' }}" href="{{ route('admin.hr.employee.attendance.index') }}">Employee attendance</a></li>

                    <li><a class="{{ Request::is('admin/human_resource/employee/salary*') ? 'text_active' : '' }}" href="{{ route('admin.hr.employee.salary.index') }}">Employee salary</a></li>

                    <li><a class="{{ Request::is('admin/human_resource/leave/apply*') ? 'text_active' : '' }}" href="{{ route('admin.hr.leave.apply.index') }}">Leave apply</a></li>
                    
                    @if (Auth::user()->role == 1 or Auth::user()->role == 2)
                    <li><a class="{{ Request::is('admin/human_resource/leave/approval*') ? 'text_active' : '' }}" href="{{ route('admin.hr.leave.approval.index') }}">Leave approval</a></li>
                    @endif
                    

                    <li><a class="{{ Request::is('admin/human_resource/leave/type*') ? 'text_active' : '' }}" href="{{ route('admin.hr.leave.type.index') }}">Leave type</a></li>
                </ul>
            </li>
            
            <li class="single-nav-wrapper {{ Request::is('admin/incomes*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-hand-holding-usd"></i></span>
                    <span class="menu-text">Incomes</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a class="{{ Request::is('admin/incomes/all') ? 'text_active' : '' }}" href="{{ route('admin.income.index') }}">Income</a></li>
                    <li><a class="{{ Request::is('admin/incomes/search') ? 'text_active' : '' }}" href="{{ route('admin.income.search') }}">Search income</a></li>
                    <li><a class="{{ Request::is('admin/incomes/headers') ? 'text_active' : '' }}" href="{{ route('admin.income.header.all') }}">Income header</a></li>

                </ul>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/expanses*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-file-invoice-dollar"></i></span>
                    <span class="menu-text">Expanses</span>
                </a>
                <ul class="dashboard-menu">
                    <li>
                        <a class="{{ Request::is('admin/expanses/all') ? 'text_active' : '' }}" href="{{ route('admin.expanse.index') }}">
                            expanse
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/expanses/search') ? 'text_active' : '' }}"  href="{{ route('admin.expanse.search') }}">Search expanse
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/expanses/headers') ? 'text_active' : '' }}"  href="{{ route('admin.expanse.header.all') }}">expanse header</a>
                    </li>
                </ul>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/attachment*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-file-invoice-dollar"></i></span>
                    <span class="menu-text">Attachment Book</span>
                </a>
                <ul class="dashboard-menu">
                    <li>
                        <a href="{{ route('admin.attachment.type.index') }}" class="{{ Request::is('admin/attachment/types') ? 'text_active' : '' }}">
                            Attachment Type
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.attachment.upload.content.index') }}" class="{{ Request::is('admin/attachment/upload/contents') ? 'text_active' : '' }}">
                            Upload Content
                        </a>
                    </li>
                  
                </ul>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/office/accounts*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-calculator"></i></span>
                    <span class="menu-text">Office Accounts</span>
                </a>
                <ul class="dashboard-menu">

                    <li>
                        <li>
                            <a class="{{ Request::is('admin/office/accounts/bank') ? 'text_active' : '' }}" href="{{ route('admin.office.account.bank.index') }}">Bank</a>
                        </li>
                    </li>

                    <li>
                        <li>
                            <a class="{{ Request::is('admin/office/accounts/bank_accounts') ? 'text_active' : '' }}" href="{{ route('admin.office.account.bank.account.index') }}">Accounts</a>
                        </li>
                    </li>

                    <li> 
                        <li>
                            <a class="{{ Request::is('admin/office/accounts/deposits') ? 'text_active' : '' }}" href="{{ route('admin.office.account.deposit.index') }}">Deposits</a>
                        </li>
                    </li>
                    
                    <li>
                        <li>
                            <a class="{{ Request::is('admin/office/accounts/withdraws') ? 'text_active' : '' }}" href="{{ route('admin.office.account.withdraw.index') }}">Witdraws</a>
                        </li>
                    </li>
                    <li>
                        <li>
                            <a class="{{ Request::is('admin/office/accounts/voucher/header') ? 'text_active' : '' }}" href="{{ route('admin.office.account.voucher_header.index') }}">Voucher Header</a>
                        </li>
                    </li>

                </ul>
            </li>

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

            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Hostel</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('hostel.addroom')}}">Hostel Room</a></li>
                    <li><a href="{{route('room.type')}}">Room Type</a></li>
                    <li><a href="{{route('admin.hostel')}}">Hostel</a></li>
                    <li><a href="chart-float.html">Student Hostel Report</a></li>
                </ul>
            </li>

            <!-- Hostel area end -->

            <!-- Hostel area start -->

            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Inventory</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('inventory.item.stock.index')}}">Add Item Stock</a></li>
                    <li><a href="{{route('inventory.category.index')}}">Item Category</a></li>
                    <li><a href="{{route('item.index')}}">Items Store</a></li>
                    <li><a href="{{route('admin.inventory.supplier')}}">Supplier</a></li>
                    <li><a href="{{route('admin.item.index')}}">Add Items</a></li>
                    <li><a href="chart-float.html">Student Hostel Report</a></li>
                </ul>
            </li>

            <!-- Hostel area end -->

               <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Library</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('admin.book.index')}}">Book List</a></li>
                    <li><a href="{{route('admin.library.members')}}">Library Member</a></li>
                    <li><a href="{{route('admin.library.staff')}}">Library Staff</a></li>
                </ul>
            </li>


            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Fees Collection</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('admin.fees.reminder')}}">Fees Reminder</a></li>
                    <li><a href="{{route('admin.fees.type')}}">Fees Types</a></li>
                    <li><a href="{{route('admin.fees.discount')}}">Fees Discount</a></li>
                    <li><a href="{{route('admin.fees.group')}}">Fees Group</a></li>
                    <li><a href="{{route('admin.fees.master')}}">Fees Master</a></li>
                    <li><a href="{{route('admin.fees.collect')}}">Fees Collect</a></li>
                    <li><a href="{{route('admin.fees.search')}}">Search Due Fees</a></li>
                </ul>
            </li>


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