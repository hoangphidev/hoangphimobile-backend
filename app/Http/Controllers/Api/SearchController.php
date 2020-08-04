<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\News;
use App\Order;

class SearchController extends Controller
{
    function getSearch(Request $request)
    {
    	$key = $request->key;
    	if (strlen($key) == 8) {
    		if ($order = Order::where('id', $key)->first()) {
	    		$order = Order::where('id', $key)->first();
	    		$product = Product::where('id', $order->product_id)->first();
	    		$result = array(
	    			"message" => true,
    				"oder_id" => $order->id,
    				"name" => $order->name,
    				"phone" => $order->phone,
    				"product_name" => $product->name,
    				"price" => $product->price,
    				"description" => $product->rom.'/'.$product->ram.'/'.$product->color,
    				"images" => asset('/upload/photo/'.$product->images),
    				"status" => $order->status,
    				"date" => $order->created_at->format('d/m/Y')
	    		);
	    		return response()->json($result);
    		}else {
    			$arr = array(
	    			"message" => false
	    		);
	    		return response()->json($arr);
    		}
    	}else {
    		$arr = array(
    			"message" => false
    		);
    		return response()->json($arr);
    	}
    }

    function Search(Request $request){
        $key = $request->key;
        // $key = 'iphone';
        $product = Product::where('name','like', '%'.$key.'%')->orWhere('price','like', '%'.$key.'%')->get();
        foreach ($product as $value) {
            $value->images = asset('/upload/photo/'.$value->images);
        }
        return response()->json($product);
    }
}
