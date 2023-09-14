@extends('frontend.main_master')
@section('title')
Thông tin đơn hàng
@endsection
@section('content')

	<div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item"><a href="{{ route('dashboard') }}">Tài khoản của tôi</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Thông tin đơn hàng</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    
                </div>
            </div>
        </div>
    </div>


    <!-- Start My Account Area  -->
    <div class="axil-dashboard-area axil-section-gap">
        <div class="container">
            <div class="axil-dashboard-warp">
                <div class="row">

                    <div class="col-xl-6 col-md-4">
                        <div class="tab-content">

                            <div class="axil-dashboard-account">
                                <div class="row">
                                    <h3>Thông tin khách hàng</h3>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-customs">Họ tên:</label>
                                            <input type="text" class="form-control input-customs" name="name" value="{{ $order->name }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-customs">Số điện thoại</label>
                                            <input type="text" class="form-control input-customs" name="phone_number" value="{{ $order->phone }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-customs">Địa chỉ giao hàng</label>
                                            <input type="text" class="form-control input-customs" name="address" value="{{ $order->address }}" readonly>
                                        </div>
                                    </div>

                                    <hr>

                                    <h3>Đơn hàng</h3>
                                    @foreach($orderDetail as $data)
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <img src="{{ asset($data->product->product_thumbnail) }}" alt="{{ $data->product->product_name }}" height="50px;" width="50px;">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="label-customs">Tên sản phẩm</label>
                                                <input type="text" class="form-control input-customs" name="phone_number" value="{{ $data->product->product_name }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="label-customs">Giá</label>
                                                <input type="text" class="form-control input-customs" name="phone_number" value="{{ number_format($data->price) }}₫ x {{ $data->qty }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="label-customs">Màu sắc</label>
                                                <input type="text" class="form-control input-customs" name="address" value="{{ $data->color }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="label-customs">Kích thước</label>
                                                <input type="text" class="form-control input-customs" name="address" value="{{ $data->size }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="label-customs">Số lượng</label>
                                                <input type="text" class="form-control input-customs" name="address" value="{{ $data->qty }}" readonly>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>


                            </div>

                        </div>
                    </div>

                    <div class="col-xl-6 col-md-12">
                        <div class="tab-content">

                            <div class="axil-dashboard-account">
                                <div class="row">
                                    <h3>Chi tiết đơn hàng: {{ $order->invoice_no }}</h3>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-customs">Order number:</label>
                                            <input type="text" class="form-control input-customs" name="order_date" value="#{{ $order->order_number }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-customs">Ngày thanh toán:</label>
                                            <input type="text" class="form-control input-customs" name="order_date" value="{{ $order->order_date }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-customs">Hình thức thanh toán:</label>
                                            <input type="text" class="form-control input-customs" name="order_date" value="{{ $order->payment_method }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-customs">Phí vận chuyển:</label>
                                            <input type="text" class="form-control input-customs" name="shipping_fee" value="{{ number_format($order->shipping_fee) }}₫" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="label-customs">Tổng Đơn giá:</label>
                                            <input type="text" class="form-control input-customs" name="order_date" value="{{ number_format($order->amount) }}₫" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            @if( $order->status == 'Pending')
                                                <label class="label-customs">Tình trạng:</label>
                                                <input type="text" class="form-control input-customs" name="order_status" value="Đang xử lý" readonly>
                                            @elseif( $order->status == 'Confirmed')
                                                <label class="label-customs">Tình trạng:</label>
                                                <input type="text" class="form-control input-customs" name="order_status" value="Đã xác nhận" readonly>
                                            @elseif( $order->status == 'Processing')
                                                <label class="label-customs">Tình trạng:</label>
                                                <input type="text" class="form-control input-customs" name="order_status" value="Đang soạn" readonly>
                                            @elseif( $order->status == 'Picked')
                                                <label class="label-customs">Tình trạng:</label>
                                                <input type="text" class="form-control input-customs" name="order_status" value="Đang soạn" readonly>
                                            @elseif( $order->status == 'Shipped')
                                                <label class="label-customs">Tình trạng:</label>
                                                <input type="text" class="form-control input-customs" name="order_status" value="Đang trên đường đến" readonly>
                                            @elseif( $order->status == 'Delivered')
                                                <label class="label-customs">Tình trạng:</label>
                                                <input type="text" class="form-control input-customs" name="order_status" value="Đã hoàn tất" readonly>
                                            @else
                                                <label class="label-customs">Tình trạng:</label>
                                                <input type="text" class="form-control input-customs" name="order_status" value="Đã hủy" readonly>
                                            @endif
                                        </div>
                                    </div>
                                        
                                </div>


                            </div>

                        </div>
                    </div>

                </div>

                <hr>

                @if($order->status !== 'Pending')

                    @php
                        $order = App\Models\Order::where('id', $order->id)->where('return_reason', '=', NULL)->first();
                    @endphp

                    @if($order)
                        <form action="{{ route('return.order', $order->id) }}" method="post">
                            @csrf
                            <div class="col-lg-12">
                                <h5>Bạn muốn hủy đơn hàng?</h5>
                                <div class="form-group">
                                    <label>Lý do hủy đơn hàng</label>
                                    <textarea cols="30" rows="10" class="form-control" name="return_reason"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" class="axil-btn btn-bg-primary">Gửi</button>
                            </div>
                        </form>
                    @else

                        <span class="badge badge-pill badge-warning" style="background: #CE5959;">Yêu cầu trả hàng của quý khách đã được gửi.</span>
                    @endif
                    
                @else

                    
                
                @endif
            </div>
        </div>
    </div>
    <!-- End My Account Area  -->








@endsection






























