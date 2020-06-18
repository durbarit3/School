<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::latest()->get();
        return view('admin.academic.section.index', compact('sections'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sections,name',
            'capacity' => 'required',
        ]);
        $addSection = new Section();
        $addSection->name = $request->name;
        $addSection->capacity = $request->capacity;
        $addSection->save();

        $notification = array(
            'messege' => 'Section inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sections,name,' . $request->id
        ]);
        $updateSection = Section::where('id', $request->id)->first();
        $updateSection->name = $request->name;
        $updateSection->capacity = $request->capacity;
        $updateSection->save();

        $notification = array(
            'messege' => 'Section updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($sectionId )
    {
        Section::where('id', $sectionId)->delete();
        $notification = array(
            'messege' => 'Section is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any section',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $sectionId) {
                Section::where('id', $sectionId)->delete();
            }
        }
        $notification = array(
            'messege' => 'Class is deleted permanently:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($sectionId)
    {
        $statusChange = Section::where('id', $sectionId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Section is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Section is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function getSectionByAjax($sectionId)
    {
        $section = Section::where('id', $sectionId)->first();
        return response()->json($section);
    }
}
