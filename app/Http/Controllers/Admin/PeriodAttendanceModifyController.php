<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\ClassSection;
use App\ClassSubject;
use App\PeriodAttendance;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeriodAttendanceModifyController extends Controller
{
    public function search(Request $request)
    {
        if (isset($request->class_id)) {
            $this->validate($request, [
                'class_id' => 'required',
                'section_id' => 'required',
                'subject_id' => 'required',
                'date' => 'required',
            ]);
        }
        date_default_timezone_set('Asia/Dhaka');
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $subject_id = $request->subject_id;
        $date = $request->date;
        $class_section_id = '';
    
        if (isset($class_id) && $section_id) {
            $classSection = ClassSection::where('class_id', $class_id)->where('section_id', $section_id)->first();
            $class_section_id = $classSection->id;
        }
        
        $classes = Classes::select(['id', 'name'])->get();
        $attendances = PeriodAttendance::with(['class','section','subject', 'student'])
        ->where('class_id', $class_id)
        ->where('section_id', $section_id)
        ->where('subject_id', $subject_id)
        ->where('date', $date)
        ->get();

        return view('admin.attendance.period_attendance.period_attendance_by_date', compact('class_id', 'section_id', 'attendances', 'classes', 'date', 'class_section_id', 'subject_id'));
    }

    public function update(Request $request)
    {
        $notes = $request->notes;
        date_default_timezone_set('Asia/Dhaka');
        foreach ($request->attendance_ids as $attendance_id => $attendance_status) {
            $updatePeriodAttendance = PeriodAttendance::where('id', $attendance_id)->first();
            $updatePeriodAttendance->attendance_status = $attendance_status;
            $updatePeriodAttendance->note = $notes[$attendance_id] ? $notes[$attendance_id] : NULL;
            $updatePeriodAttendance->save();
        }
        return \response()->json(['successMsg' => 'Successfully period attendance has been updated.']);
    }

    public function getSubjectsByClassIdAndSectionId($classId, $sectionId)
    {
        $classSection = ClassSection::where('class_id', $classId)->where('section_id',$sectionId)->select('id')->first();
        $classSubjects = ClassSubject::with('subject')->where('class_section_id', $classSection->id)->get();
        return response()->json($classSubjects);
    }
}
