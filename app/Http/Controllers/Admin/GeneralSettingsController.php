<?php

namespace App\Http\Controllers\Admin;

use App\Session;
use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('admin.setting.general_settings.index', compact('sessions'));
    }

    public function logoUpdate(Request $request, $generalSettingId)
    {
   
        $this->validate($request, [
            'app_logo' => 'sometimes|image',
            'print_logo' => 'sometimes|image',
        ]);

        $generalSetting = GeneralSetting::where('id', $generalSettingId)->first();
        if ($request->file('app_logo')) {
            if ($generalSetting->app_logo) {
                if (file_exists(public_path('uploads/logos/'.$generalSetting->app_logo))) {
                    unlink(public_path('uploads/logos/'.$generalSetting->app_logo));
                }
            }
            
            $appLogo = $request->file('app_logo');
            $appLogoName = uniqid() . '.' . $appLogo->getClientOriginalExtension();
            $appLogo->move(public_path('uploads/logos/'),$appLogoName);
            $generalSetting->app_logo =  $appLogoName;
            $generalSetting->save();
           
        }
        if ($request->file('print_logo')) {
            if ($generalSetting->print_logo) {
                if (file_exists(public_path('uploads/logos/'.$generalSetting->print_logo))) {
                    unlink(public_path('uploads/logos/'.$generalSetting->print_logo));
                }
            }
            
            $printLogo = $request->file('print_logo');
            $printLogoName = uniqid() . '.' . $printLogo->getClientOriginalExtension();
            $printLogo->move(public_path('uploads/logos/'),$printLogoName);
            $generalSetting->print_logo =  $printLogoName;
            $generalSetting->save();
           
        }

        $notification = array(
            'messege' => 'Logo updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function schoolInfoUpdate(Request $request, $generalSettingId)
    {
        $this->validate($request, [
            'school_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'school_address' => 'required',
        ]);
        $generalSetting = GeneralSetting::where('id', $generalSettingId)->first();
        $generalSetting->school_name =  $request->school_name;
        $generalSetting->phone =  $request->phone;
        $generalSetting->email =  $request->email;
        $generalSetting->website =  $request->website;
        $generalSetting->school_address =  $request->school_address;
        $generalSetting->save();
       
    
        $notification = array(
            'messege' => 'School information is updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function setCurrentSession(Request $request)
    {
        $this->validate($request, [
            'session_id' => 'required',
        ]);

        $sessions = Session::where('is_current_session', 1)->first();
        $sessions->is_current_session = 0;
        $sessions->save();

        $setCurrentSession = Session::where('id', $request->session_id)->first();
        $setCurrentSession->is_current_session = 1;
        $setCurrentSession->save();

        $notification = array(
            'messege' => 'School current session has been set successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeCurrentDayAttendanceStatus($generalSettingId)
    {
        $generalSetting = GeneralSetting::where('id', $generalSettingId)->first();

        if ($generalSetting->current_day_attendance == 1) {
            $generalSetting->current_day_attendance = 0;
            $generalSetting->save();
            $notification = array(
                'messege' => 'Current day attendance is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $generalSetting->current_day_attendance = 1;
            $generalSetting->save();
            $notification = array(
                'messege' => 'Current day attendance is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    } 
    
    public function changePeriodAttendanceStatus($generalSettingId)
    {
        $generalSetting = GeneralSetting::where('id', $generalSettingId)->first();

        if ($generalSetting->period_attendance == 1) {
            $generalSetting->period_attendance = 0;
            $generalSetting->save();
            $notification = array(
                'messege' => 'Period attendance is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $generalSetting->period_attendance = 1;
            $generalSetting->save();
            $notification = array(
                'messege' => 'Period attendance is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    
    public function changeExamAttendanceStatus($generalSettingId)
    {
        $generalSetting = GeneralSetting::where('id', $generalSettingId)->first();

        if ($generalSetting->exam_attendance == 1) {
            $generalSetting->exam_attendance = 0;
            $generalSetting->save();
            $notification = array(
                'messege' => 'Exam attendance is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $generalSetting->exam_attendance = 1;
            $generalSetting->save();
            $notification = array(
                'messege' => 'Exam attendance is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    
    public function setColorTheme($colorThemeId)
    {
        $generalSetting = GeneralSetting::first();

    
        $generalSetting->color_theme = $colorThemeId;
        $generalSetting->save();
        $notification = array(
            'messege' => 'Color theme is activated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
        
    }

    
    

}
