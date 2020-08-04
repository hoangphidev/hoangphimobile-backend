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
            <h4 class="m-0 font-weight-bold text-primary">Danh Sách Nhân Viên</h4>
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
                            <a class="dropdown-item" href="#">Mô tả</a>
                            <h3 class="dropdown-header text-danger"> Sắp xếp theo:</h3>
                            <a class="dropdown-item" href="#">Tên Group</a>
                            <a class="dropdown-item" href="#">Mô tả</a>
                        </div>
                    </li>
                </ul>
                <button class="btn btn-danger btn-xs delete-all-employee" id="btnDelete" hidden="" data-url="">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                <!-- End Left Nav -->
                <!-- Right Nav -->
                <ul class="navbar-nav ml-auto">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" id="myInput" type="search" placeholder="Nhập nội dung tìm kiếm" aria-label="Search">
                        <a href="addemployee" class="btn btn-primary">
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
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Chức vụ</th>
                            <th>Trạng thái</th>
                            <th>Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach($employee as $em)
                        <tr>
                            <td>
                                <div class="form-group custom-control custom-checkbox">
                                    <label>
                                    <input type="checkbox" class="custom-control-input checkbox" data-id="{{$em['id']}}">
                                    <span class="custom-control-label"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <label>
                                    <i class="fas fa-user-tie"></i>
                                    <a href="{{route('editemployee',['id'=>$em['id']])}}">{{$em->name}}</a>
                                </label>
                            </td>
                            <?php if($em['sex'] == 0): ?>
                                <td>
                                    Nam
                                </td>
                            <?php else: ?>
                                <td>
                                    Nữ
                                </td>
                            <?php endif ?>
                            <td>{{$em->phone}}</td>
                            <td>{{$em->email}}</td>
                            <td>{{$em->getPosition['name']}}</td>
                            <?php if($em['active'] == 0): ?>
                                <td>
                                    <img height="25" src="{{asset('admin/img/active.png')}}">
                                </td>
                            <?php else: ?>
                                <td>
                                    <img height="25" src="{{asset('admin/img/block.png')}}">
                                </td>
                            <?php endif ?>
                            <td>
                              <button class="btn btn-default btn-xs" type="button" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                              </button>
                              <ul class="dropdown-menu">
                                  <li><a href="editemployee/{{$em['id']}}" class="dropdown-item mb-0 text-dark">Sửa</a></li>
                                  <li><a class="dropdown-item" href="block/{{$em['id']}}">
                                    <?php 
                                    if ($em['active'] == 0) { ?>
                                        Block
                                    <?php } else { ?>
                                        Unblock
                                    <?php } ?>
                                  </a></li>
                              </ul>
                            </td>
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
    <title>Danh sách nhân viên | Hoàng Phi Mobile</title>
@endsection