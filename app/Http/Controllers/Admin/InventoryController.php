<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\InventoryCategory;
use App\InventoryItem;
use App\Item;
use App\Role;
use App\InventoryIssue;

use App\ItemSupplier;
use App\StudentAdmission;
use App\StockItemIndex;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // show all category
    public function categoryIndex()
    {
        $cateogres = InventoryCategory::all();
        return view('admin.inventory.category', compact('cateogres'));
    }

    // store category
    public function categoryStore(Request $request)
    {
        $data = $request->validate([
            'category' => 'required|unique:inventory_categories|max:225',
            'description' => 'required',
        ]);

        InventoryCategory::insert([
            'category' => $request->category,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'messege' => 'Category Created successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // edit category
    public function categoryEdit($id)
    {
        $category = InventoryCategory::findOrFail($id);
        return response()->json($category);
    }

    // update category
    public function categoryUpdate(Request $request)
    {
        $request->validate([
            'category' => 'required|max:225|unique:inventory_categories,category,' . $request->id,
            'description' => 'required',
        ]);

        InventoryCategory::findOrFail($request->id)->update([
            'category' => $request->category,
            'description' => $request->description,
        ]);

        $notification = array(
            'messege' => 'Category Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // delete cateory
    public function categoryDelete($id)
    {
        InventoryCategory::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Category Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // category multi delete

    public function categoryMultiDelete(Request $request)
    {
        if ($request->deleteId == NULL) {
            $notification = array(
                'messege' => 'You did not select any category',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $delid) {
                InventoryCategory::where('id', $delid)->delete();
            }
        }
        $notification = array(
            'messege' => 'Categores is deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    //================== item route start from here ================================\\

    public function itemIndex()
    {
        $items = InventoryItem::active();
        return view('admin.inventory.item', compact('items'));
    }

    // store item
    public function itemStore(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'description' => 'required',
        ]);

        InventoryItem::insert([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'messege' => 'Inventory Item is Created successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // edit Item
    public function itemEdit($id)
    {
        $item = InventoryItem::findOrFail($id);
        return response()->json($item);
    }


    // Update item
    public function itemUpdate(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'description' => 'required',
        ]);

        InventoryItem::findOrFail($request->id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,

        ]);
        $notification = array(
            'messege' => 'Inventory Item is Updated successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // item status update

    public function itemStatus($id)
    {
        $statusChange = InventoryItem::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Inventory Item Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Inventory Item Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // inventory Item Multi delete

    public function itemMultiDelete(Request $request)
    {
        $deleteid = $request->Input('deleteId');

        if($request->Input('deleteId') != NULL){

            $deleteid =InventoryItem::whereIn('id', $deleteid)->singleDelete();
            
             if($deleteid){
                 $notification=array(
                    'messege'=>'Inventory Item Multi Deleted Successfully!',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
             }else{
                 $notification=array(
                    'messege'=>'error',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
                }
         }else{
            $notification=array(
                'messege'=>'Nothing To Delete',
                'alert-type'=>'info'
                 );
             return redirect()->back()->with($notification);
         }
    }

    // item deleted

    public function itemDelete($id)
    {
        InventoryItem::where('id',$id)->singleDelete();
        $notification=array(
            'messege'=>'Item Deleted Successfully!',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }


    // supplier method start from here

    public function supplierIndex()
    {
        $itemsuppliers = ItemSupplier::active();
        return view('admin.inventory.supplier',compact('itemsuppliers'));
    }

    // supplier store

    public function supplierStore(Request $request)
    {
        $request->validate([
            'item_supplier'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
            'contact_person_name'=>'required',
            'contact_person_phone'=>'required',
            'contact_person_email'=>'required',
            'description'=>'required',
        ]);

        ItemSupplier::create($request->all());
        $notification=array(
            'messege'=>'Supplier Created Successfully!',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }


    // edit supplier

    public function supplierEdit($id)
    {
        $supplier = ItemSupplier::findOrFail($id);
        return response()->json($supplier);
    }

    // update supplier

    public function supplierUpdate(Request $request)
    {
        $request->validate([
            'item_supplier'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
            'contact_person_name'=>'required',
            'contact_person_phone'=>'required',
            'contact_person_email'=>'required',
            'description'=>'required',
        ]);

        ItemSupplier::findOrFail($request->id)->update($request->all());

        $notification=array(
            'messege'=>'Supplier Update Successfully!',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);

    }

    // delete supplier

    public function supplierDelete ($id)
    {
        ItemSupplier::where('id',$id)->singleDelete();

        $notification=array(
            'messege'=>'Supplier Deleted Successfully!',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    // supplier Multi delete

    public function supplierMultiDelete(Request $request)
    {
        $deleteid = $request->Input('deleteId');
        if($request->Input('deleteId') != NULL){
            $deleteid =ItemSupplier::whereIn('id', $deleteid)->singleDelete();
            
             if($deleteid){
                 $notification=array(
                    'messege'=>'Supplier Item Multi Deleted Successfully!',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
             }else{
                $notification=array(
                    'messege'=>'error',
                    'alert-type'=>'error'
                     );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification=array(
                'messege'=>'Nothing To Delete',
                'alert-type'=>'info'
                 );
            return redirect()->back()->with($notification);
        }
    }

    // add item controller start from here
    public function addItems()
    {
        $categores =InventoryCategory::active();
        $items = Item::active();
        return view('admin.inventory.additem',compact('categores','items'));
    }


    // add items create
    public function itemsStore(Request $request)
    {
        
        $data =$request->validate([
            'item'=>'required',
            'category_id'=>'required',
            'unit'=>'required',
            'description'=>'required',
        ]);

        Item::create([
            'item'=>$request->item,
            'category_id'=>$request->category_id,
            'unit'=>$request->unit,
            'able_qty'=>$request->unit,
            'description'=>$request->description,
        ]);

        $notification=array(
            'messege'=>'Item created Successfully!',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    // item edit
    public function itemsEdit($id)
    {
        $item =Item::edit($id);
        return response()->json($item);
    }

    // items update

    public function itemsUpdate(Request $request)
    {
        $data = $request->validate([
            'item'=>'required',
            'category_id'=>'required',
            'unit'=>'required',
            'description'=>'required',
        ]);

        Item::findOrFail($request->id)->update([
            'item'=>$request->item,
            'category_id'=>$request->category_id,
            'unit'=>$request->unit,
            
            'description'=>$request->description,
        ]);

        $notification=array(
            'messege'=>'Item Updated Successfully!',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    // items delete
    public function itemsDelete($id)
    {
        Item::where('id',$id)->singleDelete();
        $notification=array(
            'messege'=>'Item Deleted Successfully!',
            'alert-type'=>'success'
             );
         return redirect()->back()->with($notification);
    }

    // update status
    public function itemsStatusUpdate($id)
    {
        $statusChange = Item::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => ' Item Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => ' Item Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // multi delete
    public function itemsMultiDelete (Request $request)
    {
        $deleteid = $request->Input('deleteId');

        if($request->Input('deleteId') != NULL){
            $deleteid =Item::whereIn('id', $deleteid)->singleDelete();
             if($deleteid){
                 $notification=array(
                    'messege'=>' Item Multi Deleted Successfully!',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
             }else{
                 $notification=array(
                    'messege'=>'error',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
                }
         }else{
            $notification=array(
                'messege'=>'Nothing To Delete',
                'alert-type'=>'info'
            );
            return redirect()->back()->with($notification);
         }
    }

    // item stock area start
    public function stockItemIndex()
    {
        $categores = InventoryCategory::active();
        $inventoryitems = InventoryItem::active();
        $suppliers = ItemSupplier::active();
        $stores = Item::active();
        $stockitems = StockItemIndex::with(['inventoryitem','category','supplier','store'])->active(); 
        return view('admin.inventory.item_stock',compact('categores','inventoryitems','suppliers','stores','stockitems'));
    }

    // item sttock sore
    public function stockItemStore(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'items_id'=>'required',
            'supplier_id'=>'required',
            'store_id'=>'required',
            'quantity'=>'required',
            'purchase'=>'required|numeric',
            'data'=>'required',
        ],[
            'category_id.required'=>'Category Field is Required!',
            'items_id.required'=>'Item Field  is Required!',
            'supplier_id.required'=>'Supplier Field  is Required!',
            'store_id.required'=>'Store Field must is Required!',
            'purchase.numeric'=>'Store Field must be Numberic!',
        ]);

        $data = StockItemIndex::insertgetid ([
            'category_id'=>$request->category_id,
            'items_id'=>$request->items_id,
            'supplier_id'=>$request->supplier_id,
            'store_id'=>$request->store_id,
            'quantity'=>$request->quantity,
            'purchase'=>$request->purchase,
            'data'=>$request->data,
            'document'=>$request->doc_file,
            'description'=>$request->description,
            'created_at'=>Carbon::now(),
        ]);

        $data =StockItemIndex::findOrFail($data);

        if ($request->hasFile('doc_file')){
            $data->document = $request->file('doc_file')->store('public/uploads/inventory');
            $data->save();
        }

        $notification=array(
            'messege'=>' Stock Items Created Successfully!',
            'alert-type'=>'success'
             );
        return redirect()->back()->with($notification);
 
    }

    // item stock edit
    public function stockItemEdit($id)
    {
        $stockitem = StockItemIndex::findOrFail($id);

        return response()->json($stockitem);
    }

    // issue inventory
    public function issueIndex()
    {
        $roles = Role::all();
        $students = StudentAdmission::all();
        $issuers = Admin::all(); 
        $categores = InventoryCategory::active();
        $inventoryissues = InventoryIssue::with(['inventoryItem', 'inventoryCategory', 'inventoryStudent','inventoryAdmin'])->active(); 

        return view('admin.inventory.issuitem', compact('roles','students','issuers','categores','inventoryissues'));
    }

    // get issue items
    public function issueItems($id)
    {
        $items = Item::where('category_id', $id)->get();
        return response()->json($items);
    }

    // issue store
    public function issueStore(Request $request)
    {
        $item = Item::findOrFail($request->item)->able_qty;
        $able_qty = $item - $request->qty;
        if ($item > $request->qty) {
            $notification=array(
            'messege'=>' This Number of Items Can not Avilable!',
            'alert-type'=>'success'
             );
            return redirect()->back()->with($notification);
        } else{
            InventoryIssue::create($request->all());
            Item::findOrFail($request->item)->update([
                'able_qty' => $able_qty,
            ]);
            
            $notification=array(
                'messege'=>' Inventory Issued Successfully!',
                'alert-type'=>'success'
            );
         return redirect()->back()->with($notification);
        }
    }

    // issue return 
    public function issueReturn($id)
    {
       $issues= InventoryIssue::findOrFail($id);
       $item = Item::findOrFail($issues->item);
       $item->update([
            'able_qty' => intval($item->able_qty) + intval($issues->qty),
       ]);

       $inventoryReturn = InventoryIssue::where('id', $id)->first();
        if ($inventoryReturn->returned_status == 1) {
            $inventoryReturn->returned_status = 0;
            $inventoryReturn->save();
            $notification=array(
                'messege'=>' Inventory Return Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $inventoryReturn->returned_status = 1;
            $inventoryReturn->save();
            $notification=array(
                'messege'=>' Inventory Return Successfully!',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    // issue delete
    public function issueDelete($id)
    {
        InventoryIssue::findOrFail($id)->delete();
        $notification=array(
            'messege'=>' Inventory Deleted Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
