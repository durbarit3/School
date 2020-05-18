@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Library staff</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Staff</span></a>
                        </div>
                    </div>
                </div>
        </div>
        <form action="{{route('admin.staff.multidelete')}}" method="post">
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
                            <th>Card Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date Of Birth</th>
                            <th>Status </th>
                            <th>Price </th>
                        </tr>
                    </thead>
                    <tbody>

                   @foreach($staffs as $staff)
                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$staff->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{$staff->card_no}}</td>
                            <td>{{$staff->name}}</td>
                            <td>{{$staff->email}}</td>
                            <td>{{$staff->phone}}</td>
                            <td>{{$staff->date_birth}}</td>
                            <td>
                                @if($staff->status == 1)
                                <a href="{{ route('admin.staff.status.update', $staff->id) }}" class="btn btn-success btn-sm ">
                                    <i class="fas fa-thumbs-up"></i></a>
                                @else
                                <a href="{{ route('admin.staff.status.update', $staff->id) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-thumbs-down"></i>
                                </a>
                                @endif
                                
                            </td>
             
                            <td>
                                | <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$staff->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                <a href="{{route('admin.staff.delete',$staff->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h4 class="modal-title">Add Staff</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.library.staff.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Staff Name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Email:</label>
                        <div class="col-sm-8">
                            <input required type="email" class="form-control" placeholder="Staff email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Phone Number:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Staff Phone Number" name="phone" required>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Date Of Birth:</label>
                        <div class="col-sm-8">
                            <input required type="date" class="form-control" placeholder="Staff Date Of Birth" name="date_birth" required>
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
                <form class="form-horizontal" action="{{ route('admin.staff.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input required type="hidden" class="form-control" placeholder="Staff Name" name="id" id="id" required>
                            <input required type="text" class="form-control" placeholder="Staff Name" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Email:</label>
                        <div class="col-sm-8">
                            <input required type="email" class="form-control" placeholder="Staff email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Phone Number:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Staff Phone Number" id="phone" name="phone" required>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Date Of Birth:</label>
                        <div class="col-sm-8">
                            <input required type="date" class="form-control" placeholder="Staff Date Of Birth" id="date_birth" name="date_birth" required>
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
                    url: "{{ url('admin/library/staff/edit') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $("#name").val(data.name);
                        $("#email").val(data.email);
                        $("#id").val(data.id);
                        $("#date_birth").val(data.date_birth);
                        $("#phone").val(data.phone);
                    }
                });
            } else {
                // alert('danger');
            }

        });
    });
</script>

@endpush