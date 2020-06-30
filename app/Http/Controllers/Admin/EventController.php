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
    	$allevent=Event::orderBy('id','DESC')->get();
    	return view('admin.event.index',compact('allevent'));
    }

    // 
    public function create(){
    	return view('admin.event.create');
    }
    // staore
    public function store(Request $request){

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
                    'messege' => 'Event create success',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'messege' => 'Event create Faild',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
    }
}
