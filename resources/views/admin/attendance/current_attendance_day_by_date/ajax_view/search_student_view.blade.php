@if ($attendances->count() > 0)
<div class="table-responsive ">

    <form class="current_day_by_date_attendance_from" method="post"
        action="{{ route('admin.attendance.current.day.by.date.attendance.update') }}">
        @csrf
       
        <table id="dataTableExample1" class="table table-bordered table-striped table-sm table-hover mb-2">
            <thead>
                <tr class="text-center">
                    <th>Serial</th>
                    <th>Roll</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Photo</th>
                    <th>Attendance</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>

                @foreach($attendances as $attendance)
                <tr class="text-center">
                    <td>{{ $attendance->key + 1 }}</td>
                    <td>{{ $attendance->student->roll_no }}</td>
                    <td>{{ $attendance->student->first_name.' '.$attendance->student->last_name }}</td>
                    <td>{{ $attendance->Class->name }}</td>
                    <td>
                        <img height="40" width="40"
                            src="{{ asset('public/uploads/student/'.$attendance->student->student_photo) }}">
                    </td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="form-inline ml-1">
                                <input type="radio" 
                                    {{ $attendance->attendance_status == 'present' ? 'CHECKED' : '' }} class="form-control" name="attendance_ids[{{$attendance->id}}]"
                                    value="present"
                                />&nbsp;
                                <b>Present |</b>
                            </div>
                            <div class="form-inline ml-1">
                                <input type="radio" class="form-control" name="attendance_ids[{{$attendance->id}}]"
                                {{ $attendance->attendance_status == 'absent' ? 'CHECKED' : '' }}
                                    value="absent">&nbsp;
                                <b>Absent |</b>
                            </div>
                            <div class="form-inline ml-1">
                                <input type="radio" class="form-control" name="attendance_ids[{{$attendance->id}}]"
                                {{ $attendance->attendance_status == 'late' ? 'CHECKED' : '' }}
                                    value="late">&nbsp;
                                <b>Late |</b>
                            </div>


                            <div class="form-inline ml-1">
                                <input type="radio" class="form-control" name="attendance_ids[{{$attendance->id}}]"
                                {{ $attendance->attendance_status == 'half_day' ? 'CHECKED' : '' }}
                                    value="half_day">
                                &nbsp;<b>Half Day</b>
                            </div>
                        </div>
                    </td>
                    <td><input type="text" placeholder="Note" name="notes[{{ $attendance->id }}]" class=" form-control form-control-sm">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" class="btn btn-sm btn-blue save_button float-right" value="Update">
        <input style="display:none;" type="submit" class="btn btn-sm btn-blue update_loding float-right" value="Loading...">
    </form>
</div>
@else
<span class="alert alert-warning d-block">No attendance available in this class section</span>
@endif

