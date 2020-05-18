
@extends('admin.master')
@section('content')
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Classes</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                        <a href="{{ route('admin.class.index') }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-plus"></i></span> <span>Back</span></a>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-lg-12">
    <div class="panel">
        <div class="panel_header">
            <div class="panel_title"><span>Edit Class</span></div>
        </div>
        <div class="panel_body">
        <form action="{{ route('admin.class.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputEmail3" class="col-form-label text-right"> Name:</label>
                    <input type="text" class="form-control" id="vehicle_model" placeholder="Class name" value="{{$class->name}}" name="name" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class=" col-form-label text-right">Select Sections (Multiple):</label>
                    <select required class="select2" multiple="multiple" name="sectionIds[]" data-placeholder="Sections" data-dropdown-css-class="select2-purple" style="width: 100%;">
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
                <button type="submit" class="btn btn-sm btn-blue float-right">Update</button>
              </form>
        </div>
    </div>
</div>
</div>
</section>
</div>

@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function () {
       //Initialize Select2 Elements
       $('.select2').select2()
        //Initialize Select2 Elements
    });
</script>
@endpush
