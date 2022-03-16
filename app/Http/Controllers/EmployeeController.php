<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employees;
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


  		$employee->save();

  		return redirect('/employee/entry')->with('message','Data insert successfully.');



	}
  public function manage(){

      $employees = employees::all();
      return view('admin.employee.employeeManage',['employee'=>$employees]);
  }

  public function edit($id){

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

      $employeeDelete = employees::find($id);
      $employeeDelete->delete();
      

      return redirect('/employee/manage')->with('message','Deleted successfully.');
  }



}