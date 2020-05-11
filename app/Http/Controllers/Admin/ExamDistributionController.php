<?php

namespace App\Http\Controllers\Admin;

use App\ExamDistribution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamDistributionController extends Controller
{
    public function index()
    {
        $distributions= ExamDistribution::select(['id', 'name', 'status'])->where('deleted_status', NULL)->get();
        return view('admin.exam_master.exam.distribution.index', compact('distributions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:exam_distributions,name',
        
        ]);
        $addCategory = new ExamDistribution();
        $addCategory->name = $request->name;
        $addCategory->save();

        $notification = array(
            'messege' => 'Exam distribution inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:exam_distributions,name,' . $request->id
        ]);
        $updateCategory = ExamDistribution::where('id', $request->id)->first();
        $updateCategory->name = $request->name;
        $updateCategory->save();

        $notification = array(
            'messege' => 'Exam distribution updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($distributionId)
    {
        $statusChange = ExamDistribution::where('id', $distributionId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Exam distribution is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Exam distribution is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($distributionId)
    {
        ExamDistribution::where('id', $distributionId)->singleDelete();
        $notification = array(
            'messege' => 'Exam distribution is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getDistributionByAjax($distributionId)
    {
        $hall = ExamDistribution::select(['id', 'name'])->where('id', $distributionId)->first();
        return response()->json($hall);
    }
}
