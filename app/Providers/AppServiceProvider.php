<?php

namespace App\Providers;


use App\GeneralSetting;
use App\RolePermission;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() 
    {
        Schema::defaultStringLength(191);
        $generalSettings = GeneralSetting::first();
        view()->share('generalSettings', $generalSettings);
       
        view()->composer('admin*', 'App\Http\Controllers\Admin\ViewComposerController@compose');
        
     }
}
