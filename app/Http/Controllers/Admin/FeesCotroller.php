<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\FeesReminder;
use App\FeesType;
use App\FeesDiscount;
use App\FeesGroup;
use App\FeesMaster;
use App\StudentAdmission;
use App\Classes;
use App\ClassSection;
use App\FeesCollection;

class FeesCotroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // fees reminder
    public function feesReminder()
    {
    	$feesreminders = FeesReminder::active(); 
    	return view('admin.fees.fees_reminder',compact('feesreminders'));
    }

    // fees reminder store
    public function feesReminderStatus($id)
    {
    	$statusChange = FeesReminder::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Fees Reminder Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Fees Reminder Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // fees reminder edit
    public function feesReminderEdit($id)
    {
    	$feesreminder = FeesReminder::findOrFail($id);
    	return response()->json($feesreminder);
    }

    // fees reminder Update

    public function feesReminderUpdate(Request $request)
    {
    	FeesReminder::findOrFail($request->id)->update([
    		'days'=>$request->days,
    	]);

    	        $notification = array(
                'messege' => 'Fees Reminder Updated Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // fees types

    public function feesType()
    {
    	$feestypes = FeesType::active();
    	return view('admin.fees.feestype',compact('feestypes'));
    }

    // fees types store
    public function feesTypeStore(Request $request)
    {
    	FeesType::create($request->all());
       

    	 $notification = array(
                'messege' => 'FeesType Inserted Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // fees types status change
    public function feesTypeStatus($id)
    {
    	$statusChange = FeesType::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Fees Types Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Fees Types Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // fees type delete
    public function feesTypeDelete($id)
    {
    	FeesType::findOrFail($id)->singleDelete();
    	 $notification = array(
                'messege' => 'Fees Types Deleted Successfully!',
                'alert-type' => 'danger'
            );
            return Redirect()->back()->with($notification);
    }

    // fees type edit
    public function feesTypeEdit($id)
    {
    	$feestype =FeesType::findOrFail($id);
    	return response()->json($feestype);
    }

    // fees type update

    public function feesTypeUpdate(Request $request)
    {
    	FeesType::findOrFail($request->id)->update($request->all());
    	 $notification = array(
                'messege' => 'Fees Types Updated Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function feesTypeMultidelete(Request $request)
    {
    	 if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $type_id) {
                FeesType::where('id', $type_id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Fees Type deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // fees discount

     public function feesdiscount()
    {
    	$feesdiscounts = FeesDiscount::active();
    	return view('admin.fees.fees_discount',compact('feesdiscounts'));
    }

    // fees discounts store
    public function feesdiscountStore(Request $request)
    {
    	FeesDiscount::create($request->all());
    	 $notification = array(
                'messege' => 'Fees discount Inserted Successfully!',
                'alert-discount' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // fees discounts status change
    public function feesdiscountStatus($id)
    {
    	$statusChange = FeesDiscount::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Fees discounts Status is deactivated',
                'alert-discount' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Fees discounts Status is activated',
                'alert-discount' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // fees discount delete
    public function feesdiscountDelete($id)
    {
    	FeesDiscount::findOrFail($id)->singleDelete();
    	 $notification = array(
                'messege' => 'Fees discounts Deleted Successfully!',
                'alert-discount' => 'danger'
            );
            return Redirect()->back()->with($notification);
    }

    // fees discount edit
    public function feesdiscountEdit($id)
    {
    	$feesdiscount =FeesDiscount::findOrFail($id);
    	return response()->json($feesdiscount);
    }

    // fees discount update

    public function feesdiscountUpdate(Request $request)
    {
    	FeesDiscount::findOrFail($request->id)->update($request->all());
    	 $notification = array(
                'messege' => 'Fees discounts Updated Successfully!',
                'alert-discount' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function feesdiscountMultidelete(Request $request)
    {
    	 if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-discount' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $discount_id) {
                FeesDiscount::where('id', $discount_id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Fees discount deleted successfully:)',
            'alert-discount' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // fees group
     public function feesgroup()
    {
    	$feesgroups = FeesGroup::active();
    	return view('admin.fees.fees_group',compact('feesgroups'));
    }

    // fees groups store
    public function feesgroupStore(Request $request)
    {
    	FeesGroup::create($request->all());
    	 $notification = array(
                'messege' => 'Fees group Inserted Successfully!',
                'alert-group' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    // fees groups status change
    public function feesgroupStatus($id)
    {
    	$statusChange = FeesGroup::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Fees groups Status is deactivated',
                'alert-group' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Fees groups Status is activated',
                'alert-group' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // fees group delete
    public function feesgroupDelete($id)
    {
    	FeesGroup::findOrFail($id)->singleDelete();
    	 $notification = array(
                'messege' => 'Fees groups Deleted Successfully!',
                'alert-group' => 'danger'
            );
            return Redirect()->back()->with($notification);
    }

    // fees group edit
    public function feesgroupEdit($id)
    {
    	$feesgroup =FeesGroup::findOrFail($id);
    	return response()->json($feesgroup);
    }

    // fees group update

    public function feesgroupUpdate(Request $request)
    {
    	FeesGroup::findOrFail($request->id)->update($request->all());
    	 $notification = array(
                'messege' => 'Fees groups Updated Successfully!',
                'alert-group' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function feesgroupMultidelete(Request $request)
    {
    	 if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-group' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $group_id) {
                FeesGroup::where('id', $group_id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Fees group deleted successfully:)',
            'alert-group' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // fees master
    public function feesmaster()
    {
        $feesmasters = FeesMaster::active();
        $groups = FeesGroup::active();
        $types = FeesType::active();
        return view('admin.fees.fees_master',compact('feesmasters','groups','types'));
    }

    // fees masters store
    public function feesmasterStore(Request $request)
    {
        $currentSession = Session::where('is_current_session', 1)->first();
        $type = FeesType::findOrFail($request->types);
        $feesmaster = FeesMaster::create([
            'group'=> $request->group,
            'types'=> $request->types,
            'code'=> Str::slug($type->name.' '. $request->amount, '-'),
            'date'=> $request->date,
            'amount'=> $request->amount,
            'fine_type'=> $request->fine_type,
            'percentage'=> $request->percentage,
            'fine_amount'=> $request->fine_amount,
        ]);

        $collections = array();

        $feescollections = FeesCollection::where('session_id', $currentSession->id)->get();

        foreach ($feescollections as $row) {

            $this->collections = $row->collection;

            $item =array(
                '10' =>array(
                    'fees_id' => $feesmaster->id, 
                    'fees_groups' => $feesmaster->groups->name, 
                    'fees_type' => $feesmaster->feestypes->name, 
                    'fees_code' => $feesmaster->code, 
                    'due_date' => $feesmaster->date, 
                    'month' => date('F'), 
                    'paid_date' => null, 
                    'year' => date('Y'), 
                    'is_paid' => null, 
                    'amount' => $feesmaster->amount, 
                    'payment_id' => null, 
                    'mode' => null, 
                    'discount' => null, 
                    'fine' => null, 
                    'paid' => null, 
                ),
            );
           
            $collections =array_merge($row->collection, $item);
            FeesCollection::findOrFail($row->id)->update([

                'collection'=> $collections,

            ]);
        }

         $notification = array(
                'messege' => 'Fees master Inserted Successfully!',
                'alert-master' => 'success'
            );

        //return $feescollections = FeesCollection::all();
        return Redirect()->back()->with($notification);
    }

    // fees masters status change
    public function feesmasterStatus($id)
    {
        $statusChange = FeesMaster::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Fees masters Status is deactivated',
                'alert-master' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Fees masters Status is activated',
                'alert-master' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // fees master delete
    public function feesmasterDelete($id)
    {
        FeesMaster::findOrFail($id)->singleDelete();
         $notification = array(
                'messege' => 'Fees masters Deleted Successfully!',
                'alert-master' => 'danger'
            );
            return Redirect()->back()->with($notification);
    }

    // fees master edit
    public function feesmasterEdit($id)
    {
        $feesmaster =FeesMaster::findOrFail($id);
        return response()->json($feesmaster);
    }

    // fees master update

    public function feesmasterUpdate(Request $request)
    {
        $type = FeesType::findOrFail($request->types);

        FeesMaster::findOrFail($request->id)->update([
            'group'=>$request->group,
            'types'=>$request->types,
            'code'=>Str::slug($type->name.' '. $request->amount, '-'),
            'date'=>$request->date,
            'amount'=>$request->amount,
            'fine_type'=>$request->fine_type,
            'percentage'=>$request->percentage,
            'fine_amount'=>$request->fine_amount,
        ]);

        $notification = array(
                'messege' => 'Fees masters Updated Successfully!',
                'alert-master' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function feesmasterMultidelete(Request $request)
    {
         if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-master' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $master_id) {
                FeesMaster::where('id', $master_id)->singleDelete();
            }
        }
        $notification = array(
            'messege' => 'Fees master deleted successfully:)',
            'alert-master' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // fees collect

    public function feesCollect()
    {
        $students =StudentAdmission::with('classes','section')->active();
        $classes = Classes::active();

        return view('admin.fees.fees_collect',compact('students','classes'));
    }
    // search
    public function feesCollectSearch($id)
    {
       $sections = ClassSection::where('class_id',$id)->with('sections')->get();

       return response()->json($sections);
    }

    // search
    public function feesCollectSectionSearch(Request $request)
    {
        $classes = Classes::active();
        $students =StudentAdmission::where('class',$request->std_class)->where('section',$request->std_section)->with('classes','section')->get();
        return view('admin.fees.fees_collect',compact('students','classes'));
    }

    // fees collection
    public function feesCollection($id)
    {
        $total_amount = 0;
        $total_discount =0;
        $total_fine =0;
        $total_paid =0;
        $total_blance =0;
        $collections = FeesCollection::where('student_id',$id)->first();
        $discounts = FeesDiscount::active();

        //sum of total amount
        foreach ($collections->collection as $key => $value) {
            $total_amount +=$value['amount'];
        }

        //sum of total discount
        foreach ($collections->collection as $key => $value) {
            $total_discount +=$value['discount'];
        }

        // sum of total fine
        foreach ($collections->collection as $key => $value) {
            $total_fine +=$value['fine'];
        }

        // sum of total paid
        foreach ($collections->collection as $key => $value) {
            $total_paid +=$value['paid'];
        }

        $total_amount = $total_amount +  $total_discount +$total_fine;

        // sum of blance

          foreach ($collections->collection as $key => $value) {
            if ($value['is_paid'] != 1) {
                $total_blance += $value['amount'];
            }
        }

        return view('admin.fees.fees_collection',compact('collections','discounts','total_amount','total_discount','total_fine','total_paid','total_blance'));
    }

    // get fees

    public $collection_arr=[];

    public function feesCollectSectionGet (Request $request)
    {

        $collections = FeesCollection::findOrFail($request->collection_id);
        $this->collection_arr = FeesCollection::findOrFail($request->collection_id)->collection;

        foreach ($this->collection_arr as &$value) {
            if ($value['fees_id'] ==  $request->id) {
                $value['paid_date'] = $request->date;
                $value['payment_id'] = rand(5,15);
                $value['amount'] = $request->amount;
                $value['is_paid'] = 1;
                $value['discount_group'] = $request->discount_group;
                $value['discount'] = $request->discount;
                $value['fine'] = $request->fine;
                $value['mode'] = $request->mode;
                $value['paid'] = $request->amount;
                $value['description'] = $request->description;
                // array_push($value, $this->collection_arr);
                // unset($value);
            }
        }
      
        $collection_data = $this->collection_arr;     
        FeesCollection::findOrFail($request->collection_id)->update([
            'collection'=>$collection_data,  
        ]);

        $notification = array(
            'messege' => 'Fees collection successfully:)',
            'alert-master' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    function stripslashes_arr($value) 
    { 
        $value = is_array($value) ? array_map(array($this, 'stripslashes_arr'), $value) : stripslashes($value); 
    
        return $value; 
    } 

// search Student due fees

public function studentsFeesSearch()
{
    return view('admin.fees.searchfees');
}





    
}
