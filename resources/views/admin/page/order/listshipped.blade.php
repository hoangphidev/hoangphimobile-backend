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
            <h4 class="m-0 font-weight-bold text-primary">Đơn hàng đã giao</h4>
        </div>
        <div class="card-body">
            <!-- End Control table -->
            <div class="table-responsive">
                <input class="form-control" id="myInput" type="search" placeholder="Nhập nội dung tìm kiếm, mã đơn hàng, tên khách hàng, ..." aria-label="Search">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr align="center">
                            <th>Đơn hàng</th>
                            <th>Hình ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Thanh toán</th>
                            <th>Ngày đặt</th>
                            <th>Ngày giao</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody id="myTable" class="myTableOrder">
                        @foreach($order as $pd)
                        <tr>
                            <td class="text-primary font-weight-bold">
                                <a href="orderdetail/{{$pd['id']}}">
                                    {{$pd->id}}
                                </a>
                            </td>
                            <td>
                                <img width="60px" src="{{ asset('/upload/photo/'.$pd->getproduct['images']) }}">
                            </td>
                            <td>
                                {{$pd->getproduct->name}} {{$pd->getproduct->rom}} / {{$pd->getproduct->ram}} / {{$pd->getproduct->color}}
                            </td>
                            <td class="text-danger font-weight-bold">{{number_format($pd->getproduct->price)}} VNĐ</td>
                            <td>{{$pd->created_at->format('d/m/Y')}}</td>
                            <td>{{$pd->updated_at->format('d/m/Y')}}</td>
                            <!-- View image list product -->
                            <?php if($pd['status'] == 3): ?>
                                <td>
                                    <label class="text-success font-weight-bold">
                                        Thành công
                                    </label>
                                </td>
                            <?php endif ?>
                            <?php if($pd['status'] == 4): ?>
                                <td>
                                    <label class="text-danger font-weight-bold">
                                        Huỷ đơn
                                    </label>
                                </td>
                            <?php endif ?>
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
    <title>Đơn hàng đã giao | Hoàng Phi Mobile</title>
@endsection