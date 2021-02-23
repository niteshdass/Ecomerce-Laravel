<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index(){
    	return view('admin.admin_login');
    }
    
    public function dashbord(Request $req){
    	$name=$req->admin_email;
    	$pass=$req->admin_password;

    	$result=DB::table('tbl_admin')
    		->where('admin_email',$name)
    		->where('admin_password',$pass)
    		->first();
    		if($result){
    			session::put('admin_name',$result->admin_name);
    			session::put('admin_id',$result->admin_id);
    			return Redirect::to('/dashbord');
    		}else{
    			session::put('messege','Email or Password is Invalid');

    			return Redirect::to('/admin');
    		}
    }
}
