<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\Session;
use App\ClassSection;
use App\ClassSubject;
use App\PeriodAttendance;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeriodAttendanceController extends Controller
{
    public function search(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $subject_id = $request->subject_id;
        $currentSession = Session::where('is_current_session', 1)->first();
        $class_section_id = '';
        if (isset($class_id) && $section_id) {
            $classSection = ClassSection::where('class_id', $class_id)->where('section_id', $section_id)->first();
            $class_section_id = $classSection->id;
        }
        
        $classes = Classes::select(['id', 'name'])->get();
        
        $students = StudentAdmission::with(['Class'])
            ->select(['id','roll_no', 'first_name', 'last_name', 'class', 'section', 'student_photo'])
            ->where('class', $class_id)
            ->where('section', $section_id)
            ->where('session_id', $currentSession->id)
            ->get();

        return view('admin.attendance.period_attendance.select_criteria', compact('class_id', 'section_id', 'students', 'classes', 'class_section_id', 'subject_id'));

    }

    public function store(Request $request)
    {
       
        $notes = $request->notes;
        $index = 0;
        date_default_timezone_set('Asia/Dhaka');
        $currentSession = Session::where('is_current_session', 1)->first();
        foreach ($request->student_ids as $student_id => $attendance_status) {
            $addPeriodAttendance = new PeriodAttendance();
            $addPeriodAttendance->class_id = $request->class_id;
            $addPeriodAttendance->section_id = $request->section_id;
            $addPeriodAttendance->subject_id = $request->subject_id;
            $addPeriodAttendance->student_id = $student_id;
            $addPeriodAttendance->month = date('F');
            $addPeriodAttendance->year = date('Y');
            $addPeriodAttendance->date = date('d-m-Y');
            $addPeriodAttendance->attendance_status = $attendance_status;
            $addPeriodAttendance->session_id = $currentSession->id;
            $addPeriodAttendance->note = $notes[$index] ? $notes[$index] : NULL;
            $addPeriodAttendance->save();
            $index++;
        }

        return \response()->json(['successMsg' => 'Successfully period attendance has been taken.']);

    }

    public function getSectionsByClassId($classId)
    {
        $classSection = ClassSection::with('section')
            ->where('class_id', $classId)
            ->select(['id', 'section_id'])
            ->get();
        return response()->json($classSection);
    }

    public function getSubjectsByClassIdAndSectionId($classId, $sectionId)
    {
        $classSection = ClassSection::where('class_id', $classId)->where('section_id',$sectionId)->select('id')->first();
        $classSubjects = ClassSubject::with('subject')->where('class_section_id', $classSection->id)->get();
        return response()->json($classSubjects);
    }
}
