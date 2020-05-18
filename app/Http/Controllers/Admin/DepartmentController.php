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

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::active();
        return view('admin.employee.department.index', compact('departments'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:departments,name'
        ]);
        $addDepartment = new Department();
        $addDepartment->name = $request->name;
        $addDepartment->save();

        $notification = array(
            'messege' => 'Department inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:department,name,' . $request->id
        ]);
        $updateCategory = Department::where('id', $request->id)->first();
        $updateCategory->name = $request->name;
        $updateCategory->save();

        $notification = array(
            'messege' => 'Department updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($departmentId)
    {
        $statusChange = Department::where('id', $departmentId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Department is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Department is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


    public function hardDelete($departmentId)
    {
        Department::where('id', $departmentId)->singleDelete();
        $notification = array(
            'messege' => 'Department is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleHardDelete(Request $request)
    {
        if ($request->category_id == null) {
            $notification = array(
                'messege' => 'You did not select any department',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->category_id as $category_id) {
                Department::where('id', $category_id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Department is deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function getDepartmentNameByAjax($departmentId)
    {
        $department = Department::where('id', $departmentId)->first();
        return response()->json($department);

    }
}
