@extends('admin.layout.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Thêm tin tức mới</a>
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
                        <h1 class="page-header" style="margin-left: 160px;">
                            <small>Tin tức mới</small>
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
                        <form action="{{asset('admin/news/addnews')}}" method="POST" enctype="multipart/form-data">
                        {!!csrf_field() !!}
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="name">Tiêu đề</label>
                                <input type="text" class="form-control" id="name" name="title" placeholder="Nhập tiêu đề bản tin"/>
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
                        <div class="form-group">
                            <label for="summary">Tóm tắt bài viết</label>
                            <textarea class="form-control" rows="4" id="summary" name="summary" placeholder="Nhập tóm tắt bài viết"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="body">Nội dung bài viết</label>
                            <textarea class="form-control" rows="7" id="body" name="body" placeholder="Nhập nội dung bài viết"></textarea>
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
    <title>Thêm tin tức mới | Hoàng Phi Mobile</title>
@endsection