<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\suppliers;
use App\suppliers_dues;
use DB;
use Illuminate\Support\Facades\Auth;

class SuppliersDueController extends Controller
{
    public function index(){
      $suppliers = DB::table('suppliers')->get();

      return view('admin.suppliersDue.suppliersEntry',['suppliers'=>$suppliers]); 
  }
  public function save(Request $request){

      $suppliers = new suppliers_dues();

  		$suppliers->suppliers_id = $request->suppliers_id;

      $suppliers->due_amount = $request->due_amount;
 

  		$suppliers->save();

      return redirect('/suppliersDue/entry')->with('message','insert successfully');


  }

  public function manage(){

      $suppliers = suppliers_dues::all();      


      return view('admin.suppliersDue.suppliersManage',['suppliers'=>$suppliers]); 
  }


  public function singlesuppliers($id){

      $suppliersById = DB::table('suppliers_dues')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('suppliers.*','categories.categoryName as catName')
                  ->where('suppliers.id',$id)
                  ->first();
      
      return view('admin.suppliersDue.singlesuppliers',['suppliers'=>$suppliersById]); 
  }

  public function edit($id){

     $suppliersId= suppliers::all();

     $suppliers= suppliers_dues::where('id',$id)->first();
     return view('admin.suppliersDue.suppliersEdit',['suppliers'=>$suppliers,'suppliersId'=>$suppliersId]);
  }
  public function update(Request $request){


    // $suppliers= suppliers::find($request->suppliers_id);
     $suppliersPic= suppliers_dues::where('id',$request->suppliers_id)->first();

     $suppliers= suppliers_dues::find($request->suppliers_id);

     $suppliers->suppliers_id = $request->suppliers_id;

     $suppliers->due_amount = $request->due_amount;

     $suppliers->save();

     return redirect('/suppliersDue/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $suppliersPic= suppliers_dues::where('id',$id)->first();
     if (file_exists($suppliersPic->pic)) {
       unlink($suppliersPic->pic);
     }
     
     $suppliersDelete= suppliers_dues::find($id);
     $suppliersDelete->delete();
     
     return redirect('/suppliersDue/manage')->with('message','Deleted successfully');
  }


}
