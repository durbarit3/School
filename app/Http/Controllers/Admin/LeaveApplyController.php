<?php

namespace App\Http\Controllers\Admin;

use App\LeaveType;
use App\LeaveApply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LeaveApplyController extends Controller
{
    public function index()
    {
        $leaveApplies = LeaveApply::with(['leaveType', 'employee'])->where('employee_id', Auth::user()->id)->get();
        $leaveTypes = LeaveType::all();
        return view('admin.human_resource.leave_apply.index', compact('leaveApplies', 'leaveTypes'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'apply_date' => 'required',
            'leave_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
            'attachment_file_name' => 'sometimes|mimes:jpeg,jpg,png,gif,xlsx,csv,txt,pdf|max:20480',
        ]);

        

        $addLeaveApply = new LeaveApply();
        $addLeaveApply->apply_date = $request->apply_date;
        $addLeaveApply->employee_id = Auth::user()->id;
        $addLeaveApply->leave_type_id = $request->leave_type;
        $addLeaveApply->start_date = $request->start_date;
        $addLeaveApply->end_date = $request->end_date;
        $addLeaveApply->reason = $request->reason;

        $attachmentFile = $request->file('attachment_file');
        if ($request->hasFile('attachment_file')) {

            $attachment_file_name = uniqid().'.'.$attachmentFile->getClientOriginalExtension();
           
            //Storage::disk('public')->put('attachment_file/'.$attachment_file_name);
            //storage_path('app/public/attachment_file/'.$attachment_file_name,$attachmentFile);
            $attachmentFile->move(public_path('uploads/leave_apply_attachment_file/'),$attachment_file_name);
            $addLeaveApply->attachment_file = $attachment_file_name;
        }

        $addLeaveApply->save();
        
        return \response()->json(['successMsg' => 'Successfully leave applied.']);
    }

    public function details($leaveApplyId)
    {
        $leaveApply = LeaveApply::with(['leaveType', 'employee'])->where('id', $leaveApplyId)->firstOrFail();
        return view('admin.human_resource.leave_apply.ajax_view.details_view', compact('leaveApply'));
    }
}
