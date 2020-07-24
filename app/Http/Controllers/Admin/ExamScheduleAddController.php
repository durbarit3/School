<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Classes;
use App\Session;
use App\ExamHall;
use App\ClassSection;
use App\ClassSubject;
use App\ExamSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ExamScheduleAddController extends Controller
{
    public function createSection()
    {
        $currentSession = Session::where('is_current_session', 1)->first();
        $exams = Exam::select(['id', 'name'])->where('session_id', $currentSession->id)
        ->where('deleted_status', NULL)
        ->where('status', 1)
        ->get();

        $classes = Cache::rememberForever('all-classes', function(){
            return $classes = Classes::where('status', 1)->where('deleted_status', NULL)->get();
        });
        return view('admin.exam_master.schedule.create_schedule.create', compact('classes', 'exams'));
    }

    // Ajax Methods
    public function getSectionsByClassIdByAjax($classId)
    {
        $classSection = ClassSection::with('section')
            ->where('class_id', $classId)
            ->select(['id', 'section_id'])
            ->get();
        return response()->json($classSection);
    }

    public function search(Request $request)
    {
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $exam = Exam::where('id', $request->exam_id)
        ->select('id', 'name', 'session_id', 'distributions')
        ->first();

        $classSection = ClassSection::select(['id'])
        ->where('class_id', $class_id)
        ->where('section_id', $section_id)
        ->first();

        $subjects = ClassSubject::with(['subject'])->where('class_section_id', $classSection->id)->get();

        $halls = ExamHall::select(['id', 'hall_no'])->get();
        
        return view('admin.exam_master.schedule.create_schedule.ajax_view.ajax_subjects_list_view', 
        compact('exam', 'class_id', 'section_id', 'subjects', 'halls'));
    }

    public function store(Request $request)
    {
        $checkPreviousSchedules = ExamSchedule::where('class_id', $request->class_id)
        ->where('section_id', $request->section_id)
        ->where('exam_id', $request->exam_id)->get();
        if ($checkPreviousSchedules) {
            foreach ($checkPreviousSchedules as $checkPreviousSchedule) {
                $checkPreviousSchedule->delete();
            }
        }

        $dates = $request->dates;
        $starting_times = $request->starting_times;
        $ending_times = $request->ending_times;
        $exam_halls = $request->hall_ids;
        $index = 0;
        $exam = Exam::where('id', $request->exam_id)->select(['distributions'])->first();
        foreach ($request->subject_ids as $subject_id) {
            $addExamSchedule = new ExamSchedule();
            $addExamSchedule->date = $dates[$index];
            $addExamSchedule->year = date('Y');
            $addExamSchedule->starting_time = $starting_times[$index];
            $addExamSchedule->ending_time = $ending_times[$index];
            $addExamSchedule->class_id = $request->class_id;
            $addExamSchedule->section_id = $request->section_id;
            $addExamSchedule->exam_hall_id = $exam_halls[$index];
            $addExamSchedule->subject_id = $subject_id;
            $addExamSchedule->exam_id = $request->exam_id;
            $addExamSchedule->session_id = $request->session_id;
            
            $distributions = [];
            foreach (json_decode($exam->distributions) as $distribution) {
                
                if (isset($request[$distribution])) {
                    $reqDist = $request[$distribution];
                    $singleDist = [
                        $distribution => [   
                            'fullMarks' => $reqDist[$subject_id]['full_marks'],
                            'passMarks' => $reqDist[$subject_id]['pass_marks'] 
                        ]
                    ];
                    array_push($distributions, $singleDist);
                }   
            }
            $addExamSchedule->distributions = json_encode($distributions); 
            $addExamSchedule->save();
            $distributions = []; 
            $index++;
        }
        return response()->json('Exam schedule has been created or modified successfully.)');
        
    }

}
