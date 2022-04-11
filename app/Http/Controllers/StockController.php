<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\stock;
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


  		$stocks = new stock();

  		$stocks->item_id = $request->item_id;
  		$stocks->quantity = $request->quantity;  

          if(User::where('id',Auth::id())->first()->role_id!=1) {
            return redirect('/stock/entry')->with('message','You don\'t have permssion to add');
          }
          
  		$stocks->save();
        Alert::success('Success', 'Successfully Added');

  		return redirect('/stock/entry')->with('message','Data insert successfully.');



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
      $stock = stock::where('id',$id)->first();
      return view('admin.stock.stockEdit',['stock'=>$stock,'items'=>$items]);
  }

  public function update(Request $request){

      $stock = stock::find($request->stock_id);

      $stock->item_id = $request->item_id;
      $stock->quantity = $request->quantity;  
    

      $stock->save();

      return redirect('/stock/entry')->with('message','Updated successfully.');

  }

  public function delete($id){

    if(User::where('id',Auth::id())->first()->role_id!=1) {
        return redirect('/stock/manage')->with('message','You don\'t have permssion to delete');
      }
      $stockDelete = stock::find($id);
      $stockDelete->delete();
      

      return redirect('/stock/manage')->with('message','Deleted successfully.');
  }



}