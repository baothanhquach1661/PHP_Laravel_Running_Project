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
                        @if(session()->get('language') == 'english')
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ul>
                            <h1 class="title">Contact RinArt</h1>
                        @else
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Liên Hệ</li>
                            </ul>
                            <h1 class="title">Liên Hệ RinArt</h1>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    @php 

        $contact = App\Models\Contact::find(1);

    @endphp

    <!-- Start Contact Area  -->
    <div class="axil-contact-page-area axil-section-gap">
        <div class="container">
            <div class="axil-contact-page">
                <div class="row row--30">
                    <div class="col-lg-8">
                        <div class="contact-form">
                            <h3 class="title mb--10">Chúng tôi rất vui khi nhận được tin nhắn của bạn</h3>
                            <p>Nếu bạn đang có sản phẩm nào đang quan tâm xin để lại thông tin và tin nhắn</p>


                            <form method="POST" action="{{ route('store.message') }}">
                                @csrf

                                <div class="row row--10">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="contact-name">Tên <span>*</span></label>
                                            <input type="text" name="name" id="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="contact-phone">Số điện thoại <span>*</span></label>
                                            <input type="text" name="phone" id="phone" required>
                                            @error('phone')
                                                <div class="error" style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
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
                                            <button type="submit" class="axil-btn btn-bg-primary">GỬI TIN NHẮN</button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-location mb--40">
                            <h4 class="title mb--20">Cửa hàng</h4>
                            <span class="address mb--20">{{ $contact->rinart_address }}</span>
                            <span class="phone">Phone: {{ $contact->rinart_phone }}</span>
                            <span class="email">Email: {{ $contact->rinart_email }}</span>
                        </div>
                        <div class="contact-career mb--40">
                            <h4 class="title mb--20">Dịch Vụ</h4>
                            <p>{{ $contact->rinart_adv }}</p>
                        </div>
                        <div class="opening-hour">
                            <h4 class="title mb--20">Giờ Hoạt Động:</h4>
                            <p>{{ $contact->rinart_opening_hours }}
                                <br> {{ $contact->rinart_opening_hours_2 }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Google Map Area  -->
            <div class="axil-google-map-wrap axil-section-gap pb--0">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="1080" height="500" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15678.915311609386!2d106.6515546!3d10.7553701!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xee4edbd061fe3ec9!2sRinart!5e0!3m2!1sen!2s!4v1675743628385!5m2!1sen!2s"></iframe>
                    </div>
                </div>
            </div>
            <!-- End Google Map Area  -->
        </div>
    </div>
    <!-- End Contact Area  -->

        







@endsection

























