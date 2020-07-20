@if ($employeeAttendances->count() > 0)
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="message_area">
                    <span class="alert alert-primary d-block">Attendance has been taken in this date. Now you can edit these.</span>
                </div>

                <div class="heading_area">
                    <h6 class="text-left text-dark"><b>Employee list according to role</b></h6>
                    <hr class="p-0 m-0 mb-3">
                </div>
            </div>
        </div>
        <form class="employee_attendance_update_from" method="post"
            action="{{ route('admin.hr.employee.attendance.update') }}">
            @csrf
            <div class="hidden_field">
                <input type="hidden" name="role_known_id" value="{{ $role_known_id }}">
                <input type="hidden" name="date" value="{{ $date }}">
            </div>
            <table id="dataTableExample1" class="table table-bordered table-sm table-hover mb-2">
                <thead>
                    <tr class="text-center">
                        <th>Serial</th>
                        <th>Employee ID</th>
                        <th>Designation</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Attendance</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($employeeAttendances as $attendance)
                    <tr class="text-center">
                        <td>{{ $attendance->key + 1 }}</td>
                        <td>{{ $attendance->employee->employee_id }}</td>
                        <td>{{ $attendance->employee->designation }}</td>
                        <td>{{ $attendance->employee->first_name.' '.$attendance->employee->last_name }}</td>
                        
                        <td>
                            <img loading="lazy" height="40" width="40"
                                src="{{ asset('public/uploads/employee/'.$attendance->employee->avater) }}">
                        </td>
                        <td>
                            <div class="row justify-content-center">

                                <div class="form-inline ml-1">
                                    <input style="color:green;" type="radio" {{ $attendance->attendance_status === "present" ? "CHECKED" : "" }} class="form-control" name="attendance_ids[{{$attendance->id}}]"
                                        value="present">&nbsp;
                                    <b>Present |</b>
                                </div>

                                <div class="form-inline ml-1">
                                    <input style="color:green;" type="radio" {{ $attendance->attendance_status === "absent" ? "CHECKED" : "" }} class="form-control" name="attendance_ids[{{$attendance->id}}]"
                                        value="absent">&nbsp;
                                    <b>Absent |</b>
                                </div>
                                
                                <div class="form-inline ml-1">
                                    <input style="color:green;" type="radio" {{ $attendance->attendance_status === "late" ? "CHECKED" : "" }} class="form-control" name="attendance_ids[{{$attendance->id}}]"
                                        value="late">&nbsp;
                                    <b>Late </b>
                                </div>
                                
                                <div class="form-inline ml-1">
                                    <input style="color:green;" type="radio" {{ $attendance->attendance_status === "half_day" ? "CHECKED" : "" }} class="form-control" name="attendance_ids[{{$attendance->id}}]"
                                        value="half_day">&nbsp;
                                    <b>Half-day </b>
                                </div>

                            </div>
                        </td>
                        <td><input type="text" placeholder="Note" name="notes[{{ $attendance->id }}]" class=" form-control form-control-sm">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                @if (json_decode($userPermits->human_resource_module, true)['employee_attendance']['add'] == '1')
                    <input type="submit" class="btn btn-sm btn-blue float-right save_button" value="Submit">
                @endif
            <input style="display:none;" type="submit" class="btn btn-sm btn-blue loading_button float-right" value="Loading...">
        </form>
    </div>
@else

    @if ($employees->count() > 0)
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="text-left text-dark"><b>Employee list according to role</b></h6>
                    <hr class="p-0 m-0 mb-3">
                </div>
                
            </div>
            <form class="employee_attendance_from" method="post"
            action="{{ route('admin.hr.employee.attendance.store') }}">
                @csrf
                <div class="hidden_field">
                    <input type="hidden" name="role_known_id" value="{{ $role_known_id }}">
                    <input type="hidden" name="date" value="{{ $date }}">
                </div>
                <table id="dataTableExample1" class="table table-bordered table-sm table-hover mb-2">
                    <thead>
                        <tr class="text-center">
                            <th>Serial</th>
                            <th>Employee ID</th>
                            <th>Designation</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Attendance</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($employees as $employee)
                        <tr class="text-center">
                            <td>{{ $employee->key + 1 }}</td>
                            <td>{{ $employee->employee_id }}</td>
                            <td>{{ $employee->designation }}</td>
                            <td>{{ $employee->adminname}}</td>
                            
                            <td>
                                <img height="40" width="40"
                                    src="{{ asset('public/uploads/employee/'.$employee->avater) }}">
                            </td>
                            <td>
                                <div class="row justify-content-center">

                                    <div class="form-inline ml-1">
                                        <input style="color:green;" CHECKED type="radio" class="form-control" name="employee_ids[{{$employee->id}}]"
                                            value="present">&nbsp;
                                        <b>Present |</b>
                                    </div>

                                    <div class="form-inline ml-1">
                                        <input style="color:green;" type="radio" class="form-control" name="employee_ids[{{$employee->id}}]"
                                            value="absent">&nbsp;
                                        <b>Absent |</b>
                                    </div>
                                    
                                    <div class="form-inline ml-1">
                                        <input style="color:green;" type="radio" class="form-control" name="employee_ids[{{$employee->id}}]"
                                            value="late">&nbsp;
                                        <b>Late |</b>
                                    </div>
                                    
                                    <div class="form-inline ml-1">
                                        <input style="color:green;" type="radio" class="form-control" name="employee_ids[{{$employee->id}}]"
                                            value="half_day">&nbsp;
                                        <b>Half Day </b>
                                    </div>

                                </div>
                            </td>
                            <td><input type="text" placeholder="Note" name="notes[{{ $employee->id }}]" class=" form-control form-control-sm">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (json_decode($userPermits->human_resource_module, true)['employee_attendance']['add'] == '1')
                    <input type="submit" class="btn btn-sm btn-blue float-right save_button" value="Submit">
                @endif

                <input style="display:none;" type="button" class="btn btn-sm btn-blue loading_button float-right" value="Loading...">
            </form>
        </div>    
    @else 
        <span class="alert alert-primary d-block">There is no employee according to this role</span>   
    @endif

@endif

