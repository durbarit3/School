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
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Event</span>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="panel_title">
								<a href="" class="btn btn-success"><i class="fas fa-plus"></i></span> <span>Add Event</span></a>
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
									<tr>
									
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
									<tr>
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
										<a href=""
                                            class="btn btn-success btn-sm text-white" title="Show">
                                            <i class="far fa-thumbs-up"></i>
                                        </a>
                                        | <a href="{{ url('admin/student/edit',$data->id) }}" class="btn btn-sm btn-blue text-white"title="edit"><i class="fas fa-pencil-alt"></i></a> |

                                        <a href="" class="btn btn-danger btn-sm text-white"title="Payment"> <i class="fas fa-trash"></i>
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


@endsection

