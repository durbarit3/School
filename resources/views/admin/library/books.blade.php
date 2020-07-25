@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
            <div class="col-md-6">
                <div class="panel_title">
                    <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Book List</span>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <div class="panel_title">
                    @if (json_decode($userPermits->library_module, true)['book_list']['add'] == 1)
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                            <i class="fas fa-plus"></i></span> <span>Add Book</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        </div>
        <form action="{{route('admin.book.multidelete')}}" method="post">
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
                            <th>Book Title</th>
                            <th>Book Number</th>
                            <th>ISBN Number</th>
                            <th>Publisher </th>
                            <th>Author </th>
                            <th>Subject </th>
                            <th>Rack Number </th>
                            <th>Qty </th>
                            <th>Available </th>
                            <th>Price </th>
                            <th>Status </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>

                   
                   @foreach($books as $book)
                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$book->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->book_no}}</td>
                            <td>{{$book->isbn_no}}</td>
                            <td>{{$book->publisher}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->subject}}</td>
                            <td>{{$book->Rack_no}}</td>
                            <td>{{$book->qty}}</td>
                            <td>{{$book->book_price}}</td>
                            <td>{{$book->description}}</td>
                          
                          
                            <td>
                                @if (json_decode($userPermits->library_module, true)['book_list']['edit'] == 1)
                                    @if($book->status ==1)
                                    <a href="{{ route('admin.book.status', $book->id) }}" class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>
                                    @else
                                    <a href="{{ route('admin.book.status', $book->id ) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @endif
                                    |
                                @endif  
                            </td>
             
                            <td>
                                <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$book->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> 

                                @if (json_decode($userPermits->library_module, true)['book_list']['delete'] == 1)
                                | <a id="delete" href="{{route('admin.book.delete',$book->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h4 class="modal-title">Add Book</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.library.book.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Book Title:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Book Title" name="title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Book Number:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="Book Number" name="book_no" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">ISBN Number:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="ISBN Number" name="isbn_no" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Publisher Name:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Publisher Name" name="publisher" required>
                        </div>
                    </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Author:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Author Name" name="author" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Subject:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="subject Name" name="subject" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Rack Number:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="Rack Number" name="Rack_no" required>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Qty:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="Qty" name="qty" required>
                        </div>
                    </div>



                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Book Price:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="Book Price" name="book_price" required>
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
                        @if (json_decode($userPermits->library_module, true)['book_list']['add'] == 1)
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
                <h5 class="modal-title" id="exampleModalLabel">Update Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.library.book.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Book Title:</label>
                        <div class="col-sm-8">
                            <input required type="hidden" class="form-control" placeholder="Book Title" id="id" name="id" required>
                            <input required type="text" class="form-control" placeholder="Book Title" id="title" name="title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Book Number:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="Book Number" id="book_no" name="book_no" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">ISBN Number:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="ISBN Number" name="isbn_no" id="isbn_no" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Publisher Name:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Publisher Name" id="publisher" name="publisher" required>
                        </div>
                    </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Author:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Author Name" name="author" id="author" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Subject:</label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="subject Name" id="subject" name="subject" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Rack Number:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="Rack Number" id="Rack_no" name="Rack_no" required>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Qty:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="Qty" id="qty" name="qty" required>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Book Price:</label>
                        <div class="col-sm-8">
                            <input required type="number" class="form-control" placeholder="Book Price" id="book_price" name="book_price" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" class="form-control" id="description" name="description" require></textarea>
                            
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
                        @if (json_decode($userPermits->library_module, true)['book_list']['edit'] == 1)
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
                    url: "{{ url('admin/library/books/edit/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $("#id").val(data.id);
                        $("#title").val(data.title);
                        $("#book_no").val(data.book_no);
                        $("#isbn_no").val(data.isbn_no);
                        $("#publisher").val(data.publisher);
                        $("#author").val(data.author);
                        $("#subject").val(data.subject);
                        $("#Rack_no").val(data.Rack_no);
                        $("#qty").val(data.qty);
                        $("#book_price").val(data.book_price);
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