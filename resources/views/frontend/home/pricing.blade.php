@extends('frontend.main_master')
@section('title')
    Pricing List
@endsection
@section('content')

<!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">Báo giá</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4"></div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->


    <!-- Start Blog Area  -->
    <div class="axil-blog-area axil-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row g-5">

                        @foreach($data as $item)
                            <div class="col-md-6">
                                <div class="content-blog blog-grid">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a href="{{ route('pricing.details', $item->id) }}">
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                            </a>
                                            <div class="blog-category">
                                                <a href="{{ route('pricing.details', $item->id) }}">{{ $item->name }}</a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5 class="title">
                                                <a href="{{ route('pricing.details', $item->id) }}">{{ $item->title }}</a>
                                            </h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Start Sidebar Area  -->
                    <aside class="axil-sidebar-area">

                        <!-- Start Single Widget  -->
                        <div class="axil-single-widget mt--40">
                            <h6 class="widget-title">Đặt in ngay</h6>

                            <!-- Start Single Post List  -->
                            <div class="content-blog post-list-view mb--20">

                                <form method="POST" action="#">
                                    @csrf

                                    <div class="row row--10">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="contact-name">Tên <span>*</span></label>
                                                <input type="text" name="name" id="name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="contact-phone">Số điện thoại <span>*</span></label>
                                                <input type="text" name="phone" id="phone" required>
                                                @error('phone')

                                                    <span class="text-danger">{{ $message }}</span>

                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
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
                                                <button type="submit" class="axil-btn btn-bg-primary">Gửi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- End Single Post List  -->

                    </aside>
                    <!-- End Sidebar Area -->
                </div>
            </div>
            <!-- End post-pagination -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End Blog Area  -->


    <!-- Start Axil Newsletter Area  -->
    	@include('frontend.body.new_letters')
    <!-- End Axil Newsletter Area  -->







@endsection

























