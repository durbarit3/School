<?php

namespace App\Http\Controllers\Admin;

use App\AdmitCardTemplate;
use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;

class ExamAdmitCardDesignController extends Controller
{
    public function index()
    {
        
        return view('admin.exam_master.admit_card.design.index');
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'template_name' => 'required',
            'heading' => 'required',
            'title' => 'required',
            'footer_text' => 'required',
            'left_logo' => 'sometimes|mimes:jpeg,jpg,png,gif|max:20480',
            'right_logo' => 'sometimes|mimes:jpeg,jpg,png,gif|max:20480',
            'background_photo' => 'sometimes|mimes:jpeg,jpg,png,gif|max:20480',
        ]);


        $addDesing = new AdmitCardTemplate();
        $addDesing->template_name = $request->template_name;
        $addDesing->heading = $request->heading;
        $addDesing->title = $request->title;
        $addDesing->is_student_photo = isset($request->is_student_photo) ? 1 : 0;
        $addDesing->footer_text = $request->footer_text;
        $addDesing->save();

        if ($request->hasFile('left_logo')) {
            $left_logo = $request->file('left_logo');
            $left_logo_unique_name = uniqid().'.'.$left_logo->getClientOriginalExtension();
            Image::make($left_logo)->resize(200, 200)->save(public_path('uploads/admit_card_logo/'.$left_logo_unique_name));
            //$left_logo->move(public_path('uploads/admit_card_logo/'), $left_logo_unique_name);

            $addDesing->left_logo = $left_logo_unique_name;
            $addDesing->save();
        }

        if ($request->hasFile('right_logo')) {
            $right_logo = $request->file('right_logo');
            $right_logo_unique_name = uniqid().'.'.$right_logo->getClientOriginalExtension();
            Image::make($right_logo)->resize(200, 200)->save(public_path('uploads/admit_card_logo/'.$right_logo_unique_name));
            //$right_logo->move(public_path('uploads/admit_card_logo/'), $right_logo_unique_name);
            $addDesing->right_logo = $right_logo_unique_name;
            $addDesing->save();
        }

        if ($request->hasFile('background_photo')) {
            $background_photo = $request->file('background_photo');
            $background_photo_unique_name = uniqid().'.'.$background_photo->getClientOriginalExtension();
            Image::make($background_photo)->resize(400, 370)->save(public_path('uploads/admit_card_logo/'.$background_photo_unique_name));
            //$right_logo->move(public_path('uploads/admit_card_logo/'), $right_logo_unique_name);
            $addDesing->background_photo = $background_photo_unique_name;
            $addDesing->save();
        }
        return view('admin.exam_master.admit_card.design.ajax_view.admit_card_demo', compact('addDesing'));
    }

    public function changeStatus($desingId)
    {
        $statusChange = AdmitCardTemplate::where('id', $desingId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
           
            return response()->json('Admit card template is deactivated');
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            
           
            return response()->json('Admit card template is activated');
            
        }
    }

    public function edit($desingId)
    {
        $admitCardDesign = AdmitCardTemplate::where('id', $desingId)->first();
        return view('admin.exam_master.admit_card.design.ajax_view.edit_modal_view', compact('admitCardDesign'));
    }

    public function update(Request $request, $desingId)
    {
        $this->validate($request, [
            'template_name' => 'required',
            'heading' => 'required',
            'title' => 'required',
            'footer_text' => 'required',
            'left_logo' => 'sometimes|mimes:jpeg,jpg,png,gif|max:20480',
            'right_logo' => 'sometimes|mimes:jpeg,jpg,png,gif|max:20480',
            'background_photo' => 'sometimes|mimes:jpeg,jpg,png,gif|max:20480',
        ]);


        $updateDesing = AdmitCardTemplate::where('id', $desingId)->first();
        $updateDesing->template_name = $request->template_name;
        $updateDesing->heading = $request->heading;
        $updateDesing->title = $request->title;
        $updateDesing->is_student_photo = isset($request->is_student_photo) ? 1 : 0;
        $updateDesing->footer_text = $request->footer_text;
        $updateDesing->save();

        if ($request->hasFile('left_logo')) {
            if ($updateDesing->left_logo) {
                if (file_exists(public_path('uploads/admit_card_logo/'.$updateDesing->left_logo)) == true) {
                    unlink(public_path('uploads/admit_card_logo/'.$updateDesing->left_logo));
                }
            }
            $left_logo = $request->file('left_logo');
            $left_logo_unique_name = uniqid().'.'.$left_logo->getClientOriginalExtension();
            Image::make($left_logo)->resize(200, 200)->save(public_path('uploads/admit_card_logo/'.$left_logo_unique_name));
            $updateDesing->left_logo = $left_logo_unique_name;
            $updateDesing->save();
        }

        if ($request->hasFile('right_logo')) {
            if ($updateDesing->right_logo) {
                if (file_exists(public_path('uploads/admit_card_logo/'.$updateDesing->right_logo)) == true) {
                    unlink(public_path('uploads/admit_card_logo/'.$updateDesing->right_logo));
                }
            }
            $right_logo = $request->file('right_logo');
            $right_logo_unique_name = uniqid().'.'.$right_logo->getClientOriginalExtension();
            Image::make($right_logo)->resize(200, 200)->save(public_path('uploads/admit_card_logo/'.$right_logo_unique_name));
            $updateDesing->right_logo = $right_logo_unique_name;
            $updateDesing->save();
        }

        if ($request->hasFile('background_photo')) {

            if ($updateDesing->background_photo) {
                if (file_exists(public_path('uploads/admit_card_logo/'.$updateDesing->background_photo)) == true) {
                    unlink(public_path('uploads/admit_card_logo/'.$updateDesing->background_photo));
                }
            }

            $background_photo = $request->file('background_photo');
            $background_photo_unique_name = uniqid().'.'.$background_photo->getClientOriginalExtension();
            Image::make($background_photo)->resize(400, 370)->save(public_path('uploads/admit_card_logo/'.$background_photo_unique_name));
            $updateDesing->background_photo = $background_photo_unique_name;
            $updateDesing->save();
        }
        $addDesing = $updateDesing;
        return view('admin.exam_master.admit_card.design.ajax_view.admit_card_demo', compact('addDesing'));
    }

    public function delete($desingId)
    {
        $admitCardDesigne = AdmitCardTemplate::where('id', $desingId)->first();

        if ($admitCardDesigne->left_logo) {
            if (file_exists(public_path('uploads/admit_card_logo/'.$admitCardDesigne->left_logo)) == true) {
                unlink(public_path('uploads/admit_card_logo/'.$admitCardDesigne->left_logo));
            }
        }
        
        if ($admitCardDesigne->right_logo) {
            if (file_exists(public_path('uploads/admit_card_logo/'.$admitCardDesigne->right_logo)) == true) {
                unlink(public_path('uploads/admit_card_logo/'.$admitCardDesigne->right_logo));
            }
        }
        
        if ($admitCardDesigne->background_photo) {
            if (file_exists(public_path('uploads/admit_card_logo/'.$admitCardDesigne->background_photo)) == true) {
                unlink(public_path('uploads/admit_card_logo/'.$admitCardDesigne->background_photo));
            }
        }
        
        
        $admitCardDesigne->delete();
        return response()->json('Admit card template is deleted');
    }

    public function show($desingId)
    {  
        
        $addDesing = AdmitCardTemplate::where('id', $desingId)->first();

        return view('admin.exam_master.admit_card.design.ajax_view.admit_card_demo', compact('addDesing'));
    }

   // Ajax Methods

    public function allTemplates()
    {
        $adminCardDesignees = AdmitCardTemplate::where('deleted_status', NULL)->orderBy('id', 'DESC')->get();
        return view('admin.exam_master.admit_card.design.ajax_view.all_templates', compact('adminCardDesignees'));
    }
    
}
