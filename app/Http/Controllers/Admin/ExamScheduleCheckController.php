<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Classes;
use App\Section;
use App\Session;
use Carbon\Carbon;
use App\ClassSection;
use App\ExamSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ExamScheduleCheckController extends Controller
{
    public function index()
    {
        $classes = Cache::rememberForever('all-classes', function(){
            return $classes = Classes::where('status', 1)->where('deleted_status', NULL)->get();
        });
        $sessions = Session::where('deleted_status', NULL)->where('status', 1)->orderBy('id', 'desc')->get(['id', 'session_year']);
        return view('admin.exam_master.schedule.check_schedule.index', compact('classes', 'sessions'));
    }

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
        $exams = ExamSchedule::select(['exam_id'])->where('class_id', $request->class_id)->where('section_id', $request->section_id)->where('session_id', $request->session_id)
        ->where('deleted_status', NULL)
        ->distinct()
        ->get();
        $className = Classes::select(['name'])->where('id', $request->class_id)->first()->name;
        $sectionName = Section::select(['name'])->where('id', $request->section_id)->first()->name;
        return view('admin.exam_master.schedule.check_schedule.ajax_view.modal_ajax_view', compact('exams', 'className', 'sectionName', 'class_id', 'section_id'));
    }

    public function details($classId, $sectionId, $examId)
    {
        $className = Classes::select(['name'])->where('id', $classId)->first()->name;
        $sectionName = Section::select(['name'])->where('id', $sectionId)->first()->name;
        $examName = Exam::where('id', $examId)->select(['name'])->first()->name;
        $examScheduleDetails = ExamSchedule::with([ 'examHall', 'subject'])->where('class_id', $classId)
        ->where('section_id', $sectionId)->where('exam_id', $examId)
        ->where('deleted_status', NULL)
        ->select(['date', 'starting_time', 'ending_time', 'exam_hall_id', 'subject_id'])
        ->get();

        return view('admin.exam_master.schedule.check_schedule.ajax_view.details_ajax_view', 
        compact('examScheduleDetails', 'className', 'sectionName', 'examName'));
    }

    public function delete($classId, $sectionId, $examId)
    {
        
        $examSchedules = ExamSchedule::where('class_id', $classId)
        ->where('section_id', $sectionId)
        ->where('exam_id', $examId)
        ->where('deleted_status', NULL)
        ->get();
        foreach ($examSchedules as $examSchedule) {
            $examSchedule->deleted_status = 1;
            $examSchedule->deleted_by =  json_encode([
                                            'id'=>Auth::user()->id,
                                            'guard'=>Auth::getDefaultDriver(),
                                        ]);
            $examSchedule->deleted_at = Carbon::now();
            $examSchedule->save();
          
        }

        $className = Classes::select(['name'])->where('id', $classId)->first()->name;
        $sectionName = Section::select(['name'])->where('id', $sectionId)->first()->name;
        $examName = Exam::where('id', $examId)->select(['name'])->first()->name;
        return response()->json("Class".$className."\'s section".$sectionName."'s".$examName."'s Schedule has been deleted successfully.");
    }
}
