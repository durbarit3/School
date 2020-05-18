<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Contract;
use App\MailDraft;
use Carbon\Carbon;
use App\Designation;
use App\Mail\AuthorityMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function inbox()
    {
       $contracts = Contract::where('deleted_status', NULL)->paginate();
       return view('admin.communication.message.inbox', compact('contracts'));
    }

    public function details($mailId)
    {
        $contract = Contract::where('id', $mailId)->firstOrFail();
        $contract->is_seen = 1;
        $contract->save();
        $countContract = Contract::count();
       return view('admin.communication.message.mail_details', compact('contract', 'countContract'));
    }

    public function sendReply(Request $request)
    {
        $mail_id = $request->id;
        $reply_email = $request->reply_email;
        $reply_mail_subject = $request->reply_mail_subject;
        $reply_mail_body = $request->reply_mail_body;
        $contract = Contract::where('id', $mail_id)->first();
        $logo = '';
        $socialLinks = '';
        if ($request->action === 'send') {
            Mail::to($reply_email)->send(new AuthorityMail($logo, $socialLinks, $reply_mail_subject, $reply_mail_body));
            $contract->is_replied = 1;
            $contract->save();
        //    $mailDraft = MailDraft::where('contract_id', $mail_id)->first();
        //    if ($mailDraft) {
        //         $mailDraft->delete();
        //    }
            $notification = array(
                'messege' => 'Mail relied successfully:)',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else {
            $draftMail = MailDraft::where('contract_id', $mail_id)->first();
            if ($draftMail) {
                $draftMail->subject = $reply_mail_subject;
                $draftMail->body = $reply_mail_body;
                $draftMail->save();
                $notification = array(
                    'messege' => 'Successfully mail saved to draft:)',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }else {
                $draftMail = new MailDraft();
                $draftMail->email = $reply_email;
                $draftMail->subject = $reply_mail_subject;
                $draftMail->body = $reply_mail_body;
                $draftMail->contract_id = $mail_id;
                $draftMail->is_replay_mail = 1;
                $draftMail->created_at = Carbon::now();
                $draftMail->save();
                $notification = array(
                    'messege' => 'Successfully mail saved to draft:)',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }
        }
        
    }

    public function sendMailSection()
    {   $countContract = Contract::count();
        return view('admin.communication.message.send_mail', compact('countContract'));
    }
    
    public function sendMail(Request $request)
    {   
        $email = $request->email;
        $subject = $request->subject;
        $body = $request->body;
        
        $logo = '';
        $socialLinks = '';
        if ($request->action === 'send') {
            Mail::to($email)->send(new AuthorityMail($logo, $socialLinks, $subject, $body));
            $notification = array(
                'messege' => 'Mail send successfully:)',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else {

            $draftMail = new MailDraft();
            $draftMail->email = $email;
            $draftMail->subject = $subject;
            $draftMail->body = $body;
            $draftMail->is_send_mail = 1;
            $draftMail->created_at = Carbon::now();
            $draftMail->save();
            $notification = array(
                'messege' => 'Successfully mail saved to draft:)',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
         
        }  
    }

    public function draftMailSection()
    {
        $draftMails = MailDraft::paginate();
        //dd($draftMails);
        $countContract = Contract::count();
        return view('admin.communication.message.draft_mail', compact('draftMails', 'countContract'));
    }

    public function sendDraftedReplyMail(Request $request)
    {
        $draft_id = $request->draft_id;
        $contract_id = $request->contract_id;
        $draft_reply_email = $request->draft_reply_email;
        $draft_reply_mail_subject = $request->draft_reply_mail_subject;
        $draft_reply_mail_body = $request->draft_reply_mail_body;
        $logo = '';
        $socialLinks = '';
        $draftMail = MailDraft::where('id', $draft_id)->first();
        if ($request->action === 'send') {
            Mail::to($draft_reply_email)->send(new AuthorityMail($logo, $socialLinks, $draft_reply_mail_subject, $draft_reply_mail_body));
            $contract = Contract::where('id', $contract_id)->first();
            $contract->is_replied = 1;
            $contract->save();
            $draftMail->delete();
            $notification = array(
                'messege' => 'Mail replied successfully:)',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else {

            $draftMail->subject = $draft_reply_mail_subject;
            if ($draft_reply_mail_body !== null) {
                $draftMail->body = $draft_reply_mail_body;
            }
            
            $draftMail->save();
            $notification = array(
                'messege' => 'Successfully mail saved to draft:)',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
         
        } 
    }

    public function sendDraftedSendMail(Request $request)
    {
        $send_draft_id = $request->send_draft_id;
        $draft_send_email = $request->draft_send_email;
        $draft_send_mail_subject = $request->draft_send_mail_subject;
        $draft_send_mail_body = $request->draft_send_mail_body;
        
        $logo = '';
        $socialLinks = '';
        $draftMail = MailDraft::where('id', $send_draft_id)->first();
   
        if ($request->action === 'send') {
            Mail::to($draft_send_email)->send(new AuthorityMail($logo, $socialLinks, $draft_send_mail_subject, $draft_send_mail_body));
            $draftMail->delete();
            $notification = array(
                'messege' => 'Mail send successfully:)',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else {

            $draftMail->subject = $draft_send_mail_subject;
            if ($draft_send_mail_body !== null) {
                $draftMail->body = $draft_send_mail_body;
            }
            $draftMail->save();
            $notification = array(
                'messege' => 'Successfully mail updated to draft:)',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
         
        } 
    }

    public function draftMailDelete($draftId)
    {
        dd($draftId);
        $draftMail = MailDraft::where('id', $draftId)->first();
        $draftMail->delete();
        $notification = array(
            'messege' => 'Successfully draft mail deleted:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inboxMessageDelete(Request $request)
    {
        if ($request->delete_mail_ids === null) {
            $notification = array(
                'messege' => 'You did not select any message.',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }else{
            foreach ($request->delete_mail_ids as $delete_mail_id) {
                Contract::where('id', $delete_mail_id)->first()->singleDelete();
            }
            
            $notification = array(
                'messege' => 'Successfully message deleted.',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

    

    public function bulkMailComposeSection()
    {
        $draftMail = '';
        $designations = Designation::all();
        $countContract = Contract::count();
        return view('admin.communication.message.bulk_mail_compose', compact('draftMail', 'designations', 'countContract'));
    }

    public function bulkMailDraftedComposeSection($draftId)
    {
        $designations = Designation::all();
        $draftMail = MailDraft::where('id', $draftId)->first();
        $countContract = Contract::count();
        return view('admin.communication.message.bulk_mail_compose', compact('draftMail', 'designations', 'countContract'));
    }

    public function sendBulkMail(Request $request)
    {
        // dd($request->all());
       $emails =  explode(',', $request->emails);
       
       $subject = $request->subject;
       $body = $request->body;
       
       $logo = '';
       $socialLinks = '';
       if ($request->action === 'send') {
           foreach ($emails as $email) {
                Mail::to(trim($email))->send(new AuthorityMail($logo, $socialLinks, $subject, $body));
           }
           
           $notification = array(
               'messege' => 'Mail send successfully:)',
               'alert-type' => 'success'
           );
           return Redirect()->back()->with($notification);
       }else {
            if ($request->draft_id !== null) {
                $draftMail =  MailDraft::where('id', $request->draft_id)->first();
                $draftMail->subject = $subject;
                $draftMail->body = $body;
                $draftMail->is_bulk_mail = 1;
                $draftMail->save();
                $notification = array(
                    'messege' => 'Successfully mail updated to draft:)',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }else {
                $draftMail = new MailDraft();
                $draftMail->subject = $subject;
                $draftMail->body = $body;
                $draftMail->is_bulk_mail = 1;
                $draftMail->created_at = Carbon::now();
                $draftMail->save();
                $notification = array(
                    'messege' => 'Successfully mail saved to draft:)',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }
          
        
       }  
     
    }

    public function mailTrashes()
    {
        $mailTrashes = Contract::where('deleted_status', 1)->paginate();
        $countContract = Contract::count();
        return view('admin.communication.message.mail_trash', compact('mailTrashes', 'countContract'));
    }

    public function mTrashMailDelete(Request $request)
    {
        if ($request->mail_trash_ids === null) {
            $notification = array(
                'messege' => 'You did not select any mail.',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }else{
            foreach ($request->mail_trash_ids as $mail_trash_id) {
                Contract::where('id', $mail_trash_id)->first()->singleDelete();
            }
            
            $notification = array(
                'messege' => 'Successfully trashed mail deleted.',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function refactorTrashMail($trashMailId)
    {
       $trashedMail =  Contract::where('id', $trashMailId)->first();
       $trashedMail->deleted_status = NULL;
       $trashedMail->deleted_by = NULL;
       $trashedMail->deleted_at = NULL;
       $trashedMail->save();
       $notification = array(
        'messege' => 'Successfully trashed mail refactored.',
        'alert-type' => 'success'
    );
    return Redirect()->back()->with($notification);
    }

    // Ajax Methods

    public function getDraftMailDetails($draftId)
    {
       $draftMail = MailDraft::where('id', $draftId)->first();
        return response()->json($draftMail);
    }

    public function getStaffByRollId($roleId)
    {
        $staffs = Admin::where('role', $roleId)->select(['id', 'adminname', 'email'])->get();
        return view('admin.communication.message.ajax_view.get_staff_for_compose_section', compact('staffs'));
    }

    

    
}
