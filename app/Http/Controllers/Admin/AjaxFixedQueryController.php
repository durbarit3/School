<?php

namespace App\Http\Controllers\Admin;

use App\ClassSection;
use App\RouteVehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AjaxFixedQueryController extends Controller
{
    public function getSectionsClassWise($classId)
    {
        $classSections = ClassSection::with('section')->where('class_id', $classId)->get();
        return response()->json($classSections); 
    }

    public function getVehiclesRouteWise($routeId)
    {
        $vehicles = RouteVehicle::with(['vehicle'])->where('route_id', $routeId)->get();
        return response()->json($vehicles); 
    }
}
