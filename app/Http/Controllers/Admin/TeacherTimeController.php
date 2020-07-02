<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\ClassTimetable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherTimeController extends Controller
{
    public function index()
    {
        $teachers = Admin::where('role', 3)->select(['id', 'adminname'])->get();
        return view('admin.academic.teacher_timetable.index', compact('teachers'));
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'teacher_id' => 'required'
        ]);
        $mondayTimeLists = ClassTimetable::with(['subject', 'class'])
            ->where('teacher_id', $request->teacher_id)
            ->where('day', 'monday')
            ->get();
        $tuesdayTimeLists = ClassTimetable::with(['subject', 'class'])
        ->where('teacher_id', $request->teacher_id)
            ->where('day', 'Tuesday')
            ->get();
        $wednesdayTimeLists = ClassTimetable::with(['subject', 'class'])
        ->where('teacher_id', $request->teacher_id)
            ->where('day', 'Wednesday')
            ->get();

        $thursdayTimeLists = ClassTimetable::with(['subject', 'class'])
        ->where('teacher_id', $request->teacher_id)
            ->where('day', 'Thursday')
            ->get();

        $fridayTimeLists = ClassTimetable::with(['subject', 'class'])
        ->where('teacher_id', $request->teacher_id)
            ->where('day', 'Friday')
            ->get();

       

        $saturdayTimeLists = ClassTimetable::with(['subject', 'class'])
        ->where('teacher_id', $request->teacher_id)
            ->where('day', 'Saturday')
            ->get();

        $sundayTimeLists = ClassTimetable::with(['subject', 'class'])
        ->where('teacher_id', $request->teacher_id)
            ->where('day', 'Sunday')
            ->get();

        return view('admin.academic.teacher_timetable.ajax_view.time_table_list', compact('sundayTimeLists', 'saturdayTimeLists', 'fridayTimeLists', 'thursdayTimeLists', 'wednesdayTimeLists', 'tuesdayTimeLists', 'mondayTimeLists'));
    }
}
