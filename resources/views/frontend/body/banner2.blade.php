<div class="axil-poster-countdown">
    <div class="poster-countdown-wrap bg-lighter">
        <div class="row">
            <div>

                @php

                    $banner2 = App\Models\banner_adv::where('status', 1)->first();

                @endphp

                <div class="poster-countdown-thumbnail">
                    <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="1500" src="{{ asset($banner2->banner_photo) }}" alt="{{ $banner2->banner_name }}" style="width: 100%;object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>