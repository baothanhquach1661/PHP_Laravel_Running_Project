<div class="axil-product-area bg-color-white axil-section-gap pb--0">
    <div class="container">
        <div class="product-area pb--80">
            <div class="section-title-wrapper">
                <h3 class="title">SẢN PHẨM NỔI BẬT</h3>
            </div>
            <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                <div class="slick-single-layout">
                    <div class="row row--15">

                        @foreach($features as $product)

                        @php
                            $amount = $product->selling_price - $product->discount_price;
                            $discount = ($amount/$product->selling_price) * 100;
                        @endphp
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="{{ route('show', ['slug' => $product->product_slug]) }}">
                                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="1500" src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name }}">
                                        </a>
                                        <div class="label-block label-right">
                                        @if($product->discount_price == NULL)
                                            <div class="product-badget" style="background-color: #EB455F;">new</div>
                                        @else
                                            <div class="product-badget">{{ round($discount) }}%</div>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="{{ route('show', ['slug' => $product->product_slug]) }}">{{ $product->product_name }}</a></h5>
                                            <div class="product-price-variant">

                                                @php
                                                    $formated_amount = number_format($product->discount_price);
                                                    $selling_price = number_format($product->selling_price);
                                                @endphp

                                                @if($product->discount_price == NULL)
                                                    <span class="price current-price" style="color: rgba(0,0,0,.54);">
                                                        ₫{{ $selling_price }}
                                                    </span>
                                                @else
                                                    <span class="price current-price" style="text-decoration: line-through;color: rgba(0,0,0,.54); font-size: 15px;">
                                                        ₫{{ $selling_price }}
                                                    </span>
                                                    <span class="price current-price" style="color: #ee4d2d;">
                                                        ₫{{ $formated_amount }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Single Product  -->
                    </div>
                </div>
                <!-- End .slick-single-layout -->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center mt--20 mt_sm--0">
                    <a href="#" class="axil-btn btn-bg-lighter btn-load-more">XEM THÊM</a>
                </div>
            </div>
        </div>
    </div>
</div>










































