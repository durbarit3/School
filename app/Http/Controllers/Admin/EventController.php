<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use Session;
use Carbon\Carbon;
use Image;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
    	$allevent = Event::orderBy('id','DESC')->where('deleted_status', NULL)->get();
    	return view('admin.event.index',compact('allevent'));
    }

    // 
    public function create(){
    	return view('admin.event.create');
    }

    // staore
    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'venue' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $data = new Event;
        $data->title = $request->title;
        $data->venue = $request->venue;
        $data->description = $request->description;
        $data->date = $request->date;
        $data->time = $request->time;
        
        if($request->hasFile('pic')) {
            $image = $request->file('pic');
            $ImageName = 'event' . '_' . time() . '.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/uploads/event/' . $ImageName);
            $data->image = $ImageName;
        }

        if($data->save()){
            $notification = array(
                'messege' => 'Event created successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Event create Failed',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($eventId)
    {
        $event = Event::where('id', $eventId)->first();
        return view('admin.event.ajax_view.edit_modal_view', compact('event'));
    }
    
    public function update(Request $request, $eventId)
    {

        $this->validate($request, [
            'title' => 'required',
            'venue' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'banner' => 'sometimes|image',
        ]);

        $eventUpdate = Event::where('id', $eventId)->first();
        $eventUpdate->title = $request->title;
        $eventUpdate->venue = $request->venue;
        $eventUpdate->description = $request->description;
        $eventUpdate->date = $request->date;
        $eventUpdate->time = $request->time;
        
        if($request->hasFile('banner')) {
            if ($eventUpdate->image) {
                if (file_exists(public_path('uploads/event/'.$eventUpdate->image))) {
                    unlink(public_path('uploads/event/'.$eventUpdate->image));
                }
            }
            $image = $request->file('banner');
            $ImageName = 'event' . '_' . time() . '.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270, 270)->save('public/uploads/event/' . $ImageName);
            $eventUpdate->image = $ImageName;
        }
        $eventUpdate->save();

        session()->flash('success', 'Event updated successfully');
        return response()->json('success');
        
    }

    public function delete($eventId)
    {
        $event = Event::where('id', $eventId)->first();
        $event->deleted_status = 1;
        $event->save();
        if($event->save()){
            $notification = array(
                'messege' => 'Event deleted successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Event create Failed',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    
    public function updateStatus($eventId)
    {
        $statusChange = Event::where('id', $eventId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Event is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Event is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


}
