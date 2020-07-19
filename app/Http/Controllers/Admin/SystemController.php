<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentSession;

class SystemController extends Controller
{
   public function showSeesion()
   {
   	$sessions = StudentSession::active();
   	return view('admin.setting.session',compact('sessions'));
   }

   // create session

   public function seesionCreate(Request $request)
   {
   	StudentSession::create($request->all());

   	    $notification = array(
            'messege' => 'Session inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
   }

   // status

   public function sessionStatus( $id)
   {
   	   $statusChange = StudentSession::findOrFail($id);
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

   // get session data

   public function getSessionData($id)
   {
   	$sessions = StudentSession::findOrFail($id);

   	return response()->json($sessions);
   }

   // update session

   public function sessionUpdate(Request $request)
   {


   	StudentSession::findOrFail($request->id)->update([
   		'session'=>$request->session,
   	]);

   	$notification = array(
                'messege' => 'Session Update successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
   }

   // delete session

   public function getSessionDelete($id)
   {
   		StudentSession::where('id',$id)->singleDelete();
   		$notification = array(
                'messege' => 'Session Deleted successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
   }

}
