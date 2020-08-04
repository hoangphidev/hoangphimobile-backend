<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Brand;
use Carbon\Carbon;
use Illuminate\Support\Str;
use File;


class NewsController extends Controller
{
    public function getListNews()
    {
        $news = News::orderBy('id','DESC')->get();
        return view('admin.page.news.listnews', ['news'=>$news]);
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        News::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Xóa thành công."]);        
    }

    public function getAddNews()
    {
        $brand = Brand::all();
        return view('admin.page.news.addnews',['brand'=>$brand]);
    }


    public function postAddNews(Request $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->summary = $request->summary;
        $news->body = $request->body;

        $brand = Brand::find($request->brand_id);
        
        $current_date_time = Carbon::now()->format('d_m_Y');
        $name_photo = $brand->url.'_'.$current_date_time."_".Str::random(8);

        $path = public_path('upload/news/'.$brand->url);
   
	    if(!File::isDirectory($path)){
	        File::makeDirectory($path, 0777, true, true);
	    }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $photo = $name_photo."_". $name;
            while (file_exists($path.$photo)) {
                $photo = $brand->url.'_'.$current_date_time."_".Str::random(5)."_". $photo;
            }
            $file -> move($path,$photo);
            $news->images = $photo;
        }else {
            $news->images = "";
        }
       
        $news->brand_id = $request->brand_id;
        $news->save();

        return redirect('admin/news/listnews')->with('thongbao','Thêm thành công tin tức '.$news->id);
    }

    public function getEditNews($id){
        if (News::where('id', $id)->first()) {
            $news = News::find($id);
            $brand = Brand::all();
            return view('admin.page.news.editnews',['news'=>$news,'brand'=>$brand]);
        }else {
            return redirect('admin/404');
        }
    }

    public function postEditNews(Request $request,$id){
        $news = News::find($id);
        $news->title = $request->title;
        $news->summary = $request->summary;
        $news->body = $request->body;

        $brand = Brand::find($request->brand_id);
        
        $current_date_time = Carbon::now()->format('d_m_Y');
        $name_photo = $brand->url.'_'.$current_date_time."_".Str::random(8);

        $path = public_path('upload/news/'.$brand->url);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $photo = $name_photo."_". $name;
            while (file_exists($path.$photo)) {
                $photo = $brand->url.'_'.$current_date_time."_".Str::random(5)."_". $photo;
                File::delete($path."/".$news->images);
            }
            $file -> move($path,$photo);
            //unlink();
            $news->images = $photo;
        }else {
            $news->images = $request->iconname;
        }
       
        $news->brand_id = $request->brand_id;
        $news->save();

        return redirect('admin/news/listnews')->with('thongbao','Cập nhật bài viết '.$news->id .".");
    }
}
