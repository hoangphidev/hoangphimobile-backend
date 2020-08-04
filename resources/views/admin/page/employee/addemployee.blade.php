@extends('admin.layout.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Thêm tài khoản</a>
    </li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
    <div id="home" class="container tab-pane active">
        <br>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Thông tin tài khoản nhân viên</small>
                        </h1>
                    </div>
                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{asset('admin/employee/addemployee')}}" method="POST">
                        {!!csrf_field() !!}
                        <div class="form-group">
                            <label for="name">Họ tên nhân viên</label>
                            <input class="form-control" name="name" id="name" placeholder="Nhập họ tên"/>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Giới tính</label>
                                <div style="margin-left: 30px;">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio" name="sex" value="0" checked>
                                        <label class="custom-control-label" for="customRadio">Nam</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline" style="margin-left: 20px;">
                                        <input type="radio" class="custom-control-input" id="customRadio2" name="sex" value="1">
                                        <label class="custom-control-label" for="customRadio2">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="position_id">Chức vụ</label>
                                <select class="form-control" name="position_id" id="position_id">
                                    @foreach($position as $pt)
                                    <option value="{{$pt->id}}">{{$pt->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pass">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="pass" placeholder="Nhập mật khẩu" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="repass">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="repassword" id="repass" placeholder="Nhập lại mật khẩu" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ nhân viên</label>
                            <input type="text" class="form-control" id="address" name="user_address" placeholder="Nhập địa chỉ nhân viên" />
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="reset" class="btn btn-secondary">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</div>
@endsection
@section('title')
    <title>Thêm nhân viên | Hoàng Phi Mobile</title>
@endsection