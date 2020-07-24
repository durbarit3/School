@extends('admin.master')
@push('css')
    <style>
        td{
            line-height: 0px;
            width: 25%;
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Exam Terms</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->exam_module,true)['exam']['term']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Add Term</span>
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
                                
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($terms as $term)
                            <tr class="text-center">
                                <td>{{ $loop->index + 1  }}</td>
                                <td>{{$term->name}}</td>
                                @if($term->status==1)
                                <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                @else
                                <td class="center"><span class="btn btn-sm btn-danger">In-Active</span></td>
                                @endif
                                <td>
                                    @if (json_decode($userPermits->exam_module,true)['exam']['term']['edit'] == 1)
                                        @if($term->status==1)
                                        <a href="{{ route('admin.exam.master.exam.term.update.status', $term->id ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.exam.master.exam.term.update.status', $term->id ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                        |
                                    @endif
                                    <a class="editcat btn btn-sm btn-blue text-white" data-id="{{$term->id}}"
                                        title="edit" data-toggle="modal" data-target="#editModal"><i
                                            class="fas fa-pencil-alt"></i></a> 
                                    @if (json_decode($userPermits->exam_module,true)['exam']['term']['delete'] == 1)       
                                        | <a id="delete" href="{{ route('admin.exam.master.exam.term.delete', $term->id) }}"
                                            class="btn btn-danger btn-sm text-white" 
                                            title="Delete">
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
                <h6 class="modal-title">Add Term</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="add_exam_term_form" action="{{ route('admin.exam.master.exam.term.store') }}" method="POST">
                    @csrf
                    <div class="form-group row justify-content-center">
                        <div class="col-sm-12">
                            <label class="m-0"><b>Name :</b></label>
                            <input type="text" class="form-control" id="name" placeholder="Term name" name="name">
                            <span class="error error_name"></span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm modal_close_button btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="button" class="btn btn-sm loading_button btn-blue" >Loading...</button>
                        @if (json_decode($userPermits->exam_module,true)['exam']['term']['add'] == 1)
                            <button type="submit" class="btn btn-sm submit_button btn-blue">Submit</button>
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
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Exam Term</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_exam_term_form" class="form-horizontal" action="{{ route('admin.exam.master.exam.term.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12 ">
                            <label for="inputEmail3" class="m-0"><b>Name :</b> </label>
                            <input type="text" class="form-control name" name="name" id="e_name">
                            <input type="hidden" name="id" id="id">
                            <span class="error e_error_name"></span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label="">Close</button>
                        <button type="button" class="btn btn-sm loading_button btn-blue" >Loading...</button>
                        @if (json_decode($userPermits->exam_module,true)['exam']['term']['edit'] == 1)
                            <button type="submit" class="btn btn-sm submit_button btn-blue">Submit</button>
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
            })
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('.editcat').on('click', function () {
                var termId = $(this).data('id');
                if (termId) {
                    $.ajax({
                        url: "{{ url('admin/exam/master/exam/terms/edit') }}/" + termId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $(".name").val(data.name);
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

			$(document).on('submit', '#add_exam_term_form', function(e){
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
						$('#myModal1').modal('hide');
						window.location = "{{ url()->current() }}";
					},
					error:function(err){
						$('.submit_button').show();
						$('.loading_button').hide();
						toastr.error('Please check again all form field.','Some thing want wrong.');
						$('.error').html('');
                        $('.form-control').removeClass('is-invalid');
                        
						$.each(err.responseJSON.errors,function(key, error){
							//console.log(key);
							$('.error_'+key).html(error[0]);
							$('#'+key).addClass('is-invalid');
						});
					}
				});
			});
		});

    </script>    
    
    <script>
		$(document).ready(function () {
			$('.loading_button').hide();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$(document).on('submit', '#edit_exam_term_form', function(e){
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

    <script>
    @error('name')
        toastr.error("{{ $errors->first('name') }}");
    @enderror
    </script>
@endpush