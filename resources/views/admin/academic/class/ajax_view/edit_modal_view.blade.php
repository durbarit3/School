<form class="form-horizontal" action="{{ route('admin.class.update', $class->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
   
    <div class="form-group row">
        <div class="col-sm-12">
            <label class="m-0 p-0" for="name"><b>Class</b> : </label>
            <input type="text" class="form-control" placeholder="name" name="name" value="{{$class->name}}" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="m-0 p-0" for="name"><b>Class Sections</b> : </label>
            <select required class="section_select subjects" id="subjects" multiple="multiple" name="sectionIds[]"
                data-placeholder="Subjects" data-dropdown-css-class="select2-purple" style="width: 100%;">
                @foreach ($sections as $section)
                <option
                @foreach ($class->classSections as $classSection)
                  {{ $section->id == $classSection->section_id ? 'SELECTED' : '' }}
                @endforeach
                value="{{ $section->id }}">
                {{ $section->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn btn-sm btn-blue">Update</button>
    </div>
</form>


<script type="text/javascript">

    $(document).ready(function () {
       //Initialize Select2 Elements
       $('.section_select').select2();
        //Initialize Select2 Elements
    });

</script>
