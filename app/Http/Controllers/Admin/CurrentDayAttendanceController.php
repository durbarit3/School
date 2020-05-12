<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\ClassSection;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\CurrentDayAttendance;
use App\Http\Controllers\Controller;

class CurrentDayAttendanceController extends Controller
{
    public function selectCriteria(Request $request)
    {
        $classes = Classes::select(['id', 'name'])->get();
        return view('admin.attendance.current_day_attendance.select_criteria', compact('classes'));
    }

    public function search(Request $request)
    {
       $class_id = $request->class_id;
       $section_id = $request->section_id;
       date_default_timezone_set('Asia/Dhaka');
        $students = StudentAdmission::with(['Class'])
        ->select(['id','roll_no', 'first_name', 'last_name', 'class', 'section', 'student_photo', 'last_attend'])
        ->where('class', $class_id)
        ->where('section', $section_id)
        ->get();

        if ($students->count() == 0) {
            return '<span class="alert alert-danger d-block">No student available in this class section</span>';
        }else{
           $filteredStudents = $students->filter(function($student){
                return $student->last_attend != date('d-m-Y');
            });
            return view('admin.attendance.current_day_attendance.ajax_view.search_student_view', compact('filteredStudents', 'class_id', 'section_id'));
        }
        
        
    }

    public function store(Request $request)
    {
        if ($request->student_ids == NULL) {
            return \response()->json(['errorMsg' => 'You did not check any student\'s attendance status.']);
        }

        $notes = $request->notes;
        $index = 0;
        date_default_timezone_set('Asia/Dhaka');
        foreach ($request->student_ids as $student_id => $attendance_status) {

            $updateStudentLastAttend = StudentAdmission::where('id', $student_id)->first();
            $updateStudentLastAttend->last_attend = date('d-m-Y');
            $updateStudentLastAttend->save();

            $addCurrentDayAttendance = new CurrentDayAttendance();
            $addCurrentDayAttendance->class_id = $request->class_id;
            $addCurrentDayAttendance->section_id = $request->section_id;
            $addCurrentDayAttendance->student_id = $student_id;
            $addCurrentDayAttendance->month = date('F');
            $addCurrentDayAttendance->year = date('Y');
            $addCurrentDayAttendance->date = date('d-m-Y');
            $addCurrentDayAttendance->attendance_status = $attendance_status;
            $addCurrentDayAttendance->note = $notes[$index] ? $notes[$index] : NULL;
            $addCurrentDayAttendance->save();
            $index++;
        }

        return \response()->json(['successMsg' => 'Successfully Current day attendance has been taken.']);

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
