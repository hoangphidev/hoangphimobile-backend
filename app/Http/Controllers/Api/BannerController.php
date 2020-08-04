<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;

class BannerController extends Controller
{
    public function getBanner(){
    	$banner = Banner::inRandomOrder()->limit(5)->get();
        foreach ($banner as $value) {
            $value->images = asset('/upload/banner/'.$value->images);
        }
    	return response()->json($banner);
    }

    public function getBannerByID($banner_id){
        $banner = Banner::where('id',$banner_id)->get();
        if (Banner::where('id',$banner_id)->first()) {
            foreach ($banner as $value) {
                $value->images = asset('/upload/banner/'.$value->images);
            }
        	return response()->json($banner);
        }else {
        	return response()->json([
                'message' => 'Not found banner'
            ]);
        }
    }
}
