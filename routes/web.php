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

Route::get('/', 'PagesController@getIndex');

route::get('loai-san-pham/{id}/{alias}','PagesController@loaisanpham');
route::get('the-loai/{id}/{alias}','PagesController@theloai');
route::get('lien-he','PagesController@getlienhe');
route::post('lien-he','PagesController@postlienhe');
route::get('mua-hang/{id}/{alias}','PagesController@muahang');
route::get('gio-hang','PagesController@giohang')->name('getcart');
Route::get('gio-hang/update/{id}/{qty}-{dk}','PagesController@getupdatecart');
route::get('xoa-san-pham/{id}','PagesController@xoasanpham');
route::get('cap-nhat/{id}/{qty}','PagesController@capnhat');
route::get('thanh-toan','PagesController@thanhtoan');
Route::post('/cart', 'PagesController@cart');

Route::get('update-cart/{id}/{qty}','PagesController@updatecart');

route::get('admin/login','LoginController@getLogin');
route::post('admin/login','LoginController@postLogin');
route::get('admin/logout','LoginController@getLogout');

route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	route::group(['prefix'=>'cate'],function(){
		route::get('list','CateController@getList');

		route::get('add','CateController@getAdd');
		route::post('add','CateController@postAdd');

		route::get('edit/{id}','CateController@getEdit');
		route::post('edit/{id}','CateController@postEdit');

		route::get('delete/{id}','CateController@getDelete');
	});

	route::group(['prefix'=>'product'],function(){
		route::get('list','ProductController@getList');

		route::get('add','ProductController@getAdd');
		route::post('add','ProductController@postAdd');

		route::get('edit/{id}','ProductController@getEdit');
		route::post('edit/{id}','ProductController@postEdit');

		route::get('delete/{id}','ProductController@getDelete');
	});

	route::group(['prefix'=>'productImage'],function(){
		route::get('list','ProductImageController@getList');

		route::get('add','ProductImageController@getAdd');
		route::post('add','ProductImageController@postAdd');

		route::get('edit/{id}','ProductImageController@getEdit');
		route::post('edit/{id}','ProductImageController@postEdit');

		route::get('delete/{id}','ProductImageController@getDelete');
	});

	route::group(['prefix'=>'user'],function(){
		route::get('list','UserController@getList');

		route::get('add','UserController@getAdd');
		route::post('add','UserController@postAdd');

		route::get('edit/{id}','UserController@getEdit');
		route::post('edit/{id}','UserController@postEdit');

		route::get('delete/{id}','UserController@getDelete');
	});
});

