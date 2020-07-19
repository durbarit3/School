<form class="form-horizontal" action="{{ route('academic.assign.class.teacher.update', $classSection->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    {{-- <input type="hidden" id="class_id" name="class_id" value="{{$class->id}}"> --}}
    <div class="form-group row">
        <div class="col-sm-12">
            <input readonly type="text" class="form-control" placeholder="name" name="name" value="{{$classSection->class->name}}" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <input readonly type="text" class="form-control" placeholder="name" name="name" value="{{$classSection->section->name}}" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <select required class="section_select subjects" id="subjects" multiple="multiple" name="teacher_ids[]"
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
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
        @if (json_decode($userPermits->academic_module,true)['assign_class_teacher']['edit'] == 1)
            <button type="submit" class="btn btn-sm btn-blue">Update</button>
        @endif    
    </div>
</form>


<script type="text/javascript">

    $(document).ready(function () {
       //Initialize Select2 Elements
       $('.section_select').select2();
        //Initialize Select2 Elements
    });

</script>
