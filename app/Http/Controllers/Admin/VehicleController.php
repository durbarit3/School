<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('driver')->latest()->active();
        return view('admin.transport.vehicle.index', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'vehicle_number' => 'required',
            'vehicle_model' => 'required',
            'made_year' => 'required',
            'sit_quantity' => 'required',
        ]);

        $addVehicle = new Vehicle();
        $addVehicle->vehicle_number = $request->vehicle_number;
        $addVehicle->vehicle_model = $request->vehicle_model;
        $addVehicle->year_made = $request->made_year;
        $addVehicle->sit_quantity = $request->sit_quantity;
        $addVehicle->save();

        $notification = array(
            'messege' => 'Vehicle inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getVehicleByAjax($vehicleId)
    {
        $vehicle = Vehicle::where('id', $vehicleId)->firstOrFail();
        return view('admin.transport.vehicle.ajax_view.edit_modal_view', compact('vehicle'));
    }

    public function update(Request $request, $vehicleId)
    {

        $this->validate($request, [
            'vehicle_number' => 'required',
            'vehicle_model' => 'required',
            'year_made' => 'required',
            'sit_quantity' => 'required',
        ]);

        $updateVehicle = Vehicle::where('id', $vehicleId)->firstOrFail();
        $updateVehicle->vehicle_number = $request->vehicle_number;
        $updateVehicle->vehicle_model = $request->vehicle_model;
        $updateVehicle->year_made = $request->year_made;
        $updateVehicle->sit_quantity = $request->sit_quantity;
        $updateVehicle->save();

        $notification = array(
            'messege' => 'Vehicle updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function statusUpdate($vehicleId)
    {
        $statusChange = Vehicle::where('id', $vehicleId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Vehicle is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Vehicle is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($vehicleId)
    {
        Vehicle::where('id', $vehicleId)->singleDelete();
        $notification = array(
            'messege' => 'Vehicle is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any vehicle',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $deleteId) {
                Vehicle::where('id', $deleteId)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Vehicle is deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}

