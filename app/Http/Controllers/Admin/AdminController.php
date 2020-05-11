<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use Harimayco\Menu\Facades\Menu;
use App\Menu as AppMenu;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // show home page
    
    public function index()
    {
        //$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
        //dd($query);
        return view('admin.home.home');
    }

    // show menu page

    public function menuSetting()
    {
        $menuList = Menu::get(1);
        $public_menu = Menu::getByName('Public');
        return view('admin.setting.menu_setting',compact('menuList','public_menu'));
    }

    
    public function urlSetting()
    {
        return view('admin.setting.url_setting');
    }

    public function getUrlName($id)
    {
        return AppMenu::where('type',$id)->get();
    }
}
