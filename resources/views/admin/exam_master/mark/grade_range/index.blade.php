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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Grade Ranges</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->exam_module,true)['mark']['grade_range']['add'] == 1)
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                <i class="fas fa-plus"></i></span> <span>Add Grade Range</span></a>
                            @endif        
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-sm table-bordered table-hover mb-2">
                        <thead>
                            <tr class="text-center">
                                <th>Serial</th>
                                <th>Grade Name</th>
                                <th>Grade Point</th>
                                <th>Min-percentage</th>
                                <th>Max-percentage</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gradeRanges as $gradeRange)
                            <tr class="text-center">
                                <td>{{ $loop->index + 1  }}</td>
                                <td>{{ $gradeRange->name }}</td>
                                <td>{{ $gradeRange->grade_point }}</td>
                                <td>{{ $gradeRange->min_percentage }}</td>
                                <td>{{ $gradeRange->max_percentage }}</td>
                                @if($gradeRange->status==1)
                                <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                @else
                                <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                @endif
                                <td>
                                    @if (json_decode($userPermits->exam_module,true)['mark']['grade_range']['edit'] == 1)
                                        @if($gradeRange->status == 1)
                                        <a href="{{ route('admin.exam.master.mark.grade.range.change.status', $gradeRange->id) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.exam.master.mark.grade.range.change.status', $gradeRange->id) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                        |
                                    @endif

                                    <a class="edit_mark_range btn btn-sm btn-blue text-white" data-id="{{$gradeRange->id}}" title="edit" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a> 

                                    @if (json_decode($userPermits->exam_module,true)['mark']['grade_range']['delete'] == 1)        
                                        | <a id="delete" href="{{ route('admin.exam.master.mark.grade.range.delete', $gradeRange->id) }}" class="btn btn-danger btn-sm text-white" title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Grade Range</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.exam.master.mark.grade.range.store') }}" method="POST">
                    @csrf
                    <div class="form-group row justify-content-center">
                        <label class="col-sm-3 no-gutters col-form-label text-right">Grage Name : </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Grage name" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label  class="col-sm-3 no-gutters col-form-label text-right">Grage Point : </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Grage point" name="grade_point" value="{{ old('grade_point') }}" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label class="col-sm-3 no-gutters col-form-label text-right">Min-Percent : </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Min percentage point" name="min_percentage" value="{{ old('min_percentage') }}" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label  class="col-sm-3 no-gutters col-form-label text-right">Max-Percent : </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Max percentage point" name="max_percentage" value="{{ old('max_percentage') }}" required>
                        </div>
                    </div>
                    
                    <div class="form-group row justify-content-center">
                        <label  class="col-sm-3 no-gutters col-form-label text-right">Note : </label>
                        <div class="col-sm-9">
                            <textarea  placeholder="Note will be go here"class="form-control" name="note" cols="30" rows="3">{{ old('note') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-sm btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Grade Range</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.exam.master.mark.grade.range.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    
                    <input type="hidden" name="id" id="id">

                    <div class="form-group row justify-content-center">
                        <label class="col-sm-3 no-gutters col-form-label text-right">Grage Name : </label>
                        <div class="col-sm-9">
                            <input type="text" id="name" class="form-control" placeholder="Grage name" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label  class="col-sm-3 no-gutters col-form-label text-right">Grage Point : </label>
                        <div class="col-sm-9">
                            <input type="text" id="grade_point" class="form-control" placeholder="Grage point" name="grade_point" value="{{ old('grade_point') }}" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label class="col-sm-3 no-gutters col-form-label text-right">Min-Percent : </label>
                        <div class="col-sm-9">
                            <input id="min_percentage" type="text" class="form-control" placeholder="Min percentage point" name="min_percentage" value="{{ old('min_percentage') }}" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label  class="col-sm-3 no-gutters col-form-label text-right">Max-Percent : </label>
                        <div class="col-sm-9">
                            <input id="max_percentage" type="text" class="form-control" placeholder="Max percentage point" name="max_percentage" value="{{ old('max_percentage') }}" required>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label  class="col-sm-3 no-gutters col-form-label text-right">Note : </label>
                        <div class="col-sm-9">
                            <textarea id="note" placeholder="Note will be go here"class="form-control" name="note" cols="30" rows="3">{{ old('note') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
                        @if (json_decode($userPermits->exam_module,true)['mark']['grade_range']['edit'] == 1)
                            <button type="submit" class="btn btn-sm btn-blue">Submit</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')

<script type="text/javascript">

    $(document).ready(function () {
        $('.edit_mark_range').on('click', function () {
            var grade_range_id = $(this).data('id');
            if (grade_range_id) {
                $.ajax({
                    url: "{{ url('admin/exam/master/mark/grade/range/edit') }}"+ "/" + grade_range_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#name").val(data.name);
                        $("#grade_point").val(data.grade_point);
                        $("#min_percentage").val(data.min_percentage);
                        $("#max_percentage").val(data.max_percentage);
                        $("#note").val(data.note);
                        $("#id").val(data.id);
                    }
                });
            } else {
                alert('danger');
            }

        });
    });
</script>

<script>
@error('name')
    toastr.error("{{ $errors->first('name') }}");
@enderror
</script>
@endpush