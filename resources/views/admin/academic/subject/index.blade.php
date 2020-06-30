@extends('admin.master')
@push('css')

    <style>
        .radio_input {
            padding: 2px;
            
        }
        .red_border{
            border: 1px solid red;
        }
    </style>
    
@endpush
@section('content')

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Subjects</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Subject</span></a>
                        </div>
                    </div>
                </div>

            </div>
        <form id="multiple_delete" action="{{ route('admin.academic.subject.multiple.delete') }}" method="post">
                @csrf
                {{--  <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>  --}}
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        <label class="chech_container mb-1 p-0">
                                            Select all
                                            <input type="checkbox" id="check_all">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th>Subject Name</th>
                                    <th>Subject Type</th>
                                    <th>Subject Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                <tr class="text-center">
                                    <td>
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" name="deleteId[]" class="checkbox"
                                                value="{{$subject->id}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{$subject->name}}</td>
                                    <td>{{$subject->type == 1 ? 'Theory' : 'Practical'}}</td>
                                    <td>{{$subject->code}}</td>
                                    @if($subject->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        @if($subject->status==1)
                                        <a href="{{ route('admin.academic.subject.status.update', $subject->id ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.academic.subject.status.update', $subject->id ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                    | <a href="#" class="edit_class btn btn-sm btn-blue text-white"
                                        data-id="{{ $subject->id }}" title="edit" data-toggle="modal"
                                        data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                        <a id="delete" href="{{ route('admin.academic.subject.delete', $subject->id) }}"
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
                <h6 class="modal-title">Add Subject</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="subject_add_form" class="form-horizontal" action="{{ route('admin.academic.subject.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label"><b>Subject Name</b> :</label>
                            <input type="text" class="form-control name" value="{{ old('name') }}" placeholder="Subject Name" name="name">
                            <span class="span error name_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 is-invalid">
                            <label class="col-form-label p-0 m-0"><b>Subject Type</b> :</label><br>
                            <div class="radio_input">
                                <input type="radio" value="1" class="mr-1" name="type">  Theory &ensp;
                                <input type="radio"  value="2" class="mr-1" name="type"> Practical 
                            </div>
                            <span class="span error type_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label"><b>Subject Code </b> :</label>
                            <input type="text" class="form-control code" value="{{ old('code') }}" placeholder="Subject Code" name="code">
                            <span class="span error code_error"></span>
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
                <h6 class="modal-title" id="exampleModalLabel">Update Subject</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit_modal_body">
                
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
                $('.radio_input').removeClass('red_border');
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

    <script>
        $(document).ready(function () {
            $(document).on('click', '.edit_class', function(){
                var subject_id = $(this).data('id');
                $.ajax({
                    url:"{{ url('admin/academic/subject/edit/') }}" + "/" + subject_id,
                    type:'get',
                    success:function(data){
                        $('.edit_modal_body').empty();
                        $('.edit_modal_body').append(data);
                    }
                });
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

            $(document).on('submit', '#subject_add_form', function(e){
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
                    $('#subject_add_form')[0].reset();
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

                        if(err.responseJSON.errors.type){
                            $('.type_error').html(err.responseJSON.errors.type[0]);
                            $('.radio_input').addClass('red_border');
                        }else{
                            $('.type_error').html('');
                            $('.radio_input').removeClass('red_border');
                        } 
                        
                        if(err.responseJSON.errors.code){
                            $('.code_error').html(err.responseJSON.errors.type[0]);
                            $('.code').addClass('is-invalid');
                        }else{
                            $('.code_error').html('');
                            $('.code').removeClass('is-invalid');
                        }
                    }
                });
            });
        });
    </script> 
@endpush
