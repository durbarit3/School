<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SectionDepartment;
use Session;
use Carbon\Carbon;
use Image;

class DepartmentController extends Controller
{
    public function __construct(){

    }
    public function index(){
    	$all=SectionDepartment::where('is_deleted',0)->OrderBy('id','DESC')->get();
    	return view('admin.department.index',compact('all'));
    }
    // store
    public function store(Request $request){
    	$insert=SectionDepartment::insert([
    		'dept_name'=>$request['name'],
    		'created_at'=>Carbon::now()->toDateTimeString(),
    	]);
    	if($insert){
    		 $notification = array(
            'messege' => 'success',
            'alert-type' => 'success'
	        );
	        return Redirect()->back()->with($notification);
    	}else{
    		 $notification = array(
            'messege' => 'Faild',
            'alert-type' => 'error'
	        );
	        return Redirect()->back()->with($notification);
    	}
    }


    public function active($id){
    	$active=SectionDepartment::where('id',$id)->update([
    		'status'=>'1',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);

    	if($active){
    		 $notification = array(
            'messege' => 'success',
            'alert-type' => 'success'
	        );
	        return Redirect()->back()->with($notification);
    	}else{
    		 $notification = array(
            'messege' => 'Faild',
            'alert-type' => 'error'
	        );
	        return Redirect()->back()->with($notification);
    	}

    }

    public function deactive($id){
    		$active=SectionDepartment::where('id',$id)->update([
    		'status'=>'0',
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);

    	if($active){
    		 $notification = array(
            'messege' => 'success',
            'alert-type' => 'success'
	        );
	        return Redirect()->back()->with($notification);
    	}else{
    		 $notification = array(
            'messege' => 'Faild',
            'alert-type' => 'error'
	        );
	        return Redirect()->back()->with($notification);
    	}
    }
    public function delete($id){
    	$active=SectionDepartment::where('id',$id)->delete();

    	if($active){
    		 $notification = array(
            'messege' => 'success',
            'alert-type' => 'success'
	        );
	        return Redirect()->back()->with($notification);
    	}else{
    		 $notification = array(
            'messege' => 'Faild',
            'alert-type' => 'error'
	        );
	        return Redirect()->back()->with($notification);
    	}
    }
    public function edit($categoryId){
    	$data=SectionDepartment::where('id',$categoryId)->first();
    	return json_encode($data);
    }

    public function update(Request $request){
    	 $id=$request->id;
    	 $update=SectionDepartment::where('id',$id)->update([
    		'dept_name'=>$request['name'],
    		'updated_at'=>Carbon::now()->toDateTimeString(),
    	]);

    	if($update){
    		 $notification = array(
            'messege' => 'success',
            'alert-type' => 'success'
	        );
	        return Redirect()->back()->with($notification);
    	}else{
    		 $notification = array(
            'messege' => 'Faild',
            'alert-type' => 'error'
	        );
	        return Redirect()->back()->with($notification);
    	}
    }
}
