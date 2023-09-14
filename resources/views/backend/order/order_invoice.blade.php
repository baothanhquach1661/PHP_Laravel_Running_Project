<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Invoice</title>

	<style type="text/css">
		* {
			font-family: DejaVu Sans;;
		}
		table{
			font-size: x-small;
		}
		tfoot tr td{
			font-weight: bold;
			font-size: x-small;
		}
		.gray {
			background-color: lightgray
		}
		.font{
			font-size: 15px;
		}
		.authority {
			/*text-align: center;*/
			float: right
		}
		.authority h5 {
			margin-top: -10px;
			color: green;
			/*text-align: center;*/
			margin-left: 35px;
		}
		.thanks p {
			color: green;;
			font-size: 16px;
			font-weight: normal;
			font-family: serif;
			margin-top: 20px;
		}
	</style>

</head>
<body>

	<table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
		<tr>
			
			<td>
				<p class="font">
					Rinart Shop Office <br>
					Email: rinart_support@gmail.com <br>
					Phone: 0909888213 <br>
					236 Tân Thành, Quận 5 Phường 12, Tp.HCM <br>

				</p>
			</td>

			<td valign="top">
				<!-- {{-- <img src="" alt="" width="150"/> --}} -->
				<h2 style="color: green; font-size: 26px;"><strong>Rinart Shop</strong></h2>
			</td>
		</tr>

	</table>


	<table width="100%" style="background:white; padding:2px;"></table>
	<table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
		<tr>
			<td>
				<p class="font">
					<strong>Họ Tên:</strong> {{ $order->name }} <br>
					<strong>Email:</strong> {{ $order->email }} <br>
					<strong>Số điện thoại:</strong> {{ $order->phone }} <br>

					<strong>Địa chỉ giao hàng:</strong> {{ $order->address }} <br>


					<h3><span style="color: green;">Invoice:</span> {{ $order->invoice_no }}</h3>
					Ngày thanh toán: {{ $order->order_date }} <br>
					Ngày giao hàng: {{ $order->delivered_date }} <br>
					Hình thức thanh toán : {{ $order->payment_method }} </span>
				</p>
			</td>
			<td>
				
			</p>
		</td>
	</tr>
</table>
<br/>
<h3>Products</h3>
<table width="100%">
	<thead style="background-color: green; color:#FFFFFF;">
		<tr class="font">
			<th>Hình ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Size</th>
			<th>Color</th>
			<th>Code</th>
			<th>Qty</th>
			<th>Đơn giá</th>
			<th>Tổng cộng </th>
		</tr>
	</thead>
	<tbody>
		@foreach($orderDetail as $data)
		<tr class="font">
			<td align="center">
				<img src="{{ public_path($data->product->product_thumbnail)  }}" height="60px;" width="60px;" alt="{{ $data->product->product_name }}">
			</td>
			<td align="center">{{ $data->product->product_name }}</td>
			<td align="center">
				@if($data->size == NULL)
				
				@else
					{{ $data->size }}
				@endif
			</td>
			<td align="center">
				@if($data->color == NULL)
				
				@else
					{{ $data->color }}
				@endif
			</td>
			<td align="center">{{ $data->product->product_code }}</td>
			<td align="center">{{ $data->qty }}</td>
			<td align="center">{{ number_format($data->price) }}₫</td>
			<td align="center">{{ number_format($data->price * $data->qty) }}₫</td>
		</tr>
		@endforeach

	</tbody>
</table>
<br>
<table width="100%" style=" padding:0 10px 0 10px;">
	<tr>
		<td align="right" >
			<h2><span style="color: green;">Phí vận chuyển:</span> {{ number_format($order->shipping_fee) }}₫ </h2>
			<h2><span style="color: green;">Tổng cộng:</span> {{ number_format($order->amount) }}₫ </h2>
			{{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
			</td>
		</tr>
	</table>
	<div class="thanks mt-3">
		<p>Thanks For Buying Products..!!</p>
	</div>
	<div class="authority float-right mt-5">
		<p>-----------------------------------</p>
		<h5>Authority Signature:</h5>
	</div>
</body>
</html>










