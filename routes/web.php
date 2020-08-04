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
    return redirect('admin/home');
});

Route::get('login','Admin\AdminLoginController@getLogin');
Route::post('admin-login','Admin\AdminLoginController@postLogin');
Route::get('logout','Admin\AdminLoginController@outLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function(){

	Route::get('home','Admin\HomeController@getDashboard')->name('home');

	Route::get('myacount','Admin\HomeController@getAcount')->name('myacount');
	Route::post('myacount','Admin\HomeController@postAcount');

	Route::get('changepass','Admin\HomeController@getChangePass')->name('changepass');
	Route::post('changepass','Admin\HomeController@postChangePass');

	Route::get('404','Admin\HomeController@get404')->name('404');

	Route::group(['prefix' => 'banner', 'middleware' => 'banner'],function(){
		Route::get('/','Admin\BannerController@getListBanner')->name('listbanner');
		Route::get('addbanner','Admin\BannerController@getAddBanner');
		Route::post('addbanner','Admin\BannerController@postAddBanner');
		Route::get('editbanner/{id}','Admin\BannerController@getEditBanner');
		Route::post('editbanner/{id}','Admin\BannerController@postEditBanner');
		Route::delete('delete-multiple-banner', ['as'=>'banner.multiple-delete','uses'=>'Admin\BannerController@deleteMultiple']);
	});

	Route::group(['prefix' => 'news', 'middleware' => 'news'],function(){
		Route::get('/','Admin\NewsController@getListNews')->name('listnews');
		Route::get('addnews','Admin\NewsController@getAddNews');
		Route::post('addnews','Admin\NewsController@postAddNews');
		Route::get('editnews/{id}','Admin\NewsController@getEditNews');
		Route::post('editnews/{id}','Admin\NewsController@postEditNews');
		Route::delete('delete-multiple-news', ['as'=>'news.multiple-delete','uses'=>'Admin\NewsController@deleteMultiple']);
	});

	Route::group(['prefix' => 'brand', 'middleware' => 'brand'],function(){
		Route::get('/','Admin\BrandController@getListBrand')->name('listbrand');
		Route::get('addbrand','Admin\BrandController@getAddBrand');
		Route::post('addbrand','Admin\BrandController@postAddBrand');
		Route::get('editbrand/{id}','Admin\BrandController@getEditBrand');
		Route::post('editbrand/{id}','Admin\BrandController@postEditBrand');
		Route::delete('delete-multiple-brand', ['as'=>'brand.multiple-delete','uses'=>'Admin\BrandController@deleteMultiple']);
	});

	Route::group(['prefix' => 'order'],function(){
		Route::get('listorder','Admin\OdrerController@getOrder')->name('listorder')->middleware('listorder');
		Route::get('listdelivery','Admin\OdrerController@getDelivery')->name('listdelivery')->middleware('listdelivery');
		Route::get('listshipped','Admin\OdrerController@getShipped')->middleware('lisshipped');

		Route::get('orderdetail/delivery/{id}','Admin\OdrerController@deliveryOrder');
		Route::get('orderdetail/delivered/{id}','Admin\OdrerController@deliveredOrder');
		Route::get('orderdetail/cancelorder/{id}','Admin\OdrerController@cancelOrder');

		Route::get('orderdetail/{id}','Admin\OdrerController@getDetailOrder');
	});

	Route::group(['prefix'=>'product', 'middleware' => 'product'], function(){
		Route::get('/','Admin\ProductController@getProduct')->name('listproduct');

		Route::get('addproduct','Admin\ProductController@getAddProduct');
		Route::post('addproduct','Admin\ProductController@postAddProduct');

		Route::get('editproduct/{id}','Admin\ProductController@editProduct');
		Route::post('editproduct/{id}','Admin\ProductController@postEditProduct');

		Route::delete('delete-multiple-product', ['as'=>'product.multiple-delete','uses'=>'Admin\ProductController@deleteMultiple']);
	});

	Route::group(['prefix' => 'employee', 'middleware' => 'employee'], function(){
		Route::get('/','Admin\EmployeeController@getListEmployee')->name('listemployee');

		Route::get('addemployee','Admin\EmployeeController@getAddEmployee');
		Route::post('addemployee','Admin\EmployeeController@postAddEmployee');

		Route::get('editemployee/{id}','Admin\EmployeeController@getEditEmployee')->name('editemployee');
		Route::post('editemployee/{id}','Admin\EmployeeController@postEditEmployee');

		Route::get('changepass/{id}','Admin\EmployeeController@changePass');
		Route::post('changepass/{id}','Admin\EmployeeController@postChangePass');

		Route::get('block/{id}','Admin\EmployeeController@blockUser');

		Route::delete('delete-multiple-employee', ['as'=>'employee.multiple-delete','uses'=>'Admin\EmployeeController@deleteMultiple']);
	});

});

View::composer('*', function($view){
	$info = Auth::user();
    $view->with('userLogin', $info);
});
