<?php

namespace App\Http\Controllers\Admin;

use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionYearController extends Controller
{
    public function index()
    {
        $sessions = Session::active();
       
        return view('admin.academic.session.index', compact('sessions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'session_year' => 'required|unique:sessions,session_year',
        ]);

        $addSession = new Session();
        $addSession->session_year = $request->session_year;
        $addSession->save();
        

        return response()->json('Session year inserted successfully:)');
    }

    public function edit($sessionId)
    {
        $session = Session::select(['id', 'session_year'])->where('id', $sessionId)->firstOrFail();
      
        return view('admin.academic.session.ajax_view.edit_modal_view', compact('session'));
    }

    public function update(Request $request, $sessionId)
    {
        $this->validate($request, [
            'name' => 'required|unique:sessions,session_year,' . $sessionId
        ]);

        $updateSession= Session::where('id', $sessionId)->first();
        $updateSession->session_year = $request->session_year;
        $updateSession->save();

        $notification = array(
            'messege' => 'Session year updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($sessionId)
    {
        $statusChange = Session::where('id', $sessionId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Session is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Session is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($sessionId)
    {
        Session::where('id', $sessionId)->singleDelete();
        $notification = array(
            'messege' => 'Session is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

}
