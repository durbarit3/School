<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Admin;


class AssignDriverController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('driver')->where('driver_id', '!=', NULL)->get()->map(function($vehicle){
            return [
                'id' => $vehicle->id,
                'vehicle_model' => $vehicle->vehicle_model,
                'driver_name' => $vehicle->driver->adminname,
                'employee_id' => $vehicle->driver->employee_id,
                'license' => $vehicle->driver_license ? $vehicle->driver_license : 'N/A',
            ];
        });
        //dd($vehicles);
        $formVehicles = Vehicle::with('driver')->where('deleted_status', NULL)->select(['id','vehicle_model'])->get();
        $drivers = Admin::where('role', 6)->where('deleted_status', NULL)
        ->select(['id','adminname'])
        ->where('employee_status', 1)
        ->get();
        return view('admin.transport.assign_driver.index', compact('vehicles', 'drivers', 'formVehicles'));
    }

    public function store(Request $request)
    {
       $this->validate($request, [
           'vehicle_id' => 'required',
           'driver_id' => 'required',
           'licence' => 'required',
       ]);

       $assignDriver = Vehicle::where('id', $request->vehicle_id)->first();
       if(!$assignDriver->driver_id){
        $assignDriver->driver_id = $request->driver_id;
        $assignDriver->driver_license = $request->licence;
        $assignDriver->save();
        $notification = array(
            'messege' => 'Driver assigned successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
       }else{
        $notification = array(
            'messege' => 'Driver has already been assigned in this vehicle',
            'alert-type' => 'error'
       );
       return Redirect()->back()->with($notification);
       }
       
    }

    public function delete($vehicleId)
    {
     
        $assignDriver = Vehicle::where('id', $vehicleId)->first();
        $assignDriver->driver_id = NULL;
        $assignDriver->driver_license = NULL;
        $assignDriver->save();
        $notification = array(
            'messege' => ' assigned deleted successfully',
            'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
    }

    
}
