@extends('frontend.main_master')

@section('title')
    Thanh toán giỏ hàng
@endsection

@section('content')


    <div class="axil-checkout-area axil-section-gap">
        <div class="container">

            <form action="{{ route('checkout.store') }}" method="post" id="payment-form">
                @csrf

                @if(Session::get('fee'))
                    <input type="hidden" name="order_fee" value="{{ Session::get('fee') }}">
                @else
                    <input type="hidden" name="order_fee" value="30000">
                @endif

                <div class="row">
                    <div class="col-lg-6">
                        <div class="axil-checkout-notice">
                            <div class="axil-toggle-box">
                                @if(Auth::user())
                                
                                @else
                                <div class="toggle-bar"><i class="fas fa-user"></i> Bạn đã có tài khoản? <a href="{{ route('login') }}" class="toggle-btn">Đăng nhập tại đây<i class="fas fa-angle-down"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>

                        <h5 class="title mb--20">Thông tin giao hàng</h5>

                        <div class="axil-checkout-billing">
                            <div class="form-group">
                                <label>Họ và tên<span>*</span></label>
                                @if(Auth::user())
                                    <input type="text"  name="shipping_name" value="{{ Auth::user()->name }}" required>
                                @else
                                    <input type="text" name="shipping_name" required>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại<span>*</span></label>
                                @if(Auth::user())
                                    <input type="text"  name="shipping_phone" value="{{ Auth::user()->phone_number }}" required>
                                @else
                                    <input type="text" name="shipping_phone" required>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ email</label>
                                @if(Auth::user())
                                    <input type="email"  name="shipping_email" value="{{ Auth::user()->email }}">
                                @else
                                    <input type="email" name="shipping_email">
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ<span>*</span></label>
                                @if(Auth::user())
                                <input type="text" name="shipping_address" class="mb--15" value="{{ Auth::user()->address }}" required>
                                @else
                                    <input type="email" name="shipping_address">
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea id="notes" name="notes" rows="2"></textarea>
                            </div>
                            
                        </div>

                        <h5 class="title mb--20">Xin Vui Lòng Chọn Khu vực vận chuyển <span style="color: red;">*</span></h5>

                    </form>
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Tỉnh/ Thành <span>*</span></label>
                                    <select id="city_id" name="city_id" class="choose city_id">
                                        <option>--Chọn--</option>
                                        @foreach($city_name as $data)
                                            <option value="{{ $data->matp }}">{{ $data->city_name }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Quận/ Huyện <span>*</span></label>
                                    <select class="choose province_id" id="province_id" name="province_id">
                                        <option>--Chọn--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Phường/ Xã <span>*</span></label>
                                    <select class="ward_id" name="ward_id" id="ward_id">
                                        <option>--Chọn--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button type="button" onClick="window.location.reload(true)" class="axil-btn btn-bg-primary calculate_delivery" name="calculate_order">Cập nhật phí vận chuyển</button>
                                </div>
                            </div>

                        </div>
                    </form>

                    </div>
                    <div class="col-lg-6">
                        <div class="axil-order-summery order-checkout-summery">
                            <div class="summery-table-wrap">
                                <table class="table summery-table" style="table-layout:fixed;">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($carts as $item)
                                            <tr class="order-product">
                                                <td>
                                                    <span class="bell">
                                                            <img src="{{ asset($item->options->image) }}" alt=alerts>
                                                        <span class="bellnumbers">{{ $item->qty }}</span>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="quantity" style="margin-left: 5px;"> {{ $item->name }}</span>
                                                    <span style="display: inline-block;
                                                            background: #e7e7e7;
                                                            border-radius: 10px;
                                                            position: relative;
                                                            cursor: pointer;
                                                            padding: 3px 8px 3px 8px;">{{ $item->options->color }} / {{ $item->options->size }}</span>
                                                </td>
                                                <td>{{ number_format($item->subtotal) }}₫</td>
                                            </tr>
                                        @endforeach



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
                                                        <a href="{{ route('del-fee') }}" class="remove-delivery_fee">
                                                            <i class="fal fa-times"></i>
                                                        </a>
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
                                                        <a href="{{ route('del-fee') }}" class="remove-delivery_fee">
                                                            <i class="fal fa-times"></i>
                                                        </a>
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
                            <div class="order-payment-method">
                                <div class="single-payment">
                                    <div class="input-group">
                                        <div class="axil-toggle-box">
                                            <div class="toggle-bar">
                                                <a href="javascript:void(0)" class="toggle-btn justify-content-between align-items-center">
                                                    <input type="radio" value="transfer" checked id="radio1" name="payment" class="toggle-btn">
                                                    <label for="radio1">Chuyển khoản qua ngân hàng</label>
                                                    {{-- <img width="100" src="{{ asset('frontend/assets/images/banking.jpg') }}" alt="Bank transfer directly"> --}}
                                                </a>
                                                
                                                <div class="axil-checkout-coupon toggle-open">
                                                    <p>Số tài khoản: 123456789</p>
                                                    <p>Tên chủ tài khoản: TRAN THUC MI</p>
                                                    <p>Tên ngân hàng: TPBank Tien Phong Commercial Joint Stock Bank</p>
                                                    <p>Chi nhánh: TPBank khắp mọi nơi</p>
                                                </div>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="single-payment">
                                    <div class="input-group justify-content-between align-items-center">
                                        <input type="radio" id="radio2" name="payment" value="cod">
                                        <label for="radio2">Thanh toán khi nhận hàng (COD)</label>
                                        {{-- <img width="100" src="{{ asset('frontend/assets/images/COD2.jpg') }}" alt="Cash on Delivery"> --}}
                                    </div>

                                </div>
                                <div class="single-payment">
                                    <div class="input-group justify-content-between align-items-center">
                                        <input type="radio" id="radio3" name="payment" value="momo">
                                        <label for="radio3">Ví MoMo</label>
                                        <img width="100" src="{{ asset('frontend/assets/images/momo_logo.jpg') }}" alt="Momo payment">
                                    </div>
                                    
                                </div>
                            </div>
                            <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Hoàn tất đơn hàng</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


@endsection
































