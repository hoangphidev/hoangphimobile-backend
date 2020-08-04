@extends('admin.layout.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Đổi mật khẩu</a>
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
                            <small>Thay đổi mật khẩu nhân viên</small>
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
                                {!!csrf_field() !!}
                            <div class="form-group">
                                <label for="pass">Mật khẩu</label>
                                <input type="password" class="form-control" id="pass" name="password" placeholder="Nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label for="repass">Xác nhận</label>
                                <input type="password" class="form-control" id="repass" name="repassword" placeholder="Nhập lại mật khẩu" />
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
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
    <title>Đổi mật khẩu | Hoàng Phi Mobile</title>
@endsection