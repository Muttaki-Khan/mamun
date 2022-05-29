<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\category;
use App\company_suppliers;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class CompanySuppliersController extends Controller
{
    public function index(){

      return view('admin.companysuppliers.companysuppliersEntry'); 
  }
  public function save(Request $request){

      $companysuppliers = new company_suppliers();
  		$companysuppliers->suppliers_name = $request->suppliers_name;

      $lastId = $companysuppliers->id;
 
      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/companysuppliers/entry')->with('message','You don\'t have permssion to add');
      }
      
  		$companysuppliers->save();
      Alert::success('Success', 'Successfully Added');
      return redirect('/companysuppliers/manage')->with('message','companysuppliers insert successfully');


  }

  public function manage(){

      $companysuppliers = DB::table('company_suppliers')->get();

      return view('admin.companysuppliers.companysuppliersManage',['companysuppliers'=>$companysuppliers]); 
  }


  public function singlecompanysuppliers($id){

      $companysuppliersById = DB::table('companysuppliers')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('companysuppliers.*','categories.categoryName as catName')
                  ->where('companysuppliers.id',$id)
                  ->first();
                 // ->where('categories')
      
      return view('admin.companysuppliers.singlecompanysuppliers',['companysuppliers'=>$companysuppliersById]); 
  }

  public function edit($id){

    if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/companysuppliers/manage')->with('message','You don\'t have permssion to update');
    }
     $companysuppliers= company_suppliers::where('id',$id)->first();
     return view('admin.companysuppliers.companysuppliersEdit',['companysuppliers'=>$companysuppliers]);
  }
  public function update(Request $request){


     $companysuppliers= company_suppliers::find($request->companysuppliers_id);
     $companysuppliers->suppliers_name= $request->name;


     $companysuppliers->save();

     return redirect('/companysuppliers/manage')->with('message','Update successfully');



  }
  public function delete($id){

    $companysuppliersPic= company_suppliers::where('id',$id)->first();
     if (file_exists($companysuppliersPic->pic)) {
       unlink($companysuppliersPic->pic);
     }
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/companysuppliers/manage')->with('message','You don\'t have permssion to delete');
    }

     $companysuppliersDelete= company_suppliers::find($id);
     $companysuppliersDelete->delete();
     
     return redirect('/companysuppliers/manage')->with('message','Deleted successfully');
  }


}

