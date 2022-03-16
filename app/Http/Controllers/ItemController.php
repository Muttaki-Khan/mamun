<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\item;
use DB;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(){

      return view('admin.item.itemEntry'); 
  }
  public function save(Request $request){

      $item = new item();


  		$item->item_name = $request->name;

  		$item->save();

      $lastId = $item->id;
    

      return redirect('/item/entry')->with('message','Item insert successfully');


  }

  public function manage(){

      $items = DB::table('items')
                  ->get();
      
      return view('admin.item.itemManage',['items'=>$items]); 
  }


  public function singleItem($id){

      $itemById = DB::table('items')
                  ->join('categories','categories.id','=','categoryId')
                  ->select('items.*','categories.categoryName as catName')
                  ->where('items.id',$id)
                  ->first();
                 // ->where('categories')
      


      return view('admin.item.singleItem',['item'=>$itemById]); 
  }

  public function editItem($id){


     $item= item::where('id',$id)->first();
     return view('admin.item.itemEdit',['item'=>$item]);
  }
  public function updateItem(Request $request){


     $item= item::find($request->item_id);
     $item->item_name= $request->name;


     $item->save();

     return redirect('/item/manage')->with('message','Update successfully');



  }
  public function deleteItem($id){


    $itemPic= item::where('id',$id)->first();
     if (file_exists($itemPic->pic)) {
       unlink($itemPic->pic);
     }
     


     $itemDelete= item::find($id);
     $itemDelete->delete();
     
     return redirect('/item/manage')->with('message','Deleted successfully');
  }


}
