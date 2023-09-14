@extends('frontend.main_master')
@section('title')
    Giới thiệu về Rinart
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
                            <li class="axil-breadcrumb-item active" aria-current="page">Giới Thiệu</li>
                        </ul>
                        <h1 class="title">Về Rinart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4"></div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    @php
    	$about = App\Models\About::find(1);
    @endphp

    <!-- Start About Area  -->
    <div class="axil-about-area about-style-1 axil-section-gap ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="about-thumbnail">
                        <div class="thumbnail">
                            <img src="{{ $about->about_image }}" alt="Rinart">
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6">
                    <div class="about-content content-right">
                        <h3 class="title">{{ $about->about_title }}</h3>
                        <span class="text-heading">{{ $about->short_description }}</span>
                        <div class="row">
                            <div class="col-xl-12">
                                <p>{{ $about->long_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area  -->

    <!-- Start About Area  -->
    <div class="about-info-area">
        <div class="container">
            <div class="row row--20">
                <div class="col-lg-4">
                    <div class="about-info-box">
                        <div class="thumb">
                            <img src="{{ asset('frontend/assets/images/about/shape-01.png') }}" alt="Shape">
                        </div>
                        <div class="content">
                            <h6 class="title">{{ $about->box_1_title }}</h6>
                            <p>{{ $about->box_1_des }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-info-box">
                        <div class="thumb">
                            <img src="{{ asset('frontend/assets/images/about/shape-02.png') }}" alt="Shape">
                        </div>
                        <div class="content">
                            <h6 class="title">{{ $about->box_2_title }}</h6>
                            <p>{{ $about->box_2_des }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-info-box">
                        <div class="thumb">
                            <img src="{{ asset('frontend/assets/images/about/shape-03.png') }}" alt="Shape">
                        </div>
                        <div class="content">
                            <h6 class="title">{{ $about->box_3_title }}</h6>
                            <p>{{ $about->box_3_des }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area  -->

    <!-- Start Team Area  -->
    <div class="axil-team-area bg-wild-sand">
        <div class="team-left-fullwidth">
            <div class="container ml--xxl-0">
                <div class="section-title-wrapper">
                    <h3 class="title">Thành viên của Rinart</h3>
                </div>
                <div class="team-slide-activation slick-layout-wrapper--20 axil-slick-arrow  arrow-top-slide">
                	@foreach($team_imgs as $teamimg)
	                    <div class="slick-single-layout">
	                        <div class="axil-team-member">
	                            <div class="thumbnail"><img src="{{ $teamimg->photo_name }}" alt="rinart"></div>
	                            <div class="team-content">
	                                <span class="subtitle">{{ $teamimg->description }}</span>
	                                <h5 class="title">{{ $teamimg->title }}</h5>
	                            </div>
	                        </div>
	                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Team Area  -->


    <!-- Start Axil Newsletter Area  -->
    	@include('frontend.body.new_letters')
    <!-- End Axil Newsletter Area  -->







@endsection

























