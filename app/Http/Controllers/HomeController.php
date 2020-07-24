<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  
     // get all online user

     public function onlineUser()
     {
        $admins =Admin::all();
        return view('admin.user.online_user',compact('admins'));
     }

}
