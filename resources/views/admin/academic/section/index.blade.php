@extends('admin.master')
@section('content')

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Sections</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Section</span></a>
                        </div>
                    </div>
                </div>

            </div>
        <form id="multiple_delete" action="{{ route('admin.academic.section.multiple.delete') }}" method="post">
                @csrf
                {{--  <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>  --}}
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Capacity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                <tr class="text-center">
                                  
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $section->name }}</td>
                                    <td>{{ $section->capacity }}</td>
                                    @if($section->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        @if($section->status==1)
                                        <a href="{{ route('admin.academic.section.status.update', $section->id ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.academic.section.status.update', $section->id ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                        | <a class="edit_section btn btn-sm btn-blue text-white"
                                            data-id="{{ $section->id }}" title="edit" data-toggle="modal"
                                            data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                        <a id="delete" href="{{ route('admin.academic.delete', $section->id) }}"
                                            class="btn btn-danger btn-sm text-white" title="Delete">
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
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add Section</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="section_add_form" class="form-horizontal" action="{{ route('admin.academic.section.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                       
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label p-0 m-0"><b>Name </b>:</label>
                            <input type="text" class="form-control name" placeholder="Section name" name="name">
                            <span class="error name_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label p-0 m-0"><b>Capacity</b> :</label>
                            <input type="number" class="form-control capacity" placeholder="Section capacity" name="capacity">
                            <span class="error capacity_error"></span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-sm btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Update Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.academic.section.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        
                        <div class="col-sm-12">
                            <label for="name" class="col-form-label p-0 m-0"><b> Name</b> :</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                            <input type="hidden" name="id" id="id">

                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="col-sm-12">
                            <label for="capacity" class="col-form-label p-0 m-0"><b>Capacity</b> :</label>
                            <input type="text" class="form-control" name="capacity" id="capacity" required>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
                        <button type="submit" class="btn btn-sm btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

    <script type="text/javascript">

        $(document).ready(function () {

            $('.modal_close_button').on('click', function(){
                $('.error').html('');
                $('.form-control').removeClass('is-invalid');
            })

        });

    </script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('#check_all').on('click', function (e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                } else {
                    $(".checkbox").prop('checked', false);
                }
            });

        });

    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('.edit_section').on('click', function () {
                var sectionId = $(this).data('id');
                if (sectionId) {
                    $.ajax({
                        url: "{{ url('admin/academic/section/edit/') }}/" + sectionId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $("#name").val(data.name);
                            $("#capacity").val(data.capacity);
                            $("#id").val(data.id);
                        }
                    });
                } else {
                    alert('danger');
                }

            });
        });
    </script>

    <script>
        $(document).ready(function () {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#section_add_form', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){

                    $('.error').html('');
                    $('#section_add_form')[0].reset();
                    $('#myModal1').modal('hide');
                    toastr.success(data);
                    setInterval(function(){
                        window.location = "{{ url()->current() }}";
                    }, 900)
                        
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.name){
                            $('.name_error').html(err.responseJSON.errors.name[0]);
                            $('.name').addClass('is-invalid');
                        }else{
                            $('.name_error').html('');
                            $('.name').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.capacity){
                            $('.capacity_error').html(err.responseJSON.errors.capacity[0]);
                            $('.capacity').addClass('is-invalid');
                        }else{
                            $('.capacity_error').html('');
                            $('.capacity').removeClass('is-invalid');
                        }
                    }
                });
            });
        });

    </script> 

@endpush
