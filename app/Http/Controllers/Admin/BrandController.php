<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Brand;
use Carbon\Carbon;
use Illuminate\Support\Str;


class BrandController extends Controller
{
    function getListBrand()
    {
    	$brand = Brand::all()->toArray();
    	return view('admin.page.brand.listbrand',['brand' => $brand]);
    }

    function getAddBrand()
    {
    	return view('admin.page.brand.addbrand');
    }

    function postAddBrand(Request $request)
    {
    	$brand = new Brand();
        $brand->name = $request->name;
        $current_date_time = Carbon::now()->format('d_m_Y');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fname = $file->getClientOriginalName();
            $photo = "brand_".$current_date_time."_".Str::random(5)."_". $fname;
            while (file_exists("upload/brand".$photo)) {
                $photo = "brand_".Str::random(5)."_". $photo;
            }
            $file -> move("upload/brand",$photo);
            $brand->images = $photo;
        }else {
            $brand->images = "";
        }

    	$brand->save();
    	return redirect('admin/brand/listbrand')->with('thongbao','Thêm thành công nhãn hiệu '.$request->name);
    }

    function getEditBrand($id)
    {
        if (Brand::where('id', $id)->first()) {
        	$brand = Brand::find($id);
        	return view('admin.page.brand.editbrand',['brand' => $brand]);
        }else {
            return redirect('admin/404');
        }
    }

    function postEditBrand(Request $request, $id)
    {
    	$brand = Brand::find($id);
    	$brand->name = $request->name;

        $current_date_time = Carbon::now()->format('d_m_Y');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fname = $file->getClientOriginalName();
            $photo = "brand_".$current_date_time."_".Str::random(5)."_". $fname;
            while (file_exists("upload/brand".$photo)) {
                $photo = "brand_".Str::random(5)."_". $photo;
                unlink("upload/brand/".$brand->images);
            }
            $file -> move("upload/brand",$photo);
            $brand->images = $photo;
        }else {
            $brand->images = $request->iconname;
        }
        
    	$brand->save();
    	return redirect('admin/brand/listbrand')->with('thongbao','Cập nhật thành công nhãn hiệu '.$request->name);
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        Brand::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Xóa thành công."]);        
    }
}
