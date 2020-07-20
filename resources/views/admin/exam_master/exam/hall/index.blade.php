@extends('admin.master')
@push('css')
    <style>
        td{
            line-height: 0px;
            width: 20%;
        }
    </style>
@endpush
@section('content')

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Exam Halls</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->exam_module,true)['exam']['hall']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Add Hall</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
                        <thead>
                            <tr class="text-center">
                                <th>Serial</th>
                                <th>Hall No</th>
                                <th>Sit Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($halls as $halls)
                            <tr class="text-center">
                                <td>{{ $loop->index + 1  }}</td>
                                <td>{{$halls->hall_no}}</td>
                                <td>{{$halls->sit_qty}}</td>
                                @if($halls->status==1)
                                <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                @else
                                <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                @endif
                                <td>
                                    @if (json_decode($userPermits->exam_module,true)['exam']['hall']['edit'] == 1)
                                        @if($halls->status==1)
                                        <a href="{{ route('admin.exam.master.exam.hall.update.status', $halls->id ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.exam.master.exam.hall.update.status', $halls->id ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                        |
                                    @endif
                                     <a class="editcat btn btn-sm btn-blue text-white" data-id="{{$halls->id}}"
                                        title="edit" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-pencil-alt"></i>
                                        </a> 
                                    @if (json_decode($userPermits->exam_module,true)['exam']['hall']['delete'] == 1)       
                                        | <a id="delete" href="{{ route('admin.exam.master.exam.hall.delete', $halls->id) }}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h6 class="modal-title">Add Exam Hall</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.exam.master.exam.hall.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="m-0"><b>Hall No :</b>  </label>
                            <input type="text" class="form-control" placeholder="Hall number" name="hall_no" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="m-0"><b>Capacity :</b></label>
                            <input type="number" class="form-control" placeholder="Capacity" name="sit_qty" required>
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
                <h6 class="modal-title" id="exampleModalLabel">Edit Exam Hall</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.exam.master.exam.hall.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="m-0"><b>Hall No :</b>  </label>
                            <input id="hall_no" type="text" class="form-control" placeholder="Hall number" name="hall_no" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="m-0"><b>Capacity :</b></label>
                            <input id="sit_qty" type="number" class="form-control" placeholder="Capacity" name="sit_qty" required>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
                        @if (json_decode($userPermits->exam_module,true)['exam']['hall']['edit'] == 1) 
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
            var hallId = $(this).data('id');
            if (hallId) {
                $.ajax({
                    url: "{{ url('admin/exam/master/exam/halls/edit') }}/" + hallId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#hall_no").val(data.hall_no);
                        $("#sit_qty").val(data.sit_qty);
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