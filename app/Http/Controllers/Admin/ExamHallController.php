<?php

namespace App\Http\Controllers\Admin;

use App\ExamHall;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamHallController extends Controller
{
    public function index()
    {
        $halls= ExamHall::select(['id', 'hall_no', 'sit_qty', 'status'])->where('deleted_status', NULL)->get();
        return view('admin.exam_master.exam.hall.index', compact('halls'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'hall_no' => 'required|unique:exam_halls,hall_no',
            'sit_qty' => 'required'
        ]);
        $addCategory = new ExamHall();
        $addCategory->hall_no = $request->hall_no;
        $addCategory->sit_qty = $request->sit_qty;
        $addCategory->save();

        $notification = array(
            'messege' => 'Exam hall inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:exam_halls,hall_no,' . $request->id
        ]);
        $updateCategory = ExamHall::where('id', $request->id)->first();
        $updateCategory->hall_no = $request->hall_no;
        $updateCategory->sit_qty = $request->sit_qty;
        $updateCategory->save();

        $notification = array(
            'messege' => 'Exam hall updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($hallId)
    {
        $statusChange = ExamHall::where('id', $hallId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Exam hall is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Exam hall is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($hallId)
    {
        ExamHall::where('id', $hallId)->singleDelete();
        $notification = array(
            'messege' => 'Exam hall is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getHallByAjax($hallId)
    {
        $distribution = ExamHall::select(['id', 'hall_no', 'sit_qty'])->where('id', $hallId)->first();
        return response()->json($distribution);
    }
}
