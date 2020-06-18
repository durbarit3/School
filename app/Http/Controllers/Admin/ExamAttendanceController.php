<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Classes;
use App\Session;
use App\ClassSection;
use App\ClassSubject;
use App\ExamAttendance;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamAttendanceController extends Controller
{
    public function index()
    {
        $classes = Classes::select(['id', 'name'])->get();
        $sessions = Session::where('deleted_status', NULL)->where('status', 1)->orderBy('id', 'desc')->get(['id', 'session_year']);

        return view('admin.attendance.exam_attendance.index', compact('classes', 'sessions'));
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
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $session_id = $request->session_id;
        $subject_id = $request->subject_id;
        $exam_id = $request->exam_id;
        date_default_timezone_set('Asia/Dhaka');
        $checkExistsAttendance = ExamAttendance::where('class_id', $request->class_id)
        ->where('section_id', $request->section_id)
        ->where('subject_id', $request->subject_id)
        ->where('date', date('d-m-Y'))
        ->where('month', date('F'))
        ->where('year', date('Y'))
        ->first();

        $students = StudentAdmission::with(['Class', 'Section'])
        ->select(['id','roll_no', 'first_name', 'last_name', 'class', 'section', 'student_photo', 'last_attend'])
        ->where('class', $class_id)
        ->where('section', $section_id)
        ->where('session_id', $session_id)
        ->get();

        return view('admin.attendance.exam_attendance.ajax_view.search_student_view', compact('checkExistsAttendance', 'students', 'class_id', 'section_id', 'subject_id', 'exam_id'));
    }

    public function store(Request $request)
    {
        if ($request->student_ids == NULL) {
            return \response()->json(['errorMsg' => 'You did not check any student\'s attendance status.']);
        }
        date_default_timezone_set('Asia/Dhaka');
        $notes = $request->notes;
        $index = 0;
        foreach ($request->student_ids as $student_id => $attendance_status) {

            $addExamAttendance = new ExamAttendance();
            $addExamAttendance->exam_id = $request->exam_id;
            $addExamAttendance->class_id = $request->class_id;
            $addExamAttendance->section_id = $request->section_id;
            $addExamAttendance->subject_id = $request->subject_id;
            $addExamAttendance->student_id = $student_id;
            $addExamAttendance->month = date('F');
            $addExamAttendance->year = date('Y');
            $addExamAttendance->date = date('d-m-Y');
            $addExamAttendance->attendance_status = $attendance_status;
            $addExamAttendance->note = $notes[$index] ? $notes[$index] : NULL;
            $addExamAttendance->save();
            $index++;
        }

        return \response()->json(['successMsg' => 'Attendance is taken successfully. Now you can edit.']);
    }
}
