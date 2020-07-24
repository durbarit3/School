<?php

namespace App\Http\Controllers\Admin;

use App\Route;
use App\Classes;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class TransportReportController extends Controller
{
    public function index()
    {
        $classes = Cache::rememberForever('all-classes', function(){
            return $classes = Classes::where('status', 1)->where('deleted_status', NULL)->get();
        });
        
        $routes = Cache::rememberForever('all-routes', function(){
            return $classes = Route::where('status', 1)->where('deleted_status', NULL)->get();
        });

        return view('admin.report.transport_report.index', compact('classes', 'routes'));
    }

    public function getTransportReport(Request $request)
    {
        $students = '';
        $query = StudentAdmission::with(['Class', 'Section', 'route', 'vehicle', 'vehicle.driver', 'Gender'])
        ->where('class', $request->class_id)
        ->where('section', $request->section_id)
        ->where('route_id','!=', 'NULL');
        if ($request->route_id) {
            $query->where('route_id', $request->route_id);
        }
        if ($request->vehicle_id) {
            $query->where('vehicle_id', $request->vehicle_id);
        }
        $students = $query->get();
        return view('admin.report.transport_report.ajax_view.transport_report', compact('students'));
    }
}
