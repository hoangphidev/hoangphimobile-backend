<nav class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/home')}}">
        <div class="sidebar-brand-icon">
            <i class="fas">
                <img height="50" width="85" src="{{asset('admin/img/homelogo.png')}}">
            </i>
        </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Trang chủ</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
 
    <!-- Nav Item - Pages Collapse Menu -->
    @if($userLogin->position_id == 1)
    <li class="nav-item">
        <a class="nav-link" href="{{route('listbanner')}}">
        <i class="fa fa-archive" aria-hidden="true"></i>
        <span>Quản lý quảng cáo</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('listnews')}}">
        <i class="fa fa-rss" aria-hidden="true"></i>
        <span>Quản lý tin tức</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-tasks" aria-hidden="true"></i>
        <span>Quản lý Sản phẩm</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('listbrand')}}">Thương hiệu</a>
                <a class="collapse-item" href="{{route('listproduct')}}">Sản phẩm </a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Order" aria-expanded="true" aria-controls="Order">
        <i class="fa fa-bookmark" aria-hidden="true"></i>
        <span>Quản lý đơn hàng</span>
        </a>
        <div id="Order" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/order/listorder')}}">Đơn hàng</a>
                <a class="collapse-item" href="{{url('admin/order/listdelivery')}}">Đang giao hàng</a>
                <a class="collapse-item" href="{{url('admin/order/listshipped')}}">Đã giao hàng</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('listemployee')}}">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>Quản lý nhân viên</span>
        </a>
    </li>
    @endif

    @if($userLogin->position_id == 2)
    <li class="nav-item">
        <a class="nav-link" href="{{route('listbanner')}}">
        <i class="fa fa-archive" aria-hidden="true"></i>
        <span>Quản lý quảng cáo</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-tasks" aria-hidden="true"></i>
        <span>Quản lý Sản phẩm</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('listbrand')}}">Thương hiệu</a>
                <a class="collapse-item" href="{{route('listproduct')}}">Sản phẩm </a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Order" aria-expanded="true" aria-controls="Order">
        <i class="fa fa-bookmark" aria-hidden="true"></i>
        <span>Quản lý đơn hàng</span>
        </a>
        <div id="Order" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('admin/order/listorder')}}">Đơn hàng</a>
                <a class="collapse-item" href="{{url('admin/order/listshipped')}}">Đã giao hàng</a>
            </div>
        </div>
    </li>
    @endif

    @if($userLogin->position_id == 3)
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/order/listorder')}}">
        <i class="fa fa-archive" aria-hidden="true"></i>
        <span>Quản lý đơn hàng</span>
        </a>
    </li>
    @endif
    @if($userLogin->position_id == 4)
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/order/listdelivery')}}">
        <i class="fa fa-archive" aria-hidden="true"></i>
        <span>Quản lý đơn hàng</span>
        </a>
    </li>
    @endif
    @if($userLogin->position_id == 5)
    <li class="nav-item">
        <a class="nav-link" href="{{route('listnews')}}">
        <i class="fa fa-rss" aria-hidden="true"></i>
        <span>Quản lý tin tức</span>
        </a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</nav>