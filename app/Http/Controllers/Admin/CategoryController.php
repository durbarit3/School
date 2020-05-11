<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::active();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name'
        ]);
        $addCategory = new Category();
        $addCategory->name = $request->name;
        $addCategory->save();

        $notification = array(
            'messege' => 'Category inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,' . $request->id
        ]);
        $updateCategory = Category::where('id', $request->id)->first();
        $updateCategory->name = $request->name;
        $updateCategory->save();

        $notification = array(
            'messege' => 'Category updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($categoryId)
    {
        $statusChange = Category::where('id', $categoryId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Category is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Category is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


    public function hardDelete($categoryId)
    {
        Category::where('id', $categoryId)->singleDelete();
        $notification = array(
            'messege' => 'Category is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleHardDelete(Request $request)
    {

        if ($request->category_id == null) {
            $notification = array(
                'messege' => 'You did not select any category',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->category_id as $category_id) {
                Category::where('id', $category_id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Category is deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function getCategoryNameByAjax($categoryId)
    {
        $category = Category::where('id', $categoryId)->first();
        return response()->json($category);
    }
}
