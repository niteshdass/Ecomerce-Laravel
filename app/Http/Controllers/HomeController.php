<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
    	$get_all_publish=DB::table('tbl_products')->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')->join('tbl_manufactur','tbl_products.manufacture_id','=','tbl_manufactur.manufacture_id')->select('tbl_products.*','tbl_category.category_name','tbl_manufactur.manufacture_name')->where('tbl_products.publication_status',1)->limit(6)->get();

    	$manage_all_product=view('pages.home_content')->with('get_all_publish',$get_all_publish);

    	return view('layout')->with('pages.home_content',$manage_all_product);
    }



     public function product_show_by_brand($cat_id){
    	$get_all_publish=DB::table('tbl_products')->join('tbl_manufactur','tbl_products.manufacture_id','=','tbl_manufactur.manufacture_id')->select('tbl_products.*','tbl_manufactur.manufacture_name')->where('tbl_products.manufacture_id',$cat_id)->where('tbl_products.publication_status',1)->limit(6)->get();

    	$manage_all_product=view('pages.brands')->with('get_all_publish',$get_all_publish);

    	return view('layout')->with('pages.brands',$manage_all_product);
    }







    public function product_show_by_category($cat_id){

   	$get_all_publish=DB::table('tbl_products')->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')->select('tbl_products.*','tbl_category.category_name')->where('tbl_products.category_id',$cat_id)->where('tbl_products.publication_status',1)->limit(6)->get();

    	$manage_all_product=view('pages.category_product')->with('get_all_publish',$get_all_publish);

    	return view('layout')->with('pages.category_product',$manage_all_product);

    }

    public function product_details($cat_id){
    	$product_details=DB::table('tbl_products')->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')->join('tbl_manufactur','tbl_products.manufacture_id','=','tbl_manufactur.manufacture_id')->select('tbl_products.*','tbl_category.category_name','tbl_manufactur.manufacture_name')->where('tbl_products.product_id',$cat_id)->limit(6)->first();

    	$manage_all_product=view('pages.product_details')->with('product_details',$product_details);

    	return view('layout')->with('pages.product_details',$manage_all_product);



    }
}
