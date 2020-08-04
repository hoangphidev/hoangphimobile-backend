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
            <h4 class="m-0 font-weight-bold text-primary">Danh Sách Đơn Đặt Hàng</h4>
        </div>
        <div class="card-body">
            <!-- End Control table -->
            <div class="table-responsive">
                <input class="form-control" id="myInput" type="search" placeholder="Nhập nội dung tìm kiếm, mã đơn hàng, tên khách hàng, ..." aria-label="Search">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr align="center">
                            <th>Đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Hình ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Thanh toán</th>
                            <th>Ngày đặt</th>
                            <th>Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody id="myTable" class="myTableOrder">
                        @foreach($order as $pd)
                        <tr>
                            <td>
                                <a href="orderdetail/{{$pd['id']}}">
                                    {{$pd->id}}
                                </a>
                            </td>
                            <td>
                                {{$pd->name}}
                            </td>
                            <td>
                                <img width="60px" src="{{ asset('/upload/photo/'.$pd->getproduct['images']) }}">
                            </td>
                            <td>
                                {{$pd->getproduct->name}} {{$pd->getproduct->rom}} / {{$pd->getproduct->ram}} / {{$pd->getproduct->color}}
                            </td>
                            <td class="text-danger font-weight-bold">{{number_format($pd->getproduct->price)}} VNĐ</td>
                            <td>{{$pd->created_at->format('h:m:s d/m/Y')}}</td>
                            <!-- View image list product -->
                            <td>
                                {{$pd->note}}
                            </td>
                            <!-- View product action -->
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
    <title>Đơn hàng | Hoàng Phi Mobile</title>
@endsection