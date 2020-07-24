<?php

namespace App\Http\Controllers\Admin;

use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::select('id', 'name', 'status', 'fare')->active();
        return view('admin.transport.route.index', compact('routes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:routes,name',
            'fare' => 'required'
        ]);

        $addRoute = new Route();
        $addRoute->name = $request->name;
        $addRoute->fare = $request->fare;
        $addRoute->save();

        Cache::forget('all-routes');
        $notification = array(
            'messege' => 'Route inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:classes,name,' . $request->id,
            'fare' => 'required'
        ]);
        $updateRoute = Route::where('id', $request->id)->first();
        $updateRoute->name = $request->name;
        $updateRoute->fare = $request->fare;
        $updateRoute->save();
        Cache::forget('all-routes');
        $notification = array(
            'messege' => 'Route updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($routeId)
    {
        Route::where('id', $routeId)->singleDelete();
        $notification = array(
            'messege' => 'Route is deleted',
            'alert-type' => 'success'
        );
        Cache::forget('all-routes');
        return Redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $route_id) {
                Route::where('id', $route_id)->singleDelete();
            }
        }
        Cache::forget('all-routes');
        $notification = array(
            'messege' => 'Route is deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($routeId)
    {
        $statusChange = Route::where('id', $routeId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Route is deactivated',
                'alert-type' => 'success'
            );
            Cache::forget('all-routes');
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Route is activated',
                'alert-type' => 'success'
            );
            Cache::forget('all-routes');
            return Redirect()->back()->with($notification);
        }
    }

    public function getRouteByAjax($routeId)
    {
        $route = Route::where('id', $routeId)->first();
        return response()->json($route);
    }
}
