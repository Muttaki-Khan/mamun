<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\projects;
use App\projects_expenses;
use DB;
use Illuminate\Support\Facades\Auth;

class ProjectExpenseController extends Controller
{
    public function index(){

      $tenders = DB::table('projects')->get();

      return view('admin.projectExpense.projectEntry',['tenders'=>$tenders]); 
  }
  public function save(Request $request){

      $project = new project();

  		$project->project_name = $request->project_name ;
  		$project->tender_id = $request->tender_id;
      $project->tenders = $request->tender_id;
      $project->item_id = $request->item_id;
      $project->payment_date = $request->payment_date;
      $project->quantity = $request->quantity;
      $project->price = $request->price;

  		$project->total = $request->total;
 

  		$project->save();

      return redirect('/projectExpense/entry')->with('message','project insert successfully');


  }

  public function manage(){

      $projects = projects_expenses::all();      


      return view('admin.projectExpense.projectManage',['projects'=>$projects]); 
  }


  public function singleproject($id){

      $projectById = DB::table('projects_expenses')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('projects.*','categories.categoryName as catName')
                  ->where('projects.id',$id)
                  ->first();
      
      return view('admin.projectExpense.singleproject',['project'=>$projectById]); 
  }

  public function edit($id){


     $project= project::where('id',$id)->first();
     return view('admin.projectExpense.projectEdit',['project'=>$project]);
  }
  public function update(Request $request){


    // $project= project::find($request->project_id);
     $projectPic= project::where('id',$request->project_id)->first();

     $project= project::find($request->project_id);

     $project->project_name = $request->project_name ;
     $project->tender_id = $request->tender_id;
     $project->estimate_cost = $request->estimate_cost;

     $project->save();

     return redirect('/projectExpense/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $projectPic= project::where('id',$id)->first();
     if (file_exists($projectPic->pic)) {
       unlink($projectPic->pic);
     }
     


     $projectDelete= project::find($id);
     $projectDelete->delete();
     
     return redirect('/projectExpense/manage')->with('message','Deleted successfully');
  }


}
