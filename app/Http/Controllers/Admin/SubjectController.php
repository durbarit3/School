<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::latest()->get();
        return view('admin.academic.subject.index', compact('subjects'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'code' => 'required',
        ]);

        date_default_timezone_set('Asia/Dhaka');
        $addSubject = new Subject();
        $addSubject->name = $request->name;
        $addSubject->type = $request->type;
        $addSubject->code = $request->code;
        $addSubject->save();

        session()->flash('successMsg', 'Successfully subject added.');
        return response()->json('Subject added successfully:)');
    }

    public function edit($subjectId)
    {
        $subject = Subject::where('id', $subjectId)->firstOrFail();
        return view('admin.academic.subject.ajax_view.edit_modal_view', compact('subject'));
    }

    public function update(Request $request, $subjectId)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'code' => 'required',
        ]);

        date_default_timezone_set('Asia/Dhaka');
        $updateSubject =  Subject::where('id', $subjectId)->first();
        $updateSubject->name = $request->name;
        $updateSubject->type = $request->type;
        $updateSubject->code = $request->code;
        $updateSubject->save();

        session()->flash('successMsg', 'Successfully subject updated.');
        return response()->json('Subject updated successfully:)');
    }

    public function changeStatus($subjectId)
    {
        $statusChange = Subject::where('id', $subjectId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Subject is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Subject is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($subjectId)
    {
        Subject::where('id', $subjectId)->delete();
        $notification = array(
            'messege' => 'Subject is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any subject',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $subjectId) {
                Subject::where('id', $subjectId)->delete();
            }
        }
        $notification = array(
            'messege' => 'Subject is deleted permanently:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
