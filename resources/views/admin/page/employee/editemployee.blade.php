@extends('admin.layout.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Cập nhật thông tin nhân viên</a>
    </li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
    <div id="home" class="container tab-pane active">
        <br>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" style="margin-left: 135px;">
                        <h1 class="page-header">
                            <small>Thông tin nhân viên</small>
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
                        <form action="{{$employee->id}}" method="POST">
                            <div class="form-group">
                                {!!csrf_field() !!}
                                <label>Họ tên nhân viên</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên nhân viên" value="{{$employee->name}}" />
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" value="{{$employee->phone}}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input disabled type="email" class="form-control" name="email" placeholder="Nhập email" value="{{$employee->email}}" />
                                </div>
                            </div>
                            <div class="form-group" hidden>
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập email" value="{{$employee->email}}" />
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Giới tính</label>
                                    <div style="margin-left: 30px;">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="male" name="sex" value="0" {{$employee->sex == 0 ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="male">Nam</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline" style="margin-left: 20px;">
                                            <input type="radio" class="custom-control-input" id="female" name="sex" value="1" {{$employee->sex == 1 ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="female">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="position_id">Chức vụ</label>
                                    <select class="form-control" name="position_id" id="position_id">
                                        @foreach($position as $pt)
                                        <option
                                            @if($employee->getPosition['id'] == $pt->id)
                                                {{"selected"}}
                                            @endif
                                            value="{{$pt->id}}">{{$pt->name}}
                                         </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ nhân viên</label>
                                <input type="text" class="form-control" id="address" name="user_address" placeholder="Nhập địa chỉ nhân viên" value="{{$employee->user_address}}" />
                            </div>
                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-secondary" style="margin-left: 20px;">Làm mới</button>
                                <a href="{{url('admin/employee/changepass',['id'=>$employee->id])}}" style="margin-left: 30px;">Đổi mật khẩu</a>
                            </div>
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
    <title>Cập nhật thông tin nhân viên | Hoàng Phi Mobile</title>
@endsection