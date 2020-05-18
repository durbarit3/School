<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Classes;
use App\MarkEntires;
use App\ClassSection;
use App\ClassSubject;
use App\ExamSchedule;
use App\StudentAdmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarkEntireController extends Controller
{

    public function index()
    {
        $classes = Classes::select(['id', 'name'])->where('deleted_status', NULL)->where('status', 1)->get();
        $exams = Exam::select(['id', 'name'])->where('deleted_status', NULL)->where('status', 1)->get();
        return view('admin.exam_master.mark.mark_entires.index', compact('classes', 'exams'));
    }

    //Ajax Methods 
    public function getSectionsByAjax($classId)
    {
        $classSection = ClassSection::with('section')
            ->where('class_id', $classId)
            ->select(['id', 'section_id'])
            ->get();
        return response()->json($classSection);
    }

    public function getSubjectsByAjax($classId, $sectionId)
    {
        $classSection = ClassSection::where('class_id', $classId)->where('section_id',$sectionId)
        ->select('id')
        ->first();
        $classSubjects = ClassSubject::with('subject')
        ->where('class_section_id', $classSection->id)
        ->get();
        return response()->json($classSubjects);
    }

    public function search(Request $request)
    {
       // return $request->all();
        $class_id = $request->class_id;
        $section_id = $request->section_id;
        $subject_id = $request->subject_id;
        $exam_id = $request->exam_id;
        $students = StudentAdmission::with(['Class', 'Section'])->where('class', $class_id)
        ->where('section', $section_id)
        ->get();
        $examDistributions = Exam::where('id', $exam_id)
        ->first();
        $checkExamSchedule = ExamSchedule::where('exam_id', $exam_id)
        ->where('class_id', $class_id)
        ->where('section_id', $section_id)
        ->where('subject_id', $subject_id)->first();
       
        return view('admin.exam_master.mark.mark_entires.ajax_view.ajax_students_list', 
            compact('class_id', 'section_id', 'subject_id', 'exam_id', 'students', 'examDistributions', 'checkExamSchedule')
        );
    }

    public function store(Request $request)
    {
        //return $request->all();
        $previousMarkEntires = MarkEntires::where('class_id', $request->class_id)
                ->where('section_id', $request->section_id)
                ->where('subject_id', $request->subject_id)
                ->where('exam_id', $request->exam_id)
                ->get();
        if ($previousMarkEntires) {
            foreach ($previousMarkEntires as $previousMarkEntire) {
                $previousMarkEntire->delete();
            }
        }  
        $examDistributions = Exam::where('id', $request->exam_id)->select(['distributions'])->first();
        foreach ($request->student_ids as $student_id) {

            $addMarkEntires = new MarkEntires();
            $addMarkEntires->exam_id = $request->exam_id;
            $addMarkEntires->student_id = $student_id;
            $addMarkEntires->class_id = $request->class_id;
            $addMarkEntires->section_id = $request->section_id;
            $addMarkEntires->subject_id = $request->subject_id;
            $markDistributions = array();
            foreach (json_decode($examDistributions->distributions) as $examDistribution) {
                if (isset($request[$examDistribution])) {
                    $reqDist = $request[$examDistribution];
                    if (isset($request->is_absents)) {

                        if (array_key_exists($student_id, $request->is_absents)) {

                            $addMarkEntires->is_absent = 1;
                            $setMarkDist = [
                                $examDistribution => 0,
                            ];
                            array_push($markDistributions, $setMarkDist);
                        }else {
                        
                            
                            $setMarkDist = [
                                $examDistribution => $reqDist[$student_id],
                            ];
                            array_push($markDistributions, $setMarkDist);    

                        }
                    }else {
                        
                        $reqDist = $request[$examDistribution];
                        $setMarkDist = [
                            $examDistribution => $reqDist[$student_id],
                        ];
                        array_push($markDistributions, $setMarkDist);
                       
                    }

                }else {
                    $setMarkDist = [
                        $examDistribution => 'N/A',
                    ];
                    array_push($markDistributions, $setMarkDist);
                }
               
            }

            if (count($markDistributions) != null) {
                $addMarkEntires->mark_distributions = json_encode($markDistributions, true);
            }
           
            $addMarkEntires->save();
            $markDistributions = array();
           
        }

        return response()->json('Exam Marks has been added or modified successfully.)');
    }
}
