@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Hostel List</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Hostel</span></a>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('inventory.category.multidelete')}}" method="post">
            @csrf
        <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>
        <div class="panel_body">
            <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                    <thead>
                        <tr>
                            <th>
                                <label class="chech_container mb-1 p-0">
                                    Select all
                                    <input type="checkbox" id="check_all">
                                    <span class="checkmark"></span>
                                </label>
                            </th>
                            <th>Room Type</th>
                            <th>Description</th>
                            <th>Status </th>
                            <th>Price </th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($cateogres as $cateogry)
                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$cateogry->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{$cateogry->category}}</td>
                            <td>{{$cateogry->description}}</td>
                            <td>
                                @if($cateogry->status ==  1)
                                    <a href="{{ route('room.type.status.update', $cateogry->id) }}" class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i>
                                    </a>
                                @else
                                    <a href="{{ route('room.type.status.update', $cateogry->id ) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                @endif
                            </td>
             
                            <td>
                                <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$cateogry->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                <a id="delete" href="{{route('inventory.category.delete',$cateogry->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
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
        <!--/ panel body -->
    </div>
    <!--/ panel -->
</section>
<!--/ page content -->

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Inventory Category</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('inventory.category.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category:</label>
                        <div class="col-sm-8">
                            <input required type="text"  class="form-control" placeholder="Inventory Category" name="category" required>
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control" name="description" require></textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Inventory Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('inventory.category.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category:</label>
                        <div class="col-sm-8">
                            <input required type="hidden" id="id" class="form-control" placeholder="Inventory Category" name="id" required>
                            <input required type="text"  id="category" class="form-control" placeholder="Inventory Category" name="category" required>
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" id="description" class="form-control" name="description" require></textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            
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

@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.edit_route').on('click', function() {
                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: "{{ url('admin/inventory/category/edit/') }}/" + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            
                            $("#category").val(data.category);
                            $("#description").val(data.description);
                            $("#id").val(data.id);
                        }
                    });
                } else {
                    // alert('danger');
                }
            });
        });
    </script>
@endpush