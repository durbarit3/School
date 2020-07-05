<?php

namespace App\Http\Controllers\Admin;

use App\Gender;
use App\Classes;
use App\Session;
use App\Category;
use Carbon\Carbon;
use App\ClassSection;
use App\ClassSubject;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentReportController extends Controller
{
    public function index()
    {
        $classes = Classes::select(['id', 'name'])->where('deleted_status', NULL)->where('status', 1)->get();
        $sessions = Session::where('deleted_status', NULL)->where('status', 1)->orderBy('id', 'desc')->get(['id', 'session_year']);

        $categories = Category::select(['id', 'name'])
            ->where('deleted_status', NULL)
            ->where('status', 1)
            ->get();
        $genders = Gender::select(['id', 'name'])->get();
        return view('admin.report.student_report.index', compact('sessions','classes', 'categories', 'genders'));
    }

    public function studentReport(Request $request)
    {
        $this->validate($request,[
            'session_id' => 'required'
        ]);
        
        if (!$request->session_id AND !$request->class_id AND !$request->section_id AND !$request->category_id AND !$request->gender_id) {
            return response()->json(['error' => 'You did not select any field']);
        }

        $student_reports = '';
        if ($request->session_id AND $request->class_id AND $request->section_id AND $request->category_id AND $request->gender_id) {
            $student_reports = StudentAdmission::with('Category', 'Gender')->where('class', $request->class_id)
            ->where('section', $request->section_id)
            ->where('category', $request->category_id)
            ->where('gender', $request->gender_id)
            ->where('session_id', $request->session_id)
            ->get();

        }elseif ($request->session_id AND $request->class_id AND $request->section_id AND $request->category_id) {
            $student_reports = StudentAdmission::with(['Category', 'Gender'])->where('class', $request->class_id)
            ->where('section', $request->section_id)
            ->where('category', $request->category_id)
            ->where('session_id', $request->session_id)
            ->get();

        } elseif ($request->session_id AND $request->class_id AND $request->category_id AND $request->gender_id) {
            $student_reports = StudentAdmission::with(['Category', 'Gender'])->where('class', $request->class_id)
            ->where('category', $request->category_id)
            ->where('gender', $request->gender_id)
            ->where('session_id', $request->session_id)
            ->get();
       
        }elseif ($request->session_id AND $request->class_id AND $request->gender_id) {
            $student_reports = StudentAdmission::with(['Category', 'Gender'])->where('class', $request->class_id)
            ->where('gender', $request->gender_id)
            ->where('session_id', $request->session_id)
            ->get();
       
        }elseif ($request->session_id AND $request->class_id AND $request->section_id) {
            $student_reports = StudentAdmission::with(['Category', 'Gender'])->where('class', $request->class_id)
            ->where('section', $request->section_id)
            ->where('session_id', $request->session_id)
            ->get();
        }elseif ($request->session_id AND $request->class_id) {
            $student_reports = StudentAdmission::with(['Category', 'Gender'])->where('class', $request->class_id)
            ->where('session_id', $request->session_id)
            ->get();
        }elseif ($request->session_id AND $request->category_id) {
            $student_reports = StudentAdmission::with(['Category', 'Gender'])->where('category', $request->category_id)
            ->where('session_id', $request->session_id)
            ->get();
        }elseif ($request->session_id AND $request->gender_id) {
            $student_reports = StudentAdmission::with(['Category', 'Gender'])->where('gender', $request->gender_id)
            ->where('session_id', $request->session_id)
            ->get();
        }elseif ($request->session_id) {
            $student_reports = StudentAdmission::with(['Category', 'Gender'])->where('session_id', $request->session_id)
            ->get();
        }

        return view('admin.report.student_report.ajax_view.student_report', compact('student_reports'));
    }

    public function studentGuardianReport(Request $request)
    {

        $this->validate($request,[
            'session_id' => 'required'
        ]);

        if ($request->section_id) {
            if (!$request->class_id) {
                return response()->json(['error' => 'You have selected section but class field is empty.']);
            }
        }

        $guardian_reports = '';
        if ($request->session_id AND $request->class_id AND $request->section_id) {
            $guardian_reports = StudentAdmission::where('class', $request->class_id)
            ->where('section', $request->section_id)
            ->where('session_id', $request->session_id)
            ->get();
        }elseif ($request->session_id AND $request->class_id) {
            $guardian_reports = StudentAdmission::where('class', $request->class_id)
            ->where('session_id', $request->session_id)
            ->get();
        }elseif ($request->session_id ) {
            $guardian_reports = StudentAdmission::where('session_id', $request->session_id)
            ->get();
        }

        return view('admin.report.student_report.ajax_view.guardian_report', compact('guardian_reports'));
    }

    public function studentAdmissionReport(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        
        if (!$request->select_type) {
            return response()->json(['error' => 'You did not select any type']); 
        }
        $admission_reports = '';
        if ($request->select_type === 'today') {
            $admission_reports = StudentAdmission::with(['Class', 'Section', 'Gender', 'Category'])->whereDate('created_at', Carbon::today())
            ->get();
        }elseif($request->select_type === 'this_week') {
            $admission_reports = StudentAdmission::with(['Class', 'Section', 'Gender', 'Category'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
        }elseif($request->select_type === 'last_week') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight",$previous_week);
            $end_week = strtotime("next saturday",$start_week);
            $start_week = date("Y-m-d",$start_week);
            $end_week = date("Y-m-d",$end_week);
            $admission_reports = StudentAdmission::with(['Class', 'Section', 'Gender', 'Category'])->whereBetween('created_at', [$start_week, $end_week])
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'this_month') {
           
            $admission_reports = StudentAdmission::with(['Class', 'Section', 'Gender', 'Category'])->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_month') {
            $lastMonth = date('m', strtotime('-1 month'));
            $admission_reports = StudentAdmission::with(['Class', 'Section', 'Gender', 'Category'])->whereMonth('created_at', $lastMonth)->get();
        }elseif($request->select_type === 'last_six_month') {
            $lastSixMonth = date('m', strtotime('-6 month'));
            $admission_reports = StudentAdmission::with(['Class', 'Section', 'Gender', 'Category'])->whereMonth('created_at', $lastSixMonth)->get();
        }elseif($request->select_type === 'this_year') {
            $admission_reports = StudentAdmission::with(['Class', 'Section', 'Gender', 'Category'])->whereYear('created_at', date('Y'))->get();
        }elseif($request->select_type === 'last_year') {
            $lastYear = date('Y', strtotime('-1 year'));
            $admission_reports = StudentAdmission::with(['Class', 'Section', 'Gender', 'Category'])->whereYear('created_at', $lastYear)->get();
        }elseif($request->select_type === 'period') {
            
            if (!$request->date_from AND !$request->date_to) {
                return response()->json(['error' => 'Please select the period fields']); 
            }

            $dateFromFormat = date('Y-m-d', strtotime($request->date_from));
            $dateToFormat = date('Y-m-d', strtotime($request->date_to));
            $admission_reports = StudentAdmission::with(['Class', 'Section', 'Gender', 'Category'])->whereBetween('created_at', [$dateFromFormat, $dateToFormat])->get();

        }

        return view('admin.report.student_report.ajax_view.admission_report', compact('admission_reports'));
        
    }

    public function studentClassSubjectReport(Request $request)
    {
        $classSectionId = ClassSection::where('class_id', $request->class_id)->where('section_id', $request->section_id)->first();

        $classSubjects = ClassSubject::with(['subject'])->where('class_section_id', $classSectionId->id)->get();

        return view('admin.report.student_report.ajax_view.class_subject_report', compact('classSubjects'));

    }
}
