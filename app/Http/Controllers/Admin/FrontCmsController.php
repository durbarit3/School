<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FrontEvent;
use App\FrontGallery;
use App\FrontNews;
use App\FrontPage;

class FrontCmsController extends Controller
{
  	 public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // event controller start from here
    public function eventList()
    {
    	$events = FrontEvent::active(); 
    	return view('admin.frontcms.events',compact('events'));
    }

    // store
    public function eventStore(Request $request)
    {
    	FrontEvent::create($request->all());
    	$notification = array(
                'messege' => 'Front CMS Event Created Succesfully!',
                'alert-type' => 'success'
            );
    	  return Redirect()->back()->with($notification);
    }

    // status change

     
    public function eventStatus($id)
    {
    	$statusChange = FrontEvent::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Front Event Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Front Event Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // edit data
    public function eventEdit($id)
    {
    	$eventedit =FrontEvent::findOrFail($id);
    	return response()->json($eventedit);	
    }

    // update
    public function eventUpdate(Request $request)
    {
    	FrontEvent::findOrFail($request->id)->update($request->all());
    	 $notification = array(
                'messege' => 'Front Event Update Succesfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // delete
    public function eventDelete($id)
    {
        FrontEvent::where('id',$id)->singleDelete();
                 $notification = array(
                'messege' => 'Front Event Deleted Succesfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // multidelete

    public function eventMultiDelete(Request $request)
    {
         if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $type_id) {
                FrontEvent::where('id', $type_id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Front Event deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }



     // gallery controller start from here
    public function galleryList()
    {
        $gallerys = FrontGallery::active(); 
        return view('admin.frontcms.gallerys',compact('gallerys'));
    }

    // store
    public function galleryStore(Request $request)
    {
        FrontGallery::create($request->all());
        $notification = array(
                'messege' => 'Front CMS gallery Created Succesfully!',
                'alert-type' => 'success'
            );
          return Redirect()->back()->with($notification);
    }

    // status change

     
    public function galleryStatus($id)
    {
        $statusChange = FrontGallery::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Front gallery Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Front gallery Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // edit data
    public function galleryEdit($id)
    {
        $galleryedit =FrontGallery::findOrFail($id);
        return response()->json($galleryedit);    
    }

    // update
    public function galleryUpdate(Request $request)
    {
        FrontGallery::findOrFail($request->id)->update($request->all());
         $notification = array(
                'messege' => 'Front gallery Update Succesfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // delete
    public function galleryDelete($id)
    {
        FrontGallery::where('id',$id)->singleDelete();
                 $notification = array(
                'messege' => 'Front gallery Deleted Succesfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // multidelete

    public function galleryMultiDelete(Request $request)
    {
         if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $type_id) {
                FrontGallery::where('id', $type_id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Front gallery deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }




     // News controller start from here

    public function newsList()
    {
        $news = FrontNews::active(); 
        return view('admin.frontcms.news',compact('news'));
    }

    // store
    public function newsStore(Request $request)
    {
        FrontNews::create($request->all());
        $notification = array(
                'messege' => 'Front CMS news Created Succesfully!',
                'alert-type' => 'success'
            );
          return Redirect()->back()->with($notification);
    }

    // status change

     
    public function newsStatus($id)
    {
        $statusChange = FrontNews::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Front news Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Front news Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // edit data
    public function newsEdit($id)
    {
        $newsedit =FrontNews::findOrFail($id);
        return response()->json($newsedit);    
    }

    // update
    public function newsUpdate(Request $request)
    {
        FrontNews::findOrFail($request->id)->update($request->all());
         $notification = array(
                'messege' => 'Front news Update Succesfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // delete
    public function newsDelete($id)
    {
        FrontNews::where('id',$id)->singleDelete();
                 $notification = array(
                'messege' => 'Front news Deleted Succesfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // multidelete

    public function newsMultiDelete(Request $request)
    {
         if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $type_id) {
                FrontNews::where('id', $type_id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Front news deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

     // Page controller start from here

    public function pageList()
    {
        $page = FrontPage::active(); 
        return view('admin.frontcms.pages',compact('page'));
    }

    // store
    public function pageStore(Request $request)
    {
        FrontPage::create($request->all());
        $notification = array(
                'messege' => 'Front CMS page Created Succesfully!',
                'alert-type' => 'success'
            );
          return Redirect()->back()->with($notification);
    }

    // status change

     
    public function pageStatus($id)
    {
        $statusChange = FrontPage::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Front page Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Front page Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // edit data
    public function pageEdit($id)
    {
        $pageedit =FrontPage::findOrFail($id);
        return response()->json($pageedit);    
    }

    // update
    public function pageUpdate(Request $request)
    {
        FrontPage::findOrFail($request->id)->update($request->all());
         $notification = array(
                'messege' => 'Front page Update Succesfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // delete
    public function pageDelete($id)
    {
        FrontPage::where('id',$id)->singleDelete();
                 $notification = array(
                'messege' => 'Front page Deleted Succesfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // multidelete

    public function pageMultiDelete(Request $request)
    {
         if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $type_id) {
                FrontPage::where('id', $type_id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Front page deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
