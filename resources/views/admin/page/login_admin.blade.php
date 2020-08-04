<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Hoàng Phi Mobile | Đăng nhập quản trị</title>
  <link rel="icon" type="image/ico" href="{{asset('admin/img/icon.png')}}" />
  <!-- Custom fonts for this template -->
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admin/vendor/fontawesome-free/css/css.css')}}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
  @include('admin.layout.css')
  <!-- Custom styles for this page -->
  <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><b>Cửa hàng Hoàng Phi Mobile</b></h1>
                  </div>
                  @if(count($errors)>0)
                      <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                          {{$err}}<br>
                        @endforeach
                      </div>
                    @endif

                    @if(session('thongbao'))
                      <div class="alert alert-danger">
                        {{session('thongbao')}}
                      </div>
                    @endif
                  <form action ="admin-login" method="post" class="user">
                    {!! csrf_field() !!}
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Nhập email ...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Nhập mật khẩu ...">
                    </div>
                    <div class="form-group">
                    </div>
                    <input type="submit" value="Đăng nhập" class="btn btn-primary btn-user btn-block">
                    <hr>
                    <a href="#" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Đăng nhập bằng Google
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a href="mailto:hoangphi.dev@gmail.com">Bạn gặp vấn đề ? Liên hệ hỗ trợ về hệ thống.</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
  <!-- Page level plugins -->
  <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <!-- Page level custom scripts -->
  <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
  @include('admin.layout.js')
</body>
</html>