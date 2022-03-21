<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\offices;
use App\office_expenses;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class OfficeExpenseController extends Controller
{
    public function index(){

      return view('admin.officeExpense.officeEntry'); 
  }
  public function save(Request $request){

      $office = new office_expenses();

  		$office->expense_date = $request->expense_date;
      $office->expense_reason = $request->expense_reason;
      $office->debit_by = $request->debit_by;
      $office->amount = $request->amount; 

      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/officeExpense/entry')->with('message','You don\'t have permssion to add');
      }
      
  		$office->save();
      Alert::success('Success', 'Successfully Added');

      return redirect('/officeExpense/entry')->with('message','insert successfully');


  }

  public function manage(){

      $offices = DB::table('office_expenses')->get();
      return view('admin.officeExpense.officeManage',['offices'=>$offices]); 
  }

  public function search(Request $request){
    $projects = DB::table('office_expenses')
                ->whereBetween('expense_date', [$request->from_date,$request->to_date])
                
                ->get();

    return view('admin.projectExpense.projectManage',['projects'=>$projects]); 
}


  public function singleoffice($id){

      $officeById = DB::table('offices_expenses')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('offices.*','categories.categoryName as catName')
                  ->where('offices.id',$id)
                  ->first();
      
      return view('admin.officeExpense.singleoffice',['office'=>$officeById]); 
  }

  public function edit($id){
    if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/officeExpense/manage')->with('message','You don\'t have permssion to update');
    }

     $office= office_expenses::where('id',$id)->first();
     return view('admin.officeExpense.officeEdit',['office'=>$office]);
  }
  public function update(Request $request){


     $office= office_expenses::where('id',$request->office_id)->first();

     $office= office_expenses::find($request->office_id);


     $office->expense_date = $request->expense_date;
     $office->expense_reason = $request->expense_reason;
     $office->debit_by = $request->debit_by;
     $office->amount = $request->amount; 

     $office->save();

     return redirect('/officeExpense/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $officePic= office_expenses::where('id',$id)->first();
     if (file_exists($officePic->pic)) {
       unlink($officePic->pic);
     }
     
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/officeExpense/manage')->with('message','You don\'t have permssion to delete');
    }

     $officeDelete= office_expenses::find($id);
     $officeDelete->delete();
     
     return redirect('/officeExpense/manage')->with('message','Deleted successfully');
  }


}
