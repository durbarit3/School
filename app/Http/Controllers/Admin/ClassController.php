<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\ClassSection;
use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::with(['classSections', 'classSections.section'])->active();
        $sections = Section::where('status', 1)->select('id','name')->active();
        return view('admin.academic.class.index', compact('classes', 'sections'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:classes,name'
        ]);

        $addClass = new Classes();
        $addClass->name = $request->name;
        $addClass->save();
        foreach ($request->sectionIds as $sectionId) {
           $addClassSections = new ClassSection();
           $addClassSections->class_id = $addClass->id;
           $addClassSections->section_id = $sectionId;
           $addClassSections->save();
        }


        $notification = array(
            'messege' => 'Class inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($classId)
    {
        $class = Classes::with('classSections')->select(['id', 'name'])->where('id', $classId)->firstOrFail();
        $sections = Section::select(['id', 'name'])->where('status', 1)->get();
        return view('admin.academic.class.ajax_view.edit_modal_view', compact('class', 'sections'));
    }

    public function update(Request $request, $classId)
    {
        $this->validate($request, [
            'name' => 'required|unique:classes,name,' . $classId
        ]);

        $updateClass = Classes::where('id', $classId)->first();
        $updateClass->name = $request->name;
        $updateClass->save();

        $allPreviousClassSections = ClassSection::where('class_id', $classId)->get();

        foreach ($allPreviousClassSections as $value) {
            $value->prepare_to_update = 1;
            $value->save();
        }

        foreach ($request->sectionIds as $sectionId) {
           $classSection = ClassSection::where('class_id', $classId)->where('section_id', $sectionId)->first();
           if ($classSection) {
                $classSection->prepare_to_update = 0;
                $classSection->save();
           }else{
                $updateClassSections = new ClassSection();
                $updateClassSections->class_id = $updateClass->id;
                $updateClassSections->section_id = $sectionId;
                $updateClassSections->save();
           }
           
        }
        $OldClassSections = ClassSection::where('class_id', $classId)->where('prepare_to_update', 1)
        ->select(['id'])->get();
        foreach ($OldClassSections as $value) {
            $value->delete();
        }

        $notification = array(
            'messege' => 'Class updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($classId)
    {
        $statusChange = Classes::where('id', $classId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Class is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Class is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function getClassNameByAjax($classId)
    {
        $class = Classes::where('id', $classId)->first();
        return response()->json($class);
    }


    public function hardDelete($classId)
    {
        
        Classes::where('id', $classId)->singleDelete();
        $notification = array(
            'messege' => 'Class is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleHardDelete(Request $request)
    {
        if ($request->class_id == null) {
            $notification = array(
                'messege' => 'You did not select any category',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->class_id as $classId) {
                Classes::where('id', $classId)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Class is deleted permanently:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
