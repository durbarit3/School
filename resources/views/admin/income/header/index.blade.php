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
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Income Header</span></a>
                        </div>
                    </div>
                </div>

            </div>
        <form id="multiple_delete" action="{{ route('admin.income.header.multiple.delete') }}" method="post">
                @csrf
                <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>
                <button type="button" style="margin: 5px;" class="btn btn-sm btn-success"><i class="fas fa-recycle"></i> <a
                        href="" style="color: #fff;">Restore</a></button>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        <label class="chech_container mb-1 p-0">
                                            Select all
                                            <input type="checkbox" id="check_all">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th>Header Name</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($headers as $header)
                                <tr class="text-center">
                                    <td>
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" name="deleteId[]" class="checkbox"
                                                value="{{$header->id}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{$header->name}}</td>
                                    <td>{{$header->note ? $header->note : "N/A" }}</td>
                                    @if($header->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        @if($header->status==1)
                                        <a href="{{ route('admin.income.header.status.update', $header->id ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.income.header.status.update', $header->id ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                        | <a class="edit_header btn btn-sm btn-blue text-white"
                                            data-id="{{ $header->id }}" title="edit" data-toggle="modal"
                                            data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                        <a id="delete" href="{{ route('admin.income.header.delete', $header->id) }}"
                                            class="btn btn-danger btn-sm text-white" title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Header</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.income.header.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Category name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="note" class="col-sm-3 col-form-label text-right">Note:</label>
                        <div class="col-sm-8">
                            <textarea name="note" id="note" class="form-control" placeholder="Note" cols="5" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.income.header.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" id="name" required>
                            <input type="hidden" name="id" id="id">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Note:</label>
                        <div class="col-sm-8">

                                <textarea name="note" id="note" class="form-control note" placeholder="Header note" cols="5" rows="3">

                                </textarea>

                            <span class="text-danger">{{ $errors->first('note') }}</span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
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
        $('.edit_header').on('click', function () {
            var headerId = $(this).data('id');
            if (headerId) {
                $.ajax({
                    url: "{{ url('admin/incomes/headers/edit/') }}/" + headerId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#name").val(data.name);
                        $(".note").val(data.note);
                        $("#id").val(data.id);
                    }
                });
            } else {
                alert('danger');
            }

        });
    });
</script>

@endpush
