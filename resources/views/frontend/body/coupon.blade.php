@php

    $coupons = App\Models\Coupon::where('status', 1)->get();
    $coupon_image = App\Models\CouponImage::find(1);

@endphp


<div class="header-top-campaign" style="background-image: url('{{ asset( $coupon_image->coupon_image )}}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-10">
                <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                    @foreach($coupons as $coupon)
                        <div class="slick-slide">
                            <div class="campaign-content">
                                <p style="color: {{ $coupon->description }}">{{ $coupon->title }} : 
                                    <strong>
                                        @if($coupon->discount_regular == NULL)
                                            {{ $coupon->discount_percentage }}% OFF
                                        @else
                                            Giảm {{ number_format($coupon->discount_regular) }}₫
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
