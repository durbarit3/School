@extends('admin.master')
@section('content')

<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Issue Item</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        @if (json_decode($userPermits->inventory_module, true)['inventory_issue']['add'] == 1)
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                <i class="fas fa-plus"></i></span> <span>Add Issue Item</span>
                            </a>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    
        <div class="panel_body">
            <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                    <thead>
                        <tr class="text-center">
                            <th>
                                SL
                            </th>
                            <th>Item</th>
                            <th>Item Category</th>
                            <th>Issue-Return </th>
                            <th>Issue To </th>
                            <th>Issued By </th>
                            <th>Quantity </th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($inventoryissues as $row)
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{ $row->inventoryItem->item }}</td>
                            <td>{{ $row->inventoryCategory->category }}</td>
                            <td>{{ $row->isuereturn }}</td>
                            <!-- <td>{{$row->issuedate}} - {{$row->returndate}}</td> -->
                            
                            <td>{{ $row->inventoryStudent->name }}</td>
                            <td>{{ $row->inventoryAdmin->adminname }}</td>
                            <td>{{ $row->qty }}</td>
                            <td>
                                @if ($row->returned_status == 0)
                                    @if (json_decode($userPermits->inventory_module, true)['inventory_issue']['edit'] == 1)
                                        <a href="{{ route('inventory.issue.return', $row->id) }}" class="btn btn-danger btn-sm ">
                                            Click to return
                                        </a>
                                    @else
                                        <h6 class="badge badge-danger"><b>Item due</b> </h6>
                                    @endif 
                                @else
                                    <h6 class="badge badge-success"><b>Item returned</b> </h6>
                                @endif 
                            </td>
             
                            <td>
                                @if (json_decode($userPermits->inventory_module, true)['inventory_issue']['delete'] == 1)
                                    <a id="delete" href="{{route('inventory.issue.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h4 class="modal-title">Issue Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('inventory.issue.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Role:</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="exampleFormControlSelect1" name="role">
                                <option> --- Select Role ---</option>
                                @foreach($roles as $row)
                                    <option value="{{$row->role_known_id}}">{{$row->name}}</option>
                                @endforeach
                              
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Issue By:</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="exampleFormControlSelect1" name="issueby">
                                <option>Select</option>
                                @foreach($issuers as $row)
                                    <option value="{{$row->id}}">{{$row->adminname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Issue To:</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="exampleFormControlSelect1" name="issueto">
                                <option>Select</option>
                                @foreach($students as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Issue Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="issuedate" require/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Return Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="returndate" require/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Item Category:</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="cateory" name="category">
                                <option>-- Category --</option>
                                @foreach($categores as $row)
                                  <option value="{{$row->id}}">{{$row->category}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Item:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="item" id="cat_items">
                               
                            </select>
                        </div>
                    </div>

                       <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Quantity:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="qty" placeholder="Enter Quantity..">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3"  class="form-control" name="description" require></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        @if (json_decode($userPermits->inventory_module, true)['inventory_issue']['add'] == 1)
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
            $('#cateory').on('change', function() {
                var id = $( this ).val();
                if (id) {
                    $.ajax({
                        url: "{{ url('admin/inventory/issue/items') }}/" + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            $('#cat_items').empty();
                            $('#cat_items').append(' <option value="0">--Please Select Your Items--</option>');
                            $.each(data,function(index,itemobj){
                                $('#cat_items').append('<option value="' + itemobj.id + '">'+itemobj.item+'</option>');
                            });
                        }
                    });
                } else {
                    // alert('danger');
                }
            });
        });
    </script>

@endpush