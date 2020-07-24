<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LibraryBook;
use App\LibraryMember;
use App\Classes;
use App\StudentAdmission;
use App\LibraryStaff;
use App\BookIssue;

class LibraryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // book list
    public function bookList()
    {
    	$books =LibraryBook::latest()->active();
    	return view('admin.library.books',compact('books'));
    }

    // store 
    public function bookStore (Request $request)
    {
        LibraryBook::create($request->all());
          $notification = array(
                'messege' => 'Book Inserted successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // multideleted

    public function bookMultiDelete(Request $request)
    {
         if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $id) {
                LibraryBook::where('id', $id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Books deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // edit

    public function bookEdit($id)
    {
        $books = LibraryBook::findOrFail($id);
        return response()->json($books);
    }

    // update
    public function bookUpdate(Request $request)
    {
        LibraryBook::findOrFail($request->id)->update($request->all());
        $notification = array(
            'messege' => 'Book Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // DELETE

    public function bookDelete($id)
    {
        LibraryBook::findOrFail($id)->singleDelete();
        $notification = array(
            'messege' => 'Book Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // library memeber area start

    public function libraryList($value='')
    {

       $members =LibraryMember::latest()->with('students')->active();
       

        
        $classes = Classes::latest()->active();

        return view('admin.library.library_member',compact('members','classes'));

    }

    // store

    public function libraryMemberStore(Request $request)
    {
        LibraryMember::create($request->all());
            $notification = array(
            'messege' => 'Library Member Inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function libraryMemberInfo($class_id)
    {
        $students =StudentAdmission::where('class',$class_id)->active();
        return response()->json($students);
    }

    // edit data
    public function libraryMemberEdit($id)
    {
        $member =LibraryMember::findOrFail($id);
        return response()->json($member);
    }
    // update

    public function libraryMemberUpdate(Request $request)
    {
        LibraryMember::findOrFail($request->id)->update($request->all());
                    $notification = array(
            'messege' => 'Library Member Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // status update


    public function libraryMemberStatus($id)
    {
        $statusChange = LibraryMember::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Library Member Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Library Member Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // delete

    public function libraryMemberDelete($id)
    {
        LibraryMember::where('id',$id)->singleDelete();
        $notification = array(
                'messege' => 'Library Member Deleted successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // multideleted
    

      public function libraryMemberMultiDelete(Request $request)
    {
         if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $id) {
                LibraryMember::where('id', $id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Books deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // library staff

    public function libraryStaffList()
    {
        $staffs=LibraryStaff::latest()->active();
        return view('admin.library.library_staf',compact('staffs'));
    }

    // store

    public function libraryStaffStore(Request $request)
    {
        LibraryStaff::insert([
            'card_no'=>rand(10000000,99999999),
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'date_birth'=>$request->date_birth,
        ]);
          $notification = array(
            'messege' => 'Library Staff Created successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // status
   

        public function libraryStaffStatus($id)
    {
        $statusChange = LibraryStaff::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Library Staff Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Library Staff Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // edit

    public function libraryStaffEdit($id)
    {
        $staff = LibraryStaff::findOrFail($id);

        return response()->json($staff);
    }

    // update

    public function libraryStaffUpdate(Request $request)
    {
        LibraryStaff::findOrFail($request->id)->update([
            'card_no'=>rand(10000000,99999999),
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'date_birth'=>$request->date_birth,
        ]);
          $notification = array(
            'messege' => 'Library Staff Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // delete

    public function libraryStaffDelete($id)
    {
        LibraryStaff::where('id',$id)->singleDelete();
         $notification = array(
            'messege' => 'Library Staff Deleted successfully:)',
            'alert-type' => 'success'
        );
       return Redirect()->back()->with($notification);
    }

    // multideleted


     public function libraryStaffMultiDelete(Request $request)
    {
         if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $id) {
                LibraryStaff::where('id', $id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Staff deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // issue book

    public function issueIndex()
    {
        $books = BookIssue::with(['issuebook', 'libraryMember', 'libraryMember.student'])->active();
        $members = LibraryMember::with('students')->active();
        $staffs = LibraryStaff::active();
        $librarybooks = LibraryBook::active();
        return view('admin.library.bookissue',compact('members','staffs','books','librarybooks'));
    }

    // book issue store
    public function issueStore(Request $request)
    {
        BookIssue::create($request->all());
             $notification = array(
            'messege' => 'Book issue successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // issue return

    public function issueReturn($id)
     {
     
        $bookReturn = BookIssue::where('id', $id)->first();
        if ($bookReturn->returned_status == 1) {
            $bookReturn->returned_status = 0;
            $bookReturn->save();
            $notification = array(
                'messege' => 'Book Return  successfully:)',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $bookReturn->returned_status = 1;
            $bookReturn->save();
            $notification = array(
                'messege' => 'Book Return  successfully:)',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
     } 

     // issue delete

     public function issueDelete($id)
     {
         BookIssue::findOrFail($id)->delete();

             $notification = array(
            'messege' => 'Issued Book Deleted  successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
     }
}
