<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\ClassSection;
use App\ClassSubject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;
use App\Subject;

class AcademicAssignController extends Controller
{
    public function allAssignedSubject()
    {
        $formClasses = Classes::where('status', 1)->get();
        $formSubjects = Subject::where('status', 1)->get();
        $classSections = ClassSection::with(['class', 'section', 'classSubjects', 'classSubjects.subject'])
            ->where('is_assigned_subject', 1)
            ->get();

        return view('admin.academic.subject_assign.index', compact('formClasses', 'formSubjects', 'classSections'));
    }

    public function subjectAssign(Request $request)
    {
        $this->validate($request, [
            'class_id' => 'required',
            'section_id' => 'required',
        ]);

        $ClassSection = ClassSection::where('class_id', $request->class_id)
            ->where('section_id', $request->section_id)
            ->select(['id', 'is_assigned_subject'])
            ->first();

        if ($ClassSection->is_assigned_subject == 1) {
            $notification = array(
                'messege' => 'Subjects has already been assigned in this class and section :)',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

        foreach ($request->subject_ids as $subjectId) {
            $assignSubject = new ClassSubject();
            $assignSubject->class_section_id = $ClassSection->id;
            $assignSubject->subject_id = $subjectId;
            $assignSubject->class_id = $request->class_id;
            $assignSubject->save();
        }
        $ClassSection->is_assigned_subject = 1;
        $ClassSection->save();

        $notification = array(
            'messege' => 'Subjects assigned successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getSectionByAjax($classId)
    {
        $classSections = ClassSection::with(['section'])->where('class_id', $classId)->get();
        return response()->json($classSections);
    }

    public function subjectAssignUpdate(Request $request)
    {
        $classSubjects = ClassSubject::where('class_section_id', $request->class_section_id)->get();

        foreach ($classSubjects as $value) {
            $value->delete();
        }

        foreach ($request->subject_ids as $subjectId) {
            $assignSubject = new ClassSubject();
            $assignSubject->class_section_id = $request->class_section_id;
            $assignSubject->subject_id = $subjectId;
            $assignSubject->class_id = $request->class_id;
            $assignSubject->save();
        }

        $notification = array(
            'messege' => 'assigned Subjects updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getAssignedSubjectByAjax($classSectionId)
    {
        $classSubjects = ClassSubject::where('class_section_id', $classSectionId)->get();
        $subjects = Subject::where('status', 1)->latest()->active();

        return view('admin.academic.subject_assign.ajax_blade.get_assigned_subjects', compact('subjects', 'classSubjects'));
    }

    public function subjectAssignDelete($classSectionId)
    {
        $classSection = ClassSection::with(['classSubjects'])->where('id', $classSectionId)->first();
        $classSection->is_assigned_subject = 0;
        $classSection->save();
        foreach ($classSection->classSubjects as $classSubject) {
            $classSubject->singleDelete();
        }

        $notification = array(
            'messege' => 'assigned Subjects deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
