<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\suppliers;
use App\suppliers_payments;
use DB;
use Illuminate\Support\Facades\Auth;

class SuppliersPaymentController extends Controller
{
    public function index(){
      $suppliers = DB::table('suppliers')->get();

      return view('admin.suppliersPayment.suppliersEntry',['suppliers'=>$suppliers]); 
  }
  public function save(Request $request){

      $suppliers = new suppliers_payments();

  		$suppliers->suppliers_id = $request->suppliers_id;
      $suppliers->payment_date = $request->payment_date;
      $suppliers->payment_amount = $request->payment_amount;
 
  		$suppliers->save();

      return redirect('/suppliersPayment/entry')->with('message','insert successfully');


  }

  public function manage(){

      $suppliers = suppliers_payments::all();      

      return view('admin.suppliersPayment.suppliersManage',['suppliers'=>$suppliers]); 
  }


  public function singlesuppliers($id){

      $suppliersById = DB::table('supplierss_deposits')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('supplierss.*','categories.categoryName as catName')
                  ->where('supplierss.id',$id)
                  ->first();
      
      return view('admin.suppliersPayment.singlesuppliers',['suppliers'=>$suppliersById]); 
  }

  public function edit($id){

     $suppliers= suppliers_payments::where('id',$id)->first();
     return view('admin.suppliersPayment.suppliersEdit',['suppliers'=>$suppliers]);
  }
  public function update(Request $request){


    // $suppliers= suppliers::find($request->suppliers_id);
     $suppliersPic= suppliers_payments::where('id',$request->suppliers_id)->first();

     $suppliers= suppliers_payments::find($request->suppliers_id);

     $suppliers->tender_id = $request->tender_id ;
     $suppliers->deposite_by = $request->deposite_by ;
     $suppliers->amount = $request->amount;

     $suppliers->save();

     return redirect('/suppliersPayment/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $suppliersPic= suppliers_payments::where('id',$id)->first();
     if (file_exists($suppliersPic->pic)) {
       unlink($suppliersPic->pic);
     }
     


     $suppliersDelete= suppliers_payments::find($id);
     $suppliersDelete->delete();
     
     return redirect('/suppliersPayment/manage')->with('message','Deleted successfully');
  }


}
