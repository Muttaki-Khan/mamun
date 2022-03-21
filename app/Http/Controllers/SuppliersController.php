<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

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

      return view('admin.suppliers.suppliersEntry',['items'=>$items]); 
  }
  public function save(Request $request){

      $suppliers = new suppliers();

  		$suppliers->name = $request->name ;
  		$suppliers->item_id = $request->item_id;
      $suppliers->quantity = $request->quantity;
  		$suppliers->order_amount = $request->order_amount;
  		$suppliers->order_date = $request->order_date;

      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/suppliers/entry')->with('message','You don\'t have permssion to add');
      }
      

  		$suppliers->save();
      Alert::success('Success', 'Successfully Added');

      return redirect('/suppliers/entry')->with('message','suppliers insert successfully');


  }

  public function manage(){

      $suppliers = DB::table('suppliers')   
                  ->join('items','items.id','=','suppliers.item_id')
                  ->select('suppliers.*','items.item_name') 
                  ->get(); 

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
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/suppliers/manage')->with('message','You don\'t have permssion to update');
    }
     $suppliers= suppliers::where('id',$id)->first();
     return view('admin.suppliers.suppliersEdit',['suppliers'=>$suppliers,'items'=>$items]);
  }
  public function update(Request $request){


    // $suppliers= suppliers::find($request->suppliers_id);
     $suppliersPic= suppliers::where('id',$request->suppliers_id)->first();

     $suppliers= suppliers::find($request->suppliers_id);
     $suppliers->name = $request->name ;
     $suppliers->item_id = $request->item_id;
     $suppliers->quantity = $request->quantity;
     $suppliers->order_amount = $request->order_amount;
     $suppliers->order_date = $request->order_date;


     $suppliers->save();

     return redirect('/suppliers/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $suppliersPic= suppliers::where('id',$id)->first();
     if (file_exists($suppliersPic->pic)) {
       unlink($suppliersPic->pic);
     }
     
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/suppliers/manage')->with('message','You don\'t have permssion to delete');
    }

     $suppliersDelete= suppliers::find($id);
     $suppliersDelete->delete();
     
     return redirect('/suppliers/manage')->with('message','Deleted successfully');
  }


}
