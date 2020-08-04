<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Position;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function getDashboard(){
        return view('admin.page.home.dashboard');
    }

    public function get404(){
        return view('admin.page.home.404');
    }

    public function getAcount(){
    	$employee = Auth::user();
    	$position = Position::all();
    	return view('admin.page.home.acount',['employee' => $employee,'position' => $position]);
    }

    public function postAcount(Request $request){
    	$this->validate($request,[
    		'name' =>'required|min:3',
            'phone'=>'required|numeric',
    		'user_address' =>'required'
            ],[
            'name.required'=>'Bạn chưa nhập tên',
            'name.min' =>'Tên tối thiểu có 3 ký tự',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'phone.numeric'=>'Số điện thoại phải là chữ số',
            'user_address.required'=>'Bạn chưa nhập địa chỉ'
            ]
        );
    	$employee = Auth::user();
    	$employee->name = $request->name;
    	$employee->phone = $request->phone;
    	$employee->email = $request->email;
    	$employee->user_address = $request->user_address;
    	$employee->sex = $request->sex;
    	$employee->position_id = $request->position_id;
    	$employee->save();
    	return redirect('admin/myacount')->with('thongbao','Cập nhật thông tin thành công '.$request->name);
    }

    public function getChangePass(){
        $employee = Auth::user();
        return view('admin.page.home.change_password_account',['employee'=>$employee]);
    }

    public function postChangePass(Request $request){
        $this->validate($request,[
        'password'=>'required|min:6|max:32',
        'repassword' =>'required|same:password'
        ],[
        'password.required'=>'Bạn chưa nhập mật khẩu',
        'repassword.required'=>'Bạn chưa nhập lại mật khẩu',
        'password.min'=>'mật khẩu phải lớn hơn 6 ký tự',
        'password.max'=>'mật khẩu phải nhở hơn 32 ký tự',
        'repassword.same'=>'mật khẩu không trùng khớp'
        ]);

        $employee = Auth::user();
        $employee->password = bcrypt($request->password);
        $employee->save();
        $name = $employee->name;
        return redirect('admin/myacount')->with('thongbao','Đổi mật khẩu thành công cho tài khoản '.$name.'.');
    }
}
