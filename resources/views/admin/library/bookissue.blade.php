@extends('admin.master')
@section('content')

<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Book Issue</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Issue Book</span></a>
                        </div>
                    </div>
                </div>
        </div>
    
        <div class="panel_body">
       
            <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered  table-hover mb-2">
                    <thead>
                        <tr class="text-center">
                            <th>
                                SL
                            </th>
                            <th>Book Name.</th>
                            <th>Book No.</th>
                            <th>Rack Number</th>
                            <th>Issue-Return </th>
                            <th>Issue To </th>
                            <th>Card no </th>
                            <th>Issued By </th>
                            <th>Quantity </th>
                            <th>Return Status </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $row)
                            <tr class="text-center">
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$row->issuebook->title}}</td>
                                <td>{{$row->issuebook->book_no}}</td>
                                <td>{{$row->issuebook->Rack_no}}</td>
                                <td>{{$row->issuedate}} - {{$row->returndate}}</td>
                                <td>
                                    {{$row->libraryMember->student->first_name .' '.$row->libraryMember->student->last_name}}
                                </td>
                                <td>{{$row->libraryMember->card_no}}</td>
                                <td>{{$row->issueby}}</td>
                                <td>{{$row->qty}}</td>
                                <td>
                                    {{-- <i class="fas fa-thumbs-up" title=""></i> --}}
                                    @if ($row->returned_status == 0)
                                        <a href="{{ route('book.issue.return', $row->id) }}" class="btn btn-danger btn-sm ">
                                            Click to return
                                        </a> 
                                    @else
                                        <h6 class="badge badge-success"><b>Book returned</b> </h6>
                                    @endif
                                </td>
                
                                <td>
                                    <a id="delete" href="{{route('book.issue.return',$row->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
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
                <form class="form-horizontal" action="{{ route('book.issue.store') }}" method="POST">
                    @csrf
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Issued Book:</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="exampleFormControlSelect1" name="bookid">
                                <option value="">--- Select Book ---</option>
                                @foreach($librarybooks as $row)    
                                    <option value="{{$row->id}}">{{$row->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Issue To:</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="exampleFormControlSelect1" name="issueto">
                                <option value="">-- Select Library Member ---</option>
                                @foreach($members as $row)    
                                    <option value="{{$row->id}}">{{$row->student->first_name .' '.$row->student->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Issue By:</label>
                        <div class="col-sm-8">
                            <select required class="form-control" id="exampleFormControlSelect1" name="issueby">
                                <option value="">-- Select Library Staff --</option>
                                @foreach($staffs as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Issue Date</label>
                        <div class="col-sm-8">
                            <input required type="date" class="form-control" name="issuedate" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Return Date</label>
                        <div class="col-sm-8">
                            <input required type="date" class="form-control" name="returndate"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Quantity:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" name="qty" placeholder="Enter Quantity..">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea required rows="3"  class="form-control" name="description"></textarea>
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