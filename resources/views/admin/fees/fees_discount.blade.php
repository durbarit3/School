@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Fees Discount List</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->fees_collection_module, true)['fees_discount']['add'] == 1)
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                <i class="fas fa-plus"></i></span> <span>Add Discount</span>
                            </a>
                            @endif        
                        </div>
                    </div>
                </div>
        </div>
        <form action="{{route('admin.fees.discount.multi.delete')}}" method="post">
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
                            <th>Discount Code</th>
                            <th>Amount</th>
                            
                            <th>Status </th>
                            <th>Price </th>
                        </tr>
                    </thead>
                    <tbody>

                   @foreach($feesdiscounts as $row)
                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$row->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->code}}</td>
                            <td>{{$row->amount}}</td>

                            <td>
                                @if (json_decode($userPermits->fees_collection_module, true)['fees_discount']['add'] == 1)
                                    @if($row->status == 1)
                                        <a href="{{ route('fees.discount.status.update', $row->id) }}" class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('fees.discount.status.update', $row->id ) }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                    @endif
                                    |
                                @endif
                            </td>
             
                            <td>

                                <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$row->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> 

                                @if (json_decode($userPermits->fees_collection_module, true)['fees_discount']['delete'] == 1)
                                    | <a id="delete" href="{{route('admin.fees.discount.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
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
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Discount</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.fees.discount.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Fees Discount Type Name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Discount Code:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Fees Discount Code" name="code" required>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Discount Amount:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="Fees Discount Amount" name="amount" required>
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
                        
                        @if (json_decode($userPermits->fees_collection_module, true)['fees_discount']['add'] == 1)
                            <button type="submit" class="btn btn-blue">Submit</button>
                        @endif  
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
                <h5 class="modal-title" id="exampleModalLabel">Update Fees Discount</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.fees.discount.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input required type="hidden" class="form-control" id="id" placeholder="Fees Discount Type Name" name="id" required>
                            <input required type="text" class="form-control" id="name" placeholder="Fees Discount Type Name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Discount Code:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" id="code" placeholder="Fees Discount Code" name="code" required>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Discount Amount:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" id="amount" placeholder="Fees Discount Amount" name="amount" required>
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
                        @if (json_decode($userPermits->fees_collection_module, true)['fees_discount']['edit'] == 1)
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
                    url: "{{ url('admin/fees/discount/edit/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $("#name").val(data.name);
                        $("#code").val(data.code);
                        $("#amount").val(data.amount);
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