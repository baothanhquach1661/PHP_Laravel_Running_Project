@extends('frontend.main_master')
@section('title')
   Rinart | Simple But Enough
@endsection
@section('content')

	<!-- Start Categorie Area  -->
	    <div class="axil-categorie-area bg-color-white">
	        <div class="container">
	            
	        </div>
	    </div>
    <!-- End Categorie Area  -->

    <!-- Start Slider Area -->
    	@include('frontend.body.banner')
    <!-- End Slider Area -->


    <!-- Start Best Sellers Product Area  -->
        @include('frontend.body.new_arrivals')
    <!-- End  Best Sellers Product Area  -->


    <!-- Start Expolre Product Area  -->
        @include('frontend.body.features')
    <!-- End Expolre Product Area  -->


    <!-- Poster Countdown Area  -->
    	@include('frontend.body.banner2')
    <!-- End Poster Countdown Area  -->


    <!-- Start New Arrivals Product Area  -->
        @include('frontend.body.flash_deals')
    <!-- End New Arrivals Product Area  -->

    <!-- Start Best Sellers Product Area  -->
        @include('frontend.body.best_sellers')
    <!-- End New Arrivals Product Area  -->


    <!-- Start Why Choose Area  -->
    	@include('frontend.body.whyus')
    <!-- End Why Choose Area  -->
    

    <!-- Start Axil Newsletter Area  -->
    	@include('frontend.body.new_letters')
    <!-- End Axil Newsletter Area  -->





    

    <!-- Start services Area  -->
        {{-- @include('frontend.body.services') --}}
    <!-- End services Area  -->

    <!-- Start Testimonila Area  -->
        {{-- @include('frontend.body.feedback') --}}
    <!-- End Testimonila Area  -->

    <!-- Start Flash Sale Area  -->
        {{-- @include('frontend.body.flash_sale') --}}
    <!-- End Flash Sale Area  -->

@endsection























































