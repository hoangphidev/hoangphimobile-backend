@extends('admin.layout.index')
@section('content')
	<div class="container-fluid">
		<!-- 404 Error Text -->
		<div class="text-center">
			<div class="mb-5">
				<img src="{{asset('admin/img/404.png')}}" alt="404 - Không tồn tại" width="200" height="330" />
			</div>
			<p class="lead text-gray-800 mb-3">Cảnh báo ! Trang không tồn tại.</p>
			<p class="text-gray-500 mb-0">Liên hệ quản lý: <a href="mailto:hoangphi.dev@gmail.com">hoangphi.dev@gmail.com</a></p>
			<a href="{{route('home')}}">&larr; Quay lại Trang chủ</a>
		</div>
	</div>
@endsection
@section('title')
    <title>Không tồn tại | Hoàng Phi Mobile</title>
@endsection