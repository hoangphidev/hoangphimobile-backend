<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use App\Product;
use App\Brand;

class BrandController extends Controller
{
    public function getBrand(){
    	$brand = Brand::all();
        foreach ($brand as $value) {
            $value->images = asset('/upload/brand/'.$value->images);
        }
    	return response()->json($brand);
    }

    public function getProductByBrandID($brand_id){
    	$product = Product::where('brand_id', $brand_id)->get();
    	if (Product::where('brand_id', $brand_id)->first()) {
            foreach ($product as $value) {
                $value->images = asset('/upload/photo/'.$value->images);
            }
    		return response()->json($product);
    	}else {
	    	return response()->json([
	    		'error' => true,
	    		'status' => 401,
	    		'message' => 'Not found product'
	    	]);
    	}
    }
}
