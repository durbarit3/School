<form id="edit_class_form" class="form-horizontal" action="{{ route('admin.class.update', $class->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
   
    <div class="form-group row">
        <div class="col-sm-12">
            <label class="m-0 p-0" for="name"><b>Class</b> : </label>
            <input type="text" class="form-control" placeholder="name" id="e_name" name="name" value="{{$class->name}}">
            <span class="error e_error_name"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="m-0 p-0" for="name"><b>Class Sections</b> : </label>
            <select  class="section_select" id="e_sectionIds" multiple="multiple" name="sections[]"
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
            <span class="error e_error_sections"></span>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="button" class="btn btn-sm loading_button btn-blue">Loading...</button>
        @if (json_decode($userPermits->academic_module,true)['class']['edit'] == 1)
            <button type="submit" class="btn btn-sm submit_button btn-blue">Update</button>
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
