<?php

namespace App\Http\Controllers\Admin;

use App\Hostel;
use App\Classes;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class HostelReportController extends Controller
{
    public function index()
    {
        $classes = Cache::rememberForever('all-classes', function(){
            return $classes = Classes::where('status', 1)->where('deleted_status', NULL)->get();
        });

        $hostels = Hostel::where('status', 1)->where('deleted_status', NULL)->get(['id','hostel_name']);
        return view('admin.report.hostel_report.index', compact('hostels', 'classes'));
    }

    public function getHostelReport(Request $request)
    {
        $students = '';
        $query = StudentAdmission::with(['Class', 'Section', 'hostel', 'hostelRoom', 'hostelRoom.room', 'Gender'])
        ->where('class', $request->class_id)
        ->where('section', $request->section_id)
        ->where('hostel_id','!=', 'NULL');
        if ($request->hostel_id) {
            $query->where('hostel_id', $request->hostel_id);
        }
        $students = $query->get();
        return view('admin.report.hostel_report.ajax_view.hostel_report', compact('students'));
    }
}
