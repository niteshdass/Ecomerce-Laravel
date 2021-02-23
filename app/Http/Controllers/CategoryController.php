<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use\Http\Requests;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryController extends Controller
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
    	return view('admin.add_category');
    }

    public function all_category(){

        $this->AdminPath();
        $all_category_info=DB::table('tbl_category')->get();
        $manage_category=view('admin.all_category')->with('all_category_info',$all_category_info);
    	return view('admin_layout')->with('admin.all_category',$manage_category);


    }
    
    public function save_category(Request $request){
        $this->AdminPath();
    	$data=array();

    	$data['category_name']=$request->name;
    	$data['category_description']=$request->desc;
    	$data['publication_status']=$request->publication;

    	DB::table('tbl_category')->insert($data);

    	Session::put('messege','data insert succss');

    	return Redirect::to('/add_category');
    

    }
    public function unactive_cat($cat_id){
        $this->AdminPath();
        DB::table('tbl_category')->where('category_id',$cat_id)->update(['publication_status'=> 0]);

        return Redirect::to('/all_category');

    }
    public function active_cat($cat_id){
        $this->AdminPath();
        DB::table('tbl_category')->where('category_id',$cat_id)->update(['publication_status'=> 1]);

        return Redirect::to('/all_category');

    }

    public function edit_category($cat_id){
        $this->AdminPath();


      $all_cat_info=DB::table('tbl_category')->where('category_id',$cat_id)->first();

      $manage_cat=view('admin.edit_category')->with('all_cat_info',$all_cat_info);

      return view('admin_layout')->with('admin.edit_category',$manage_cat);


        
    }

    public function update_category(Request $request, $cat_id){
        $this->AdminPath();
        
        $data=array();
        $data['category_name']=$request->name;
        $data['category_description']=$request->desc;

        DB::table('tbl_category')->where('category_id',$cat_id)->update($data);

        Session::get('messege','category update successfully');

        return Redirect::to('/all_category');

        
    }

    public function delete_category($category_id){
        $this->AdminPath();
        
        DB::table('tbl_category')->where('category_id',$category_id)->delete();

        Session::get('messege','data has been deleted');

        return Redirect::to('/all_category');

        
    }
}
