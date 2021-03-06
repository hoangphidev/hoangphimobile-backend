@extends('admin.layout.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Cập nhật thông tin thương hiệu</a>
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
                            <small>Thông tin thương hiệu</small>
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
                        <form action="{{$brand->id}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                            <div class="form-group">
                                {!!csrf_field() !!}
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên thương hiệu mới" value="{{$brand->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                    <img width="100px" src="{{ asset('/upload/brand/'.$brand->images) }}">
                                    <input type="text" name="iconname" value="{{$brand->images}}" hidden>
                                </p>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-secondary" style="margin-left: 20px;">Làm mới</button>
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
    <title>Cập nhật thông tin thương hiệu | Hoàng Phi Mobile</title>
@endsection