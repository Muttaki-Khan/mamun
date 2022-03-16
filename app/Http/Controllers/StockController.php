<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stock;
use App\item;

use DB;
class StockController extends Controller
{
  	public function index(){
        $items = DB::table('items')->get();

  		return view('admin.stock.stockEntry',['items'=>$items]);
  }

  	public function save(Request $request){

  		$stocks = new stock();

  		$stocks->item_id = $request->item_id;
  		$stocks->quantity = $request->quantity;  

  		$stocks->save();

  		return redirect('/stock/save')->with('message','Data insert successfully.');



	}
  public function manage(){

      $stocks = DB::table('stocks')->get();

      return view('admin.stock.stockManage',['stocks'=>$stocks]);
  }

  public function edit($id){

      $stock = stock::where('id',$id)->first();
      return view('admin.stock.stockEdit',['stock'=>$stock]);
  }

  public function update(Request $request){

      $stock = stock::find($request->stock_id);

      $stock->item_id = $request->item_id;
      $stock->quantity = $request->quantity;  
    

      $stock->save();

      return redirect('/stock/entry')->with('message','Updated successfully.');

  }

  public function delete($id){

      $stockDelete = stock::find($id);
      $stockDelete->delete();
      

      return redirect('/stock/manage')->with('message','Deleted successfully.');
  }



}