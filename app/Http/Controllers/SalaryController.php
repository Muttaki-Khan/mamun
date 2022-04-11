<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\salarys;
use App\salary_sheet;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    public function index(){
      $employees = DB::table('employees')->get();

      return view('admin.salary.salaryEntry',['employees'=>$employees]); 
  }
  public function save(Request $request){

      $salary = new salary_sheet();

  		$salary->employee_id = $request->employee_id;
      $salary->payment_date = $request->payment_date;
      $salary->month = $request->month;
      $salary->amount = $request->amount;
 
      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/salary/entry')->with('message','You don\'t have permssion to add');
      }
      

  		$salary->save();
      Alert::success('Success', 'Successfully Added');

      return redirect('/salary/entry')->with('message','insert successfully');


  }

  public function manage(){

      $salarys = DB::table('salary_sheets')   
      ->join('employees','employees.id','=','salary_sheets.employee_id')
      ->select('salary_sheets.*','employees.name') 
      ->paginate(15);
      // ->get();       


      return view('admin.salary.salaryManage',['salarys'=>$salarys]); 
  }

  
  public function search(Request $request){
    $salarys = DB::table('salary_sheets') 
      ->whereBetween('payment_date', [$request->from_date,$request->to_date])  
      ->join('employees','employees.id','=','salary_sheets.employee_id')
      ->select('salary_sheets.*','employees.name') 
      ->paginate(15);
      // ->get();       


      return view('admin.salary.salaryManage',['salarys'=>$salarys]); 

  }


  public function singlesalary($id){

      $salaryById = DB::table('salarys_deposits')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('salarys.*','categories.categoryName as catName')
                  ->where('salarys.id',$id)
                  ->first();
      
      return view('admin.salary.singlesalary',['salary'=>$salaryById]); 
  }

  public function edit($id){
    $employees = DB::table('employees')->get();

    if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/salary/manage')->with('message','You don\'t have permssion to update');
    }
     $salary= salary_sheet::where('id',$id)->first();
     return view('admin.salary.salaryEdit',['salary'=>$salary,'employees'=>$employees]);
  }
  public function update(Request $request){


    // $salary= salary::find($request->salary_id);
     $salaryPic= salary_sheet::where('id',$request->salary_id)->first();

     $salary= salary_sheet::find($request->salary_id);

     $salary->employee_id = $request->employee_id;
     $salary->payment_date = $request->payment_date;
     $salary->month = $request->month;
     $salary->amount = $request->amount;

     $salary->save();

     return redirect('/salary/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $salaryPic= salary_sheet::where('id',$id)->first();
     if (file_exists($salaryPic->pic)) {
       unlink($salaryPic->pic);
     }
     
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/salary/manage')->with('message','You don\'t have permssion to delete');
    }

     $salaryDelete= salary_sheet::find($id);
     $salaryDelete->delete();
     
     return redirect('/salary/manage')->with('message','Deleted successfully');
  }


}
