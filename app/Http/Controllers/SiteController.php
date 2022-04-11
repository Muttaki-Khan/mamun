<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\sites;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index(){
      $projects = DB::table('projects')->get();

      return view('admin.site.siteEntry',['projects'=>$projects]); 
  }
  public function save(Request $request){

      $site = new sites();

  		$site->tender_id = $request->tender_id;
      $site->site_name = $request->site_name;
 
      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/site/entry')->with('message','You don\'t have permssion to add');
      }
      

  		$site->save();
      Alert::success('Success', 'Successfully Added');

      return redirect('/site/entry')->with('message','insert successfully');


  }

  public function manage(){

      $sites = DB::table('sites')   
      ->join('projects','projects.tender_id','=','sites.tender_id')
      ->select('sites.*','projects.project_name') 
      ->paginate(15);
      // ->get();       


      return view('admin.site.siteManage',['sites'=>$sites]); 
  }


  public function singlesite($id){

      $siteById = DB::table('sites_deposits')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('sites.*','categories.categoryName as catName')
                  ->where('sites.id',$id)
                  ->first();
      
      return view('admin.site.singlesite',['site'=>$siteById]); 
  }

  public function edit($id){

    if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/site/manage')->with('message','You don\'t have permssion to update');
    }
     $site= sites::where('id',$id)->first();
     return view('admin.site.siteEdit',['site'=>$site]);
  }
  public function update(Request $request){


    // $site= site::find($request->site_id);
     $site= sites::where('id',$request->site_id)->first();

     $site= sites::find($request->site_id);
     $site->tender_id = $request->tender_id;
     $site->site_name = $request->site_name;

     $site->save();

     return redirect('/site/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $sitePic= sites::where('id',$id)->first();
     if (file_exists($sitePic->pic)) {
       unlink($sitePic->pic);
     }
     
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/site/manage')->with('message','You don\'t have permssion to delete');
    }

     $siteDelete= sites::find($id);
     $siteDelete->delete();
     
     return redirect('/site/manage')->with('message','Deleted successfully');
  }


}
