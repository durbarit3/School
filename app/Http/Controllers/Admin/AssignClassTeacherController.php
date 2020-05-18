<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\ClassSection;
use App\Admin;
use App\ClassTeacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AssignClassTeacherController extends Controller
{
    public function index()
    {
        $formClasses = Classes::where('deleted_status', NULL)
        ->where('status', 1)
        ->select(['id', 'name'])
        ->get();
        $teachers = Admin::where('deleted_status', NULL)
        ->where('status', 1)
        ->where('role', 3)
        ->select('id', 'adminname')
        ->get();
        $classSections = ClassSection::with(['class','section','classTeachers', 'classTeachers.employee'])
        ->where('deleted_status', NULL)
        ->where('is_assigned_teacher', 1)
        ->get()->map(function($classSection){
            return [
                'id' => $classSection->id,
                'class' => $classSection->class->name, 
                'section' => $classSection->section->name, 
                'classTeachers' => $classSection->classTeachers->map(function($classTeacher){
                    return [
                        'name' => $classTeacher->employee->adminname,
                    ];
                }), 
            ];
        });
        
        return view('admin.academic.class_teacher_assign.index', compact('formClasses', 'teachers', 'classSections'));
    }

    public function getSectionByAjax($classId)
    {
        $classSection = ClassSection::with('section')
        ->where('class_id', $classId)
        ->select(['id', 'section_id'])
        ->get();
        return response()->json($classSection);
    }

    public function edit($classSectionId)
    {
        $classSection = ClassSection::with('class', 'section', 'classTeachers')
        ->where('id', $classSectionId)
        ->select(['id', 'class_id', 'section_id'])
        ->first();

        $teachers = Admin::where('deleted_status', NULL)
        ->where('status', 1)
        ->where('role', 3)
        ->select('id', 'adminname')
        ->get();
        return view('admin.academic.class_teacher_assign.ajax_view.edit_modal_view', compact('classSection', 'teachers'));
    }

    
    public function update(Request $request, $classSectionId)
    {
        
        $ClassClassTeachers = ClassTeacher::where('class_section_id', $classSectionId)->get();
        foreach($ClassClassTeachers as $ClassClassTeacher){
            $ClassClassTeacher->delete();
        }

        foreach ($request->teacher_ids as $teacherId) {
            $assignClassTeacherUpdate = new ClassTeacher();
            $assignClassTeacherUpdate->class_section_id = $classSectionId;
            $assignClassTeacherUpdate->employee_id = $teacherId;
            $assignClassTeacherUpdate->save();
        }

        $notification = array(
            'messege' => 'Assigned class teacher updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($classSectionId)
    {
        
        $ClassClassTeachers = ClassTeacher::where('class_section_id', $classSectionId)->get();
        foreach($ClassClassTeachers as $ClassClassTeacher){
            $ClassClassTeacher->singleDelete();
        }
        $ClassSection = ClassSection::where('id', $classSectionId)->first();
        $ClassSection->is_assigned_teacher = 0;
        $ClassSection->save();

        $notification = array(
            'messege' => 'Assigned class teacher updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'class_id' => 'required',
            'section_id' => 'required',
        ]);

        $ClassSection = ClassSection::where('class_id', $request->class_id)
            ->where('section_id', $request->section_id)
            ->select(['id', 'is_assigned_teacher'])
            ->first();

        if ($ClassSection->is_assigned_teacher == 1) {
            $notification = array(
                'messege' => 'Class teacher has already been assigned in this class and section :)',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

        foreach ($request->teacher_ids as $teacherId) {
            $assignSubject = new ClassTeacher();
            $assignSubject->class_section_id = $ClassSection->id;
            $assignSubject->employee_id = $teacherId;
            $assignSubject->save();
        }
        $ClassSection->is_assigned_teacher = 1;
        $ClassSection->save();

        $notification = array(
            'messege' => 'Teacher assigned successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    
}
