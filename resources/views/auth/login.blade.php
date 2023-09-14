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
                        <li class="axil-breadcrumb-item active" aria-current="page">Đăng nhập | Đăng ký</li>
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
                <div class="axil-order-summery order-checkout-summery">
                    <div class="axil-signin-form">
                        <h3 class="title">Đăng nhập vào Rinart</h3>
                        <p class="b2 mb--55">Điền thông tin theo hướng dẫn</p>

                        <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}" class="singin-form">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                                @if($errors->has('email'))
                                    <div class="error" style="color: red;">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @if($errors->has('password'))
                                    <div class="error" style="color: red;">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Đăng nhập</button>
                                <a href="{{ route('password.request') }}" class="forgot-btn">Quên mật khẩu?</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="axil-order-summery order-checkout-summery">
                    <div class="axil-signin-form">
                        <h3 class="title">Đăng ký thành viên</h3>
                        <p class="b2 mb--55">Điền thông tin theo hướng dẫn</p>

                        <form method="POST" action="{{ route('register') }}" class="singin-form">
                        @csrf

                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                @if($errors->has('name'))
                                    <div class="error" style="color: red;">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                @if($errors->has('email'))
                                    <div class="error" style="color: red;">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                                @if($errors->has('phone_number'))
                                    <div class="error" style="color: red;">{{ $errors->first('phone_number') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @if($errors->has('password'))
                                    <div class="error" style="color: red;">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                @if($errors->has('password_confirmation'))
                                    <div class="error" style="color: red;">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>

                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Đăng ký</button>
                                <span>or</span>

                                <div class="google-btn">
                                    <div class="google-icon-wrapper">
                                        <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                                    </div>
                                    <a href="{{ route('google-auth') }}" class="btn-text" style="color: #fff"><b>Signin with google</b></a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>





@endsection






















































