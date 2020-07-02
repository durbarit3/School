@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Fees Collect List</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Search Student</span></a>
                        </div>
                    </div>
                </div>
        </div>

       
        <div class="panel_body">
       
            <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                    <thead>
                        <tr>
                            <th>
                                SL
                            </th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Admission No </th>
                            <th>Student Name </th>
                            <th>Father Name </th>
                            <th>Date of Birth </th>
                            <th>Phone </th>
                            <th>Price </th>
                        </tr>
                    </thead>
                    <tbody>

                   @if(count($students) >0 )

                   @foreach($students as $row)

                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{$row->classes->name ?? ' '}}</td>
                            <td>{{$row->section}}</td>
                            <!-- <td>{{$row->section->name ?? ' '}}</td> -->
                            
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>
                                
                               dsafdsfdsf
                                
                            </td>
             
                            <td>
                                | <a href="{{route('admin.fees.collection',$row ->id)}}" class="edit_route btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                            </td>
                        </tr>
                        @endforeach

                    @endif
                       

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
                <h4 class="modal-title">Search Students</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{route('admin.fees.students.collection.search')}}"  method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                        <select class="form-control" id="std_class" name="std_class">
                          <option selected="" disabled="">Select A Class Name</option>
                          @foreach($classes as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                          @endforeach
                         
                        </select>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                         <div class="col-sm-8">
                        <select class="form-control" id="section_id" name="std_section">
                          <option selected="" disabled="">Select A Section Name</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
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
        $('#std_class').on('change', function() {
            var id = $(this).val();
            
            
            if (id) {
                $.ajax({
                    url: "{{ url('/admin/fees/collect/search/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                    $('#section_id').empty();
                                        $('#section_id').append(' <option value="0">--Please Select Your Section--</option>');
                                        $.each(data,function(index,sectionobj){
                                            $.each(sectionobj.sections,function(index,section){
                                                 $('#section_id').append('<option value="' + section.id + '">'+section.name+'</option>');
                                            });
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