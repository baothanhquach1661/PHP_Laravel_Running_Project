@extends('frontend.main_master')
@section('title')
   Thanh toán bằng chuyển khoản ngân hàng
@endsection
@section('content')


<div class="axil-checkout-area axil-section-gap">
        <div class="container">

            <form action="{{ route('transfer-checkout.success') }}" method="post" id="payment-form">
                @csrf

               <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
               <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
               <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
               <input type="hidden" name="shipping_address" value="{{ $data['shipping_address'] }}">
               <input type="hidden" name="notes" value="{{ $data['notes'] }}">

                @if(Session::get('fee'))
                    <input type="hidden" name="order_fee" value="{{ Session::get('fee') }}">
                @else
                    <input type="hidden" name="order_fee" value="30000">
                @endif

                <div class="row">
                    <div class="col-lg-7">
                         <div class="post-heading">
                             <h2 class="title">Cảm ơn bạn đã mua hàng tại Rinart</h2>
                             <div class="axil-post-meta">
                                 <div class="post-meta-content">
                                    <p>Nhân viên Rinart sẽ gọi điện thoại xác nhận bằng số điện thoại <strong>{{ $data['shipping_phone'] }}</strong> Vui lòng đợi chúng tôi nhé.</p>
                                    <p>Để thuận lợi cho việc thanh toán. Quý khách chỉ chuyển khoản sau khi nhận được cuộc gọi xác nhận đơn hàng. Mọi thắc mắc và góp ý của quý khách vui lòng gọi hotline 0909888213 để được hỗ trợ trong thời gian sớm nhất. Xin cảm ơn</p>
                                    <p>Rất hân hạnh được phục vụ quý khách</p>
                                    <br>
                                    <div style="border: 1px solid gray; padding: 10px 15px; border-radius: 10px;">
                                       <h5>Thông tin đơn hàng</h5>
                                       <p>Họ Tên: {{ $data['shipping_name'] }}</p>
                                       <p>Số điện thoại: {{ $data['shipping_phone'] }}</p>
                                       <p>Địa chỉ giao hàng: {{ $data['shipping_address'] }}</p>

                                       <p>phương thức thanh toán: Thanh toán bằng chuyển khoản ngân hàng</p>
                                    </div>
                                 </div>
                             </div>
                         </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="axil-order-summery order-checkout-summery">
                            <div class="summery-table-wrap">
                                <table class="table summery-table" style="table-layout:fixed;">
                                    <thead>
                                        <tr>
                                            <th style="width: 36%;"></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if(Session::has('coupon'))
                                            <tr class="order-shipping">
                                                <td>Mã giảm giá:</td>
                                                <td></td>
                                                <td style="text-align: right;"><span>{{ session()->get('coupon')['coupon_name'] }}</span></td>
                                            </tr>
                                            <tr class="order-shipping">
                                                <td>Chi tiết mã:</td>
                                                <td></td>
                                                @if(session()->get('coupon')['discount_percentage'] == null)
                                                    <td style="text-align: right;"><span>- {{ session()->get('coupon')['discount_regular'] }}₫</span></td>
                                                @else
                                                    <td style="text-align: right;"><span>{{ session()->get('coupon')['discount_percentage'] }}% OFF</span></td>
                                                @endif
                                            </tr>
                                            <tr class="order-subtotal">
                                                <td>Tạm tính:</td>
                                                <td></td>
                                                @if(session()->get('coupon')['discount_percentage'] == null)
                                                    <td style="text-align: right;">{{ session()->get('coupon')['total_regular_amount'] }}₫</td>
                                                @else
                                                    <td style="text-align: right;">{{ session()->get('coupon')['total_percentage_amount'] }}₫</td>
                                                @endif
                                            </tr>
                                            <tr class="order-shipping">
                                                @if(Session::get('fee'))
                                                    <td>Phí vận chuyển:</td>
                                                    <td></td>
                                                    <td style="text-align: right;">
                                                        {{ number_format(Session::get('fee')) }}₫
                                                    </td>
                                                @else
                                                    <td>Phí vận chuyển:</td>
                                                    <td></td>
                                                    <td style="text-align: right;">30,000₫</td>
                                                @endif
                                                
                                            </tr>

                                            <tr class="order-shipping">
                                                <td><h4>Tổng Cộng:</h4></td>
                                                <td></td>


                                                @if(session()->get('coupon')['discount_percentage'] == null)
                                                    <td style="text-align: right;
                                                            font-weight: 600;
                                                            font-size: 1.413em;">
                                                        @php
                                                            $total_regular = (int)str_replace(',','',session()->get('coupon')['total_regular_amount']);
                                                            $final_total = $total_regular + Session::get('fee'); 
                                                            $original_fee = (int)(30000);
                                                        @endphp

                                                        @if(Session::get('fee'))
                                                            {{ number_format($final_total) }}₫
                                                        @else
                                                            {{ number_format($final_total + $original_fee) }}₫
                                                        @endif
                                                    </td>
                                                @else
                                                    <td style="text-align: right;
                                                            font-weight: 600;
                                                            font-size: 1.413em;">
                                                    @php
                                                        $total_regular = (int)str_replace(',','',session()->get('coupon')['total_percentage_amount']);
                                                        $final_total = $total_regular + Session::get('fee'); 
                                                    @endphp
                                                    {{ number_format($final_total) }}₫
                                                    </td>
                                                @endif
                                            </tr>
                                        @else
                                            <tr class="order-subtotal">
                                                <td>Tạm tính:</td>
                                                 <td></td>
                                                <td>{{ number_format($cartTotal) }}₫</td>
                                            </tr>
                                            <tr class="order-shipping">
                                                @if(Session::get('fee'))
                                                    <td>Phí vận chuyển:</td>
                                                    <td></td>
                                                    <td style="text-align: right;">
                                                        {{ number_format(Session::get('fee')) }}₫
                                                    </td>
                                                @else
                                                    <td>Phí vận chuyển:</td>
                                                    <td></td>
                                                    <td style="text-align: right;">30,000₫</td>
                                                @endif
                                            </tr>
                                            <tr class="order-subtotal">
                                                <td><h4>Tổng cộng:</h4></td>
                                                <td></td>
                                                <td style="text-align: right;
                                                            font-weight: 600;
                                                            font-size: 1.413em;">
                                                    @php
                                                        $original_fee = (int)(30000);
                                                    @endphp
                                                    @if(Session::get('fee'))
                                                        {{ number_format($cartTotal + Session::get('fee')) }}₫
                                                    @else
                                                        {{ number_format($cartTotal + $original_fee) }}₫
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                                
                            </div>

                            <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Hoàn tất đơn hàng</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>




@endsection




































