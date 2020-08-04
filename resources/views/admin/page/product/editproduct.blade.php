@extends('admin.layout.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Cập nhật thông tin sản phẩm</a>
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
                        <form action="{{$product->id}}" method="POST" enctype="multipart/form-data">
                            {!!csrf_field() !!}
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="name">Tên sản phẩm</label>
                                    <input class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm" value="{{$product->name}}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="brand_id">Thương hiệu</label>
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        @foreach($brand as $br)
                                        <option
                                            @if($product->getbrand->id == $br->id)
                                                {{"selected"}}
                                            @endif
                                         value="{{$br->id}}">{{$br->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="price">Giá bán</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Giá bán sản phẩm" value="{{$product->price}}"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="count">Số lượng</label>
                                    <input type="number" class="form-control" id="count" name="count" placeholder="Số lượng sản phẩm" value="{{$product->count}}"/>
                                </div>
                            </div>
                            
                            <div class="form-group text-primary">
                                <label>Cấu hình chi tiết</label>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Màn hình</label>
                                    <input type="text" class="form-control" name="screen" placeholder="Kích thước, loại" value="{{$product->screen}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Hệ điều hành</label>
                                    <input type="text" class="form-control" name="os" placeholder="IOS, Android..." value="{{$product->os}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="price">Màu sắc</label>
                                    <input type="text" class="form-control" id="price" name="color" placeholder="Trắng, Đen, Đỏ, ..." value="{{$product->color}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Camera sau</label>
                                    <input type="text" class="form-control" name="back_camera" placeholder="12MP" value="{{$product->back_camera}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Camera trước</label>
                                    <input type="text" class="form-control" name="front_camera" placeholder="7MP" value="{{$product->front_camera}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Chip, CPU</label>
                                    <input type="text" class="form-control" name="cpu" placeholder="A10, snapdragon.." value="{{$product->cpu}}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Bộ nhớ trong</label>
                                    <input type="text" class="form-control" name="rom" placeholder="16gb, 32gb, 64gb..." value="{{$product->rom}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Ram</label>
                                    <input type="text" class="form-control" name="ram" placeholder="1gb, 2gb, 3gb ..." value="{{$product->ram}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Dung lượng pin</label>
                                    <input type="text" class="form-control" name="battery" placeholder="3969 mAh, có sạc nhanh" value="{{$product->battery}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="des">Mô tả sản phẩm</label>
                                <textarea class="form-control" rows="7" id="des" name="description" placeholder="Nhập mô tả sản phẩm">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                    <img width="100px" src="{{ asset('/upload/photo/'.$product->images) }}">
                                    <input type="text" name="iconname" value="{{$product->images}}" hidden>
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
    <title>Hoàng Phi Mobile | Cập nhật thông tin sản phẩm</title>
@endsection