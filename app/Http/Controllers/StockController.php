<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\stocks;
use App\item;
use App\User;
use DB;
class StockController extends Controller
{
  	public function index(){
        $items = DB::table('items')->get();

  		return view('admin.stock.stockEntry',['items'=>$items]);
  }

  	public function save(Request $request){

      if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/stock/entry')->with('message','You don\'t have permssion to add');
      }
      if($request->quantity<0) {
        Alert::error('Error', 'Please enter a valid amount');
        return redirect('/stock/manage');
      }
  		$stocks = new stocks();
      $stockRow  = stocks::where('item_id',$request->item_id)->first();


      if($stockRow !=null){
        $stockRow = stocks::find($stockRow->id);
        $stockRow->quantity = $stockRow->quantity+$request->quantity;
        $stockRow->save();
      }else{
        $stocks->item_id = $request->item_id;
        $stocks->quantity = $request->quantity;
        $stocks->save();
      }
   
  		
      Alert::success('Success', 'Successfully Added');

  		return redirect('/stock/manage')->with('message','Data insert successfully.');



	}
  public function manage(){

      $stocks = DB::table('stocks')
                  ->join('items','items.id','=','stocks.item_id')
                  ->select('stocks.*','items.item_name')
                  ->paginate(15);
                  // ->get();

      return view('admin.stock.stockManage',['stocks'=>$stocks]);
  }

  public function edit($id){
    $items = item::all();

    if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/stock/manage')->with('message','You don\'t have permssion to update');
      }
      $stock = stocks::where('id',$id)->first();
      return view('admin.stock.stockEdit',['stock'=>$stock,'items'=>$items]);
  }

  public function update(Request $request){

      $stock = stocks::find($request->stock_id);

      $stock->item_id = $request->item_id;
      $stock->quantity = $request->quantity;  
    

      $stock->save();

      return redirect('/stock/entry')->with('message','Updated successfully.');

  }

  public function delete($id){

    if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/stock/manage')->with('message','You don\'t have permssion to delete');
      }
      $stockDelete = stocks::find($id);

      $stockDelete->delete();
      

      return redirect('/stock/manage')->with('message','Deleted successfully.');
  }



}