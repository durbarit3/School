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
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Add Event</span>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="panel_title">
								<a href="{{ route('event.index.all') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></span> <span>All Event</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel_body">
					<form class="form-horizontal" action="{{route('event.submit')}}" method="POST" enctype="multipart/form-data">

					@csrf
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Event Title</label>
						<div class="col-sm-7 {{$errors->has('title')? ' has-error':''}}">
							<input type="text" name="title" class="form-control" placeholder="Enter event Title">
							 @if ($errors->has('title'))
									<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
										<strong>{{ $errors->first('title') }}</strong>
									</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Venue</label>
						<div class="col-sm-7">
							<input type="text" name="venue" class="form-control" placeholder="Enter Venue">
							
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description</label>
						<div class="col-sm-7">
							<textarea class="form-control" name="description"></textarea>
							
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description</label>
						<div class="col-sm-7">
							<input type="date" name="date" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Time</label>
						<div class="col-sm-7">
							<input type="time" name="time" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Event Banner</label>
						<div class="col-sm-7">
							<input type="file" name="pic">
						</div>
					</div>


					
				
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
						<div class="col-sm-7 text-center">
							<button type="submit" class="btn btn-success">Add Event</button>
						</div>
					</div>
				</form>
				</div>		
			</div>
		</section>
	</div>



@endsection
