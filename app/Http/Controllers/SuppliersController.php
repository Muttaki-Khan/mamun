<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\suppliers_dues;
use Illuminate\Http\Request;
use App\suppliers;
use App\item;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller
{
    public function index(){
      $items = DB::table('items')->get();
      $companysuppliers = DB::table('company_suppliers')->get();

      return view('admin.suppliers.suppliersEntry',['items'=>$items, 'companysuppliers'=>$companysuppliers]); 
  }
  public function save(Request $request){

      $suppliers = new suppliers();
      
  		$suppliers->suppliers_id = $request->suppliers_id;
  		$suppliers->item_id = $request->item_id;
      $suppliers->quantity = $request->quantity;
  		$suppliers->order_amount = $request->order_amount;
      $suppliers->total_amount = $request->total_amount;
  		$suppliers->order_date = $request->order_date;
      $due = DB::table('suppliers_dues')->where('suppliers_id',$request->suppliers_id)->first();
      // dd($request->suppliers_id);
      if($due==null) {
        $due = new suppliers_dues();
        $due->suppliers_id = $request->suppliers_id;
        $due->due_amount = $request->total_amount;
        $due->save();
      } else {
        $dueTable = suppliers_dues::find($due->id);
        $dueTable->due_amount = $dueTable->due_amount + $request->total_amount;
        $dueTable->save();
      }

      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/suppliers/entry')->with('message','You don\'t have permssion to add');
      }
      

  		$suppliers->save();
      Alert::success('Success', 'Successfully Added');

      return redirect('/suppliers/manage')->with('message','suppliers insert successfully');


  }

  public function manage(){

      $suppliers = DB::table('suppliers')   
                  ->join('items','items.id','=','suppliers.item_id')
                  ->join('company_suppliers','company_suppliers.id','=','suppliers.suppliers_id')
                  ->select('suppliers.*','items.item_name', 'company_suppliers.suppliers_name')
                  ->paginate(15); 
                  // ->get(); 

      return view('admin.suppliers.suppliersManage',['suppliers'=>$suppliers]); 
  }

  public function search(Request $request){

    $suppliers = DB::table('suppliers')   
                ->join('items','items.id','=','suppliers.item_id')
                ->join('company_suppliers','company_suppliers.id','=','suppliers.suppliers_id')
                ->select('suppliers.*','items.item_name', 'company_suppliers.suppliers_name')
                ->paginate(15); 
                // ->get(); 

    return view('admin.suppliers.suppliersManage',['suppliers'=>$suppliers]); 
}


  public function singlesuppliers($id){

      $suppliersById = DB::table('suppliers')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('suppliers.*','categories.categoryName as catName')
                  ->where('suppliers.id',$id)
                  ->first();
      
      return view('admin.suppliers.singlesuppliers',['suppliers'=>$suppliersById]); 
  }

  public function edit($id){
     $items = item::all();
     $companysuppliers = DB::table('company_suppliers')->get();

     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/suppliers/manage')->with('message','You don\'t have permssion to update');
    }
     $suppliers= suppliers::where('id',$id)->first();
     return view('admin.suppliers.suppliersEdit',['suppliers'=>$suppliers,'items'=>$items,'companysuppliers'=>$companysuppliers]);
  }
  public function update(Request $request){


    // $suppliers= suppliers::find($request->suppliers_id);
    //  $suppliersPic= suppliers::where('id',$request->suppliers_id)->first();

     $suppliers= suppliers::find($request->id);

     $difference = $request->total_amount - $suppliers->total_amount;
     $suppliers->item_id = $request->item_id;
     $suppliers->quantity = $request->quantity;
     $suppliers->order_amount = $request->order_amount;
     $suppliers->total_amount = $request->total_amount;
     $suppliers->order_date = $request->order_date;

     $due = DB::table('suppliers_dues')->where('suppliers_id',$request->suppliers_id)->first();
     $dueTable = suppliers_dues::find($due->id);
     $dueTable->due_amount =  $dueTable->due_amount + $difference;

     $suppliers->save();
     $dueTable->save();

     return redirect('/suppliers/manage')->with('message','Update successfully');


  }
  public function delete(Request $request){
     
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/suppliers/manage')->with('message','You don\'t have permssion to delete');
    }

     $suppliersDelete= suppliers::find($request->id);
     $amountToBeDeleted = $suppliersDelete->total_amount;
     
     $supplier_id =  $suppliersDelete->suppliers_id;
     $due = DB::table('suppliers_dues')->where('suppliers_id',$supplier_id)->first();
     $dueTable = suppliers_dues::find($due->id);
     $dueTable->due_amount = $dueTable->due_amount - $amountToBeDeleted;

     $suppliersDelete->delete();
     $dueTable->save();
     
     
     return redirect('/suppliers/manage')->with('message','Deleted successfully');
  }


}
