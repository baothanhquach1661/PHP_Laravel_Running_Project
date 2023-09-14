@extends('frontend.main_master')
@section('content')

<div class="axil-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item active" aria-current="page">Quên mật khẩu</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                
            </div>
        </div>
    </div>
</div>


<div class="axil-checkout-area axil-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="axil-order-summery order-checkout-summery" style="background-color: #EEEEEE;">
                    <div class="axil-signin-form">
                        <h3 class="title">Quên mật khẩu?</h3>
                        <p class="b2 mb--55">Đừng sợ, hãy để Rinart lo.</p>

                        <form method="POST" action="{{ route('password.email') }}"  class="singin-form">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn btn-dark submit-btn">Gửi link reset mật khẩu</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>





@endsection

























































