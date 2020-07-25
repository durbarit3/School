<form id="edit_assigned_driver" action="{{ route('admin.assign.vehicle.driver.update', $assignDriver->id) }}" method="POST">
    @csrf
    <div class="form-group row">

        <div class="col-sm-12">
            <label for="inputEmail3" class="col-form-label text-right">Select Vehicle:</label>
            <select class="form-control"  name="vehicle_id" id="e_vehicle_id">
                <option value="">Select vehicle</option>
                @foreach ($formVehicles as $formVehicle)
                    <option {{ $formVehicle->id == $assignDriver->id ? 'SELECTED' : '' }} value="{{ $formVehicle->id }}">
                        {{ $formVehicle->vehicle_model }}
                    </option>
                @endforeach
            </select>
            <span class="error e_error_vehicle_id"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="inputEmail3" class="col-form-label text-right">Select Driver :</label>
            <select class="form-control" name="driver_id" id="e_driver_id">
                    <option value="">Select driver</option>
                @foreach ($drivers as $driver)
                    <option {{ $driver->id ==  $assignDriver->driver_id ? 'SELECTED' : ''}} value="{{ $driver->id }}">
                        {{ $driver->adminname }}
                    </option>
                @endforeach
            </select>
            <span class="error e_error_driver_id"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="inputEmail3" class="col-form-label text-right">Driver Lisence:</label>
            <input type="text" class="form-control" placeholder="Driver lisence" name="licence" id="e_licence" value="{{ $assignDriver->driver_license }}">  
            <span class="error e_error_licence"></span>                    
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close </button>
        <button type="button" class="btn btn-sm loading_button btn-blue">Loading...</button>
        @if (json_decode($userPermits->transport_module, true)['assign_driver']['edit'] == 1)
            <button type="submit" class="btn btn-sm submit_button btn-blue">Submit</button>
        @endif    
    </div>
</form>
    <script>
        $(document).ready(function(){
            $('.loading_button').hide();
        });
    </script>