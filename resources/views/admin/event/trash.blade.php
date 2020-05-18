@extends('admin.master')
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
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Deleted Advertisement</span>
							</div>
						</div>
						
					</div>
				</div>
				<form action="{{url('admin/advertisement/heardmulti/delete')}}" method="post">
					@csrf
					<br>
					<button type="submit" class="btn btn-danger btn-sm" name="submit" value="delete"><i class="fa fa-trash"></i> Delete All</button>
					<button type="submit" class="btn btn-info btn-sm" name="submit" value="restore"><i class="fa fa-recycle"></i> Restore</button>
					<a href="{{route('admin.advertisement.all')}}" class="btn btn-success btn-sm"><i class="fa fa-recycle"></i> Back</a>
					<div class="panel_body">
						<div class="table-responsive">
							<table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
								<thead>
									<tr>
										<th>
											<label class="chech_container mb-4">
												<input type="checkbox" id="check_all">
												<span class="checkmark"></span>
											</label>
										</th>
										<th>#</th>
										<th>Advertiser name</th>
										<th>Advertiser Phone</th>
										<th>Advertiser Type</th>
										<th>Advertisement</th>
										<th>Position</th>
										<th>manage</th>
									</tr>
								</thead>
								<tbody>
									@foreach($allad as $key => $data)
									<tr>
										<td>
											<label class="chech_container mb-4">
												<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
												<span class="checkmark"></span>
											</label>
										</td>
										<td>{{++$key}}</td>
										<td>{{$data->ad_name}}</td>
										<td>{{$data->ad_phone}}</td>
										<td>
											@if($data->ad_type==1)
											image Advertisement
											@else
											Code Advertisement
											@endif
										</td>
										<td>
											@if($data->ad_type==1)
											<img src="{{asset('public/uploads/advertisement/'.$data->advertisement)}}" height="35px">
											@else
												{{Str::limit($data->advertisement,35)}}
											@endif
										</td>
										<td>{{$data->position->position_name}}</td>
										<td>
										

										   <a href="{{url('admin/advertisement/restore/'.$data->id)}}" class="btn btn-sm btn-info"><i class="fas fa-recycle"></i></a> |
	                                       <a class="btn btn-sm btn-danger" href="{{url('admin/advertisement/delete/'.$data->id)}}" id="delete"><i class="fa fa-trash"></i> </a> |
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

<!-- modal start-->
<!-- The Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal1">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Add Position</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form class="form-horizontal" action="{{route('admin.adposition.submit')}}" method="POST" enctype="multipart/form-data">

					@csrf
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right">PositionName</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="position_name" required>
						</div>
					</div>
					<div class="form-group text-right">
						<button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
						<button type="submit" class="btn btn-blue">Submit</button>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<!-- <div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div> -->

		</div>
	</div>
</div>
<!-- modal end -->

<!-- edit modal -->

<!-- edit modal start-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Postion</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{route('admin.adposition.update')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right">Postion Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="position_name" id="position_name">
							<input type="hidden" name="id" id="id">
						</div>
					</div>

					<div class="form-group text-right">
						<!-- <input type="" value="Reset" class="btn btn-warning"> -->
						<button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
						<button type="submit" class="btn btn-blue">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- edit modal end -->

@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {

		$('#check_all').on('click', function(e) {

			if ($(this).is(':checked', true))

			{
				$(".checkbox").prop('checked', true);

			} else {

				$(".checkbox").prop('checked', false);

			}

		});

	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.editcat').on('click', function() {
			var id = $(this).data('id');
			//alert(id);

			if (id) {
				$.ajax({
					url: "{{ url('admin/advertisement/position/edit/') }}/" + id,
					type: "GET",
					dataType: "json",
					success: function(data) {

						$("#position_name").val(data.position_name);
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
    @error('cate_name')
    toastr.error("{{ $errors->first('cate_name') }}";
    @enderror
</script>
@endpush