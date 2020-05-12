<tr class="text-center new_list">
    <td>
        <select required name="subject_ids[]" id="subject_ids" class="form-control form-control-sm subject_ids">
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
        <input required type="text" name="start_times[]" id="start_times" class="form-control time_picker form-control-sm">
    </td>
    <td>
        <input required type="text" name="end_times[]" id="end_times" class="form-control time_picker form-control-sm">
    </td>
    <td>
        <div>
            <div class="row">
                <div class="col-md-9">
                    <input required type="number" id="room_numbers" placeholder="Room number" name="room_numbers[]" class="form-control form-control-sm">
                </div>
                <div class="col-md-3 text-center">
                    <button type="button" onclick="deleteRow(this)" class="btn btn-sm btn-danger" href="#">X</button>
                </div>
            </div>
        </div>
    </td>
</tr>

<script>
    $(document).ready(function(){
        $('.time_picker').timepicki(); 
    });
</script>

