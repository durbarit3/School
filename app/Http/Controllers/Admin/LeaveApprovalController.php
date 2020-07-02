<?php

namespace App\Http\Controllers\Admin;

use App\LeaveApply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LeaveApprovalController extends Controller
{
    public function index()
    {
        if (!Auth::user()->role == 1 or !Auth::user()->role == 2) {
            abort(403);
        }
        $leaveApplies = LeaveApply::with(['leaveType', 'employee'])
        ->get();
        return view('admin.human_resource.leave_approval.index', compact('leaveApplies'));
    }

    public function action(Request $request)
    {
       //return $request->all();
       $leaveApplies = LeaveApply::where('id', $request->leave_apply_id)->first();
        $leaveApplies->approval = $request->approval;
        $leaveApplies->save();

        
        return response()->json(['successMsg' => 'Leave approval status has been changed.']);
        
    }
}
