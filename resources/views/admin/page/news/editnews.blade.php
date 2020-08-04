@extends('admin.layout.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Thông tin bài viết</a>
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
                            <small>Nội dung bài viết</small>
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
                        <form action="{{$news->id}}" method="POST" enctype="multipart/form-data">
                            {!!csrf_field() !!}
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="name">Tiêu đề</label>
                                    <input type="text" class="form-control" id="name" name="title" placeholder="Nhập tiêu đề bản tin" value="{{$news->title}}"/>
                                </div>
                                <div class="form-group col-md-4" hidden>
                                    <label for="brand_id">Thương hiệu</label>
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        @foreach($brand as $br)
                                        <option
                                            @if($news->getbrand->id == $br->id)
                                                {{"selected"}}
                                            @endif
                                         value="{{$br->id}}">{{$br->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="brand_id">Thương hiệu</label>
                                    <select disabled class="form-control" name="brand_id" id="brand_id">
                                        @foreach($brand as $br)
                                        <option
                                            @if($news->getbrand->id == $br->id)
                                                {{"selected"}}
                                            @endif
                                         value="{{$br->id}}">{{$br->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary">Tóm tắt bài viết</label>
                                <textarea class="form-control" rows="3" id="summary" name="summary" placeholder="Nhập tóm tắt bài viết">{{$news->summary}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">Nội dung bài viết</label>
                                <textarea class="form-control" rows="7" id="body" name="body" placeholder="Nhập nội dung bài viết">{{$news->body}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                    <img width="100px" src="{{ asset('/upload/news/'.$news->getbrand['name'].'/'.$news['images']) }}">
                                    <input type="text" name="iconname" value="{{$news->images}}" hidden>
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
    <title>Cập nhật thông tin bài viết | Hoàng Phi Mobile</title>
@endsection