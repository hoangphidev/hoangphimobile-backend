<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Province;
use App\District;
use App\Ward;


class AddressController extends Controller
{
    public function listProvince(){
    	$province = Province::all();
    	return response()->json($province);
    }

    public function listDistrict($province_id){
        $district = District::where('province_id', $province_id)->get();
        if (District::where('province_id', $province_id)->first()) {
        	foreach ($district as $value) {
        		$value->district_name = mb_convert_case($value->district_name,MB_CASE_TITLE);
        	}
            return response()->json($district);
        }else {
            return response()->json([
                'error' => true,
                'status' => 401,
                'message' => 'Not found district'
            ]);
        }
    }

    public function listWards($district_id){
        $wards = Ward::where('district_id', $district_id)->get();
        if (Ward::where('district_id', $district_id)->first()) {
        	foreach ($wards as $value) {
        		$value->ward_name = mb_convert_case($value->ward_name,MB_CASE_TITLE);
        	}
            return response()->json($wards);
        }else {
            return response()->json([
                'error' => true,
                'status' => 401,
                'message' => 'Not found wards'
            ]);
        }
    }
}
