
<form class="form-horizontal" action="{{ route('admin.vehicle.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="vehicle_number"> Vehicle Number: </label>
            <input type="text" class="form-control" id="vehicle_number" placeholder="Vehicle number" value="{{ $vehicle->vehicle_number }}" name="vehicle_number" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="vehicle_model"> Vehicle Model: </label>
            <input type="text" class="form-control" id="vehicle_model" placeholder="Vehicle model" value="{{$vehicle->vehicle_model}}" name="vehicle_model" required>
            <span class="text-danger">{{ $errors->first('vehicle_model') }}</span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="year_made"> Year Made: </label>
            <input type="text" class="form-control" id="year_made" placeholder="year Made" value="{{$vehicle->year_made}}" name="year_made" required>
            <span class="text-danger">{{ $errors->first('year_made') }}</span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="year_made"> Sit Quantity: </label>
            <input type="number" class="form-control" id="sit_quantity" placeholder="Sit quantity" value="{{$vehicle->sit_quantity}}" name="sit_quantity" required>
            <span class="text-danger">{{ $errors->first('sit_quantity') }}</span>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
        @if (json_decode($userPermits->transport_module, true)['vehicle']['edit'] == 1)
            <button type="submit" class="btn btn-sm btn-blue">Update</button>
        @endif
    </div>
</form>
