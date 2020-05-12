<?php

namespace App\Http\Controllers\Admin;

use App\AttachmentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttachmentTypeController extends Controller
{
    public function index()
    {
        $attachmentTypes = AttachmentType::active();
        return view('admin.attachment_book.attachment_type.index', compact('attachmentTypes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:attachment_types,name'
        ]);
        $addAttachmentType = new AttachmentType();
        $addAttachmentType->name = $request->name;
        $addAttachmentType->save();

        $notification = array(
            'messege' => 'Attachment type inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:attachment_types,name,' . $request->id
        ]);
        $updateCategory = AttachmentType::where('id', $request->id)->first();
        $updateCategory->name = $request->name;
        $updateCategory->save();

        $notification = array(
            'messege' => 'Attachment type updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($attachmentTypeId)
    {
        $statusChange = AttachmentType::where('id', $attachmentTypeId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Attachment type is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Attachment type is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


    public function delete($attachmentTypeId)
    {
        AttachmentType::where('id', $attachmentTypeId)->delete();
        $notification = array(
            'messege' => 'Attachment type is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getAttachmentTypeByAjax($attachmentTypeId)
    {
        $attachmentType = AttachmentType::where('id', $attachmentTypeId)->first();
        return response()->json($attachmentType);
    }
}
