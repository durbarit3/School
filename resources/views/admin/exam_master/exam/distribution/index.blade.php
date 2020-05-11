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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Exam Distributions</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Distribution</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr class="text-center">
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($distributions as $distribution)
                            <tr class="text-center">
                                <td>{{ $loop->index + 1  }}</td>
                                <td>{{$distribution->name}}</td>
                         
                                @if($distribution->status==1)
                                <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                @else
                                <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                @endif
                                <td>
                                    @if($distribution->status==1)
                                    <a href="{{ route('admin.exam.master.exam.distribution.update.status', $distribution->id ) }}"
                                        class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>
                                    @else
                                    <a href="{{ route('admin.exam.master.exam.distribution.update.status', $distribution->id ) }}"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @endif
                                    | <a class="editcat btn btn-sm btn-blue text-white" data-id="{{$distribution->id}}"
                                        title="edit" data-toggle="modal" data-target="#editModal"><i
                                            class="fas fa-pencil-alt"></i></a> |
                                    <a id="delete" 
                                        href="{{ route('admin.exam.master.exam.distribution.delete', $distribution->id) }}"
                                        class="btn btn-danger btn-sm text-white" 
                                        title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
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
                <h4 class="modal-title">Add Distribution</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.exam.master.exam.distribution.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 no-gutters col-form-label text-center">Dist Name : </label>
                        <div class="col-sm-9 row justify-content-center">
                            <input type="text" class="form-control" placeholder="Distribution name" name="name" required>
                        </div>
                    </div>
                  

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-sm btn-blue mr-3">Submit</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Distribution</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.exam.master.exam.distribution.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-center">Dist Name:</label>
                        <div class="col-sm-9 row justify-content-center">
                            <input type="text" class="form-control" name="name" id="name" required>
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>
                
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
                        <button type="submit" class="btn btn-sm btn-blue mr-3">Submit</button>
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

        $('#check_all').on('click', function (e) {
            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });

    });

</script>
<script type="text/javascript">

    $(document).ready(function () {
        $('.editcat').on('click', function () {
            var distributionId = $(this).data('id');
            if (distributionId) {
                $.ajax({
                    url: "{{ url('admin/exam/master/exam/distributions/edit') }}/" + distributionId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#name").val(data.name);
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
@error('hall_no')
    toastr.error("{{ $errors->first('hall_no') }}");
@enderror
</script>
@endpush