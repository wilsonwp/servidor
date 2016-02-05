<?php

namespace futboleros\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use futboleros\Http\Requests;
use futboleros\Http\Controllers\Controller;
use Html;
use Redirect;
class BackendController extends Controller
{
    public function __construct() {
        $this->middleware('auth',['only'=>'admin']);
    }
 
     public function index()
    {
       if(!empty(Auth::user())){
           return Redirect::to('/admin');
       }else{
          return view('index');  
       }
      
    }
    
    //metodo de panel de control
    
     public function admin()
    {
       return view('admin');
    }
    
    
    
}
