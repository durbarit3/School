@if ($examAttendances->count() > 0)

<div class="table-responsive ">
    <div class="text-left">
        <h6 style="color:black; border-bottom:1px solid;"><b>Exam attendance modify by date</b></h6>
    </div>
    <form class="exam_attendance_modify_form" method="post"
        action="{{ route('admin.attendance.exam.attendance.modify') }}">
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

                @foreach($examAttendances as $examAttendance)
                <tr class="text-center">
                    <td>{{ $examAttendance->key + 1 }}</td>
                    <td>{{ $examAttendance->student->roll_no }}</td>
                    <td>{{ $examAttendance->student->first_name.' '.$examAttendance->student->last_name }}</td>
                    <td>{{ $examAttendance->class->name }} ({{ $examAttendance->section->name }})</td>
                    <td>
                        <img height="40" width="40"
                            src="{{ asset('public/uploads/student/'.$examAttendance->student->student_photo) }}">
                    </td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="form-inline ml-1">
                                <input type="radio" 
                                    {{ $examAttendance->attendance_status == 'present' ? 'CHECKED' : '' }} class="form-control" name="attendance_ids[{{$examAttendance->id}}]"
                                    value="present"
                                />&nbsp;
                                <b>Present |</b>
                            </div>
                            <div class="form-inline ml-1">
                                <input type="radio" class="form-control" name="attendance_ids[{{$examAttendance->id}}]"
                                {{ $examAttendance->attendance_status == 'absent' ? 'CHECKED' : '' }}
                                    value="absent">&nbsp;
                                <b>Absent |</b>
                            </div>
                        </div>
                    </td>
                    <td><input type="text" placeholder="Note" name="notes[{{ $examAttendance->id }}]" value="{{ $examAttendance->note }}"  class=" form-control form-control-sm">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if (json_decode($userPermits->attendance_module, true)['exam_attendance']['edit'] == 1) 
            <input type="submit" class="btn btn-sm btn-blue update_button float-right" value="Update">
        @endif
        
        <input style="display:none;" type="submit" class="btn btn-sm btn-blue update_loding float-right" value="Loading....">
    </form>
</div>
@else
<span class="alert alert-danger d-block mt-3">There is not any exam attendance in this credentials.</span>
@endif

