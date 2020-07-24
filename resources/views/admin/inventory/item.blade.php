@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Item List</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Item</span></a>
                        </div>
                    </div>
                </div>
        </div>
        <form action="{{route('inventory.item.multidelete')}}" id="multiple_delete" method="post">
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
                            <th>Item Store Name</th>
                            <th>Item Stock Code</th>
                            <th>Description</th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($items as $item)
                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$item->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                @if($item->status == 1)
                                <a href="{{ route('inventory.item.status.update',$item->id) }}" class="btn btn-success btn-sm ">
                                    <i class="fas fa-thumbs-up"></i></a>
                                @else
                                <a href="{{ route('inventory.item.status.update', $item->id ) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-thumbs-down"></i>
                                </a>
                                @endif
                            </td>
             
                            <td>
                                | <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$item->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                <a id="delete" href="{{route('inventory.item.delete',$item->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h4 class="modal-title">Add Route</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('category.item.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Item Store Name:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Item Store Name" name="name" required>
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Item Stock Name:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Item Store Name" name="code" required>
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control" name="description" require></textarea>
                            @error('name')
                                {{$message}}
                            @enderror
                            
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
                <h5 class="modal-title" id="exampleModalLabel">Update Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('inventory.item.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Item Store Name:</label>
                        <div class="col-sm-8">
                            <input required type="hidden" class="form-control" placeholder="Item Store Name" id="id" name="id" required>
                            <input required type="text" class="form-control" placeholder="Item Store Name" id="name" name="name" required>
                            @error('name')
                            <div class="alert alert-warning" role="alert">
                                    {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Item Stock Name:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Item Store Name" id="code" name="code" required>
                            @error('code')
                            <div class="alert alert-warning" role="alert">
                                    {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control" name="description" id="description" require></textarea>
                            @error('description')
                            <div class="alert alert-warning" role="alert">
                                    {{$message}}
                            </div>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-blue">Update</button>
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
                    url: "{{ url('admin/inventory/item/edit/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        
                        $("#id").val(data.id);
                        $("#name").val(data.name);
                        $("#code").val(data.code);
                        $("#description").val(data.description);
                        
                    }
                });
            } else {
                // alert('danger');
            }

        });
    });
</script>

@endpush