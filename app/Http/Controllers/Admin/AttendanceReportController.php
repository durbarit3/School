<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Role;
use App\Admin;
use App\Classes;
use App\Session;
use App\ClassSection;
use App\ClassSubject;
use App\ExamAttendance;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceReportController extends Controller
{
    public function index()
    {
        $classes = Classes::where('deleted_status', NULL)->where('status', 1)->get(['id', 'name']);
        $exams = Exam::select(['id', 'name'])->where('deleted_status', NULL)->where('status',1)->get();
        $roles = Role::all();
        $sessions = Session::where('status', 1)->get();
        return view('admin.report.attendance_report.index', compact('classes', 'exams', 'sessions', 'roles'));
    }

    public function studentAttendanceReport(Request $request)
    {
        $this->validate($request, [

        ]);
        $yearMonth = $request->year_month;
        $splitYearMonth = explode('-', $yearMonth);

        $requestYear = $splitYearMonth[0];
        $requestMonth = $splitYearMonth[1];
       
        $monthLists = [
            'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8, 'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
        ];

        $monthDates = array();

            $month = $monthLists[$requestMonth];
            $year = $requestYear;

            for($d=1; $d<=31; $d++)
            {
                $time = mktime(12, 0, 0, $month, $d, $year);          
                if (date('m', $time) == $month)       
                $monthDates[] = date('d-D', $time);
            }
        
        $students = StudentAdmission::where('class', $request->class_id)->where('section', $request->section_id)->where('session_id', $request->session_id)->get();
       
        return view('admin.report.attendance_report.ajax_view.student_attendance_report', compact('students', 'monthDates', 'requestMonth', 'requestYear'));
    }

    public function employeeAttendanceReport(Request $request)
    {
        $this->validate($request, [

        ]);

        $yearMonth = $request->year_month;
        $splitYearMonth = explode('-', $yearMonth);

        $requestYear = $splitYearMonth[0];
        $requestMonth = $splitYearMonth[1];
       
        $monthLists = [
            'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4, 'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8, 'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
        ];

        $monthDates = array();

        $month = $monthLists[$requestMonth];
        $year = $requestYear;

        for($d=1; $d<=31; $d++)
        {
            $time = mktime(12, 0, 0, $month, $d, $year);          
            if (date('m', $time) == $month)       
            $monthDates[] = date('d-D', $time);
        }
        
        $employees = Admin::where('role', $request->role_known_id)->get();
       
        return view('admin.report.attendance_report.ajax_view.employee_attendance_report', compact('employees', 'monthDates', 'requestMonth', 'requestYear'));
    }

    public function examAttendanceReport(Request $request)
    {
        $examAttendances = ExamAttendance::with(['student', 'subject'])->where('exam_id', $request->exam_id)
        ->where('class_id', $request->class_id)
        ->where('section_id', $request->section_id)
        ->where('subject_id', $request->subject_id)
        ->get();
        return view('admin.report.attendance_report.ajax_view.exam_attendance_report', compact('examAttendances'));                    
    }

    public function getSection($classId)
    {
        $classSection = ClassSection::with('section')
        ->where('class_id', $classId)
        ->select(['id', 'section_id'])
        ->get();
        
        return response()->json($classSection);
    }
    
    public function getExamByYear($year)
    {
        $exams = Exam::where('deleted_status', NULL)->where('status', 1)->where('year', $year)->get(['id', 'name']);
        return response()->json($exams);
    }

    public function getSubjects($classId, $sectionId)
    {
        
        $classSection = ClassSection::where('class_id', $classId)
        ->where('section_id', $sectionId)
        ->select(['id'])
        ->first();

        $classSubjects = ClassSubject::with(['subject'])->where('class_section_id', $classSection->id)->get();

        return response()->json($classSubjects);
    }

    public function getExamsBySessionId($sessionId)
    {
        $exams = Exam::where('session_id', $sessionId)->get();
        return response()->json($exams);
    }
}
