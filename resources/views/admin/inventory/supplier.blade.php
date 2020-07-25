@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Supplier List</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->inventory_module, true)['item_supplier']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Add Supplier</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
        <form action="{{route('admin.inventory.supplier.multidelete')}}" id="multiple_delete" method="post">
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
                            <th>Item Supplier</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact Person Name</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                   @foreach($itemsuppliers as $itemsupplier)
                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$itemsupplier->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{$itemsupplier->item_supplier}}</td>
                            <td>{{$itemsupplier->phone}}</td>
                            <td>{{$itemsupplier->email}}</td>
                            <td>{{$itemsupplier->address}}</td>
                            <td>{{$itemsupplier->contact_person_name}}</td>
                            <td>
                                @if (json_decode($userPermits->inventory_module, true)['item_supplier']['edit'] == 1)
                                    @if($itemsupplier->status == 1)
                                        <a href="{{ route('room.type.status.update', $itemsupplier->id) }}" class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('room.type.status.update', $itemsupplier->id ) }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                    @endif
                                @else 
                                     @if($itemsupplier->status == 1)
                                        <a href="" class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i>
                                        </a>
                                    @else
                                        <a href="" class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                    @endif   
                                @endif
                            </td>
             
                            <td>
                                <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$itemsupplier->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> 

                                @if (json_decode($userPermits->inventory_module, true)['item_supplier']['delete'] == 1)
                                | <a id="delete" href="{{route('inventory.supplier.delete',$itemsupplier->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h4 class="modal-title">Add Inventory Supplier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('inventory.supplier.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Supplier Name.." name="item_supplier" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Phone :</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Supplier Phone.." name="phone" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Email:</label>
                        <div class="col-sm-8">
                            <input required type="email" class="form-control" placeholder="Supplier Email" name="email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Address :</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Supplier Address" name="address" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Contact Person Name :</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Contact Person Name" name="contact_person_name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Contact Person Phone :</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Contact Person Phone." name="contact_person_phone" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Contact Person Email :</label>
                        <div class="col-sm-8">
                            <input required type="email" class="form-control" placeholder="Contact Person Email.." name="contact_person_email" required>
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
                        @if (json_decode($userPermits->inventory_module, true)['item_supplier']['add'] == 1)
                            <button type="submit" class="btn btn-blue">Submit</button>
                        @endif 
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
                <h5 class="modal-title" id="exampleModalLabel">Update Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('inventory.supplier.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input required type="hidden" class="form-control"  name="id" id="id" required>
                            <input required type="text" class="form-control" placeholder="Supplier Name.." id="item_supplier" name="item_supplier" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Phone :</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Supplier Phone.." id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Email:</label>
                        <div class="col-sm-8">
                            <input required type="email" class="form-control" placeholder="Supplier Email" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Address :</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Supplier Address" id="address" name="address" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Contact Person Name :</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Contact Person Name" id="contact_person_name" name="contact_person_name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Contact Person Phone :</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Contact Person Phone." id="contact_person_phone" name="contact_person_phone" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Contact Person Email :</label>
                        <div class="col-sm-8">
                            <input required type="email" class="form-control" placeholder="Contact Person Email.." id="contact_person_email" name="contact_person_email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control" name="description" id="description" require></textarea>
                            
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        @if (json_decode($userPermits->inventory_module, true)['item_supplier']['edit'] == 1)
                            <button type="submit" class="btn btn-blue">Submit</button>
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
    $(document).ready(function() {
        $('.edit_route').on('click', function() {
            var id = $(this).data('id');
            
            if (id) {
                $.ajax({
                    url: "{{ url('admin/inventory/supplier/edit/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $("#item_supplier").val(data.item_supplier);
                        $("#phone").val(data.phone);
                        $("#email").val(data.email);
                        $("#address").val(data.address);
                        $("#contact_person_name").val(data.contact_person_name);
                        $("#contact_person_phone").val(data.contact_person_phone);
                        $("#contact_person_email").val(data.contact_person_email);
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