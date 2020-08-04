<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use App\Product;
use App\Brand;
use Carbon\Carbon;

class ProductController extends Controller
{
	public function getLatestProduct()
    {
    	$product = Product::where('count', '>', 0)->orderBy('id','desc')->limit(10)->get();
        foreach ($product as $value) {
            $value->images = asset('/upload/photo/'.$value->images);
        }
    	return response()->json($product);
    }

    public function getHostProduct()
    {
        $product = Product::where('sale', '>', 0)->whereMonth('updated_at', Carbon::now()->month)->orderBy('sale','desc')->limit(10)->get();
        foreach ($product as $value) {
            $value->images = asset('/upload/photo/'.$value->images);
        }
        return response()->json($product);
    }

    public function getOfferProduct()
    {
        $product = Product::where('count', '>', 0)->inRandomOrder()->limit(10)->get();
        foreach ($product as $value) {
            $value->images = asset('/upload/photo/'.$value->images);
        }
        return response()->json($product);
    }

    public function getProduct($product_id){
        $product = Product::where('id', $product_id)->get();
        if (Product::where('id', $product_id)->first()) {
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
