@extends('admin.master')
@push('css')
    <style>
        .dropify-wrapper {height: 67px!important;}
        .border_red{border: 1px solid red;border-radius: 3px;}
        .dropify-wrapper .dropify-message p {margin: -7px 0 0;}
        .dropify-wrapper {border-radius: 3px;}
        .text-black{color:#222533;}
    </style>
@endpush
@section('content')

	<!--middle content wrapper-->
	<!-- page content -->
	<div class="middle_content_wrapper">
		<section class="page_content">
			<!-- panel -->
			<div class="panel mb-0">
				<div class="panel_header">
					<div class="row">
						<div class="col-md-6">
							<div class="panel_title">
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Event</span>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="panel_title">
								@if (json_decode($userPermits->event_module, true)['add'] == 1)
									<a href="{{ route('event.create') }}" class="btn btn-sm btn-success">
										<i class="fas fa-plus"></i></span> <span>Add Event<span>
									</a>
								@endif
							</div>
						</div>
					</div>
				</div>
				<form action="{{url('admin/advertisement/multisoftdel')}}" method="post">
					@csrf
					<br>
					
					<div class="panel_body">
						<div class="table-responsive">
							<table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>Title</th>
										<th>Vanue</th>
										<th>Date</th>
										<th>Time</th>
										<th>Description</th>
										<th>Image</th>
										<th>manage</th>
									</tr>
								</thead>
								<tbody>
									@foreach($allevent as $key => $data)
									<tr class="text-center">
										<td>{{++$key}}</td>
										<td>{{$data->title}}</td>
										<td>{{$data->venue}}</td>
										<td>{{$data->date}}</td>
										<td>{{$data->time}}</td>
										<td>{{Str::limit($data->description,25)}}</td>
										<td>
											<img src="{{asset('public/uploads/event/'.$data->image)}}" height="35px" width="35px">
										</td>
										<td>
											@if (json_decode($userPermits->event_module, true)['edit'] == 1)
												@if ($data->status == 1)
													<a href="{{ route('event.status.update', $data->id) }}" class="btn btn-success btn-sm text-white">
														<i class="far fa-thumbs-up"></i>
													</a>
												@else
													<a href="{{ route('event.status.update', $data->id) }}" class="btn btn-danger btn-sm text-white">
														<i class="far fa-thumbs-down"></i>
													</a>

												@endif
												|
											@endif

											<a href="{{ route('event.edit', $data->id) }}" class="btn btn-sm btn-blue edit_event text-white" title="edit">
												<i class="fas fa-pencil-alt"></i>
											</a> 
					
											@if (json_decode($userPermits->event_module, true)['delete'] == 1)
												| <a id="delete" href="{{ route('event.delete', $data->id) }}" class="btn btn-danger btn-sm text-white" title="delete"> <i class="fas fa-trash"></i>
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

	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLabel">Edit event</h6>
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
		@if (Session::has("success"))
			toastr.success('{{ session('success') }}', 'Successfull');
		@endif
	</script>

	<script>
		$(document).ready(function () {
			$('.loading').hide();
			$(document).on('click', '.edit_event', function(e){
				e.preventDefault();
				var url = $(this).attr('href');
				$.ajax({
					url:url,
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
		$(document).ready(function () {
			$('.loading_button').hide();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$(document).on('submit', '#edit_event_form', function(e){
				e.preventDefault();
				var url = $(this).attr('action');
				var type = $(this).attr('method');
				$('.submit_button').hide();
				$('.loading_button').show();
				//var form = document.querySelector('#employee_add_form');
				//var formData = new URLSearchParams(Array.from(new FormData(form))).toString();
				$.ajax({
					url:url,
					type:type,
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success:function(data){
						$('.form-control').removeClass('is-invalid');
						$('.dropify-wrapper').removeClass('border_red'); 
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
							//console.log(key);
							$('.'+key+'_error').html(error[0]);
							$('#'+key).addClass('is-invalid');
						});

						if(err.responseJSON.errors.pic){
							$('.dropify-wrapper').addClass('border_red');
						}else{
							$('.dropify-wrapper').removeClass('border_red');   
						}
					}
				});
			});
		});

	</script> 

	
@endpush

