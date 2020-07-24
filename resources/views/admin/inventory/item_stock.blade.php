@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Items List</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Invenory Items</span></a>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('room.type.multidelete')}}" method="post">
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
                                <th>Name</th>
                                <th>Category</th>
                                <th>Supplier</th>
                                <th>Store</th>
                                <th>Quantity</th>
                                <th>Purchase Price</th>
                                <th>Date</th>
                                <th>Status </th>
                                <th>Price </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($stockitems as $row)
                            <tr>
                                <td>
                                    <label class="chech_container mb-4">
                                        <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$row->id}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>{{$row->inventoryitem->name}}</td>
                                <td>{{$row->category->category}}</td>
                                <td>{{$row->supplier->item_supplier}}</td>
                                <td>{{$row->store->item}}</td>
                                <td>{{$row->quantity}}</td>
                                <td>{{$row->purchase}}</td>
                                <td>{{$row->data}}</td>
            
                                <td>
                                    @if($row->status ==1)
                                    <a href="{{ route('room.type.status.update', 1) }}" class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>
                                    @else
                                    <a href="{{ route('room.type.status.update', 2 ) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @endif
                                </td>

                                <td>
                                    <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$row->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                    <a id="delete" href="" class="btn btn-danger btn-sm text-white" title="Delete">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Invenroy Items</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('inventory.item.stock.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf



                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category Name:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id" required>
                                    <option selected disabled>Select A Category</option>
                                    @foreach($categores as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Item Name :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <select class="form-control" id="exampleFormControlSelect1" name="items_id">
                                    <option selected disabled>Select A Category</option>
                                    @foreach($inventoryitems as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                           
                                </select>
                                @error('items_id')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Supplier Name :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <select class="form-control" id="exampleFormControlSelect1" name="supplier_id">
                                    <option selected disabled>Select A Category</option>
                                    @foreach($suppliers as $item)
                                        <option value="{{$item->id}}">{{$item->item_supplier}}</option>
                                    @endforeach
                           
                                </select>
                                @error('supplier_id')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Store Name :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <select class="form-control" id="exampleFormControlSelect1" name="store_id">
                                    <option selected disabled>Select A Category</option>
                                    @foreach($stores as $item)
                                        <option value="{{$item->id}}">{{$item->item}}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Quantity :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <input type="number"  class="form-control" name="quantity" min="1" value="{{old('quantity')}}" placeholder="Enter store Quantity.">
                                @error('quantity')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Purchase Price * :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <input type="number" min="1" class="form-control" name="purchase" value="{{old('purchase')}}" placeholder="Enter store Quantity.">
                                @error('purchase')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Date :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <input type="date" class="form-control" name="data" value="{{old('data')}}" placeholder="Enter store Quantity.">
                                @error('data')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Attach Document :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                            <input type="file" name="doc_file" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
                            </div>
                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control" name="description" require></textarea>

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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Item Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" action="{{ route('inventory.item.stock.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')



                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category Name:</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="hidden" value="" id="id" name="id">
                                <select class="form-control" id="category" name="category_id" required>
                                    <option selected disabled>Select A Category</option>
                                    @foreach($categores as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Item Name :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <select class="form-control" id="item" name="items_id">
                                    <option selected disabled>Select A item</option>
                                    @foreach($inventoryitems as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                           
                                </select>
                                @error('items_id')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Supplier Name :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <select class="form-control" id="supplier" name="supplier_id">
                                    <option selected disabled>Select A supplier</option>
                                    @foreach($suppliers as $item)
                                        <option value="{{$item->id}}">{{$item->item_supplier}}</option>
                                    @endforeach
                           
                                </select>
                                @error('supplier_id')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Store Name :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <select class="form-control" id="store" name="store_id">
                                    <option selected disabled>Select A store</option>
                                    @foreach($stores as $item)
                                        <option value="{{$item->id}}">{{$item->item}}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Quantity :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <input type="number"  class="form-control" id="quantity" name="quantity" min="1" value="{{old('quantity')}}" placeholder="Enter store Quantity.">
                                @error('quantity')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Purchase Price * :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <input type="number" min="1" class="form-control" name="purchase" value="{{old('purchase')}}" placeholder="Enter store Quantity.">
                                @error('purchase')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Date :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                                <input type="date" class="form-control" name="data" value="{{old('data')}}" placeholder="Enter store Quantity.">
                                @error('data')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Attach Document :</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                
                            <input type="file" name="doc_file" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
                            </div>
                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control" name="description" require></textarea>

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
                    url: "{{ url('admin/inventory/item/stock/edit/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        console.log(data);
                        $("#id").val(data.id);
                        $('#category').val(data.category_id).selecte;
                        $('#items_id').val(data.items_id).selecte;
                        $('#supplier').val(data.supplier_id).selecte;
                    }
                });
            } else {
                // alert('danger');
            }

        });
    });
</script>

@endpush