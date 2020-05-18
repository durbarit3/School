<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\ClassSection;
use Illuminate\Http\Request;
use App\CurrentDayAttendance;
use App\Http\Controllers\Controller;

class CurrentDayAttendanceByDateController extends Controller
{
    public function selectCriteria(Request $request)
    {
        $classes = Classes::select(['id', 'name'])->get();
        return view('admin.attendance.current_attendance_day_by_date.search_criteria', compact('classes'));
    }

    public function search(Request $request)
    {
       
       date_default_timezone_set('Asia/Dhaka');
       $attendances = CurrentDayAttendance::with('class', 'section', 'student')->select(['id', 'class_id', 'section_id', 'student_id', 'attendance_status'])
        ->where('class_id', $request->class_id)
        ->where('section_id', $request->section_id)
        ->where('date', $request->date)
        ->get();

       
        return view('admin.attendance.current_attendance_day_by_date.ajax_view.search_student_view', compact('attendances'));
        
    }

    public function update(Request $request)
    {
        if ($request->attendance_ids == NULL) {
            return \response()->json(['errorMsg' => 'You did not check any student\'s attendance status.']);
        }

        $notes = $request->notes;
        foreach ($request->attendance_ids as $attendance_id => $attendance_status) {
            $addCurrentDayAttendance =  CurrentDayAttendance::where('id', $attendance_id)->first();
            $addCurrentDayAttendance->attendance_status = $attendance_status;
            $addCurrentDayAttendance->note = $notes[$attendance_id] ? $notes[$attendance_id] : NULL;
            $addCurrentDayAttendance->save();
        }

        return \response()->json(['successMsg' => 'Successfully current day attendance updated successfully.']);

    }

    public function getSectionsByClassId($classId)
    {
        $classSection = ClassSection::with('section')
            ->where('class_id', $classId)
            ->select(['id', 'section_id'])
            ->get();
        return response()->json($classSection);
    }

}
