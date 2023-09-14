@extends('frontend.main_master')
@section('title')
	{{ $products->product_name }}
@endsection
@section('content')

	{{-- @include('frontend.body.coupon') --}}

	<!-- Start Shop Area  -->
    <div class="axil-single-product-area bg-color-white">
        <div class="single-product-thumb axil-section-gap pb--30">
            <div class="container">
                <div class="row row--50">
                    <div class="col-lg-6 mb--40">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-large-thumbnail-2 single-product-thumbnail axil-product slick-layout-wrapper--15 axil-slick-arrow arrow-both-side-3">
                                    @foreach($multi_img as $img)
	                                    <div class="small-thumb-img ">
	                                        <img src="{{ asset($img->photo_name) }}" alt="{{ $products->product_name }}">
	                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="small-thumb-wrapper product-small-thumb-2 small-thumb-style-two small-thumb-style-three">
                                    @foreach($multi_img as $img)
	                                    <div class="small-thumb-img ">
	                                        <img src="{{ asset($img->photo_name) }}" alt="{{ $products->product_name }}">
	                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb--40">

                        <form action="{{ route('add.cart', $products->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $products->id }}" name="id">
                            <input type="hidden" value="{{ $products->product_name }}" name="product_name">
                            <input type="hidden" value="{{ $products->discount_price }}" name="discount_price">
                            <input type="hidden" value="{{ $products->product_thumbnail }}"  name="product_thumbnail">
                            <input type="hidden" value="{{ $products->selling_price }}"  name="selling_price">

                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title mb--40" id="product_name" name="product_name">{{ $products->product_name }}</h2>
                                    @php
    					                $formated_amount = number_format($products->discount_price);
    					                $selling_price = number_format($products->selling_price);
    				              	@endphp

                                    <div class="price-amount price-offer-amount">
    									@if($products->discount_price == NULL)
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

                                    <div class="product-rating">
                                    	<span id="pcode">SKU | {{ $products->product_code }}</span>
                                    </div>
                                    <ul class="product-meta">
                                        <li><i class="fal fa-check"></i>Còn hàng</li>
                                        <li><i class="fal fa-check"></i>Giao hàng hỏa tốc khắp tỉnh</li>
                                        <li><i class="fal fa-check"></i>Giảm giá thường xuyên vào các dịp lễ</li>
                                    </ul>

                                    <div class="product-variations-wrapper">

                                        @if($products->product_color == NULL)
                                        @else
                                        <!-- Start Product Variation  -->
                                        <div class="product-variation">
                                            <h6 class="title">Màu sắc:</h6>
                                            <div class="color-variant-wrapper">
                                                <select name="color" id="color" style="height: 40px;">
                                                    @foreach($product_color as $color)
                                                        <option value="{{ $color }}">{{ $color }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- End Product Variation  -->

                                        @if($products->product_size == NULL)
                                        @else
                                        <!-- Start Product Variation  -->
                                        <div class="product-variation">
                                            <h6 class="title">Kích thước:</h6>
                                            <div class="color-variant-wrapper">
                                                <select name="size" id="size" style="height: 40px;">
                                                    @foreach($product_size as $size)
                                                        <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        <!-- End Product Variation  -->

                                    </div>

                                    <div class="product-action-wrapper d-flex-center">
                                        <!-- Start Product Action  -->
                                        <ul class="product-action action-style-two d-flex-center mb--0">
                                            <li class="add-to-cart">
                                                <input type="hidden" id="{{ $products->id }}">
                                                <button type="submit" onclick="addToCart()" class="axil-btn btn-bg-primary">THÊM VÀO GIỎ HÀNG</button>
                                            </li>
                                        </ul>
                                        <!-- End Product Action  -->
                                    </div>
                                    <!-- End Product Action Wrapper  -->

                                    <br>

                                    {{-- <div class="contact-form">
                                    	<h3 class="title mb--30">HOẶC GỬI TIN NHẮN</h3>

                                    	<form method="POST" action="">
                                    		@csrf

                                    		<div class="row row--10">
                                    			<div class="col-lg-4">
                                    				<div class="form-group">
                                    					<label for="contact-name">Tên <span>*</span></label>
                                    					<input type="text" name="name" id="name" required>
                                    				</div>
                                    			</div>
                                    			<div class="col-lg-4">
                                    				<div class="form-group">
                                    					<label for="contact-phone">Số điện thoại <span>*</span></label>
                                    					<input type="text" name="phone" id="phone" required>
                                    				</div>
                                    			</div>
                                    			<div class="col-lg-4">
                                    				<div class="form-group">
                                    					<label for="contact-email">E-mail <span>*</span></label>
                                    					<input type="email" name="email" id="email" required>
                                    				</div>
                                    			</div>
                                    			<div class="col-12">
                                    				<div class="form-group">
                                    					<label for="contact-message">Message</label>
                                    					<textarea name="message" id="message" cols="1" rows="2" required></textarea>
                                    				</div>
                                    			</div>
                                    			<div class="col-12">
                                    				<div class="form-group mb--0">
                                    					<button type="submit" class="axil-btn btn-bg-primary">GỬI</button>
                                    				</div>
                                    			</div>
                                    		</div>
                                    	</form>
                                    </div> --}}
                                    <!-- End contact form  -->

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .single-product-thumb -->

        <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
            <div class="container">
                <ul class="nav tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <h4 class="mb--60 desc-heading">Mô Tả Sản Phẩm</h4>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <div class="product-desc-wrapper">
                            <div class="row">
                            	{!! $products->longs_description !!}
                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- End .product-desc-wrapper -->
                    </div>
                </div>
                
                {{-- product review area --}}
                {{-- <div class="reviews-wrapper">
                    <h4 class="mb--60">Reviews</h4>
                    <div class="row">
                        <div class="col-lg-6 mb--40">
                            <div class="axil-comment-area pro-desc-commnet-area">
                                <h5 class="title">01 Review for this product</h5>
                                <ul class="comment-list">
                                    <!-- Start Single Comment  -->
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="single-comment">
                                                <div class="comment-img">
                                                    <img src="./assets/images/blog/author-image-4.png" alt="Author Images">
                                                </div>
                                                <div class="comment-inner">
                                                    <h6 class="commenter">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Cameron Williamson">Eleanor Pena</span>
                                                            </span>
                                                        </a>
                                                        <span class="commenter-rating ratiing-four-star">
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star empty-rating"></i></a>
                                                        </span>
                                                    </h6>
                                                    <div class="comment-text">
                                                        <p>“We’ve created a full-stack structure for our working workflow processes, were from the funny the century initial all the made, have spare to negatives. ” </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- End Single Comment  -->

                                    <!-- Start Single Comment  -->
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="single-comment">
                                                <div class="comment-img">
                                                    <img src="./assets/images/blog/author-image-4.png" alt="Author Images">
                                                </div>
                                                <div class="comment-inner">
                                                    <h6 class="commenter">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Rahabi Khan">Courtney Henry</span>
                                                            </span>
                                                        </a>
                                                        <span class="commenter-rating ratiing-four-star">
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                        </span>
                                                    </h6>
                                                    <div class="comment-text">
                                                        <p>“We’ve created a full-stack structure for our working workflow processes, were from the funny the century initial all the made, have spare to negatives. ”</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- End Single Comment  -->

                                    <!-- Start Single Comment  -->
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="single-comment">
                                                <div class="comment-img">
                                                    <img src="./assets/images/blog/author-image-5.png" alt="Author Images">
                                                </div>
                                                <div class="comment-inner">
                                                    <h6 class="commenter">
                                                        <a class="hover-flip-item-wrapper" href="#">
                                                            <span class="hover-flip-item">
                                                                <span data-text="Rahabi Khan">Devon Lane</span>
                                                            </span>
                                                        </a>
                                                        <span class="commenter-rating ratiing-four-star">
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                        </span>
                                                    </h6>
                                                    <div class="comment-text">
                                                        <p>“We’ve created a full-stack structure for our working workflow processes, were from the funny the century initial all the made, have spare to negatives. ” </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- End Single Comment  -->
                                </ul>
                            </div>
                            <!-- End .axil-commnet-area -->
                        </div>
                        <!-- End .col -->
                        <div class="col-lg-6 mb--40">
                            <!-- Start Comment Respond  -->
                            <div class="comment-respond pro-des-commend-respond mt--0">
                                <h5 class="title mb--30">Add a Review</h5>
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <div class="rating-wrapper d-flex-center mb--40">
                                    Your Rating <span class="require">*</span>
                                    <div class="reating-inner ml--20">
                                        <a href="#"><i class="fal fa-star"></i></a>
                                        <a href="#"><i class="fal fa-star"></i></a>
                                        <a href="#"><i class="fal fa-star"></i></a>
                                        <a href="#"><i class="fal fa-star"></i></a>
                                        <a href="#"><i class="fal fa-star"></i></a>
                                    </div>
                                </div>

                                <form action="#">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Other Notes (optional)</label>
                                                <textarea name="message" placeholder="Your Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Name <span class="require">*</span></label>
                                                <input id="name" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Email <span class="require">*</span> </label>
                                                <input id="email" type="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-submit">
                                                <button type="submit" id="submit" class="axil-btn btn-bg-primary w-auto">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Comment Respond  -->
                        </div>
                        <!-- End .col -->
                    </div>
                </div> --}}
                {{-- product review area --}}

            </div>
        </div>
        <!-- woocommerce-tabs -->



    </div>
    <!-- End Shop Area  -->

    <!-- Start Recently Viewed Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
        <div class="container">
            <div class="section-title-wrapper">
                <h3 class="title">SẢN PHẨM LIÊN QUAN</h3>
            </div>
            <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">

                @foreach($related_products as $product)
                @php
                    $formated_amount = number_format($product->discount_price);
                    $selling_price = number_format($product->selling_price);
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ($amount/$product->selling_price) * 100;
                @endphp
                <div class="slick-single-layout">
                    <div class="axil-product">
                        <div class="thumbnail">
                            <a href="{{ route('show', ['slug' => $product->product_slug]) }}">
                                <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name }}">
                            </a>

                            <div class="label-block label-right">
                                @if($product->discount_price == NULL)
                                    <div class="product-badget" style="background-color: #EB455F;">NEW</div>
                                @else
                                    <div class="product-badget">{{ round($discount) }}%</div>
                                @endif
                            </div>

                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{ route('show', ['slug' => $product->product_slug]) }}">{{ $product->product_name }}</a></h5>
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
    <!-- End Recently Viewed Product Area  -->

    @include('frontend.body.new_letters')





@endsection




























