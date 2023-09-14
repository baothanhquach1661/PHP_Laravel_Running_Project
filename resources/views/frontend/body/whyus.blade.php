@php
    $whyus = App\Models\WhyUs::find(1);
@endphp


<div class="axil-why-choose-area axil-section-gap pb--50 pb_sm--30">
    <div class="container">
        <div class="section-title-wrapper section-title-center">
            <h3 class="title">TẠI SAO NÊN CHỌN RINART</h2>
        </div>
        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/images/icons/service6.png') }}" alt="Service">
                    </div>
                    <h6 class="title">{{ $whyus->whyus_1 }}</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/images/icons/service7.png') }}" alt="Service">
                    </div>
                    <h6 class="title">{{ $whyus->whyus_2 }}</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/images/icons/service8.png') }}" alt="Service">
                    </div>
                    <h6 class="title">{{ $whyus->whyus_3 }}</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/images/icons/service10.png') }}" alt="Service">
                    </div>
                    <h6 class="title">{{ $whyus->whyus_4 }}</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{ asset('frontend/assets/images/icons/protection.png') }}" alt="Service">
                    </div>
                    <h6 class="title">{{ $whyus->whyus_5 }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>




















