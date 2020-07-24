@extends('admin.master')
@push('css')
    <style>
    .edit_content {margin-top: 18rem;}
    td {line-height: 18px;}
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Assigned Subject</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->academic_module,true)['assign_subject']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Assign Subject</span>
                                </a>
                            @endif    
                        </div>
                    </div>
                </div>
            </div>

            <form action="" id="multiple_delete" method="post">
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
                            <thead>
                                <tr class="text-left">
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Subjects</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classSections as $classSection)

                                    <tr class="text-left">
                                        <td>{{ $classSection->class->name }}</td>
                                        <td>{{ $classSection->section->name }}</td>
                                        <td class="text-left">
                                            @foreach ($classSection->classSubjects as $classSubject)
                                            <b>- {{ $classSubject->subject->name }}</b> <br/>
                                            @endforeach
                                        </td>

                                        <td class="text-center">
                                            <a onclick="subjectInfo( {{ $classSection->id }}, {{ $classSection->class->id }} )" class="edit_assign_subject btn btn-sm btn-blue text-white" data-id="{{ $classSection->id }}" title="edit" data-toggle="modal" data-target="#editModal">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a> 

                                            @if (json_decode($userPermits->academic_module,true)['assign_subject']['delete'] == 1)   
                                            | <a id="delete" href="{{ route('admin.academic.assign.subject.class.delete', $classSection->id) }}" class="btn btn-danger btn-sm text-white" title="Delete">
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
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Assign Subject To Class</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form id="assign_subject_form" class="form-horizontal" action="{{ route('admin.academic.assign.subject.class') }}" method="POST">
                    @csrf
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label p-0 m-0"><b>Class</b> :</label>
                            <select class="form-control select_class class_id" name="class_id">
                                <option value="">Select class</option>
                                @foreach ($formClasses as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                            <span class="error class_id_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label p-0 m-0"><b>Select Section</b> :</label>
                            <select class="form-control section_id" id="sections" name="section_id">
                                <option value="">Select section</option>
                            </select>
                            <span class="error section_id_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label p-0 m-0"><b>Select Sbujects</b>  (Multiple) :</label>
                            <select class="select2" multiple="multiple" name="subject_ids[]" data-placeholder="Section" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach ($formSubjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            <span class="error subject_ids_error"></span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label=""> Close </button>
                        <button type="submit" class="btn loading_button btn-sm btn-blue">Loading...</button>
                        <button type="submit" class="btn submit_button btn-sm btn-blue">Submit</button>
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
                <h6 class="modal-title" id="exampleModalLabel">Update Assign Subject</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" action="{{ route('admin.academic.assign.subject.class.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" id="class_section_id" name="class_section_id" value="">
                    <input type="hidden" id="class_id" name="class_id" value="">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select required class="select2 subjects" id="subjects" multiple="multiple" name="subject_ids[]" data-placeholder="Subjects" data-dropdown-css-class="select2-purple" style="width: 100%;">

                            </select>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label="">Close</button>
                        @if (json_decode($userPermits->academic_module,true)['assign_subject']['edit'] == 1) 
                            <button type="submit" class="btn btn-sm btn-blue">Update</button>
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
        $('.loading_button').hide();
        @if (Session::has("successMsg"))
            toastr.success('{{ session('successMsg') }}', 'Successfull');
        @endif
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.modal_close_button').on('click', function(){
                $('.error').html('');
                $('.form-control').removeClass('is-invalid');
            });
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
            //Initialize Select2 Elements
            $('.select2').select2()
            //Initialize Select2 Elements
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.select_class').on('change', function () {
                var classId = $(this).val();
                $.ajax({
                    url:"{{ url('admin/academic/assign/subjects/get/sections/by/') }}"+"/"+classId,
                    type:'get',
                    dataType:'json',
                    success:function(data){
                        //console.log(data);
                        $('#sections').empty();
                        $('#sections').append(' <option value="">--Select Section--</option>');
                        $.each(data,function(key, val){
                            $('#sections').append(' <option value="'+ val.section_id +'">'+ val.section.name +'</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script>
        function subjectInfo(classSectionId, classId){
            var class_section_id = classSectionId;
            $('#class_section_id').val(class_section_id);
            var class_id = classId;
            $('#class_id').val(classId);
            $.ajax({
                url:"{{ url('admin/academic/assign/subjects/get/assigned/subject') }}"+"/"+class_section_id,
                type:'get',
                success:function(data){
                    $('.subjects').empty();
                    $('.subjects').append(data);
                }
            });
        }
    </script>

    <script>
        $(document).ready(function () {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#assign_subject_form', function(e){
                e.preventDefault();
                $('.submit_button').hide();
                $('.loading_button').show();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if(!$.isEmptyObject(data.error)){
                            $('.submit_button').show();
                            $('.loading_button').hide();
                            toastr.error(data.error);
                        }else{
                            $('.submit_button').show();
                            $('.loading_button').hide();
                            $('.error').html('');
                            $('#assign_subject_form')[0].reset();
                            $('#myModal1').modal('hide');
                            window.location = "{{ url()->current() }}";
                        }
                    },
                    error:function(err){
                        $('.submit_button').show();
                        $('.loading_button').hide();
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.class_id){
                            $('.class_id_error').html('Class field is required.');
                            $('.class_id').addClass('is-invalid');
                        }else{
                            $('.class_id_error').html('');
                            $('.class_id').removeClass('is-invalid');
                        }

                        if(err.responseJSON.errors.section_id){
                            $('.section_id_error').html('Section field is required.');
                            $('.section_id').addClass('is-invalid');
                        }else{
                            $('.section_id_error').html('');
                            $('.section_id').removeClass('is-invalid');
                        }
                        
                        if(err.responseJSON.errors.subject_ids){
                            $('.subject_ids_error').html('Subject field is required.');
                            $('.subject_ids').addClass('is-invalid');
                        }else{
                            $('.subject_ids_error').html('');
                            $('.subject_ids').removeClass('is-invalid');
                        }
                    }
                });
            });
        });
    </script> 

@endpush
