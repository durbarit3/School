<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes;
use App\ClassSection;
use App\ClassSubject;
use App\SubjectTeacher;
use App\Admin;
use App\Group;


class AssignSubjectTeacherController extends Controller
{
    public function index()
    {

        $subjectTeachers = SubjectTeacher::with(['class','section', 'group', 'subject', 'teacher'])->where('deleted_status', NULL)
        ->get()->map(function($subjectTeacher){
            return [
                'id' => $subjectTeacher->id,
                'status' => $subjectTeacher->status,
                'class' => $subjectTeacher->class->name,
                'section' => $subjectTeacher->section->name,
                'group' => $subjectTeacher->group ? $subjectTeacher->group->name : 'N/A',
                'subject' => $subjectTeacher->subject->name,
                'teacher' => $subjectTeacher->teacher->adminname,
            ];
        });
        

        $formClasses = Classes::where('deleted_status', NULL)
        ->where('status', 1)
        ->select('id', 'name')
        ->get();
        $groups = Group::select(['id', 'name'])->get();
        $teachers = Admin::where('deleted_status', NULL)
        ->where('status', 1)
        ->where('role', 3)
        ->select('id', 'adminname')
        ->get();
        return view('admin.academic.subject_teacher_assign.index',compact('formClasses', 'teachers', 'groups', 'subjectTeachers'));
    }

    public function store(Request $request)
    {
            $subjectTeacher = SubjectTeacher::where('class_id', $request->class_id)
            ->where('section_id', $request->section_id)
            ->where('subject_id', $request->subject_id)
            ->first();
        if ($subjectTeacher) {
            $subjectTeacher->class_id = $request->class_id;
            $subjectTeacher->section_id = $request->section_id;
            $subjectTeacher->subject_id = $request->subject_id;
            $subjectTeacher->teacher_id = $request->teacher_id;
            $subjectTeacher->group_id = $request->group_id;
            $subjectTeacher->save();
        }else {
            $assignSubjectTeacher = new SubjectTeacher();
            $assignSubjectTeacher->class_id = $request->class_id;
            $assignSubjectTeacher->section_id = $request->section_id;
            $assignSubjectTeacher->subject_id = $request->subject_id;
            $assignSubjectTeacher->teacher_id = $request->teacher_id;
            $assignSubjectTeacher->group_id = $request->group_id;
            $assignSubjectTeacher->save();
        }
        

        $notification = array(
            'messege' => 'Assigned teacher to subject successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getSectionByAjax($classId)
    {
        $classSection = ClassSection::with('section')
        ->where('class_id', $classId)
        ->select(['id', 'section_id'])
        ->get();
        
        return response()->json($classSection);
    }

    public function getSubjectsByClassIdAndSectionId($classId, $sectionId)
    {
        $classSectionId = ClassSection::where('class_id', $classId)->where('section_id', $sectionId)
        ->select('id')->first();
        $classSubjects = ClassSubject::with('subject')->where('class_section_id', $classSectionId->id)->get();

        return \response()->json($classSubjects);
    }


    public function delete($subjectTeacherId)
    {
        
        $subjectTeachers = SubjectTeacher::where('id', $subjectTeacherId)->singleDelete();
        $notification = array(
            'messege' => 'Assigned subject teacher is deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function updateStatus($subjectTeacherId)
    {
        $statusChange = SubjectTeacher::where('id', $subjectTeacherId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Assigned subject teacher is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Assigned subject teacher is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
