@extends('admin.layout.index')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    @if(session('thongbao'))
    <div class="alert alert-success">
        {{session('thongbao')}}
    </div>
    @endif
    @if(session('canhbao'))
    <div class="alert alert-danger">
        {{session('canhbao')}}
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Danh Sách Tin Tức</h4>
        </div>
        <div class="card-body">
            <!-- Control table -->
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <!-- Checkbox all -->
                <div class="custom-control custom-checkbox form-group">
                    <label>
                    <input class="custom-control-input" type="checkbox" id="check_all">
                    <span class="custom-control-label"></span>
                    </label>
                </div>
                <!-- End Checkbox all -->
                <!-- Left Nav -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" title="Lọc và sắp xếp theo">
                        Lọc và sắp xếp theo
                        </a>
                        <div class="dropdown-menu">
                            <h3 class="dropdown-header text-danger"> Lọc theo:</h3>
                            <a class="dropdown-item" href="#">Tên Group</a>
                            <h3 class="dropdown-header text-danger"> Sắp xếp theo:</h3>
                            <a class="dropdown-item" href="#">Tên Group</a>
                            <a class="dropdown-item" href="#">Mô tả</a>
                        </div>
                    </li>
                </ul>
                <button class="btn btn-danger btn-xs delete-all-news" id="btnDelete" hidden="" data-url="">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                <!-- End Left Nav -->
                <!-- Right Nav -->
                <ul class="navbar-nav ml-auto">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" id="myInput" type="search" placeholder="Nhập nội dung tìm kiếm" aria-label="Search">
                        <a href="addnews" class="btn btn-primary">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </form>
                </ul>
                <!-- End Right Nav -->
            </nav>
            <!-- End Control table -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Chọn</th>
                            <th>Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Tóm tắt</th>
                            <th>Lượt xem</th>
                            <!--
                            <th>Thương hiệu</th>
                        -->
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($news as $new)
                        <tr>
                            <!-- View checkbox -->
                            <td>
                                <div class="form-group custom-control custom-checkbox">
                                    <label>
                                    <input type="checkbox" class="custom-control-input checkbox" data-id="{{$new['id']}}">
                                    <span class="custom-control-label"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <img width="100px" src="{{ asset('/upload/news/'.$new->getbrand['name'].'/'.$new['images']) }}">
                            </td>
                            <td class="text-left">
                                <a href="editnews/{{$new['id']}}">
                                    {{$new->title}}
                                </a>
                            </td>
                            <td class="text-left">{{$new->summary}}</td>
                            <!-- View product amount -->
                            <td>{{number_format($new->view)}}</td>                            <!--
                            <td>
                                <?php if ($new['brand_id'] == $new->getbrand['id']): ?>
                                    <label>
                                        {{$new->getbrand['name']}}
                                    </label>
                                <?php endif ?>
                            </td>
                        -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('title')
    <title>Danh sách tin tức | Hoàng Phi Mobile</title>
@endsection