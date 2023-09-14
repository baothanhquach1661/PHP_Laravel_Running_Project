@php
    $newsletter = App\Models\NewsLetter::find(1);
@endphp


<div class="axil-newsletter-area axil-section-gap pt--0">
    <div class="container">
        <div class="etrade-newsletter-wrapper bg_image" style="background-image: url('{{ asset($newsletter->image) }}');">
            <div class="newsletter-content">
                <h2 class="title mb--40 mb_sm--30">{{ $newsletter->title }}</h2>
                <div class="input-group newsletter-form">

                    <form action="{{ route('send.newsletter') }}" method="post">
                        @csrf
                        <div class="position-relative newsletter-inner mb--15">
                            <input type="email" name="email" required>
                        </div>
                        <button type="submit" class="axil-btn mb--15">Đăng ký</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End .container -->
</div>



























