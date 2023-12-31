@extends('frontend.main_master')
@section('title')
   404 Not Found
@endsection
@section('content')

	<section class="error-page onepage-screen-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="content" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                        <h1 class="title">Page not found</h1>
                        <p>It seems like we dont find what you searched. The page you were looking for doesn't exist, isn't available loading incorrectly.</p>
                        <a href="{{ url('/') }}" class="axil-btn btn-bg-primary right-icon">Back To Home <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="thumbnail" data-sal="zoom-in" data-sal-duration="800" data-sal-delay="400">
                        <img src="{{ asset('frontend/assets/images/others/404.png') }}" alt="404">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection























































