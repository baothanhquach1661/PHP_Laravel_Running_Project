@extends('frontend.main_master')

@section('title')
	Giỏ hàng của bạn
@endsection

@section('content')

@include('frontend.body.coupon')

<!-- Start Cart Area  -->
<div class="axil-product-cart-area axil-section-gap">
    <div class="container">
        <div class="axil-product-cart-wrap">
            <div class="product-table-heading">
                <h4 class="title">Giỏ hàng của bạn</h4>
                {{-- <a href="#" class="cart-clear">Clear Shoping Cart</a> --}}
            </div>
            <div class="table-responsive">
                <table class="table axil-product-table axil-cart-table mb--40">
                    <thead>
                        <tr>
                            <th scope="col" class="product-remove"></th>
                            <th scope="col" class="product-thumbnail">Sản Phẩm</th>
                            <th scope="col" class="product-title"></th>
                            <th scope="col" class="product-price">Giá</th>
                            <th scope="col" class="product-quantity">Số lượng</th>
                            <th scope="col" class="product-subtotal">Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody id="cartPage">


                    </tbody>
                </table>
            </div>
            <div class="cart-update-btn-area">
                <div class="input-group product-cupon" id="couponField">
                    @if(Session::has('coupon'))

                    @else
                        <input placeholder="Nhập mã coupon code" type="text" id="coupon_name">
                        <div class="product-cupon-btn">
                            <button type="submit" onclick="applyCoupon()" class="axil-btn btn-bg-primary">ÁP DỤNG</button>
                        </div>
                    @endif
                    
                </div>

                <div class="update-btn">
                    <input type="button" class="btn-bg-primary update-cart" value="Cập nhập giỏ hàng" onClick="window.location.reload(true)">
                </div>
            </div>

            <div class="row">
                <div class="col-xl-5 col-lg-7">
                    <div class="axil-order-summery mt--80">
                        <h5 class="title mb--20">Tóm tắt đơn hàng</h5>
                        <div class="summery-table-wrap">

                            <table class="table summery-table mb--30">
                                <tbody id="couponCalField">
                                    
                                </tbody>
                            </table>

                        </div>
                        <a href="{{ route('checkout') }}" class="axil-btn btn-bg-primary checkout-btn">THANH TOÁN</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Cart Area  -->

@endsection















































