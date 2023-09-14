<footer class="axil-footer-area footer-style-1" style="background-color: #EEEEEE;">

    @php

    $data = App\Models\FooterSetting::find(1);

    @endphp

    <!-- Start Footer Top Area  -->
    <div class="footer-top separator-top">
        <div class="container">
            <div class="row">
                <!-- Start Single Widget  -->
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget pr--30">
                        <div class="logo mb--30">
                            <a href="{{ url('/') }}">
                                <img class="light-logo" src="{{ asset($data->logo_footer) }}" alt="Logo Rinart">
                            </a>
                        </div>
                        <div class="inner">
                            <p>{!! $data->address !!}</p>
                            <ul>
                                <li><a href="javascript:void(0)"><i class="fa fa-phone"></i> {{ $data->phone1 }}</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-phone"></i> {{ $data->phone2 }}</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-phone"></i> {{ $data->phone3 }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">{{ $data->title_col2 }}</h5>
                        <div class="inner">
                            <ul>
                                <li><a href="javascript:void(0)">{{ $data->col_2_1 }}</a></li>
                                <li><a href="javascript:void(0)">{{ $data->col_2_2 }}</a></li>
                                <li><a href="javascript:void(0)">{{ $data->col_2_3 }}</a></li>
                                <li><a href="javascript:void(0)">{{ $data->col_2_4 }}</a></li>
                                <li><a href="javascript:void(0)">{{ $data->col_2_5 }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-md-3 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">{{ $data->title_col3 }}</h5>
                        <div class="inner">
                            <ul>
                                <li><a href="javascript:void(0)">{{ $data->col_3_1 }}</a></li>
                                <li><a href="javascript:void(0)">{{ $data->col_3_2 }}</a></li>
                                <li><a href="javascript:void(0)">{{ $data->col_3_3 }}</a></li>
                                <li><a href="javascript:void(0)">{{ $data->col_3_4 }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-md-3 col-sm-4">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">{{ $data->title_col4 }}</h5>
                        <div class="inner">
                            <ul>
                                <li>
                                    <a href="{{ $data->col_4_1 }}"><img class="footer-logo" src="{{ asset('frontend/assets/images/fb_icon.jpg') }}" alt="fb">
                                    </a>
                                    <a href="{{ $data->col_4_2 }}"><img class="footer-logo" src="{{ asset('frontend/assets/images/shopee_icon.jpg') }}" alt="shopee_icon">
                                    </a>
                                    <a href="{{ $data->col_4_3 }}"><img class="footer-logo" src="{{ asset('frontend/assets/images/tiktok_icon.jpg') }}" alt="tiktok_icon">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $data->col_4_4 }}"><img class="footer-logo" src="{{ asset('frontend/assets/images/instagram_icon.jpg') }}" alt="instagram_icon">
                                    </a>
                                    <a href="{{ $data->col_4_5 }}"><img class="footer-logo" src="{{ asset('frontend/assets/images/tiki_icon.jpg') }}" alt="tiki_icon">
                                    </a>
                                    <a href="{{ $data->col_4_6 }}"><img class="footer-logo" src="{{ asset('frontend/assets/images/lazada.jpg') }}" alt="lazada">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
            </div>
        </div>
    </div>
    <!-- End Footer Top Area  -->
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-default separator-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-12">
                    <div class="copyright-left d-flex flex-wrap justify-content-xl-start justify-content-center">
                        <ul class="quick-link">
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="terms-of-service.html">Terms of Service</a></li>
                        </ul>
                        <ul class="quick-link">
                            <li>© 2022. All rights reserved by <a target="_blank" href="https://axilthemes.com/">Rinart</a>.</li>
                        </ul>
                    </div>
                </div>
                
        </div>
    </div>
    <!-- End Copyright Area  -->
</footer>

























































