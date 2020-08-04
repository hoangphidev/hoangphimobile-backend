@extends('admin.layout.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Thêm sản phẩm mới</a>
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
                            <small>Thông tin sản phẩm</small>
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
                        <form action="{{asset('admin/product/addproduct')}}" method="POST" enctype="multipart/form-data">
                        {!!csrf_field() !!}
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="brand_id">Thương hiệu</label>
                                <select class="form-control" name="brand_id" id="brand_id">
                                    @foreach($brand as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="count">Số lượng</label>
                                <input type="number" class="form-control" id="count" name="count" placeholder="Số lượng sản phẩm">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">Giá bán</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Giá bán sản phẩm">
                            </div>
                        </div>
                        
                        <div class="form-group text-primary">
                            <label>Cấu hình chi tiết</label>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Màn hình</label>
                                <input type="text" class="form-control" name="screen" placeholder="Kích thước, loại">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Hệ điều hành</label>
                                <input type="text" class="form-control" name="os" placeholder="IOS, Android...">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="price">Màu sắc</label>
                                <input type="text" class="form-control" id="price" name="color" placeholder="Trắng, Đen, Đỏ, ...">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Camera sau</label>
                                <input type="text" class="form-control" name="back_camera" placeholder="12MP">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Camera trước</label>
                                <input type="text" class="form-control" name="front_camera" placeholder="7MP">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Chip, CPU</label>
                                <input type="text" class="form-control" name="cpu" placeholder="A10, snapdragon..">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Bộ nhớ trong</label>
                                <input type="text" class="form-control" name="rom" placeholder="16gb, 32gb, 64gb...">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Ram</label>
                                <input type="text" class="form-control" name="ram" placeholder="1gb, 2gb, 3gb ...">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Dung lượng pin</label>
                                <input type="text" class="form-control" name="battery" placeholder="3969 mAh, có sạc nhanh">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="des">Mô tả sản phẩm</label>
                            <textarea class="form-control" rows="7" id="des" name="description" placeholder="Nhập mô tả sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <input type="file" class="form-control" id="image" name="image"/>
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
    <title>Thêm sản phẩm mới | Hoàng Phi Mobile</title>
@endsection