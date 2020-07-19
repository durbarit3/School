
<form class="form-horizontal" action="{{ route('admin.assign.vehicle.update', $route->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <div class="col-sm-12">

            <label for="inputEmail3" class="col-form-label text-right">route Name:</label>
            <input type="text" class="form-control" id="vehicle_model" placeholder="Vehicle model" value="{{$route->name}}" name="vehicle_model" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="inputEmail3" class=" col-form-label text-right">Select vehicles (Multiple):</label>
            <select required class="select_vehicle" multiple="multiple" name="vehicle_ids[]" data-placeholder="Vehicles" data-dropdown-css-class="select2-purple" style="width: 100%;">
                @foreach ($vehicles as $vehicle)
                    <option
                    @foreach ($route->routeVehicles as $routeVehicle)
                      {{ $vehicle->id == $routeVehicle->vehicle_id ? 'SELECTED' : '' }}
                    @endforeach
                    value="{{ $vehicle->id }}">
                    {{ $vehicle->vehicle_model }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
        @if (json_decode($userPermits->transport_module, true)['assign_vehicle']['edit'] == 1)
            <button type="submit" class="btn btn-blue">Update</button>
        @endif 
    </div>
</form>


<script type="text/javascript">

    $(document).ready(function () {
       //Initialize Select2 Elements
       $('.select_vehicle').select2()
        //Initialize Select2 Elements
    });
</script>
