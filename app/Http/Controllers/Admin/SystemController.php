<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentSession;
use App\NotificationSetting;
use App\SmsSetting;
use App\EmailNotification;

class SystemController extends Controller
{


   // notification area start
   // show notification
   public function showNotification()
   {
        $notifications = NotificationSetting::all();    
        return view("admin.setting.notification",compact('notifications'));
   }

   // get notifications data
    public function getNotificationData($id)
    {
        $notifications = NotificationSetting::findOrFail($id);
        return response()->json($notifications);    
    }

   // notifications update
   public function notificationUpdate(Request $request)
   {
        NotificationSetting::findOrFail($request->id)->update([
            'smg'=>$request->msg,
        ]);

        $notification = array(
            'messege' => 'notification Updated successfully!',
            'alert-type' => 'success'
        );
    return Redirect()->back()->with($notification);
   }

   // change email notification status
    public function changeEmailNotificationStatus($id)
    {
        $changestatus =NotificationSetting::findOrFail($id);

        if($changestatus->email == Null){
            $changestatus->email = 1;
            $changestatus->save();
        }else{
        $changestatus->email = Null;
            $changestatus->save();
        }

        return response()->json(['successMsg'=>'Email Notification Changed successfully!',]);
    }

    // change sms notification status
    public function changeSmsNotificationStatus($id)
    {
        $changestatus =NotificationSetting::findOrFail($id);

        if($changestatus->sms == Null){
            $changestatus->sms = 1;
            $changestatus->save();
        }else{
        $changestatus->sms = Null;
            $changestatus->save();
        }

        return response()->json([
            'successMsg'=>'SMS Notification Changed successfully!',
        ]);
    }

   // SMS Notification area start

    public function showSmsNotification()
    {
        $smssetting = SmsSetting::findOrFail(1);
        return view('admin.setting.smssetting', compact('smssetting'));
    }

   // SMS Notification Update

    public function smsNotificationUpdate(Request $request)
    {
        SmsSetting::findOrFail(1)->update($request->all());
        $notification = array(
            'messege' => 'SMS Setting  Updated successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

   // EMAIL Notification area start
    public function showEmailNotification()
    {
        $emailsetting = EmailNotification::findOrFail(1);
        return view('admin.setting.emailsetting',compact('emailsetting'));
    }

   // SMS Notification Update
    public function emailNotificationUpdate(Request $request)
    {
        EmailNotification::findOrFail(1)->update($request->all());
        $notification = array(
            'messege' => 'Email Setting  Updated successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

}
