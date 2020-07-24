<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Classes;
use App\Session;
use App\ClassSection;
use App\ClassSubject;
use App\ExamAttendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamAttendanceModifyController extends Controller
{
    public function index()
    {
        $classes = Classes::select(['id', 'name'])->get();
        $sessions = Session::where('deleted_status', NULL)->where('status', 1)->orderBy('id', 'desc')->get(['id', 'session_year']);
        return view('admin.attendance.exam_attendance_modify.index', compact('classes', 'sessions'));
    }

    public function getSubjectsByClassSectionId($classId, $sectionId)
    {
        $classSection = ClassSection::where('class_id', $classId)
        ->where('section_id', $sectionId)
        ->select(['id'])
        ->first();

        $classSubjects = ClassSubject::with(['subject'])->where('class_section_id', $classSection->id)->get();

        return response()->json($classSubjects);
        
    }

    public function getExamsByAjax($sessionId)
    {
        $exams = Exam::select(['id', 'name'])->where('session_id', $sessionId)->where('deleted_status', NULL)->where('status', 1)->get();
        return response()->json($exams); 
    }

    public function search(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        $examAttendances = ExamAttendance::with(['class', 'section', 'student'])
        ->where('class_id', $request->class_id)
        ->where('section_id', $request->section_id)
        ->where('subject_id', $request->subject_id)
        ->where('exam_id', $request->exam_id)
        ->where('date', $request->date)
        ->where('month', date('F'))
        ->where('year', date('Y'))
        ->get();

        return view('admin.attendance.exam_attendance_modify.ajax_view.all_exam_attendances', compact('examAttendances'));
    }

    public function modify(Request $request)
    {
        if ($request->attendance_ids == NULL) {
            return \response()->json(['errorMsg' => 'You did not check any student\'s attendance status.']);
        }
        $notes = $request->notes;
        foreach ($request->attendance_ids as $attendance_id => $attendance_status) {

            $modifyExamAttendance = ExamAttendance::where('id', $attendance_id)->first();
            $modifyExamAttendance->attendance_status = $attendance_status;
            $modifyExamAttendance->note = $notes[$attendance_id] ? $notes[$attendance_id] : NULL;
            $modifyExamAttendance->save();
        
        }
        return \response()->json(['successMsg' => 'Attendance is modified successfully.']);
    }
}



