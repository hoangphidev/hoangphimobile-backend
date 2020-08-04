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
        <div class="card-body">
            <!-- End Control table -->
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary text-center">Thông tin khách hàng</h4>
                    </div>
                    <thead>
                        <tr align="center">
                            <th>Khách hàng</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Tổng tiền</th>
                            <th>Ngày đặt</th>
                        </tr>
                    </thead>
                    <tbody id="myTable" class="myTableOrder">
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->customer_address}}</td>
                            <td class="text-danger font-weight-bold">{{number_format($order->getproduct->price)}} VNĐ</td>
                            <td>{{$order->created_at->format('d/m/Y')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary text-center">Thông tin sản phẩm</h4>
                    </div>
                    <thead>
                        <tr align="center">
                            <th>Đơn hàng</th>
                            <th>Hình ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Giá bán</th>
                            <th>Màu sắc</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody id="myTable" class="myTableOrder">
                        <tr>
                            <td>
                                {{$order->id}}
                            </td>
                            <td>
                                <img width="60px" src="{{ asset('/upload/photo/'.$order->getproduct['images']) }}">
                            </td>
                            <td>
                                {{$order->getproduct->name}} {{$order->getproduct->rom}} / {{$order->getproduct->ram}}
                            </td>
                            <td class="text-danger font-weight-bold">{{number_format($order->getproduct->price)}} VNĐ</td>
                            <td>{{$order->getproduct->color}}</td>
                            <!-- View image list product -->
                            <?php if($order['status'] == 1): ?>
                                <td>
                                    <label>
                                        Tiếp nhận đơn hàng
                                    </label>
                                </td>
                            <?php endif ?>
                            <?php if($order['status'] == 2): ?>
                                <td>
                                    <label>
                                        Đang giao hàng
                                    </label>
                                </td>
                            <?php endif ?>
                            <?php if($order['status'] == 3): ?>
                                <td>
                                    <label class="text-success font-weight-bold">
                                        Đã giao hàng
                                    </label>
                                </td>
                            <?php endif ?>
                            <?php if($order['status'] == 4): ?>
                                <td>
                                    <label class="text-danger font-weight-bold">
                                        Huỷ đơn
                                    </label>
                                </td>
                            <?php endif ?>
                            <td>
                                {{$order->note}}
                            </td>
                            <!-- View product action -->
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php if($order['status'] == 1): ?>
                <div class="text-center">
                    <a href="{{route('listorder')}}" class="btn btn-primary" role="button">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Quay lại
                    </a>
                    <a href="delivery/{{$order['id']}}" class="btn btn-primary" role="button">
                        Giao hàng
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </a>
                    <a href="cancelorder/{{$order['id']}}" class="btn btn-danger" role="button">
                        Huỷ đơn hàng
                        <i class="fa fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                </div>
            <?php endif ?>
            <?php if($order['status'] == 2): ?>
                <div class="text-center">
                    <a href="{{route('listdelivery')}}" class="btn btn-primary" role="button">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Quay lại
                    </a>
                    <a href="delivered/{{$order['id']}}" class="btn btn-primary" role="button">
                        Đã giao hàng
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </a>
                    <a href="cancelorder/{{$order['id']}}" class="btn btn-danger" role="button">
                        Huỷ đơn hàng
                        <i class="fa fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
@endsection
@section('title')
    <title>{{$order->id}} - Chi tiết đơn hàng | Hoàng Phi Mobile</title>
@endsection