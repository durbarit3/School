@if (!$checkExistsAttendance)
<div class="table-responsive ">
    <div class="text-left">
        <h6 style="color:black; border-bottom:1px solid;"><b>Today : {{ date('d-F-Y') }}</b></h6>
    </div>
    <form class="exam_attendance_from" method="post"
        action="{{ route('admin.attendance.exam.attendance.store') }}">
        @csrf
        <div class="hidden_field">
            <input type="hidden" name="class_id" value="{{ $class_id }}">
            <input type="hidden" name="section_id" value="{{ $section_id }}">
            <input type="hidden" name="exam_id" value="{{ $exam_id }}">
            <input type="hidden" name="subject_id" value="{{ $subject_id }}">
        </div>
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

                @foreach($students as $student)
                <tr class="text-center">
                    <td>{{ $student->key + 1 }}</td>
                    <td>{{ $student->roll_no }}</td>
                    <td>{{ $student->first_name.' '.$student->last_name }}</td>
                    <td>{{ $student->Class->name }} ({{ $student->Section->name }})</td>
                    <td>
                        <img height="40" width="40"
                            src="{{ asset('public/uploads/student/'.$student->student_photo) }}">
                    </td>
                    <td>
                        <div class="row justify-content-center">
                            <div class="form-inline ml-1">
                                <input required type="radio" class="form-control" name="student_ids[{{$student->id}}]"
                                    value="present">&nbsp;
                                <b>Present | </b>
                            </div>
                            <div class="form-inline ml-1">
                                <input required type="radio" class="form-control" name="student_ids[{{$student->id}}]"
                                    value="absent">&nbsp;
                                <b> Absent </b>
                            </div>
                            
                        </div>
                    </td>
                    <td><input type="text" placeholder="Note" name="notes[]" class=" form-control form-control-sm">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" class="btn btn-sm btn-blue float-right" value="Submit">
        <input style="display:none;" type="submit" class="btn btn-sm btn-blue update_loding float-right" value="Loading...">
    </form>
</div>
@else
<span class="alert alert-primary mt-3 d-block">Exam attendance has already been taken of this class section of this subject. Now you can edit from exam attendance by date section</span>
@endif

