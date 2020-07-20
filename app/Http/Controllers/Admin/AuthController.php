<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // show admin login form

    public function showLoginForm()
    {
        return view('admin.account.login');
    }

     /*
     * Admin Login .
    */

    public function login(Request $request)
    {

        $data = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', request('email'))->where('status',1)->first();
            if ($admin && $admin->status == 1) {
                if (Auth::guard('admin')->attempt(['email' => request('email'), 'password' => request('password')],
                request('remember'))) {
                    return redirect()->intended(route('admin.home'));
                } else {
                    session()->flash('successMsg', 'Sorry !! Email or Password not matched!');
                    return redirect()->back();
                }
            }else{
                session()->flash('successMsg', 'Sorry !! you do not have any permission to login.');
                return redirect()->back();
            }
    }



    // show registration form

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    // show registration form

    public function showRegistationPage()
    {
        return view('admin.account.register');
    }
    // register admin accounts

    public function register(Request $request)
    {

        $remember_token = rand(100000,900000);
        $request->validate(
           [
               'name' => 'required',
               'email' => 'required|email|unique:users,email',
               'password' => 'required|confirmed|min:6',
           ],
           [
               'name.required' => 'Name must not be empty!',
               'email.required' => 'Email must not be empty!',
           ]

       );
       Admin::insert([
           'adminname' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'email_verified_at' => md5($request->email),
           'remember_token' => $remember_token,
           'verification_code' => $remember_token,
           'password' => bcrypt($request->password),
           'created_at' => Carbon::now(),

       ]);
       return redirect('/admin/login');

    }

   

}
