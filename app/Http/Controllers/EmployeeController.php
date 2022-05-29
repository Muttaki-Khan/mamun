<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\employees;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
  	public function index(){

  		return view('admin.employee.employeeEntry');
  }

  	public function save(Request $request){

  		$employee = new employees();


  		$employee->name = $request->name;
  		$employee->joining_date = $request->joining_date;
  		$employee->designation = $request->designation;
        $employee->salary = $request->salary;


        if(User::where('id',Auth::id())->first()->role_id!=1) {
            return redirect('/employee/entry')->with('message','You don\'t have permssion to add');
          }
          
  		$employee->save();
        Alert::success('Success', 'Successfully Added');

  		return redirect('/employee/manage')->with('message','Data insert successfully.');



	}
  public function manage(){

      $employees = employees::all();
      return view('admin.employee.employeeManage',['employee'=>$employees]);
  }

  public function edit($id){
    if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/employee/manage')->with('message','You don\'t have permssion to update');
      }
      $employee = employees::where('id',$id)->first();
      return view('admin.employee.employeeEdit',['employee'=>$employee]);
  }

  public function update(Request $request){

      $employee = employees::find($request->employee_id);

      $employee->name = $request->name;
      $employee->joining_date = $request->joining_date;
      $employee->designation = $request->designation;
      $employee->salary = $request->salary;

    

      $employee->save();

      return redirect('/employee/manage')->with('message','Updated successfully.');

  }

  public function delete($id){
    if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/employee/manage')->with('message','You don\'t have permssion to delete');
      }
      $employeeDelete = employees::find($id);
      $employeeDelete->delete();
      return redirect('/employee/manage')->with('message','Deleted successfully.');
  }



}