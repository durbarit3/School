<?php

namespace App\Http\Controllers\Admin;


use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ViewComposerController extends Controller
{
    public function compose(View $view)
    {
        if (Auth::check()) {
            if ($view->getName() != 'admin.master' AND $view->getName() != 'admin.include.header_top') {
                $userPermits = DB::table('role_permissions')->where('role_id', Auth::user()->role)->first();
                $view->with('userPermits', $userPermits); 
            }
        }
        
    }
}
