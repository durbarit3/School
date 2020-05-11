<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\ClassSubject;
use App\UploadContent;
use App\AttachmentType;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class AttachmentUploadContentController extends Controller
{
    public function index()
    {
        $classes = Classes::select(['id', 'name'])->where('status', 1)->where('deleted_status', NULL)->get();
        $types = AttachmentType::select(['id', 'name'])->where('status', 1)->where('deleted_status', NULL)->get();
        $uploadContents = UploadContent::with('class', 'subject', 'attachmentType')->get();

        return view('admin.attachment_book.upload_content.index', compact('classes', 'types', 'uploadContents'));
    }

    public function getSubjectsByAjax($classId)
    {
       $classSubjects = ClassSubject::with('subject')->where('class_id', $classId)->get();
       return response()->json($classSubjects);
    }

    public function edit($uploadContentId)
    {
        $uploadContent = UploadContent::where('id', $uploadContentId)->first();
        $types = AttachmentType::select(['id', 'name'])->where('status', 1)->where('deleted_status', NULL)->get();
        $classes = Classes::select(['id', 'name'])->where('status', 1)->where('deleted_status', NULL)->get();
        $subjects = Subject::select(['id', 'name'])->where('status', 1)->where('deleted_status', NULL)->get();
        return view('admin.attachment_book.upload_content.ajax_view.edit_modal_view', compact('uploadContent', 'classes', 'subjects', 'types'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'publish_date' => 'required',
            'attachment_file' => 'required|mimes:jpeg,jpg,png,gif,xlsx,csv,txt,pdf|max:20480',
        ]);

        
        if(!isset($request->available_for_all_class)){
            $this->validate($request,[
                'class_id' => 'required',
            ]
            );
        }

        // if(!isset($request->not_according_to_subject)){
        //     $this->validate($request,[
        //         'subject_id' => 'required',
        //         ]
        //     );
        // }
        
        $attachmentFile = $request->file('attachment_file');
        if ($request->file('attachment_file')) {

                $attachment_file_name = uniqid().'-'.$request->title.'.'.$attachmentFile->getClientOriginalExtension();
               
                //Storage::disk('public')->put('attachment_file/'.$attachment_file_name);
                //storage_path('app/public/attachment_file/'.$attachment_file_name,$attachmentFile);
                $attachmentFile->move(public_path('uploads/attachment_file/'),$attachment_file_name);
                
                $addAttachment = new UploadContent();
                $addAttachment->title = $request->title;
                $addAttachment->type_id = $request->type;

            if (!isset($request->available_for_all_class)) {
                $addAttachment->class_id = $request->class_id;
                $addAttachment->subject_id = $request->subject_id;
            }else {
                $addAttachment->is_for_all_class = 1; 
            }

            if (!isset($request->not_according_to_subject)) {
                $addAttachment->subject_id = $request->subject_id;
            }else {
                $addAttachment->is_according_to_subject = 0; 
            }

            $addAttachment->publish_date = $request->publish_date; 
            $addAttachment->note = $request->note; 
            $addAttachment->attachment_file = $attachment_file_name; 
            $addAttachment->save(); 
        }

        $notification = array(
            'messege' => 'Attachment uploaded successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

        
    }

    public function changeStatus($uploadContentId)
    {
        $statusChange = UploadContent::where('id', $uploadContentId)->first();
        if ($statusChange->is_published == 1) {
            $statusChange->is_published = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Attachment published status is changed',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->is_published = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Attachment published status is changed',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($uploadContentId){
        $UploadContent = UploadContent::where('id', $uploadContentId)->first();
        if(file_exists(public_path('public/uploads/attachment_file/'.$UploadContent->attachment_file)) == true){
            unlink(public_path('uploads/attachment_file/'.$UploadContent->attachment_file));
        }

        $UploadContent->delete();
        $notification = array(
            'messege' => 'Attachment deleted successfully.',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    

}
