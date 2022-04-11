<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\projects;
use App\projects_deposits;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProjectDepositController extends Controller
{
    public function index(){
      $tenders = DB::table('projects')->get();

      return view('admin.projectDeposit.projectEntry',['tenders'=>$tenders]); 
  }
  public function save(Request $request){

      $project = new projects_deposits();

  		$project->tender_id = $request->tender_id;
      $project->deposite_date = $request->deposite_date;
      $project->deposite_by = $request->deposite_by;
      $project->amount = $request->amount;
 

      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/projectDeposit/entry')->with('message','You don\'t have permssion to add');
      }
      
  		$project->save();
      Alert::success('Success', 'Successfully Added');

      return redirect('/projectDeposit/entry')->with('message','insert successfully');


  }

  public function manage(){

      //$projects = projects_deposits::all();  
      $projects = DB::table('projects_deposits')
                  ->join('projects','projects.tender_id','=','projects_deposits.tender_id')
                  ->select('projects_deposits.*', 'projects.project_name')
                  ->paginate(15);
                  // ->get();

      return view('admin.projectDeposit.projectManage',['projects'=>$projects]); 
  }

  public function search(Request $request){
    $projects = DB::table('projects_deposits')
                ->whereBetween('deposite_date', [$request->from_date,$request->to_date])
                ->join('projects','projects.tender_id','=','projects_deposits.tender_id')
                ->select('projects_deposits.*','projects.project_name')
                ->paginate(15);

    return view('admin.projectDeposit.projectManage',['projects'=>$projects]); 
}

 


  public function singleproject($id){

      $projectById = DB::table('projects_deposits')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('projects.*','categories.categoryName as catName')
                  ->where('projects.id',$id)
                  ->first();
      
      return view('admin.projectDeposit.singleproject',['project'=>$projectById]); 
  }

  public function edit($id){
    if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/projectDeposit/manage')->with('message','You don\'t have permssion to update');
    }
     $project= projects_deposits::where('id',$id)->first();
     return view('admin.projectDeposit.projectEdit',['project'=>$project]);
  }
  public function update(Request $request){


    // $project= project::find($request->project_id);
     $projectPic= projects_deposits::where('id',$request->project_id)->first();

     $project= projects_deposits::find($request->project_id);

     $project->tender_id = $request->tender_id ;
     $project->deposite_by = $request->deposite_by ;
     $project->amount = $request->amount;

     $project->save();

     return redirect('/projectDeposit/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $projectPic= projects_deposits::where('id',$id)->first();
     if (file_exists($projectPic->pic)) {
       unlink($projectPic->pic);
     }
     
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/projectDeposit/manage')->with('message','You don\'t have permssion to delete');
    }
     $projectDelete= projects_deposits::find($id);
     $projectDelete->delete();
     
     return redirect('/projectDeposit/manage')->with('message','Deleted successfully');
  }


}
