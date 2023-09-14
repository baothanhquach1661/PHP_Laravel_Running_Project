<div class="axil-main-slider-area main-slider-style-5">
    <div class="ale">
        <div class="slider-activation-two axil-slick-dots">

            @foreach($slides as $slide)
                <div class="single-slide slick-slide">
                    <img src="{{ asset($slide->slide_image) }}" style="width: 100%; object-fit: cover;">
                </div>
            @endforeach

        </div>
    </div>
</div>












































