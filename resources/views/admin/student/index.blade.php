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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Student</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Student</span></a>
                        </div>
                    </div>
                </div>

            </div>
            <form id="multiple_delete" action="{{ route('admin.category.multiple.hard.delete') }}" method="post">

                @csrf
                <!-- <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete all</button> -->
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Admission No</th>
                                    <th>Roll No</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Father name</th>
                                    <th>Date Of Birth</th>
                                    <th>Gender</th>
                                    <th>Category</th>
                                    <th>Mobile Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allstudent as $key => $data)
                                <tr class="text-center">
                                    <td>{{++$key}}</td>
                                    <td>{{$data->admission_no}}</td>
                                    <td>{{$data->roll_no}}</td>
                                    <td>{{$data->first_name}} {{$data->last_name}}</td>
                                    <td>{{$data->Classes->name ?? ''}}</td>
                                    <td>{{$data->father_name}}</td>
                                    <td>{{$data->date_of_birth}}</td>
                                    <td>{{$data->Gender->name}}</td>
                                    <td>{{$data->Category->name}}</td>
                                    <td>{{$data->father_phone}}</td>
                                    <td>

                                        <a href=""
                                            class="btn btn-success btn-sm text-white" title="Show">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        | <a href="{{ url('admin/student/edit',$data->id) }}" class="btn btn-sm btn-blue text-white"title="edit"><i class="fas fa-pencil-alt"></i></a> |

                                        <a  href="{{ route('admin.category.hard.delete', $data->id) }}"
                                            class="btn btn-danger btn-sm text-white" title="Payment">
                                            <i class="fas fa-dollar-sign"></i>
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
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Category name" name="name" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.category.update') }}" method="POST"
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
        $('.editcat').on('click', function () {
            var categoryId = $(this).data('id');
            if (categoryId) {
                $.ajax({
                    url: "{{ url('admin/category/edit/') }}/" + categoryId,
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

@endpush
