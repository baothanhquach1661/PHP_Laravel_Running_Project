@extends('frontend.main_master')

@section('title')
	@foreach($price as $data)
		{{ $data->title }}
	@endforeach
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
                            <li class="axil-breadcrumb-item active" aria-current="page">Báo Giá</li>
                    	</ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->


    <!-- Start Blog Area  -->
	    <div class="axil-blog-area axil-section-gap">
	        <div class="axil-single-post post-formate post-standard">
	            <div class="container">
	                <div class="content-block">
	                    <div class="inner">
	                        <div class="post-thumbnail">

	                        	@foreach($banner as $item)
	                            	<img src="{{ asset($item->photo_name) }}" alt="Pricing list Banner">
	                            @endforeach

	                        </div>
	                        <!-- End .thumbnail -->
	                    </div>
	                </div>
	                <!-- End .content-blog -->
	            </div>
	        </div>
	        <!-- End .single-post -->
	        <div class="post-single-wrapper position-relative">
	            <div class="container">
	                <div class="row">
	                    <div class="col-lg-1">
	                        <div class="d-flex flex-wrap align-content-start h-100">
	                            <div class="position-sticky sticky-top">
	                                <div class="post-details__social-share">
	                                    <span class="share-on-text">Share on:</span>
	                                    <div class="social-share">
	                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
	                                        <a href="#"><i class="fab fa-instagram"></i></a>
	                                        <a href="#"><i class="fab fa-twitter"></i></a>
	                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
	                                        <a href="#"><i class="fab fa-discord"></i></a>
	                                    </div>

	                                </div>
	                            </div>
	                        </div>
	                    </div>


	                    <div class="col-lg-7 axil-post-wrapper">

	                    	@foreach($price as $data)
	                    		<div class="post-heading">
		                            <h2 class="title">{{ $data->title }}</h2>
		                            <div class="axil-post-meta">
		                                <div class="post-meta-content">
		                                    <h6 class="author-title">
		                                        <a href="{{ route('home.about') }}">Rinart | {{ $data->name }}</a>
		                                    </h6>
		                                    <ul class="post-meta-list">
		                                        <li>{{ $data->created_at }}</li>
		                                    </ul>
		                                </div>
		                            </div>
		                        </div>
		                        
		                        <div>
		                        	{!! $data->long_description !!}
		                        </div>
	                    	@endforeach


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

	                    
	                 

	






@endsection



























