@extends('admin.master')
@push('css')
<style>
    
    td {
        line-height: 16px;
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Exam lists</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->exam_module,true)['exam']['exam_setup']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i><span>Add Exam</span>
                                </a>
                            @endif    
                        </div>
                    </div>
                </div>
            </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>Exam Name</th>
                                    <th>Type</th>
                                    <th>Term</th>
                                    <th>Session</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Distributions</th>                       
                                    <th>Status</th>                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exams as $exam)
                                <tr class="text-center">
                                 
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->type }}</td>
                                    <td>{{ $exam->exam_term_id ? $exam->term->name : 'N/A' }}</td>
                                    <td>{{ $exam->session->session_year }}</td>
                                    <td>{{ $exam->starting_date }}</td>
                                    <td>{{ $exam->ending_date }}</td>
                                    <td class="text-left">
                                        @foreach (json_decode($exam->distributions,true) as $distribution)
                                        <b>- {{ $distribution }}</b> <br/>
                                        @endforeach
                                    </td>
                                    @if($exam->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        @if (json_decode($userPermits->exam_module,true)['exam']['exam_setup']['edit'] == 1)
                                            @if($exam->status==1)
                                            <a href="{{ route('admin.exam.master.exam.status.update', $exam->id ) }}"
                                                class="btn btn-success btn-sm ">
                                                <i class="fas fa-thumbs-up"></i></a>
                                            @else
                                            <a href="{{ route('admin.exam.master.exam.status.update', $exam->id ) }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-thumbs-down"></i>
                                            </a>
                                            @endif
                                            |
                                        @endif
                                     <a href="#" data-id="{{ $exam->id }}" title="edit" class="edit_exam btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> 
                                        @if (json_decode($userPermits->exam_module,true)['exam']['exam_setup']['delete'] == 1)
                                            | <a id="delete" href="{{ route('admin.exam.master.exam.delete', $exam->id) }}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h6 class="modal-title">Exam Setup Form</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="exam_setup_form" action="{{ route('admin.exam.master.exam.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Exam Name</b> :</label>
                            <input type="text" placeholder="Exam Name" class="form-control form-control-sm name" name="name">
                            <div class="error name_error"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Exam Type </b>:</label>
                            <select name="type" class="form-control form-control-sm type">
                                <option value="">Select Exam Type</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->name }}"> {{ $type->name }} </option>
                                @endforeach
                            </select>
                            <div class="error type_error"></div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Exam Term</b> (Optional) :</label>
                            <select  name="term_id" class="form-control form-control-sm">
                                <option value="">Select Exam Term</option>
                                @foreach ($terms as $term)
                                <option value="{{ $term->id }}"> {{ $term->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Start Date</b> :</label>
                            <input readonly autocomplete="off" type="text" placeholder="Day-Month-Year" class="form-control readonly_field form-control-sm add_exam_date_picker start_date" value="" name="start_date" >
                            <div class="error start_date_error"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>End Date</b> :</label>
                            <input readonly autocomplete="off" placeholder="Day-Month-Year" type="text" class="form-control readonly_field form-control-sm add_exam_date_picker end_date" value="" name="end_date">
                            <div class="error end_date_error"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Destributions</b> :</label>
                            <select name="distributions[]" class="select2 form-control form-control-sm" multiple="multiple" id="section" data-placeholder="Destributions" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                <option value="">Select Destributions</option>
                                @foreach ($distributions as $distribution)
                                    <option value="{{ $distribution->name }}"> {{ $distribution->name }} </option>
                                @endforeach
                            </select>
                            <div class="error distributions_error"></div>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" id="dismissModal"  class="btn btn-sm m btn-default modal_close_button" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="button" class="btn btn-sm btn-blue loading_button">Loading...</button>
                        <button type="submit" class="btn btn-sm btn-blue submit_button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal"  aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Created Exam</h6>
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
            $('.loading_button').hide();
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
            $(document).on('click', '.edit_exam', function(){
                var exam_id = $(this).data('id');
                $.ajax({
                    url:"{{ url('admin/exam/master/exam/exams/edit') }}" + "/" + exam_id,
                    type:'get',
                    success:function(data){
                        $('.edit_modal_body').empty();
                        $('.edit_modal_body').append(data);
                        $('#editModal').modal('show');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.add_exam_date_picker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose:true
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

    <script>
        @error('name')
            toastr.error("{{ $errors->first('name') }}");
        @enderror
    </script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#exam_setup_form', function(e){
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
                    //log(data);
                        $('.submit_button').show();
                        $('.loading_button').hide();
                        $('.error').html('');
                        $('#exam_setup_form')[0].reset();
                        $('#myModal1').modal('hide');
                        window.location = "{{ url()->current() }}";
                    },
                    error:function(err){
                        $('.submit_button').show();
                        $('.loading_button').hide();
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
                            $('.type').addClass('is-invalid');
                        }else{
                            $('.type_error').html('');
                            $('.type').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.start_date){
                            $('.start_date_error').html(err.responseJSON.errors.start_date[0]);
                            $('.start_date').addClass('is-invalid');
                        }else{
                            $('.start_date_error').html('');
                            $('.start_date').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.end_date){
                            $('.end_date_error').html(err.responseJSON.errors.end_date[0]);
                            $('.end_date').addClass('is-invalid');
                        }else{
                            $('.end_date_error').html('');
                            $('.end_date').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.distributions){
                            $('.distributions_error').html(err.responseJSON.errors.distributions[0]);
                        
                        }else{
                            $('.distributions_error').html('');
                        }
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

			$(document).on('submit', '#edit_exam_setup_form', function(e){
				e.preventDefault();
				var url = $(this).attr('action');
                var type = $(this).attr('method');
                var data = $(this).serialize();
				$('.submit_button').hide();
				$('.loading_button').show();
				//var form = document.querySelector('#employee_add_form');
				//var formData = new URLSearchParams(Array.from(new FormData(form))).toString();
				$.ajax({
					url:url,
					type:type,
					data:data,
					success:function(data){
						$('.form-control').removeClass('is-invalid');
						$('.error').html('');
						$('.submit_button').show();
						$('.loading_button').hide();
						$('#editModal').modal('hide');
						window.location = "{{ url()->current() }}";
					},
					error:function(err){
						$('.submit_button').show();
						$('.loading_button').hide();
						toastr.error('Please check again all form field.','Some thing want wrong.');
						$('.error').html('');
                        $('.form-control').removeClass('is-invalid');
						$.each(err.responseJSON.errors,function(key, error){
							$('.e_error_'+key).html(error[0]);
							$('#e_'+key).addClass('is-invalid');
						});
					}
				});
			});
		});
	</script> 

@endpush