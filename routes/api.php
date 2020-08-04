<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getbanner','Api\BannerController@getBanner');
Route::get('getbanner/{id}','Api\BannerController@getBannerByID');

Route::get('getbrand','Api\BrandController@getBrand');
Route::get('getproductbybrandid/{brand_id}','Api\BrandController@getProductByBrandID');

Route::get('getlatestproduct','Api\ProductController@getLatestProduct');
Route::get('gethotproduct','Api\ProductController@getHostProduct');
Route::get('getofferproduct','Api\ProductController@getOfferProduct');

Route::get('getproduct/{product_id}','Api\ProductController@getProduct');

Route::post('order','Api\OdrerController@postOrder');
// Route::post('search','Api\SearchController@getSearch');
Route::post('search','Api\SearchController@Search');

Route::get('listprovince','Api\AddressController@listProvince');
Route::get('listdistrict/{province_id}','Api\AddressController@listDistrict');
Route::get('listwards/{district}','Api\AddressController@listWards');

Route::get('getlastnews','Api\NewsController@getLastNews');
Route::get('gettopnews','Api\NewsController@getTopNews');
Route::get('getoffernews','Api\NewsController@getOfferNews');
Route::get('postview/{id}','Api\NewsController@postView');
