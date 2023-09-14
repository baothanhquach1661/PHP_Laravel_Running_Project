@extends('backend.admin.admin_master')
@section('title', 'Cập nhật đơn hàng')
@section('admin')


    <div class="app-content main-content mt-0">
		<div class="side-app">
			<!-- CONTAINER -->
			<div class="main-container container-fluid">

				<!-- PAGE-HEADER -->
				<div class="page-header">
					<div>
					</div>
					<div class="ms-auto pageheader-btn">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Trang chính</a></li>
							<li class="breadcrumb-item active" aria-current="page">thông tin đơn hàng</li>
						</ol>
					</div>
				</div>
				<!-- PAGE-HEADER END -->

				<!-- ROW-1 OPEN -->
				<div class="row">
					<div class="col-xl-6 col-md-12">

						<div class="card">
							<div class="card-header border-bottom">
								<h3 class="card-title">Thông tin khách hàng</h3>
							</div>
							<div class="card-body">
								<table class="table border-top-0">
									<tr>
										<td class="fs-20 border-top-0">Họ tên:</td>
										<td class="text-end fs-20 border-top-0">{{ $order->name }}</td>
									</tr>
									<tr>
										<td class="fs-20 border-top-0">Email:</td>
										<td class="text-end fs-20 border-top-0">{{ $order->email }}</td>
									</tr>
									<tr>
										<td class="fs-20 border-top-0">Số điện thoại:</td>
										<td class="text-end fs-20 border-top-0">{{ $order->phone }}</td>
									</tr>
									<tr>
										<td class="fs-20 border-top-0">Địa chỉ giao hàng:</td>
										<td class="text-end fs-20 border-top-0">{{ $order->address }}</td>
									</tr>
								</table>
							</div>
							{{-- <div class="card-footer">
								<div class="step-footer text-end">
									<a href="products.html" class="btn btn-primary my-1">
										Continue Shopping
									</a>
								</div>
							</div> --}}
						</div>

					</div>
					<div class="col-xl-6 col-md-12">
						<div class="card">
							<div class="card-header border-bottom">
								<h3 class="card-title">Chi tiết đơn hàng: #{{ $order->invoice_no }}</h3>
							</div>
							<div class="card-body">
								<table class="table border-top-0">
									<tr>
										<td class="fs-20 border-top-0">Order number:</td>
										<td class="text-end fs-20 border-top-0">{{ $order->order_number }}</td>
									</tr>
									<tr>
										<td class="fs-20 border-top-0">Ngày thanh toán:</td>
										<td class="text-end fs-20 border-top-0">{{ $order->order_date }}</td>
									</tr>
									<tr>
										<td class="fs-20 border-top-0">Hình thức thanh toán:</td>
										<td class="text-end fs-20 border-top-0">{{ $order->payment_method }}</td>
									</tr>
									<tr>
										<td class="fs-20 border-top-0">Phí vận chuyển:</td>
										<td class="text-end fs-20 border-top-0">{{ number_format($order->shipping_fee) }}₫</td>
									</tr>
									<tr>
										<td class="fs-20 border-top-0">Tổng đơn hàng:</td>
										<td class="text-end fs-20 border-top-0">{{ number_format($order->amount) }}₫</td>
									</tr>
									<tr>
										<td class="fs-20 border-top-0">Tình trạng:</td>
										<td class="text-end fs-20 border-top-0">
											@if($order->status == 'Delivered')
												Đơn hàng này đã hoàn tất rùi
											@else
												{{ $order->status }}
											@endif
										</td>
									</tr>

									<tr>
										<td class="fs-20 border-top-0"><a href="{{ route('pending-order.delete', $order->id) }}" class="btn btn-danger" id="delete">Hủy đơn hàng</a></td>
										
										@if($order->status == 'Pending')
											<td>
												<a href="{{ route('pending-confirm', $order->id) }}" class="btn btn-block btn-primary" style="font-size:20px;" id="confirm">Confirm Order</a>
											</td>
										@elseif($order->status == 'Confirmed')
											<td>
												<a href="{{ route('confirmed-processing', $order->id) }}" class="btn btn-block btn-primary" style="font-size:20px;" id="processing">Xử lý đơn hàng</a>
											</td>
										@elseif($order->status == 'Processing')
											<td>
												<a href="{{ route('processing-picked', $order->id) }}" class="btn btn-block btn-primary" style="font-size:20px;" id="picked">Đã soạn xong đơn hàng</a>
											</td>
										@elseif($order->status == 'Picked')
											<td>
												<a href="{{ route('picked-shipped', $order->id) }}" class="btn btn-block btn-primary" style="font-size:20px;" id="shipped">Gửi hàng đi</a>
											</td>
										@elseif($order->status == 'Shipped')
											<td>
												<a href="{{ route('shipped-delivered', $order->id) }}" class="btn btn-block btn-primary" style="font-size:20px;" id="delivered">Xác nhận hoàn tất</a>
											</td>
										@endif

										

									</tr>

								</table>
							</div>
						</div>

					</div>

					<div class="col-xl-12 col-md-12">
						<div class="card">
							<div class="card-header border-bottom">
								<h3 class="card-title">Product</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered table-vcenter text-nowrap mb-0">
										<thead>
											<tr class="border-top">
												<th class="w-10">Preview</th>
												<th>Tên sản phẩm</th>
												<th>SKU</th>
												<th>Giá</th>
												<th>Màu sắc</th>
												<th>Kích thước</th>
												<th>Số lượng</th>
												<th>Amount</th>
											</tr>
										</thead>
										<tbody>
											@foreach($orderDetail as $data)
											<tr>
												<td>
													<img src="{{ asset($data->product->product_thumbnail) }}" alt="{{ $data->product->product_name }}" class="cart-img">
												</td>
												<td>{{ $data->product->product_name }}</td>
												<td>{{ $data->product->product_code }}</td>
												<td>
													@if( $data->product->discount_price == NULL )
														{{ number_format($data->product->selling_price) }}₫
													@else
														{{ number_format($data->product->discount_price) }}₫
													@endif
												</td>
												<td>{{ $data->color }}</td>
												<td>{{ $data->size }}</td>
												<td>{{ $data->qty }}</td>
												<td>{{ number_format($data->price * $data->qty) }}₫</td>
											</tr>
											@endforeach
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div><!-- COL-END -->
				<!-- ROW-1 CLOSED -->

			</div>
		</div>
	</div>




@endsection






















































