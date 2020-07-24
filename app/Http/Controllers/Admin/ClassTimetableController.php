<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ClassSection;
use App\ClassTimetable;
use App\ClassSubject;
use App\Classes;
use App\Admin;

use Illuminate\Http\Request;

class ClassTimetableController extends Controller
{
    public function search(Request $request)
    {
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $mondayTimeLists = ClassTimetable::with(['subject'])
            ->where('class_id', $class_id)
            ->where('section_id', $section_id)
            ->where('day', 'monday')
            ->get();
        $tuesdayTimeLists = ClassTimetable::with(['subject'])
            ->where('class_id', $class_id)
            ->where('section_id', $section_id)
            ->where('day', 'Tuesday')
            ->get();
        $wednesdayTimeLists = ClassTimetable::with(['subject'])
            ->where('class_id', $class_id)
            ->where('section_id', $section_id)
            ->where('day', 'Wednesday')
            ->get();

        $thursdayTimeLists = ClassTimetable::with(['subject'])
            ->where('class_id', $class_id)
            ->where('section_id', $section_id)
            ->where('day', 'Thursday')
            ->get();

        $fridayTimeLists = ClassTimetable::with(['subject'])
            ->where('class_id', $class_id)
            ->where('section_id', $section_id)
            ->where('day', 'Friday')
            ->get();

       

        $saturdayTimeLists = ClassTimetable::with(['subject'])
            ->where('class_id', $class_id)
            ->where('section_id', $section_id)
            ->where('day', 'Saturday')
            ->get();

        $sundayTimeLists = ClassTimetable::with(['subject'])
            ->where('class_id', $class_id)
            ->where('section_id', $section_id)
            ->where('day', 'Sunday')
            ->get();

        $classes = Classes::where('status', 1)->where('deleted_status', NULL)->get();
        return view('admin.academic.class_timetable.index', compact('classes', 'class_id', 'section_id','sundayTimeLists', 'saturdayTimeLists', 'fridayTimeLists', 'thursdayTimeLists', 'wednesdayTimeLists', 'tuesdayTimeLists', 'mondayTimeLists'));
    }

    public function getTimetableListByAjax($classId, $sectionId, $day)
    {
        $day = $day ? $day : 'Monday';
        $timetableLists = ClassTimetable::where('class_id', $classId)->where('section_id', $sectionId)->where('day', $day)->get();
        $classSectionId = ClassSection::where('class_id', $classId)->where('section_id', $sectionId)->select(['id'])->first();
        $classSubjects = ClassSubject::where('class_section_id', $classSectionId->id)->get();
        $teachers = Admin::where('role', 3)->select(['id', 'adminname'])->get();
        return view('admin.academic.class_timetable.ajax_view.timetable_lists', compact('timetableLists', 'classSubjects', 'teachers'));
    }

    public function getTimetableMoreListByAjax($classId, $sectionId)
    {
        $classSectionId = ClassSection::where('class_id', $classId)->where('section_id', $sectionId)->select(['id'])->first();
        $classSubjects = ClassSubject::where('class_section_id', $classSectionId->id)->get();
        $teachers = Admin::where('role', 3)->select(['id', 'adminname'])->get();
        return view('admin.academic.class_timetable.ajax_view.more_timetable_list', compact('classSubjects', 'teachers'));
    }

    public function create(Request $request)
    {
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $classes = Classes::where('status', 1)->where('deleted_status', NULL)->get();
        return view('admin.academic.class_timetable.create', compact('classes', 'class_id', 'section_id'));
    }

    public function store(Request $request)
    {
       $day = $request->day ? $request->day : 'Monday'; 
       $subjectIds = $request->subject_ids;
       $teacherIds = $request->teacher_ids;
       $startTimes = $request->start_times;
       $endTimes = $request->end_times;
       $roomNumbers = $request->room_numbers;
       $classTimetables = ClassTimetable::where('class_id', $request->class_id)->where('section_id', $request->section_id)->where('day', $day)->get();
       if ($classTimetables) {
           foreach ($classTimetables as $classTimetable) {
            $classTimetable->delete();
           }
       }

       $index = 0;
       foreach ($subjectIds as $subjectId) {
            $addClassTimetables = new ClassTimetable();
            $addClassTimetables->class_id = $request->class_id;
            $addClassTimetables->section_id = $request->section_id;
            $addClassTimetables->subject_id = $subjectId;
            $addClassTimetables->teacher_id = $teacherIds[$index];
            $addClassTimetables->start_time = $startTimes[$index];
            $addClassTimetables->end_time = $endTimes[$index];
            $addClassTimetables->room_no = $roomNumbers[$index];
            $addClassTimetables->day = $day;
            $addClassTimetables->save();
            $index++;
       }

       return response()->json('Successfully class timetable has been set of '.$day);

    }

    public function singleTimetableListDelete($timetableId)
    {
        ClassTimetable::where('id', $timetableId)->delete();
        return response()->json('Data has been deleted successfully');
    }

    
}
