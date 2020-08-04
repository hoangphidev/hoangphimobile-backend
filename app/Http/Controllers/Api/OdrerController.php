<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Mail;
use View;
use App\Product;


class OdrerController extends Controller
{
    function postOrder(Request $request)
    {
    	$order = new Order();
    	$order->id = $request->orderid;
    	$order->name = $request->customername;
    	$order->phone = $request->customerphone;
    	$order->email = "";
    	$order->customer_address = $request->customeraddress;
    	$order->product_id = $request->productid;
    	$order->note = $request->productnote;
    	$order ->save();

        // $mailid = $request->customeremail;
        // $subject = 'Thông tin đơn hàng '. $request->orderid .' từ Hoàng Phi Mobile';
        // $data = array(
        //     'email' => $mailid,
        //     'subject' => $subject,
        //     'orderid' => $request->orderid,
        //     'name' => $request->customername,
        //     'phone' => $request->customerphone,
        //     'address' => $request->customeraddress
        // );
        
        // Mail::send('admin.page.mail', compact('data'), function ($message) use ($data) {
        //     $message->from('contact.hoangphimobile@gmail.com', 'Hoàng Phi Mobile');
        //     $message->to($data['email']);
        //     $message->cc('contact.hoangphimobile@gmail.com');
        //     $message->subject($data['subject']); 
        // });

        $orderdetail = array(
            "error" => false,
            "message" => "Order Success",
            "orderid" => $request->orderid
        );
        return response()->json($orderdetail);
    }
}
