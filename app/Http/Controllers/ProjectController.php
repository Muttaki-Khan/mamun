<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;
use DB;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(){

      return view('admin.project.projectEntry'); 
  }
  public function save(Request $request){

      $project = new project();

  		$project->project_name = $request->project_name ;
  		$project->tender_id = $request->tender_id;
  		$project->estimate_cost = $request->estimate_cost;
 

  		$project->save();

      return redirect('/project/entry')->with('message','project insert successfully');


  }

  public function manage(){

      $projects = project::all();      


      return view('admin.project.projectManage',['projects'=>$projects]); 
  }


  public function singleproject($id){

      $projectById = DB::table('projects')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('projects.*','categories.categoryName as catName')
                  ->where('projects.id',$id)
                  ->first();
      
      return view('admin.project.singleproject',['project'=>$projectById]); 
  }

  public function edit($id){


     $project= project::where('id',$id)->first();
     return view('admin.project.projectEdit',['project'=>$project]);
  }
  public function update(Request $request){


    // $project= project::find($request->project_id);
     $projectPic= project::where('id',$request->project_id)->first();

     $project= project::find($request->project_id);

     $project->project_name = $request->project_name ;
     $project->tender_id = $request->tender_id;
     $project->estimate_cost = $request->estimate_cost;

     $project->save();

     return redirect('/project/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $projectPic= project::where('id',$id)->first();
     if (file_exists($projectPic->pic)) {
       unlink($projectPic->pic);
     }
     


     $projectDelete= project::find($id);
     $projectDelete->delete();
     
     return redirect('/project/manage')->with('message','Deleted successfully');
  }


}
