<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin đơn hàng từ Hoàng Phi Mobile</title>
	<style type="text/css">
		table{
			border: 1px solid black;
			border-collapse: collapse;
		}
		tr td {
			border: 1px solid black;
			padding-left: 10px;
			padding-right: 10px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div align="center">
		<div>
			<h3>Thông tin khách hàng</h3>
			<table>
				<tr>
					<td>Mã đơn hàng</td>
					<td>Họ tên</td>
					<td>Số điện thoại</td>
					<td>Địa chỉ</td>
				</tr>
				<tr>
					<td>{{$data['orderid']}}</td>
					<td>{{$data['name']}}</td>
					<td>{{$data['phone']}}</td>
					<td>{{$data['address']}}</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>