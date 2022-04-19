<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\suppliers;
use App\company_suppliers;
use App\suppliers_dues;

use App\suppliers_payments;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class SuppliersPaymentController extends Controller
{
    public function index(){
      $suppliers = DB::table('suppliers')->get();
      $companysuppliers = DB::table('company_suppliers')->get();

      return view('admin.suppliersPayment.suppliersEntry',['suppliers'=>$suppliers, 'companysuppliers'=>$companysuppliers]); 
  }
  public function save(Request $request){

      $suppliers = new suppliers_payments();

  		$suppliers->suppliers_id = $request->suppliers_id;
      $suppliers->payment_date = $request->payment_date;
      $suppliers->payment_amount = $request->payment_amount;

      $due = DB::table('suppliers_dues')->where('suppliers_id',$request->suppliers_id)->first();
      $dueTable = suppliers_dues::find($due->id);
      $dueTable->due_amount = $dueTable->due_amount - $request->payment_amount;
 
      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/suppliersPayment/entry')->with('message','You don\'t have permssion to add');
      }
      
  		$suppliers->save();
      $dueTable->save();
      Alert::success('Success', 'Successfully Added');

      return redirect('/suppliersPayment/manage')->with('message','insert successfully');


  }

  public function manage(){

      $suppliers = DB::table('suppliers_payments')   
                ->join('company_suppliers','company_suppliers.id','=','suppliers_payments.suppliers_id')
                ->select('suppliers_payments.*','company_suppliers.suppliers_name') 
                ->paginate(15);
                // ->get();       

      return view('admin.suppliersPayment.suppliersManage',['suppliers'=>$suppliers]); 
  }

  public function search(Request $request){
    $suppliers = DB::table('suppliers_payments')
                ->whereBetween('payment_date', [$request->from_date,$request->to_date])
                ->join('company_suppliers','company_suppliers.id','=','suppliers_payments.suppliers_id')
                ->select('suppliers_payments.*','company_suppliers.suppliers_name') 
                ->paginate(15);


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
    $companysuppliers = DB::table('company_suppliers')->get();

    if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/suppliersPayment/manage')->with('message','You don\'t have permssion to update');
    }

     $suppliers= suppliers_payments::where('id',$id)->first();
     return view('admin.suppliersPayment.suppliersEdit',['suppliers'=>$suppliers,'companysuppliers'=>$companysuppliers]);
  }
  public function update(Request $request){

    // $suppliers= suppliers::find($request->suppliers_id);

     $suppliers= suppliers_payments::find($request->id);

     $difference = $request->payment_amount - $suppliers->payment_amount;

     $suppliers->suppliers_id = $request->suppliers_id ;
     $suppliers->payment_date = $request->payment_date;
     $suppliers->payment_amount = $request->payment_amount;
     //dd($request->suppliers_id);
     $due = DB::table('suppliers_dues')->where('suppliers_id',$request->suppliers_id)->first();
     //dd($due);
     $dueTable = suppliers_dues::find($due->id);
     $dueTable->due_amount =  $dueTable->due_amount - $difference;

     $dueTable->save();
     $suppliers->save();

     return redirect('/suppliersPayment/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $suppliersPic= suppliers_payments::where('id',$id)->first();
     if (file_exists($suppliersPic->pic)) {
       unlink($suppliersPic->pic);
     }
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/suppliersPayment/manage')->with('message','You don\'t have permssion to update');
    }

     $suppliersDelete= suppliers_payments::find($id);
     $suppliersDelete->delete();
     
     return redirect('/suppliersPayment/manage')->with('message','Deleted successfully');
  }


}
