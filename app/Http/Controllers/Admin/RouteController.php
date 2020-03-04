<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::latest()->get();
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

        $notification = array(
            'messege' => 'Route updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($routeId)
    {
        Route::where('id', $routeId)->delete();
        $notification = array(
            'messege' => 'Route is deleted',
            'alert-type' => 'success'
        );
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
                Route::where('id', $route_id)->delete();
            }
        }
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
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Route is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function getRouteByAjax($routeId)
    {
        $route = Route::where('id', $routeId)->first();
        return response()->json($route);
    }
}
