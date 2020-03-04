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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Vehicle List</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Vehicle</span></a>
                        </div>
                    </div>
                </div>
            </div>
        <form action="{{ route('admin.vehicle.multiple.delete') }}" id="multiple_delete" method="post">
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
                                    <th>Vehicle Number</th>
                                    <th>Vehicle Model</th>
                                    <th>Year Made</th>
                                    <th>Driver</th>
                                    <th>Sit Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)
                                <tr class="text-center">
                                    <td>
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" name="deleteId[]" class="checkbox"
                                                value="{{$vehicle->id}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{ $vehicle->vehicle_number }}</td>
                                    <td>{{ $vehicle->vehicle_model }}</td>
                                    <td>{{ $vehicle->year_made }}</td>
                                    <td>N/A</td>
                                    <td>{{ $vehicle->sit_quantity }}</td>
                                    @if($vehicle->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        @if($vehicle->status==1)
                                        <a href="{{ route('admin.route.status.update', $vehicle->id) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.route.status.update', $vehicle->id) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                    | <a href="{{ route('admin.vehicle.edit', $vehicle->id) }}" class="edit_vehicle btn btn-sm btn-blue text-white">
                                            <i class="fas fa-pencil-alt"></i>
                                            </a> |
                                        <a id="delete" href="{{ route('admin.vehicle.delete', $vehicle->id) }}"
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
                <h4 class="modal-title">Add Vehicle</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.vehicle.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">

                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Vehicle Number :</label>
                            <input type="text" class="form-control" name="vehicle_number" placeholder="Vehicle Number" required>
                            <span class="text-danger">{{ $errors->first('vehicle_number') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label text-right">Vehicle Model :</label>
                            <input type="text" class="form-control" name="vehicle_model" placeholder="Vehicle Model" required>
                            <span class="text-danger">{{ $errors->first('vehicle_model') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Made Year :</label>
                            <input type="text" class="form-control" name="made_year" placeholder="Made year" required>
                            <span class="text-danger">{{ $errors->first('made_year') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Sit qunatity :</label>
                            <input type="number" class="form-control" placeholder="Sit quantity" name="sit_quantity">
                            <span class="text-danger">{{ $errors->first('sit_quantity') }}</span>
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


@endpush
