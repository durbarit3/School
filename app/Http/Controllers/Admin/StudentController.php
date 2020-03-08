<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // 
    public function create(){
    	return view('admin.studentadmission.add');
    }
    // 
    public function store(Request $request){
    	return $request;
    }
}
