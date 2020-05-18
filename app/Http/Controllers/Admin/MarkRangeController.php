<?php

namespace App\Http\Controllers\Admin;

use App\MarkRange;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarkRangeController extends Controller
{
    public function index()
    {
        $gradeRanges = MarkRange::select(['id','name', 'grade_point', 'min_percentage', 'max_percentage', 'note', 'status'])
        ->orderBy('id', 'ASC')
        ->get();
        return view('admin.exam_master.mark.grade_range.index', compact('gradeRanges'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:mark_ranges,name',
            'grade_point' => 'required|unique:mark_ranges,grade_point',
            'min_percentage' => 'required',
            'max_percentage' => 'required',
        ]);

        MarkRange::insert([
            'name' => $request->name,
            'grade_point' => $request->grade_point,
            'min_percentage' => trim($request->min_percentage, '%'),
            'max_percentage' => trim($request->max_percentage, '%'),
            'note' => $request->note,
        ]);

        $notification = array(
            'messege' => 'Grade Range inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($markRangeId)
    {
        $statusChange = MarkRange::where('id', $markRangeId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Mark range is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Mark range is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:mark_ranges,name,'.$request->id,
            'grade_point' => 'required|unique:mark_ranges,grade_point,'.$request->id,
            'min_percentage' => 'required',
            'max_percentage' => 'required',
        ]);

        $updateGradeRange = MarkRange::where('id', $request->id)->select(['id','name', 'grade_point', 'min_percentage', 'max_percentage', 'note'])
        ->first();

        $updateGradeRange->name = $request->name;
        $updateGradeRange->grade_point = $request->grade_point;
        $updateGradeRange->min_percentage = trim($request->min_percentage, '%');
        $updateGradeRange->max_percentage = trim($request->max_percentage, '%');
        $updateGradeRange->note = $request->note;
        $updateGradeRange->save();

        $notification = array(
            'messege' => 'Grade Range is updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Ajax Method

    public function getMarkRangeByAjax($markRangeId)
    {
        $gradeRanges = MarkRange::where('id', $markRangeId)->select(['id','name', 'grade_point', 'min_percentage', 'max_percentage', 'note'])
        ->first();

        return response()->json($gradeRanges);
    }

}
