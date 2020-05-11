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
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Assign Vehicle</span></a>
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
                                        <a href="#" class="edit_assigned_route btn btn-sm btn-blue text-white" data-id="{{ $vehicle['id'] }}" title="edit" data-toggle="modal"
                                            data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                        <a id="delete" href="{{ route('admin.assign.vehicle.driver.delete', $vehicle['id']) }}"
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
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Assign Vehicle Form</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form class="form-horizontal" action="{{ route('admin.assign.vehicle.driver.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Select Vehicle:</label>
                            <select required class="form-control"  name="vehicle_id" >
                                <option value="">Select vehicle</option>
                                @foreach ($formVehicles as $formVehicle)
                                    <option value="{{ $formVehicle->id }}">{{ $formVehicle->vehicle_model }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Select Driver :</label>
                            <select required class="form-control" name="driver_id" >
                                    <option value="">Select driver</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->adminname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Driver Lisence:</label>
                            <input required type="text" class="form-control" placeholder="Driver lisence" name="licence" required>                      
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close </button>
                        <button type="submit" class="btn btn-blue">Submit</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Assigned Vehicle</h5>
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
       $(document).on('click', '.edit_assigned_route', function(){
           var route_id = $(this).data('id');
           $.ajax({
               url:"{{ url('admin/transport/assign/vehicle/edit/') }}" + "/" + route_id,
               type:'get',
               success:function(data){
                   $('.edit_modal_body').empty();
                   $('.edit_modal_body').append(data);
               }
           });
       });
   });
</script>

@endpush