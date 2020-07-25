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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Assigned Vehicle Driver</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->transport_module, true)['assign_driver']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Assign Vehicle</span>
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
                                <th>Vehicle Model</th>
                                <th>Driver Name</th>
                                <th>Employee ID</th>
                                <th>License</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                                <tr class="text-center">
                                    
                                    <td>{{ $vehicle['vehicle_model'] }}</td>
                                    <td>{{ $vehicle['driver_name'] }}</td>
                                    <td>{{ $vehicle['employee_id'] }}</td>
                                    <td>{{ $vehicle['license'] }}</td>
                                    
                                    <td>

                                    <a href="#" class="edit_assigned_driver btn btn-sm btn-blue text-white" data-id="{{ $vehicle['id'] }}" title="edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a> 

                                    @if (json_decode($userPermits->transport_module, true)['assign_driver']['delete'] == 1)    
                                        | <a id="delete" href="{{ route('admin.assign.vehicle.driver.delete', $vehicle['id']) }}"
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
                <h6 class="modal-title">Assign Vehicle Form</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="add_assigned_driver" action="{{ route('admin.assign.vehicle.driver.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Select Vehicle:</label>
                            <select class="form-control"  name="vehicle_id" id="vehicle_id">
                                <option value="">Select vehicle</option>
                                @foreach ($formVehicles as $formVehicle)
                                    <option value="{{ $formVehicle->id }}">{{ $formVehicle->vehicle_model }}</option>
                                @endforeach
                            </select>
                            <span class="error error_vehicle_id"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Select Driver :</label>
                            <select class="form-control" name="driver_id" id="driver_id">
                                    <option value="">Select driver</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->adminname }}</option>
                                @endforeach
                            </select>
                            <span class="error error_driver_id"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Driver Lisence:</label>
                            <input type="text" class="form-control" placeholder="Driver lisence" name="licence" id="licence">  
                            <span class="error error_licence"></span>                    
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close </button>
                        <button type="button" class="btn btn-sm loading_button btn-blue">Loading...</button>
                        <button type="submit" class="btn btn-sm submit_button btn-blue">Submit</button>
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
                <h6 class="modal-title" id="exampleModalLabel">Edit Assigned Vehicle</h6>
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
            //Initialize Select2 Elements
            $('.select2').select2()
            //Initialize Select2 Elements
        });
    </script>

    <script>
        $(document).ready(function () {
        $(document).on('click', '.edit_assigned_driver', function(){
            var vehicleId = $(this).data('id');
            $.ajax({
                url:"{{ url('admin/transport/assign/vehicle/driver/edit/') }}" + "/" + vehicleId,
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

			$(document).on('submit', '#add_assigned_driver', function(e){
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
                        if(!$.isEmptyObject(data.error)){
                            $('.form-control').removeClass('is-invalid');
                            $('.error').html('');
                            $('.submit_button').show();
                            $('.loading_button').hide();
                            toastr.error(data.error);
                        }else{
                            $('.form-control').removeClass('is-invalid');
                            $('.error').html('');
                            $('.submit_button').show();
                            $('.loading_button').hide();
                            $('#editModal').modal('hide');
                            window.location = "{{ url()->current() }}";
                        }
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

			$(document).on('submit', '#edit_assigned_driver', function(e){
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
							//console.log(key);
							$('.e_error_'+key).html(error[0]);
							$('#e_'+key).addClass('is-invalid');
						});
					}
				});
			});
		});
	</script> 
@endpush