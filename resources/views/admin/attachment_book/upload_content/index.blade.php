@extends('admin.master')
@push('css')
    <style>
        .checkbox_border {
            border: 1px solid lightgray;
            padding: 0px 5px;
            margin-top: 5px;
            border-radius: 3px;
        }  
        .dropify-wrapper{
            max-height: 50px;
        }
        .dropify-wrapper.has-error .dropify-message .dropify-error, .dropify-wrapper.has-preview .dropify-clear {
            display: block;
            margin-top: -5px;
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Upload Contents</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->attachment_book_module, true)['upload_content']['add'] == 1) 
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span><span>Add Attachment</span>
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
                                    <th>Title</th>
                                    <th>Publish Date</th>
                                    <th>Type</th>
                                    <th>Class </th>
                                    <th>Subject </th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                             <tbody>
                                @foreach($uploadContents as $uploadContents)
                                <tr class="text-center">
                                   
                                    <td title="{{ $uploadContents->title }}">{{ Str::limit($uploadContents->title, 40) }}</td>
                                    <td>{{ $uploadContents->publish_date }}</td>
                                    <td>{{ $uploadContents->attachmentType->name }}</td>
                                   
                                    <td>{{ $uploadContents->class ? $uploadContents->class->name : 'For all class' }}</td>
                                    <td>{{ $uploadContents->subject ? $uploadContents->subject->name : 'Not according to subject' }}</td>
                                    <td>{{ $uploadContents->note }}</td>
                                    @if($uploadContents->is_published==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Published</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Not Published</span></td>
                                    @endif
                                    <td>
                                        @if (json_decode($userPermits->attachment_book_module, true)['upload_content']['edit'] == 1)
                                            @if($uploadContents->is_published == 1)
                                            <a href="{{ route('admin.attachment.upload.content.change.status', $uploadContents->id ) }}"
                                                class="btn btn-success btn-sm ">
                                                <i class="fas fa-thumbs-up"></i></a>
                                            @else
                                            <a href="{{ route('admin.attachment.upload.content.change.status', $uploadContents->id ) }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-thumbs-down"></i>
                                            </a>
                                            @endif
                                            |
                                        @endif

                                    @if($uploadContents->is_published == 1)
                                    <a class="btn btn-sm btn-dark" href="{{url('public/uploads/attachment_file/'.$uploadContents->attachment_file)}}"
                                        download="{{ $uploadContents->attachment_file }}"
                                        ><i class="fas fa-download"></i></a> |
                                    @endif

                                    <a href="#" data-id="{{ $uploadContents->id }}" title="edit" data-toggle="modal"
                                        data-target="#editModal" class="edit_attachment btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> 

                                    @if (json_decode($userPermits->attachment_book_module, true)['upload_content']['delete'] == 1)   
                                        | <a id="delete" href="{{ route('admin.attachment.upload.content.delete', $uploadContents->id) }}"
                                            class="btn btn-danger btn-sm text-white" title="Delete">
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
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Upload Content</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.attachment.upload.content.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right m-0 p-0">Title :</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Attachment title" name="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label  class="col-form-label text-right m-0 p-0">Type :</label>
                            <select required name="type" class="form-control form-control-sm">
                                <option value="">Select type</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}"> {{ $type->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="checkbox_border">
                                <label class="chech_container available_for_all_class mt-1">
                                    <input type="checkbox" name="available_for_all_class" class="checkbox"
                                        value="available_for_all_class">
                                    <b><span>Available For All Class</span></b> 
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="classes" class="form-group row">
                        <div class="col-sm-12">
                            <label  class="col-form-label text-right m-0 p-0">Class :</label>
                            <select required name="class_id" class="form-control class_id form-control-sm">
                                <option value="">Select class</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}"> {{ $class->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="subject_checkbox" class="form-group row">
                        <div class="col-sm-12">
                            <div class="checkbox_border">
                                <label class="chech_container available_for_all_class mt-1">
                                    <input type="checkbox" name="not_according_to_subject" class="checkbox2"
                                        value="not_according_to_subject">
                                        <b><span>Not According Subject</span></b> 
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="subjects" class="form-group row">
                        
                        <div class="col-sm-12">
                            <label class="col-form-label text-right m-0 p-0">Subject :</label>
                            <select required name="subject_id" class="form-control subject_id form-control-sm">
                                <option value="">Select subject</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right m-0 p-0">Publish Date :</label>
                            <input type="text" autocomplete="off" class="form-control form-control-sm add_in_date_picker" value="" name="publish_date" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right m-0 p-0">Remarks (Optional) :</label>
                            <input name="note" type="text" placeholder="Remarks" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right m-0 p-0">Attachment File :</label>
                            <input required accept=".jpg, .jpeg, .png, .gif, .txt, .csv, .xlsx" type="file" id="photo" name="attachment_file" id="input-file-now"
                                class="form-control dropify" size="20" required/>
                        </div>
                    </div>

                    <div class="form-group pt-2 text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        @if (json_decode($userPermits->attachment_book_module, true)['upload_content']['add'] == 1)
                            <button type="submit" class="btn btn-sm btn-blue">Submit</button>
                        @endif
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
                <h5 class="modal-title" id="exampleModalLabel">Update Income</h5>
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

        $('.checkbox').on('change', function (e) {
            if ($(this).is(':checked', false)) {
                $(".checkbox").prop('checked', true);
                $(".subject_id").prop('required', false);
                $(".class_id").prop('required', false);
                $("#classes").hide(500);
                $("#subjects").hide(500);
                $("#subject_checkbox").hide(500);
                
            } else {
                $(".checkbox").prop('checked', false);
                $(".subject_id").prop('required', true);
                $(".class_id").prop('required', true);
                $("#classes").show(500);
                $("#subjects").show(500);
                $("#subject_checkbox").show(500); 
                if($('.checkbox2').is(':checked', true)){
                    $("#subjects").hide();
                    $(".subject_id").prop('required', false);
                }
            }
        });

        $('.checkbox2').on('change', function (e) {
            if ($(this).is(':checked', false)) {
                $(".checkbox2").prop('checked', true);
                $(".subject_id").prop('required', false);
                $("#subjects").hide(500);
            } else {
                $(".checkbox").prop('checked', false);
                $(".subject_id").prop('required', true);
                $("#subjects").show(500); 
            }
        });
    });

