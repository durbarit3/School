@if ($timetableLists->count() > 0)
    @foreach ($timetableLists as $timetableList)
    <tr class="text-center old_list">
        <td>
            <select required name="subject_ids[]" id="subject_ids" class="form-control subject_ids form-control-sm">
                <option value="">Select Subject</option>
                @foreach ($classSubjects as $classSubject)
                    <option {{ $timetableList->subject_id == $classSubject->subject_id ? 'SELECTED' : '' }} value="{{ $classSubject->subject_id }}">{{ $classSubject->subject->name }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select required name="teacher_ids[]" id="teacher_ids" class="form-control form-control-sm">
                <option value="">Select Teacher</option>
                @foreach ($teachers as $teacher)
                    <option {{ $timetableList->teacher_id == $teacher->id ? 'SELECTED' : '' }} value="{{ $teacher->id }}">{{ $teacher->adminname }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input required type="text"  id="start_times" value="{{ $timetableList->start_time }}" name="start_times[]" class="form-control time_picker form-control-sm">
        </td>
        <td>
            <input required type="text" id="end_times" value="{{ $timetableList->end_time }}" name="end_times[]" class="form-control time_picker form-control-sm">
        </td>
        <td>
            <div class="row">
                <div class="col-md-9">
                    <input required type="number" id="room_numbers" value="{{ $timetableList->room_no }}" placeholder="Room number" name="room_numbers[]" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 text-center">
                    <button onclick="deleteTimeTableList(this)" type="button" data-id="{{ $timetableList->id }}" class="btn btn-sm btn-danger delete_rutting_list">X</button>
                </div>
            </div>
        </td>
    </tr>
    @endforeach
@else
    <tr class="text-center">
        <td>
            <select required name="subject_ids[]" id="subject_ids" class="form-control subject_ids form-control-sm">
                <option value="">Select Subject</option>
                @foreach ($classSubjects as $classSubject)
                    <option value="{{ $classSubject->subject_id }}">{{ $classSubject->subject->name }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <select required name="teacher_ids[]" id="teacher_ids" class="form-control form-control-sm">
                <option value="">Select Teacher</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->adminname }}</option>
                @endforeach
            </select>
        </td>
        <td>
            <input required type="text" id="start_times" name="start_times[]" class="form-control time_picker form-control-sm">
        </td>
        <td>
            <input required type="text" id="end_times" name="end_times[]" class="form-control time_picker form-control-sm">
        </td>
        <td>
            <input required type="number"  id="room_numbers" placeholder="Room number" name="room_numbers[]" class="form-control  form-control-sm">
        </td>
    </tr>

    <tr class="text-center off_day_message">
        <td colspan="5">
           <b>This could be off day.</b> 
        </td>
        
    </tr>
@endif

<script>
    $(document).ready(function(){
        $('.time_picker').timepicki(); 
    });
</script>



