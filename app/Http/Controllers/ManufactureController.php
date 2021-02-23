<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\Http\Requests;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();
class ManufactureController extends Controller
{

    public function AdminPath(){
        $admin_name=Session::get('admin_name');

        if($admin_name){
            return ;
        }else{
            return Redirect::to('/admin')->send();
        }
    }



    public function index(){
        $this->AdminPath();
    	return view('admin.brand.add_manufacture');
    }



     public function all_manufacture(){
        $this->AdminPath();

     	$all_category_info=DB::table('tbl_manufactur')->get();
        $manage_category=view('admin.brand.all_manufacture')->with('all_category_info',$all_category_info);
    	return view('admin_layout')->with('admin.brand.all_manufacture',$manage_category);


    }

//edit manufacture

    public function edit_manufacture($manu_id){
        $this->AdminPath();

     	$all_category_info=DB::table('tbl_manufactur')->where('manufacture_id',$manu_id)->first();
        $manage_category=view('admin.brand.edit_manufacture')->with('all_category_info',$all_category_info);
    	return view('admin_layout')->with('admin.brand.edit_manufacture',$manage_category);




    }

//delete

    public function delete_manufactur($manu_id){
        $this->AdminPath();

     	DB::table('tbl_manufactur')->where('manufacture_id',$manu_id)->delete();

     	Session::put('messege','data delete successfully');

     	return Redirect::to('/all_manufacture');


    }

//unactive
    public function unactive_menufacture($manu_id){
        $this->AdminPath();

     	DB::table('tbl_manufactur')->where('manufacture_id',$manu_id)->update(['publication_status'=>0]);

     	Session::put('messege','data unactive successfully');

     	return Redirect::to('/all_manufacture');


    }

//active

    public function active_menufacture($manu_id){
        $this->AdminPath();

     	DB::table('tbl_manufactur')->where('manufacture_id',$manu_id)->update(['publication_status'=>1]);

     	Session::put('messege','data active successfully');

     	return Redirect::to('/all_manufacture');


    }

//update

    public function update_manufacture(Request $request,$manu_id){
        $this->AdminPath();


    	$data['manufacture_name']=$request->name;
    	$data['manufacture_description']=$request->desc;
    	

     	DB::table('tbl_manufactur')->where('manufacture_id',$manu_id)->update($data);

     	Session::put('messege','data active successfully');

     	return Redirect::to('/all_manufacture');


    }



    public function add_manufacture(Request $request){
        $this->AdminPath();
    	$data=array();

    	$data['manufacture_name']=$request->name;
    	$data['manufacture_description']=$request->desc;
    	$data['publication_status']=$request->publication;

    	DB::table('tbl_manufactur')->insert($data);

    	Session::put('messege','data insert succss');

    	return Redirect::to('/add_manufacture');



    }
}
