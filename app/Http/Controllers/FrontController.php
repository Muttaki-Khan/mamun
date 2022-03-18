<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;
use App\staffs;
use App\item;
use App\about;
use App\category;
use App\exhibition;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
Auth::routes();
use Illuminate\Support\Facades\Route; 
use Session;

class FrontController extends Controller
{
    public function index(){

        return view('frontView.home.homeContent');
      
    }

    
}
