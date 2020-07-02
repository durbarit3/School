<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($employees->count() > 0)
        <div class="text-left">
            <div class="row">
                <div class="col-md-12">
                    <h6 style="color:black; border-bottom:1px solid;"><b>Employee attendance report</b></h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="attendance_status_marking_area">
                        <div class="row">
                            <h6 class="badge badge-success ml-3 mr-1"><b> P </b>  </h6> <h6 class="ml-1"> - Present </h6>  
                            <h6 class="badge badge-danger ml-2"><b>A</b></h6> <h6 class="ml-1"> - Absent </h6> 
                            <h6 class="badge badge-primary ml-2"><b>L</b></h6> <h6 class="ml-1"> - Late </h6> 
                            <h6 class="badge badge-warning ml-2"><b>HD</b></h6> <h6 class="ml-1"> - Half-Day </h6>
                            <h6 class="badge badge-info ml-2"><b>H</b></h6> <h6 class="ml-1"> - Holiday </h6>
                        </div>       
                    </div>
                </div>
            </div>
        </div>
       
        <table id="dataTableExample1" class="table table-sm student_attendance_report_table table-bordered mb-2">
     
            <thead>
                <tr class="text-center">
                    <th>Employee</th>

                    @foreach ($monthDates as $monthDate)
                        @php
                            $splitDateDay = explode('-', $monthDate);
                            $day  = $splitDateDay[1];
                            $date = $splitDateDay[0];
                        @endphp
                        <th>{{ $day }} <br> {{ $date }}</th>
                    @endforeach

                    <th class="text-success"> Total <br> Present </th>
                    <th class="text-danger"> Total <br> Absent </th>
                    <th class="text-primary"> Total <br> Late </th>
                    <th class="text-warning"> Total <br> Half-Day </th>
                </tr>
            </thead>

            <tbody>

                @foreach ($employees as $employee)
                <tr class="text-center">
                    <td>
                        {{ $employee->adminname }}
                    </td>
                    @php
                    $attendances = App\EmployeeAttendance::where('employee_id', $employee->id)->where('year', $requestYear)->where('month', $requestMonth)->get();
                    
                    $totalPresent = 0;
                    $totalAbsent = 0;
                    $totalLate = 0;
                    $totalHalfDay = 0;
                    
                    @endphp
                    @foreach ($monthDates as $monthDate)
                        @php
                            $splitDateDay = explode('-', $monthDate);
                            $day = $splitDateDay[1];
                            $date = $splitDateDay[0];

                        @endphp
                        <td>
                        @php
                            $checkEmpty = 0;
                        @endphp
                        @foreach ($attendances as $attendance)
                            @php
                                $spliteAttendanceDate = explode('-',$attendance->date); 
                            @endphp
                                @if ($date == $spliteAttendanceDate[0])
                                    @if ($attendance->attendance_status === "present")
                                        <h5 class="badge badge-success"><b> P </b>  </h5>
                                        @php
                                            $totalPresent +=1;
                                        @endphp
                                    @elseif($attendance->attendance_status === "absent") 
                                        <h6 class="badge badge-danger"><b> A </b>  </h6>
                                        @php
                                            $totalAbsent +=1;
                                        @endphp
                                    @elseif($attendance->attendance_status === "late")  
                                        <h5 class="badge badge-primary"><b> L </b>  </h5>
                                        @php
                                            $totalLate +=1;
                                        @endphp
                                    @elseif($attendance->attendance_status === "half_day")  
                                        <h5 class="badge badge-warning"><b> HD </b>  </h5>
                                        @php
                                            $totalHalfDay +=1;
                                        @endphp
                                    @endif
                                    @php
                                        $checkEmpty = 1; 
                                    @endphp
                                @endif
                        @endforeach
                        @if ($checkEmpty == 0)
                            <h5 class="badge badge-info "><b>H</b></h5>
                        @endif
                        </td> 
                        
                    @endforeach

                    <td><b> {{ $totalPresent }} </b></td>
                    <td><b> {{ $totalAbsent }}</b></td>
                    <td><b> {{ $totalLate  }} </b></td>
                    <td><b> {{ $totalHalfDay  }} </b></td>
                </tr>

                @endforeach
            </tbody>
           
        </table>
     
@else
    <span class="alert alert-danger mt-3 d-block">There is no employee in this role</span>
@endif

    <script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
    <script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>