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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Assigned Vehicle</span>
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
        <form action="{{ route('admin.assign.vehicle.multiple.delete') }}" id="multiple_delete" method="post">
                @csrf
                <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        <label class="chech_container mb-1 p-0">
                                            Select all
                                            <input type="checkbox" id="check_all">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th>Route</th>
                                    <th>Vehicles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assignedRoutes as $assignedRoute)
                                    <tr class="text-center">
                                        <td>
                                            <label class="chech_container mb-4">
                                            <input type="checkbox" name="deleteId[]" class="checkbox"
                                            value="{{ $assignedRoute->id }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                        <td>{{ $assignedRoute->name }}</td>
                                        <td>
                                            @foreach ($assignedRoute->routeVehicles as $routeVehicle)
                                                <div><b>{{ $routeVehicle->vehicle->vehicle_model }}</b></div>
                                            @endforeach
                                        </td>

                                        <td>
                                        <a href="{{ route('admin.assign.vehicle.edit', $assignedRoute->id) }}" class="edit_route btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                                        <a id="delete" href="{{ route('admin.assign.vehicle.delete', $assignedRoute->id) }}"
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
            </form>
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
            <form class="form-horizontal" action="{{ route('admin.assign.vehicle.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Select route:</label>
                            <select required class="select2"  name="route_id" data-placeholder="Select Vehicles" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                <option value="">Select route</option>
                                @foreach ($formRoutes as $route)
                                    <option value="{{ $route->id }}">{{ $route->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label text-right">Select vehicles (Multiple):</label>
                            <select required class="select2" multiple="multiple" name="vehicle_ids[]" data-placeholder="Vehicles" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach ($formVehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->vehicle_model }}</option>
                                @endforeach
                            </select>
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
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })
    });
</script>

@endpush