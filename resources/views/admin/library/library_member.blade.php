@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
            <div class="col-md-6">
                <div class="panel_title">
                    <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Member List</span>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <div class="panel_title">
                    @if (json_decode($userPermits->library_module, true)['library_member']['add'] == 1)
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                            <i class="fas fa-plus"></i></span> <span>Add Member</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        </div>
        <form action="{{route('admin.library.member.multidelete')}}" method="post">
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
                            <th>Library Card No</th>
                            <th>Member Id</th>
                            
                            <th>Admission No</th>
                            <th>Student Name</th>
                            <th>Class</th>
                            <th>Father Name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Mobile Number</th>
                            <th>Status </th>
                            <th>Price </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($members as $row)
                        
                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$row->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{$row->card_no}}</td>
                            @foreach($row->students as $std)
                                <td>{{$std->roll_no}}</td>
                                <td>{{$std->admission_no}}</td>
                                
                                <td>{{$std->name}}</td>
                                <td>{{$std->Classes->name}}</td>
                                <td>{{$std->father_name}}</td>
                                <td>{{$std->date_of_birth}}</td>
                                <td>{{$std->Gender->name}}</td>
                                <td>{{$std->student_mobile}}</td>
                            @endforeach
                            <td>
                                @if (json_decode($userPermits->library_module, true)['library_member']['edit'] == 1)
                                    @if($row->status == 0)
                                    <a href="{{ route('admin.library.status', $row->id ) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('admin.library.status', $row->id ) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-thumbs-up"></i>
                                    </a>
                                    @endif
                                    | 
                                @endif
                                
                            </td>
             
                            <td>
                                <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$row->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> 

                                @if (json_decode($userPermits->library_module, true)['library_member']['delete'] == 1)
                                    | <a href="{{route('admin.library.member.delete',$row->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h4 class="modal-title">Add Member</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.library.members.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Student Class:</label>
                        <div class="col-sm-8">
                             <select class="form-control" name="class_id" id="stdclass">
                              <option disabled selected>Select Student Class</option>
                              @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                              @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Student Name:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="student_id" id="studnets">
                              <option disabled selected>Select A Student</option>
                              <option value="2">2</option>
                              <option value="2">3</option>
                              <option value="2">4</option>
                              <option value="2">5</option>
                            </select>
                        </div>
                       
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Card Number:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="card_no" id="room_type" required>
                            
                           
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
                <h5 class="modal-title" id="exampleModalLabel">Update Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.library.members.update') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Student Class:</label>
                        <div class="col-sm-8">
                             <select class="form-control" name="class_id" id="updatestdclass">
                              <option disabled selected>Select Student Class</option>
                              @foreach($classes as $class)
                              <option value="{{$class->id}}">{{$class->name}}</option>
                              @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Student Name:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="student_id" id="updatestudnets">
                              <option disabled selected>Select A Student</option>
                              <option value="2">2</option>
                              <option value="2">3</option>
                              <option value="2">4</option>
                              <option value="2">5</option>
                            </select>
                        </div>
                       
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Card Number:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="card_no" id="card_no" required>
                            <input type="hidden" class="form-control" name="id" id="id" required>
                            
                           
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        @if (json_decode($userPermits->library_module, true)['library_member']['edit'] == 1)
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
<script>
    $(document).ready(function() {
        $('#stdclass').change(function(params) {

            var class_id = $(this).val();
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/admin/library/member/info') }}/" + class_id,
                dataType:"json",
                success: function(data) {

                    $('#studnets').empty();
                    $('#studnets').append(' <option value="0">--Please Select Your Students Name--</option>');
                    $.each(data,function(index,stdobj){
                        $('#studnets').append('<option value="' + stdobj.id + '">'+stdobj.first_name+'</option>');
                    });
                }
            });
         });
        });



    $(document).ready(function() {
        $('#updatestdclass').change(function(params) {

            var class_id = $(this).val();

        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/admin/library/member/info') }}/" + class_id,
                dataType:"json",
                success: function(data) {

                    $('#updatestudnets').empty();
                    $('#updatestudnets').append(' <option value="0">--Please Select Your Students Name--</option>');
                    $.each(data,function(index,stdobj){
                        $('#updatestudnets').append('<option value="' + stdobj.id + '">'+stdobj.first_name+'</option>');
                    });
                }
            });
         });
        });

    $(document).ready(function() {
        $('.edit_route').on('click', function() {

            var id = $(this).data('id');
            
            
            
            if (id) {
                $.ajax({
                    url: "{{ url('admin/library/member/edit/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        
                        $("#card_no").val(data.card_no);
                      
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