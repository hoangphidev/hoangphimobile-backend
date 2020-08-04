<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    function getListBanner()
    {
    	$banner = Banner::all()->toArray();
    	return view('admin.page.banner.listbanner',['banner' => $banner]);
    }

    function getAddBanner()
    {
    	return view('admin.page.banner.addbanner');
    }

    function postAddBanner(Request $request)
    {
    	$banner = new Banner();
        $banner->title = $request->title;

        $current_date_time = Carbon::now()->format('d_m_Y');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $photo = "banner_".$current_date_time."_".Str::random(5)."_". $name;
            while (file_exists("upload/banner".$photo)) {
                $photo = "banner_".Str::random(5)."_". $photo;
            }
            $file -> move("upload/banner",$photo);
            $banner->images = $photo;
        }else {
            $banner->images = "";
        }

    	$banner->description = $request->description;
    	$banner->save();
    	return redirect('admin/banner/listbanner')->with('thongbao','Thêm thành công banner');
    }

    function getEditBanner($id)
    {
        if (Banner::where('id', $id)->first()) {
        	$banner = Banner::find($id);
        	return view('admin.page.banner.editbanner',['banner' => $banner]);
        }else {
            return redirect('admin/404');
        }
    }

    function postEditBanner(Request $request, $id)
    {
    	$banner = Banner::find($id);
    	$banner->title = $request->title;

    	$current_date_time = Carbon::now()->format('d_m_Y');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fname = $file->getClientOriginalName();
            $photo = "phone_".$current_date_time."_".Str::random(5)."_". $fname;
            while (file_exists("upload/banner".$photo)) {
                $photo = "phone_".Str::random(5)."_". $photo;
                unlink("upload/banner/".$banner->images);
            }
            $file -> move("upload/banner",$photo);
            $banner->images = $photo;
        }else {
            $banner->images = $request->iconname;
        }

        $banner->description = $request->description;
    	$banner->save();
    	return redirect('admin/banner/listbanner')->with('thongbao','Cập nhật thành công banner số '.$request->id);
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        Banner::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Xóa thành công."]);        
    }
}
