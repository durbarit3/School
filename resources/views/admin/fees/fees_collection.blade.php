@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
                    <div class="col-md-12">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Fees Details of <strong>hgd</strong></span>
                        </div>
                    </div>
                   
                </div>
        </div>
        
        <div class="panel_body">
       
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-2">
                    <thead>
                        <tr>
                            <th>
                                SL
                            </th>
                            <th>Fees Type</th>
                            <th>Fees Code</th>
                            <th>Due Date </th>
                            <th>Status </th>
                            <th>Amount </th>
                            <th>Payment ID </th>
                            <th>Mode </th>
                            <th>Date </th>
                            <th>Discount </th>
                            <th>Fine </th>
                            <th>Paid </th>
                            <th>Balance </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                         @php
                            print_r(json_decode($collections));
                        @endphp

                        @foreach(json_decode($collections) as $row)
                           
                        @endforeach


      

                        


                       
                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            
                            
                            <td>gfdfgfds</td>
                            <td>hgdggfhd</td>
                            <td>hfdhgf</td>
                            
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>
                                
                                <a href="{{ route('room.type.status.update', 1) }}" class="btn btn-success btn-sm ">
                                    <i class="fas fa-thumbs-up"></i></a>
                                
                                <a href="{{ route('room.type.status.update', 2 ) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-thumbs-down"></i>
                                </a>
                                
                            </td>
             
                            <td>
                                | <a class="edit_route btn btn-sm btn-blue text-white" data-id="" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                <a id="delete" href="" class="btn btn-danger btn-sm text-white" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                     
               
                         <tr  class="header">
                           <td colspan="4">Header</td>
                           <td>dsafdsaf</td>
                        </tr>

                        

      
                    
                       

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
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Route</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('hostel.room.type.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Room Type Name" name="room_type" required>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Route</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('room.type.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="room_type" id="room_type" required>
                            <input type="hidden" name="id" id="id">
                            <span class="text-danger">{{ $errors->first('room_type') }}</span>
                        </div>
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right mt-2">Description:</label>
                        <div class="col-sm-8 mt-2">
                            <textarea rows="3" class="form-control" id="description" name="description" require></textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
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
    $(document).ready(function() {
        $('.edit_route').on('click', function() {
            var id = $(this).data('id');
            
            if (id) {
                $.ajax({
                    url: "{{ url('admin/hostel/room/type/edit/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $("#room_type").val(data.room_type);
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