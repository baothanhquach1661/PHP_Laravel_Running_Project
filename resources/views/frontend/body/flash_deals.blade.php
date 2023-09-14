<div class="axil-new-arrivals-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
    <div class="container">
        <div class="section-title-wrapper">
            <h2 class="title">Flash Sales</h2>
        </div>
        <div class="new-arrivals-product-activation slick-layout-wrapper--30 axil-slick-arrow  arrow-top-slide">
            @foreach($flash_deals as $product)
                @php
                    $formated_amount = number_format($product->discount_price);
                    $selling_price = number_format($product->selling_price);
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price) * 100;
                @endphp
                <div class="slick-single-layout">
                    <div class="axil-product product-style-two has-color-pick">
                        <div class="thumbnail">
                            <a href="{{ route('show', ['slug' => $product->product_slug]) }}">
                                <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="1500" src="{{ $product->product_thumbnail }}" alt="{{ $product->product_name }}">
                            </a>
                            <div class="label-block label-right">
                                @if($product->discount_price == NULL)
                                    <div class="product-badget" style="background-color: #DF2E38;">NEW</div>
                                @else
                                    <div class="product-badget">{{ round($discount) }}%</div>
                                @endif
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{ route('show', ['slug' => $product->product_slug]) }}">{{ $product->product_name }}</a></h5>

                                @php
                                    $formated_amount = number_format($product->discount_price);
                                    $selling_price = number_format($product->selling_price);
                                @endphp

                                <div class="product-price-variant">

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
            <!-- End .slick-single-layout -->

        </div>
    </div>
</div>



































