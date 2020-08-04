<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use Carbon\Carbon;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function getProduct()
    {
        $product = Product::orderBy('id','DESC')->get();
        return view('admin.page.product.listproduct', ['product'=>$product]);
    }

    public function getAddProduct()
    {
        $brand = Brand::all();
        return view('admin.page.product.addproduct',['brand'=>$brand]);
    }


    public function postAddProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $current_date_time = Carbon::now()->format('d_m_Y');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $photo = "phone_".$current_date_time."_".Str::random(5)."_". $name;
            while (file_exists("upload/photo".$photo)) {
                $photo = "phone_".Str::random(5)."_". $photo;
            }
            $file -> move("upload/photo",$photo);
            $product->images = $photo;
        }else {
            $product->images = "";
        }
       
        $product->screen = $request->screen;
        $product->os = $request->os;
        $product->front_camera = $request->front_camera;
        $product->back_camera = $request->back_camera;
        $product->cpu = $request->cpu;
        $product->rom = $request->rom;
        $product->ram = $request->ram;
        $product->color = $request->color;
        $product->battery = $request->battery;
        $product->count = $request->count;
        $product->brand_id = $request->brand_id;

        

        $product->save();

        return redirect('admin/product/listproduct')->with('thongbao','Thêm thành công sản phẩm '.$request->name);
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        Product::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Xóa thành công."]);        
    }

    public function editProduct($id){
        if (Product::where('id', $id)->first()) {
            $product = Product::find($id);
            $brand = Brand::all();
            return view('admin.page.product.editproduct',['product'=>$product,'brand'=>$brand]);
        }else {
            return redirect('admin/404');
        }
    }

    public function postEditProduct(Request $request,$id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $current_date_time = Carbon::now()->format('d_m_Y');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fname = $file->getClientOriginalName();
            $photo = "phone_".$current_date_time."_".Str::random(5)."_". $fname;
            while (file_exists("upload/photo".$photo)) {
                $photo = "phone_".Str::random(5)."_". $photo;
                unlink("upload/photo/".$product->images);
            }
            $file -> move("upload/photo",$photo);
            $product->images = $photo;
        }else {
            $product->images = $request->iconname;
        }

        $product->screen = $request->screen;
        $product->os = $request->os;
        $product->front_camera = $request->front_camera;
        $product->back_camera = $request->back_camera;
        $product->cpu = $request->cpu;
        $product->rom = $request->rom;
        $product->ram = $request->ram;
        $product->color = $request->color;
        $product->battery = $request->battery;

        $product->count = $request->count;
        $product->brand_id = $request->brand_id;

        $product->save();

        return redirect('admin/product/listproduct')->with('thongbao','Cập nhật thông tin sản phẩm '.$request->name .".");
    }
}