</script>

<script>
    $(document).ready(function () {
        $(document).on('click', '.edit_attachment', function(){
            var attachment_id = $(this).data('id');
                $.ajax({
                    url:"{{ url('admin/attachment/upload/contents/edit') }}" + "/" + attachment_id,
                    type:'get',
                    success:function(data){
                        $('.edit_modal_body').empty();
                        $('.edit_modal_body').append(data);
                    }
                });
        });
   });

    $(document).ready(function(){
        $(document).ready(function(){
            $('.loading_button').hide();
            $('.add_in_date_picker').datepicker({
                format: 'dd.M.yyyy',
                autoclose:true
            });
        })
    });
</script>

<script>
    $(document).ready(function () {
        $('.class_id').on('change', function(){
            var class_id = $(this).val();
            console.log(class_id);
            $.ajax({
                url:"{{ url('admin/attachment/upload/contents/get/subjects/by/') }}" + "/" + class_id,
                type:'get',
                success:function(data){
                    $('.subject_id').empty();
                    $('.subject_id').append('<option value="">Select subject<option>');
                    $.each(data, function(key, val){
                        $('.subject_id').append('<option value="' + val.subject_id + '">' + val.subject.name + '</option>');
                    })  
                    
                }
            });
        });
    }); 

    $(document).ready(function () {
        $(document).on('change', '.eclass_id', function(){
            var class_id = $(this).val();
            console.log(class_id);
            $.ajax({
                url:"{{ url('admin/attachment/upload/contents/get/subjects/by/') }}" + "/" + class_id,
                type:'get',
                success:function(data){
                    $('.esubject_id').empty();
                    $('.esubject_id').append('<option value="">Select subjects<option>');
                    $.each(data, function(key, val){
                        $('.esubject_id').append(' <option value="' + val.subject_id + '">' + val.subject.name + '</option>');
                    })  
                    
                }
            });
        });
    }); 
</script>

<script>
    @error('attachment_file')
        toastr.error("{{ $errors->first('attachment_file') }}");
    @enderror
</script>

@endpush