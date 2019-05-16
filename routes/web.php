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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group( function (){
	Route::prefix('category/')->group(function(){
		Route::get("list",'CategoryController@index');
		Route::post("add/",'CategoryController@create');
		Route::get("show/{id}",'CategoryController@show');
		Route::get("dataCate/",'CategoryController@datatableCategory')->name("datatableCategory");
		Route::get('edit/{id}','CategoryController@edit');
		Route::post("update/",'CategoryController@update');

	});
	Route::prefix('news/')->group(function(){
		Route::get("list/",'NewsController@index');
		Route::post("add/",'NewsController@create');
		Route::delete("delete/{id}",'NewsController@destroy');
		Route::get("edit/{id}",'NewsController@edit');
		Route::post("update",'NewsController@update');
		Route::get("show/{id}",'NewsController@show');
		Route::get("dataNew/",'NewsController@datatableNew')->name("datatableNew");
	});
	Route::prefix('product/')->group(function(){
		
		Route::get("list",'ProductController@index');
		Route::post("add/",'ProductController@create');
		Route::get("dataProduct/",'ProductController@datatableProduct')->name("datatableProduct");
		Route::post("upload",'ProductController@upload');
		Route::get("edit/{id}",'ProductController@edit');
		Route::post("update",'ProductController@update');
		Route::get("getImage/{id}",'ProductController@getImage');
		Route::delete("delImg/{id}",'ProductController@delImg');
		Route::post("status/",'ProductController@status');
	});
	Route::prefix('sale/')->group(function(){

		Route::get("list",'OrderController@list');
		Route::get("anyway",'OrderController@anyway');
		Route::get("status/{id}",'OrderController@status');
		Route::post("update",'OrderController@statusUpdate');
		Route::get("detailOr/{id}",'OrderController@detailOr');
		Route::get("customer/{id}",'OrderController@customer');

	});
	Route::prefix('statistic/')->group(function(){
		Route::get("list",'StatistController@index');
	});
});
Route::prefix('shop/')->group(function(){
	Route::get("list/{lag}",'ShopController@index');
	Route::get("detail/{id}/{lag}",'ShopController@detail');
	Route::post("cart","ShopController@cart");
	Route::get("viewCart","ShopController@viewCart");
	Route::delete("delete/{id}","ShopController@delete");
	Route::post("order","ShopController@order");
	Route::get("category/{slug}/{lag}","ShopController@category");
	Route::get("new/{slug}/{lag}","ShopController@new");
	Route::post('lang','ShopController@lang');
	Route::post('url','ShopController@url');
});