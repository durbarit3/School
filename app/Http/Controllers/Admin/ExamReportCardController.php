<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Classes;
use App\Session;
use App\MarkEntires;
use App\ClassSection;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamReportCardController extends Controller
{
    public function index()
    {
        $classes = Classes::where('status', 1)->where('deleted_status', NULL)->select(['id', 'name'])->get();
        // $exams = Exam::where('status', 1)->where('deleted_status', NULL)->select(['id', 'name'])->get();
        $sessions = Session::where('deleted_status', NULL)->where('status', 1)->orderBy('id', 'desc')->get(['id', 'session_year']);
        return view('admin.exam_master.mark.report_card.index', compact('classes', 'sessions'));
    }

    // Ajax Methods
    public function getSectionsByAjax($classId)
    {
        $classSection = ClassSection::with('section')
            ->where('class_id', $classId)
            ->select(['id', 'section_id'])
            ->get();
        return response()->json($classSection);
    }

    public function getExamsByAjax($sessionId)
    {
        $exams = Exam::select(['id', 'name'])->where('session_id', $sessionId)->where('deleted_status', NULL)->where('status', 1)->get();
        return response()->json($exams);
    }

    public function search(Request $request)
    {
        $exam_id = $request->exam_id;
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $session_id = $request->session_id;

        $students = StudentAdmission::with(['Category', 'Gender'])
        ->select(['id', 'admission_no', 'roll_no', 'first_name', 'last_name', 'gender', 'category', 'student_mobile'])
        ->where('class', $class_id)
        ->where('section', $section_id)
        ->where('session_id', $session_id)
        ->get();

        return view('admin.exam_master.mark.report_card.ajax_view.ajax_students_list', compact('students', 'exam_id', 'class_id', 'section_id'));
    }

    public function reportDetails($classId, $sectionId, $examId, $studentId)
    {
        $student = StudentAdmission::with(['Category', 'Class', 'Section', 'Gender'])
        ->select(['id', 'admission_no', 'roll_no', 'first_name', 'last_name', 'gender', 'category', 'student_mobile', 'father_name', 'mother_name', 'class', 'section', 'date_of_birth'])
        ->where('id', $studentId)
        ->where('class', $classId)
        ->where('section', $sectionId)
        ->first(); 
        $examDistributions = Exam::where('id', $examId)->select('distributions')->first();
        $studentMarkEntires = MarkEntires::with('subject')
        ->select(['subject_id', 'class_id', 'section_id', 'exam_id', 'student_id', 'mark_distributions', 'is_absent'])
        ->where('exam_id', $examId)
        ->where('class_id', $classId)
        ->where('section_id', $sectionId)
        ->where('exam_id', $examId)
        ->where('student_id', $studentId)
        ->get();
        return view('admin.exam_master.mark.report_card.ajax_view.report_card_modal_view', compact('student', 'examDistributions','studentMarkEntires'));
    }

    public function multiplePrint(Request $request)
    {
        
        if($request->student_ids == null){
            
            return response()->json(['errorMsg' => 'You did not select any student.']);
            
        }
        $classId = $request->class_id;
        $sectionId = $request->section_id;
        $examId = $request->exam_id;
        $studentIds = $request->student_ids;
        $examDistributions = Exam::where('id', $examId)->select('distributions')->first();

        return view('admin.exam_master.mark.report_card.ajax_view.report_card_multiple_print', compact('examDistributions', 'classId', 'sectionId', 'examId', 'studentIds'));
    }
}
