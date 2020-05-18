<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Classes;
use App\ClassSection;
use App\ClassSubject;
use App\StudentAdmission;
use App\AdmitCardTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamAdmitCardGenerateController extends Controller
{
    public function index()
    {
        $templates = AdmitCardTemplate::select(['id', 'template_name'])->where('status', 1)->get();
        $classes = Classes::where('status', 1)->where('deleted_status', NULL)->select(['id', 'name'])->get();
        $exams = Exam::where('status', 1)->where('deleted_status', NULL)->select(['id', 'name'])->get();
        return view('admin.exam_master.admit_card.print_admit_card.index', compact('classes', 'exams', 'templates'));
    }

    // Ajax Methods 
    
    public function getSectionByClass($classId)
    {
        $classSection = ClassSection::with('section')
        ->where('class_id', $classId)
        ->select(['id', 'section_id'])
        ->get();
        return response()->json($classSection);
    }

    public function searchStudent(Request $request)
    {
        $exam_id = $request->exam_id;
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $template_id = $request->template_id;

        $students = StudentAdmission::with(['Category', 'Gender'])
        ->select(['id', 'admission_no', 'roll_no', 'first_name', 'last_name', 'gender', 'category', 'student_mobile'])
        ->where('class', $class_id)
        ->where('section', $section_id)
        ->get();

        return view('admin.exam_master.admit_card.print_admit_card.ajax_view.student_list', compact('students', 'exam_id', 'class_id', 'section_id', 'template_id'));
    }

    public function printAction(Request $request)
    {
        $template = AdmitCardTemplate::where('id', $request->template_id)->first();
        $exam = Exam::select('name')->where('id', $request->exam_id)->first();
        $classSectionId = ClassSection::where('class_id', $request->class_id)
        ->where('section_id', $request->section_id)->first();
        $student_ids = $request->student_ids;
        $subjects = ClassSubject::with('subject')->where('class_section_id', $classSectionId->id)->get();

        return view('admin.exam_master.admit_card.print_admit_card.ajax_view.print_admit_card_template', 
        compact('template', 'exam', 'classSectionId', 'student_ids', 'subjects'));
    }
}
