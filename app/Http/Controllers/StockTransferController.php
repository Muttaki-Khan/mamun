<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\stock_transfers;
use App\stocks;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class stockTransferController extends Controller
{
    public function index(){
      $tenders = DB::table('projects')->get();
      $sites = DB::table('sites')->get();
      $items = DB::table('items')->get();
      return view('admin.stockTransfer.stockTransferEntry',['tenders'=>$tenders,'sites'=>$sites,'items'=>$items]); 
  }
  public function save(Request $request){

      $stockGet = DB::table('stocks')->where('item_id',$request->item_id)->first();
      if($stockGet == null) {
        Alert::error('Error', 'We don\'t have this item in stock');
        return redirect('/stockTransfer/entry');
      }
      $stocks = stocks::find($stockGet->id);
      if($request->quantity<0) {
        Alert::error('Error', 'Please enter a valid amount');
        return redirect('/stockTransfer/entry');
      }
      if($stocks->quantity < $request->quantity) {
        Alert::error('Error', 'You\'re trying to transfer more than current stock.');
        return redirect('/stockTransfer/entry');
      }
      $stockTransfer = new stock_transfers();

     // dd($request);


      $stockTransfer->tender_id = $request->tender_id;
      $stockTransfer->site_id = $request->site_id;
      $stockTransfer->transfer_date = $request->transfer_date;
      $stockTransfer->item_id = $request->item_id;
      $stockTransfer->quantity = $request->quantity;

      $stocks->quantity = $stocks->quantity-$request->quantity;
 
      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/stockTransfer/entry')->with('message','You don\'t have permssion to add');
      }
      
      $stocks->save();
  		$stockTransfer->save();
      Alert::success('Success', 'Successfully Added');

      return redirect('/stockTransfer/entry')->with('message','insert successfully');


  }

  public function manage(){

      $stockTransfer = DB::table('stock_transfers')   
              ->join('projects','projects.tender_id','=','stock_transfers.tender_id')
              ->join('sites','sites.id','=','stock_transfers.site_id')
              ->join('items','items.id','=','stock_transfers.item_id')
              ->select('stock_transfers.*','projects.project_name','sites.site_name','items.item_name') 
              ->paginate(10);
              // ->get();       


      return view('admin.stockTransfer.stockTransferManage',['stockTransfer'=>$stockTransfer]); 
  }

  public function search(Request $request){
    $stockTransfer = DB::table('stock_transfers')  
            ->whereBetween('transfer_date', [$request->from_date,$request->to_date]) 
            ->join('projects','projects.tender_id','=','stock_transfers.tender_id')
            ->join('sites','sites.id','=','stock_transfers.site_id')
            ->join('items','items.id','=','stock_transfers.item_id')
            ->select('stock_transfers.*','projects.project_name','sites.site_name','items.item_name') 
            ->paginate(10);
            // ->get();       


return view('admin.stockTransfer.stockTransferManage',['stockTransfer'=>$stockTransfer]); 

  }


  public function singlestockTransfer($id){

      $stockTransferById = DB::table('stockTransfers_deposits')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('stockTransfers.*','categories.categoryName as catName')
                  ->where('stockTransfers.id',$id)
                  ->first();
      
      return view('admin.stockTransfer.singlestockTransfer',['stockTransfer'=>$stockTransferById]); 
  }

  public function edit($id){
    $tenders = DB::table('projects')->get();
    $sites = DB::table('sites')->get();
    $items = DB::table('items')->get();
    if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/stockTransfer/manage')->with('message','You don\'t have permssion to update');
    }
     $stockTransfer= stock_transfers::where('id',$id)->first();
     return view('admin.stockTransfer.stockTransferEdit',['tenders'=>$tenders,'stockTransfer'=>$stockTransfer,'sites'=>$sites,'items'=>$items]);
  }
  public function update(Request $request){

    $stockGet = DB::table('stocks')->where('item_id',$request->item_id)->first();
      if($stockGet == null) {
        Alert::error('Error', 'We don\'t have this item in stock');
        return redirect('/stockTransfer/manage');
      }
      $stocks = stocks::find($stockGet->id);

    // $stockTransfer= stockTransfer::find($request->stockTransfer_id);
     $stockTransfer= stock_transfers::where('id',$request->stockTransfer_id)->first();

     $stockTransfer= stock_transfers::find($request->stockTransfer_id);
     $difference = $request->quantity - $stockTransfer->quantity;
     if($request->quantity<0) {
      Alert::error('Error', 'Please enter a valid amount');
      return redirect('/stockTransfer/manage');
    }
     if($stocks->quantity < $difference) {
        Alert::error('Error', 'You\'re trying to transfer more than current stock.');
        return redirect('/stockTransfer/manage');
      }
     $stockTransfer->transfer_date = $request->transfer_date;
     
     $stockTransfer->quantity = $stockTransfer->quantity + $difference;
     $stocks->quantity = $stocks->quantity - $difference;

     $stocks->save();
     $stockTransfer->save();

     return redirect('/stockTransfer/manage')->with('message','Update successfully');


  }
  public function delete($id){


    $stockTransferPic= stock_transfers::where('id',$id)->first();
     if (file_exists($stockTransferPic->pic)) {
       unlink($stockTransferPic->pic);
     }
     
     if(User::where('id',Auth::id())->first()->role_id!=1) {
      return redirect('/stockTransfer/manage')->with('message','You don\'t have permssion to delete');
    }

     $stockTransferDelete= stock_transfers::find($id);
     $stockTransferDelete->delete();
     
     return redirect('/stockTransfer/manage')->with('message','Deleted successfully');
  }


}
