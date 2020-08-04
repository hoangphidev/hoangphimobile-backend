<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\News;

class NewsController extends Controller
{
    public function getLastNews()
    {
    	$news = News::orderBy('id','DESC')->take(5)->get();
    	foreach ($news as $value) {
	    	$brand = Brand::where('id',$value->brand_id)->get();
	    	foreach ($brand as $br) {
	    		$path = $br->url.'/';
    			$value->images = asset('/upload/news/'.$path.$value->images);
	    	}
    	}
    	return response()->json($news);
    }

    public function getTopNews()
    {
    	$news = News::where('view','>',0)->orderBy('view','DESC')->take(3)->get();
    	foreach ($news as $value) {
	    	$brand = Brand::where('id',$value->brand_id)->get();
	    	foreach ($brand as $br) {
	    		$path = $br->url.'/';
    			$value->images = asset('/upload/news/'.$path.$value->images);
	    	}
    	}
    	return response()->json($news);
    }

    public function getOfferNews()
    {
    	$news = News::inRandomOrder()->take(5)->get();
    	foreach ($news as $value) {
	    	$brand = Brand::where('id',$value->brand_id)->get();
	    	foreach ($brand as $br) {
	    		$path = $br->url.'/';
    			$value->images = asset('/upload/news/'.$path.$value->images);
	    	}
    	}
    	return response()->json($news);
    }

    public function postView($id){
    	if (!News::where('id', $id)->first()){
    		return response()->json([
	    		'error' => true
	    	]);
    	}else {
	    	$news = News::find($id);
	    	$view = $news->view;
	    	$view += 1;
	    	$news->view = $view;
	    	$news->save();
	    	return response()->json([
	    		'error' => false,
	    		'view' =>$news->view
	    	]);
    	}
    }
}
