<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function getLogin(){
        if (Auth::check()) {
            return redirect('admin/home');
        }else {
            return view('admin.page.login_admin');
        }
    }

    public function postLogin(Request $request){

        $this->validate($request,[
            'email'=>'required|min:5',
            'password'=>'required|min:6'
            ],[
            'email.required'=>'Bạn chưa nhập tài khoản',
            'email.min'=>'Tài khoản phải lớn hơn 5 ký tự',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'mật khẩu phải lớn hơn 6 ký tự',
            ]
        );

        $email = $request['email'];
        $password = $request['password'];

        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect('admin/home');
        }
        else{
            return redirect('login')->with('thongbao','Email hoặc mật khẩu không chính xác. Đăng nhập thất bại !');
        }
        
    }

    public function outLogin(Request $request){
        Auth::logout();
        return redirect('login');
    }
}
