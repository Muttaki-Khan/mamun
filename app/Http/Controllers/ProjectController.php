<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\projects;
use App\project;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(){

      return view('admin.project.projectEntry'); 
  }
  public function save(Request $request){

      $project = new projects();

  		$project->project_name = $request->project_name ;
  		$project->tender_id = $request->tender_id;
  		$project->estimate_cost = $request->estimate_cost;
 
      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/project/entry')->with('message','You don\'t have permssion to add');
      }
      

  		$project->save();
      Alert::success('Success', 'Successfully Added');

      return redirect('/project/entry')->with('message','project insert successfully');


  }

  public function manage(){

      // $projects = projects::all(); 
      $projects = DB::table('projects')->paginate(15);           

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

    if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/project/manage')->with('message','You don\'t have permssion to update');
    }
     $project= projects::where('id',$id)->first();
     return view('admin.project.projectEdit',['project'=>$project]);
  }
  public function update(Request $request){


    // $project= project::find($request->project_id);
     $projectPic= projects::where('id',$request->project_id)->first();

     $project= projects::find($request->project_id);

     $project->project_name = $request->project_name ;
     $project->tender_id = $request->tender_id;
     $project->estimate_cost = $request->estimate_cost;

     $project->save();

     return redirect('/project/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $projectPic= projects::where('id',$id)->first();
     if (file_exists($projectPic->pic)) {
       unlink($projectPic->pic);
     }
     
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/project/manage')->with('message','You don\'t have permssion to delete');
    }

     $projectDelete= projects::find($id);
     $projectDelete->delete();
     
     return redirect('/project/manage')->with('message','Deleted successfully');
  }


}
