<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class SuperAdminController extends Controller
{

	public function show_dashbord(){
		$this->AdminPath();
    	return view('admin.dashbord');
    }



    public function logout(){

    	Session::flush();

    	return Redirect::to('/admin');

    }

    public function AdminPath(){
    	$admin_name=Session::get('admin_name');

    	if($admin_name){
    		return ;
    	}else{
    		return Redirect::to('/admin')->send();
    	}
    }
}
