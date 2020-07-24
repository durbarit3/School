<form id="edit_assign_teacher_form" action="{{ route('academic.assign.class.teacher.update', $classSection->id) }}" method="POST">
    @csrf

    {{-- <input type="hidden" id="class_id" name="class_id" value="{{$class->id}}"> --}}
    <div class="form-group row">
        <div class="col-sm-12">
            <input readonly type="text" class="form-control" placeholder="name" name="name" value="{{$classSection->class->name}}" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <input readonly type="text" class="form-control" placeholder="name" name="name" value="{{$classSection->section->name}}">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <select class="section_select" id="teachers" multiple="multiple" name="teachers[]"
                data-placeholder="Subjects" data-dropdown-css-class="select2-purple" style="width: 100%;">
                @foreach ($teachers as $teacher)
                <option
                @foreach ($classSection->classTeachers as $classTeacher)
                  {{ $classTeacher->employee_id == $teacher->id ? 'SELECTED' : '' }}
                @endforeach
                value="{{ $teacher->id }}">
                {{ $teacher->adminname }}
                </option>
                @endforeach
            </select>
            <span class="error e_error_teachers"></span>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="button" class="btn loading_button btn-sm btn-blue">Loading...</button>
        @if (json_decode($userPermits->academic_module,true)['assign_class_teacher']['edit'] == 1)
            <button type="submit" class="btn submit_button btn-sm btn-blue">Update</button>
        @endif    
    </div>
</form>


<script type="text/javascript">

    $(document).ready(function () {
        $('.loading_button').hide();
        //Initialize Select2 Elements
        $('.section_select').select2();
        //Initialize Select2 Elements
    });

</script>
