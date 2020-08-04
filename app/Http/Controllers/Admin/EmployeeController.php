<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Position;



class EmployeeController extends Controller
{
    public function getListEmployee()
    {
    	$employee = User::all();
    	$position = Position::all();
    	return view('admin.page.employee.listemployee',['employee' => $employee,'position' => $position]);
    }

    public function getAddEmployee()
    {
    	$position = Position::all();
    	return view('admin.page.employee.addemployee',['position' => $position]);
    }

    public function postAddEmployee(Request $request){
    	$this->validate($request,[
    		'name' =>'required|min:3',
            'phone'=>'required|numeric',
            'email'=>'required|email|unique:tb_users,email',
            'password'=>'required|min:6|max:32',
            'repassword' =>'required|same:password',
    		'user_address' =>'required'
            ],[
            'name.required'=>'Bạn chưa nhập tên',
            'name.min' =>'Tên tối thiểu có 3 ký tự',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'phone.numeric'=>'Số điện thoại phải là chữ số',
            'email.required'=>'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải lớn hơn 6 ký tự',
            'password.max'=>'Mật khẩu phải nhở hơn 32 ký tự',
            'repassword.required'=>'Bạn chưa nhập lại mật khẩu',
            'repassword.same'=>'Mật khẩu không trùng khớp',
            'user_address.required'=>'Bạn chưa nhập địa chỉ'
            ]
        );
    	$employee = new User();
    	$employee->name = $request->name;
    	$employee->phone = $request->phone;
    	$employee->email = $request->email;
    	$employee->password = bcrypt($request->password);
    	$employee->user_address = $request->user_address;
    	$employee->sex = $request->sex;
    	$employee->position_id = $request->position_id;
    	$employee->save();
    	return redirect('admin/employee/listemployee')->with('thongbao','Thêm thành công nhân viên '.$request->name);
    }

    public function getEditEmployee($id){
        if (User::where('id',$id)->first()) {
        	$employee = User::find($id);
        	$position = Position::all();
        	return view('admin.page.employee.editemployee',['employee' => $employee,'position' => $position]);
        }else {
            return redirect('admin/404');
        }
    }

    public function postEditEmployee(Request $request, $id){
    	$this->validate($request,[
    		'name' =>'required|min:3',
            ],[
            'name.required'=>'Bạn chưa nhập tên',
            'name.min' =>'Tên tối thiểu có 3 ký tự',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
            'phone.numeric'=>'Số điện thoại phải là chữ số',
            'user_address.required'=>'Bạn chưa nhập địa chỉ'
            ]
        );
    	$employee = User::find($id);
    	$employee->name = $request->name;
    	$employee->phone = $request->phone;
    	$employee->email = $request->email;
    	$employee->user_address = $request->user_address;
    	$employee->sex = $request->sex;
    	$employee->position_id = $request->position_id;
    	$employee->save();
    	return redirect('admin/employee/listemployee')->with('thongbao','Cập nhật thành công nhân viên '.$request->name);
    }

    public function blockUser($id){
        $actives = User::find($id);
        $act = $actives->active;
        $name = $actives->name;
        $email = $actives->email;
        if ($act  == 0) {
            $actives->active  = 1;
            $actives->save();
            return redirect('admin/employee/listemployee')
            ->with('thongbao','Chặn thành công '.$name . ' có email là '.$email .'.');
        } else {
            $actives->active  = 0;
            $actives->save();
            return redirect('admin/employee/listemployee')
            ->with('thongbao','Bỏ chặn thành công '.$name . ' có email là '.$email .'.');
        }   
    }

    public function changePass($id){
        $employee = User::find($id);
        return view('admin.page.employee.change_password_employee',['employee'=>$employee]);
    }

    public function postChangePass(Request $request,$id){
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

        $employee = User::find($id);
        $employee->password = bcrypt($request->password);
        $employee->save();
        $name = $employee->name;
        return redirect('admin/employee/listemployee')->with('thongbao','Đổi mật khẩu thành công cho tài khoản '.$name.'.');
    }

    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        User::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Xóa thành công."]);        
    }
}
