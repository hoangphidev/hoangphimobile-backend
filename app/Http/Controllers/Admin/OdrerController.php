<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use DB;



class OdrerController extends Controller
{
    public function getOrder()
    {
        $order = Order::where('status',1)->orderBy('created_at','DESC')->get();
        return view('admin.page.order.listorder', ['order'=>$order]);
    }

    public function getDelivery()
    {
        $order = Order::where('status',2)->orderBy('created_at','DESC')->get();
        return view('admin.page.order.listdelivery', ['order'=>$order]);
    }

    public function getShipped()
    {
        $order = Order::where('status','>',2)->orderBy('created_at','DESC')->get();
        return view('admin.page.order.listshipped', ['order'=>$order]);
    }

    public function deliveryOrder($id){
        $status = Order::find($id);
        $st = $status->status;
        if ($st  == 1) {
            $status->status  = 2;
            $status->save();
            return redirect('admin/order/listorder')
            ->with('thongbao','Đang giao hàng đơn '.$id);
        } 
    }

    public function deliveredOrder($id){
        $status = Order::find($id);
        $st = $status->status;
        $idproduct = $status->product_id;
        
        $product = Product::find($idproduct);
        $count = ($product->count) - 1;
        $sale = ($product->sale) + 1;
        DB::table('tb_products')
            ->where('id', $idproduct)
            ->update(['count' => $count, 'sale' => $sale]);

        if ($st  == 2) {
            $status->status  = 3;
            $status->save();
            return redirect('admin/order/listdelivery')
            ->with('thongbao','Đã giao hàng đơn '.$id);
        }
    }

    public function cancelOrder($id){
        $status = Order::find($id);
        $st = $status->status;
        $idproduct = $status->product_id;
        
        if ($st  == 1) {
            $status->status  = 4;
            $status->save();
            return redirect('admin/order/listorder')
            ->with('thongbao','Đã huỷ đơn '.$id);
        }

        if ($st  == 2) {
            $status->status  = 4;
            $status->save();
            return redirect('admin/order/listdelivery')
            ->with('thongbao','Đã huỷ đơn '.$id);
        }
    }

    public function getDetailOrder($id){
        $order = Order::find($id);
        return view('admin.page.order.orderdetail',['order' => $order]);
    }
}
