<!doctype html>
<html class="no-js" lang="en">
@php
    $seo = App\Models\Seo::find(1);
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="title" content="{{ $seo->meta_title }}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="keywords" content="{{ $seo->meta_keyword }}">
    <meta name="description" content="{{ $seo->meta_description }}">
    {{-- Google Analystics --}}
    <script>
        {{ $seo->google_analystics }}
    </script>
    {{-- Google Analystics --}}
    
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.png') }}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.min.css') }}">

    <!-- add more -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rinart.css') }}">





</head>


<body class="sticky-header">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>

    <!-- Start Header -->
    <header class="header axil-header header-style-5">
        @include('frontend.body.header')

        {{-- @include('frontend.body.coupon') --}}
    </header>
    <!-- End Header -->

    <main class="main-wrapper">
        
        @yield('content')

    </main>


    <!-- Start Footer Area  -->
    @include('frontend.body.footer')
    <!-- End Footer Area  -->

    
    @include('frontend.home.mini_cart')


    <div class="social-button">
        <div class="social-button-content">
            <a href="tel:0909888213" class="call-icon" rel="nofollow">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <div class="animated alo-circle"></div>
                <div class="animated alo-circle-fill  "></div>
                <span>Hotline: 0909 888 213</span>
            </a>

            {{-- <a href="sms:0981481368" class="sms">
                <i class="fa fa-weixin" aria-hidden="true"></i>
                <span>SMS: 098 148 1368</span>
            </a> --}}

            <a href="https://www.facebook.com/intemnhanrinart" class="mes">
                <img src="{{ asset('frontend/assets/images/icons8-facebook-48.png') }}" alt="">
                <span>Facebook: intemnhanrinart</span>
            </a>
            <a href="http://zalo.me/0909888213" class="zalo">
                <img src="{{ asset('frontend/assets/images/icons8-zalo-48.png') }}" alt="">
                <span>Zalo: 0909888213</span>
            </a>
        </div>

        <a class="user-support">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            <div class="animated alo-circle"></div>
            <div class="animated alo-circle-fill"></div>
        </a>
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/waypoints.min.js') }}"></script>

    <!-- Main JS + rinart -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/rinart.js') }}"></script>

    <!-- toastr -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>




    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
        }
        @endif 
    </script>

    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>

    <script>
        // ----------  Coupon Area Start  -----///
        function applyCoupon(){
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {coupon_name:coupon_name},
                url: "{{ url('/coupon-apply') }}",
                success:function(data){
                    couponCalculation();
                    
                    if (data.validity == true) {
                        $('#couponField').hide();
                    }
                    //$('#couponField').hide();
                    // Start Message 
                        const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              
                              showConfirmButton: false,
                              timer: 3000
                            })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        }else{
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                        // End Message 
                }
            })
          }   // end function

          function couponCalculation(){
                $.ajax({
                    type: 'GET',
                    url: "{{ url('/coupon-calculation') }}",
                    dataType: 'json',
                    success:function(data){

                        if (data.total) {

                            $('#couponCalField').html(
                                `<tr class="order-subtotal">
                                    <td>Tạm tính</td>
                                    <td>${data.total.toLocaleString('en-US')}₫</td>
                                </tr>
                                
                                <tr class="order-total">
                                    <td>Total</td>
                                    <td class="order-total-amount" style="color: #2C3333;">${data.total.toLocaleString('en-US')}₫</td>
                                </tr>`
                                )

                        }else{

                            $('#couponCalField').html(
                                `<tr class="order-subtotal">
                                    <td>Tạm tính</td>
                                    <td><span>${data.subtotal.toLocaleString('en-US')}₫</span></td>
                                </tr>

                                <tr class="order-subtotal">
                                    <td>Mã coupon</td>
                                    <td>${data.coupon_name}
                                        <button type="submit" class="remove-coupon" onclick="couponRemove()"><i class="fal fa-times"></i></button>
                                    </td>
                                </tr>

                                <tr class="order-subtotal">
                                    <td>Chi tiết mã</td>
                                    ${data.discount_percentage == null

                                            ? `<td>${data.discount_regular_amount}₫</td>`

                                            : `<td>${data.discount_percentage}% OFF</td>`

                                    }
                                </tr>

                                <tr class="order-subtotal">
                                    <td>Số tiền được giảm</td>
                                    ${data.discount_percentage == null

                                                ? `<td>${data.discount_regular_amount}₫</td>`

                                                : `<td>${data.discount_percentage_amount.toLocaleString('en-US')}₫</td>`

                                                }
                                    
                                </tr>
                                
                                <tr class="order-total">
                                    <td>Tổng cộng</td>
                                    ${data.discount_percentage == null

                                                ? `<td class="order-total-amount" style="color: #000000;">${data.total_regular_amount}₫</td>`

                                                : `<td class="order-total-amount" style="color: #000000;">${data.total_percentage_amount}₫</td>`

                                                }
                                    
                                </tr>`
                                )

                        }
                    }
                })
              }

            couponCalculation();

    </script>

    <script>
        function couponRemove(){
            $.ajax({
                type:'GET',
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success:function(data){

                    couponCalculation();

                    $('#couponField').show();
                    $('#coupon_name').val('');

                     // Start Message 
                    const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          
                          showConfirmButton: false,
                          timer: 3000
                        })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                }
            });
        }

    </script>

    <script>
        $(document).ready(function(){
            $('.user-support').click(function(event) {
                $('.social-button-content').slideToggle();
            });
        });
    </script>













</body>

</html>




















































