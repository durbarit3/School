<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\ExamTerm;
use App\ExamType;
use App\ExamDistribution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index()
    {
        $types = ExamType::select(['name'])->get();
        $distributions = ExamDistribution::select(['name'])
            ->where('status', 1)
            ->where('deleted_status', NULL)
            ->get();
        $terms = ExamTerm::select(['id','name'])
            ->where('status', 1)
            ->where('deleted_status', NULL)
            ->get();   
        $exams = Exam::with('term')
            ->select(['id', 'name', 'type', 'exam_term_id', 'distributions', 'status', 'starting_date', 'ending_date'])
            ->where('deleted_status', NULL)
            ->where('year', date('Y'))
            ->get();
        return view('admin.exam_master.exam.exam_setup.index', compact('types', 'distributions', 'exams', 'terms'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:exams,name',
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'distributions' => 'required|array',
        ]);

        $addExam = new Exam();
        $addExam->name = $request->name;
        $addExam->type = $request->type;
        $addExam->year = date('Y');
        $addExam->starting_date = $request->start_date;
        $addExam->ending_date = $request->end_date;
        $addExam->exam_term_id = $request->term_id;
        $addExam->distributions = json_encode($request->distributions);
        $addExam->save();

        $notification = array(
            'messege' => 'Exam created successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request, $examId)
    {
        $this->validate($request, [
            'name' => 'required|unique:exams,name,'.$examId,
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'distributions' => 'required|array',
        ]);

        $updateExam = Exam::where('id', $examId)->first();
        $updateExam->name = $request->name;
        $updateExam->type = $request->type;
        $updateExam->exam_term_id = $request->term_id;
        $updateExam->year = date('Y');
        $updateExam->starting_date = $request->start_date;
        $updateExam->ending_date = $request->end_date;
        $updateExam->exam_term_id = $request->term_id;
        $updateExam->distributions = json_encode($request->distributions);
        $updateExam->save();

        $notification = array(
            'messege' => 'Exam updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($examId)
    {
        $statusChange = Exam::where('id', $examId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Exam is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Exam is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($examId)
    {
        Exam::where('id', $examId)->singleDelete();
        $notification = array(
            'messege' => 'Exam is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // Ajax method

    public function getExamByAjax($examId)
    {
        $exam =  Exam::where('id', $examId)
        ->select(['id', 'name', 'type', 'exam_term_id', 'distributions', 'status', 'starting_date', 'ending_date'])->first();
        $types = ExamType::select(['name'])->get();
        $distributions = ExamDistribution::select(['name'])
            ->where('status', 1)
            ->where('deleted_status', NULL)
            ->get();
        $terms = ExamTerm::select(['id','name'])
            ->where('status', 1)
            ->where('deleted_status', NULL)
            ->get(); 

        return view('admin.exam_master.exam.exam_setup.ajax_view.ajax_modal_view', compact('exam', 'types', 'distributions', 'terms'));
    }
}


