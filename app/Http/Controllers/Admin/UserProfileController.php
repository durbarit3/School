<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {
        $employee = Admin::with(['salaries', 'leaveApplies', 'leaveApplies.leaveType'])->where('id', Auth::user('admin')->id)->first();
        return view('admin.profile.index', compact('employee'));
 
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        if (Hash::check($request->old_password, Auth::user('admin')->password) == true) {
            if (!Hash::check($request->password, Auth::user('admin')->password)) {
                $adminUser = Admin::find(Auth::user('admin')->id);
                $adminUser->password = Hash::make($request->password);
                $adminUser->save();
                Auth::logout();
                return response()->json(["successMsg" => "Successfully you have changed your password. Please login again by your new password!!"]);
                
            }else{
                return response()->json(["errorMsg" => "Old password and new password can't be same. If want to change the current password you have to enter a new password"]);
            }
        }else{
            return response()->json(["errorMsg" => "Your old password doesn't match!"]);
        }
    }
}
