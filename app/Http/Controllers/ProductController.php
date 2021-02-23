<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use\Http\Requests;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
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
    	return view('admin.products.add_product');
    }


//view product

	public function all_product(){
        $this->AdminPath();

		$all_product_info=DB::table('tbl_products')->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')->join('tbl_manufactur','tbl_products.manufacture_id','=','tbl_manufactur.manufacture_id')->select('tbl_products.*','tbl_category.category_name','tbl_manufactur.manufacture_name')->get();
        $manage_category=view('admin.products.all_product')->with('all_product_info',$all_product_info);
    	return view('admin_layout')->with('admin.products.all_product',$manage_category);

	    }
	    public function delete_product($product_id){
            $this->AdminPath();
		$all_product_info=DB::table('tbl_products')->where('product_id',$product_id)->delete();
        Session::put('messege','product delete success fully');
    	return Redirect::to('/all_product');

	    }


    public function save_product(Request $request){
        $this->AdminPath();

    	$data=array();

    	$data['product_name']=$request->product_name;
    	$data['category_id']=$request->category_id;
    	$data['manufacture_id']=$request->manufacture_id;
    	$data['product_short_description']=$request->product_short_desc;
    	$data['product_long_description']=$request->product_long_desc;
    	$data['product_price']=$request->product_price;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
    	$data['publication_status']=$request->product_publication;
    	$image=$request->file('product_image');

    	if($image){
    		$image_name=str_random(20);
    		$ext=strtolower($image->getClientOrginalExtension());

    		$image_full_name=$image_name.'.'.$ext;

    		$upload_path='image/';
    		$image_url=$upload_path.$image_full_name;

    		$success=$image->move($upload_path,$image_full_name);

    		if($success){
    			$data['product_image']=$image_url;
    			$add_all_product=DB::table('tbl_products')->insert($data);

    	Session::put('messege','Product insert success fully');

    	return Redirect::to('/add_product');

    		}
    	}

    	$add_all_product=DB::table('tbl_products')->insert($data);

    	Session::put('messege','Product insert success fully');

    	return Redirect::to('/add_product');
    }
}
