@extends('admin.layout.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Thêm quảng cáo mới</a>
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
                            <small>Thông tin quảng cáo mới</small>
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
                        <form action="{{asset('admin/banner/addbanner')}}" method="POST" enctype="multipart/form-data">
                        {!!csrf_field() !!}
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="title" placeholder="Nhập tiêu đề quảng cáo mới"/>
                        </div>
                        <div class="form-group">
                            <label for="des">Mô tả sản phẩm</label>
                            <textarea class="form-control" rows="7" id="des" name="description" placeholder="Nhập mô tả quảng cáo"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Hình ảnh</label>
                            <input type="file" class="form-control" id="image" name="image"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm quảng cáo</button>
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
    <title>Thêm quảng cáo mới | Hoàng Phi Mobile</title>
@endsection