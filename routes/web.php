<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend
Route::get('/','HomeController@index' );
Route::get('/category-products/{cat_id}','HomeController@product_show_by_category');
Route::get('/brands_products/{cat_id}','HomeController@product_show_by_brand');
Route::get('/product_details/{cat_id}','HomeController@product_details');

//cart
Route::post('/add_to_cart','AddcartController@Add_to_cart');













//backend

Route::get('/admin','AdminController@index');
Route::get('/dashbord','SuperAdminController@show_dashbord');
Route::get('/logout','SuperAdminController@logout');
Route::post('/admin-dashbord','AdminController@dashbord');


//category
Route::get('/add_category','CategoryController@index');
Route::get('/all_category','CategoryController@all_category');
Route::get('/unactive_cat/{cat_id}','CategoryController@unactive_cat');
Route::get('/active_cat/{cat_id}','CategoryController@active_cat');
Route::get('/edit_category/{cat_id}','CategoryController@edit_category');
Route::get('/delete_category/{category_id}','CategoryController@delete_category');
Route::post('/save_category','CategoryController@save_category');
Route::post('/update_category/{cat_id}','CategoryController@update_category');


//add_manufacture 

Route::get('/add_manufacture','ManufactureController@index');
Route::get('/all_manufacture','ManufactureController@all_manufacture');
Route::get('/delete_manufacture/{manu_id}','ManufactureController@delete_manufactur');
Route::get('/unactive_menufacture/{manu_id}','ManufactureController@unactive_menufacture');
Route::get('/active_menufacture/{manu_id}','ManufactureController@active_menufacture');
Route::get('/edit_manufacture/{manu_id}','ManufactureController@edit_manufacture');
Route::post('/save_manufacture','ManufactureController@add_manufacture');
Route::post('/update_manufacture/{manu_id}','ManufactureController@update_manufacture');


//add_product

Route::get('/add_product','ProductController@index');
Route::get('/all_product','ProductController@all_product');
Route::get('/delete_product/{product_id}','ProductController@delete_product');
Route::post('/save_product','ProductController@save_product');

