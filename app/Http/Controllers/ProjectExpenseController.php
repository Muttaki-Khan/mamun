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
      $items = DB::table('items')->get();


      return view('admin.projectExpense.projectEntry',['tenders'=>$tenders,'items'=>$items]); 
  }
  public function save(Request $request){

      $project = new projects_expenses();

  		$project->tender_id = $request->tender_id;
      $project->item_id = $request->item_id;
      $project->payment_date = $request->payment_date;
      $project->quantity = $request->quantity;
      $project->price = $request->price;

  		$project->total = $request->total;
 

  		$project->save();

      return redirect('/projectExpense/entry')->with('message','insert successfully');


  }

  public function manage(){

      $projects = DB::table('projects_expenses')
                //  ->join('projects','projects.tender_id','=','tender_id')
                //  ->select('projects_expenses.*', 'projects.project_name as ten')
                 ->get();


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
     $tenders = DB::table('projects')->get();
     $items = DB::table('items')->get();

     $project= projects_expenses::where('id',$id)->first();
     return view('admin.projectExpense.projectEdit',['project'=>$project,'tenders'=>$tenders,'items'=>$items]);
  }
  public function update(Request $request){


    // $project= project::find($request->project_id);
     $projectPic= projects_expenses::where('id',$request->project_id)->first();

     $project= projects_expenses::find($request->project_id);


     $project->tender_id = $request->tender_id;
     $project->item_id = $request->item_id;
     $project->payment_date = $request->payment_date;
     $project->quantity = $request->quantity;
     $project->price = $request->price;

     $project->total = $request->total;

     $project->save();

     return redirect('/projectExpense/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $projectPic= projects_expenses::where('id',$id)->first();
     if (file_exists($projectPic->pic)) {
       unlink($projectPic->pic);
     }
     


     $projectDelete= projects_expenses::find($id);
     $projectDelete->delete();
     
     return redirect('/projectExpense/manage')->with('message','Deleted successfully');
  }


}
