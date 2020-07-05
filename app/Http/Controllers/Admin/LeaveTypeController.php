<?php

namespace App\Http\Controllers\Admin;

use App\LeaveType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $leaveTypes = LeaveType::active();
        return view('admin.human_resource.leave_type.index', compact('leaveTypes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:leave_types,name'
        ]);
        $addCategory = new LeaveType();
        $addCategory->name = $request->name;
        $addCategory->save();

        $notification = array(
            'messege' => 'leave type inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:leave_types,name,' . $request->id
        ]);
        $updateLeaveType = LeaveType::where('id', $request->id)->first();
        $updateLeaveType->name = $request->name;
        $updateLeaveType->save();

        $notification = array(
            'messege' => 'Leave type updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($leaveTypeId)
    {
        $statusChange = LeaveType::where('id', $leaveTypeId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Leave type is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Leave type is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


    public function delete($leaveTypeId)
    {
        leaveType::where('id', $leaveTypeId)->singleDelete();
        $notification = array(
            'messege' => 'Leave type is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

  


    public function edit($leaveTypeId)
    {
        $leaveType = leaveType::where('id', $leaveTypeId)->first();
        return response()->json($leaveType);
    }
}
