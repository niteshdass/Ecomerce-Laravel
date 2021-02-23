<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AddcartController extends Controller
{
   	public function Add_to_cart(Request $req){
   		$id=$req->product_id;
   		$nam=$req->qty;
   		
   		$info=DB::table('tbl_products')->where('product_id',$id)->first();

   		return view('pages.add_cart');


   	}
}
