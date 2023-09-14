<div class="axil-header-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-6 col-12">
                
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="header-top-link">
                    <ul class="quick-link">
                        <li><a href="https://www.facebook.com/intemnhanrinart" class="fab fa-facebook-f" style="font-size: 18px;"></a></li>
                        <li><a href="https://www.instagram.com/rinart.vn/" class="fab fa-instagram" style="font-size: 18px;"></a></li>
                        <li><a href="https://www.youtube.com/watch?v=QV3oV-NEIzI" class="fab fa-youtube" style="font-size: 18px;"></a></li>
                        <li>
                            <a href="tel:0909888213" class="fab fa-whatsapp" style="font-size: 18px;"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $header_logo = App\Models\SiteSetting::find(1);
@endphp
<!-- Start Mainmenu Area  -->
<div id="axil-sticky-placeholder"></div>
<div class="axil-mainmenu">
    <div class="container">
        <div class="header-navbar">
            <div class="header-brand">
                <a href="{{ url('/') }}" class="logo logo-dark">
                    <img src="{{ asset($header_logo->logo_header) }}" alt="Rinart Logo">
                </a>
                <a href="{{ url('/') }}" class="logo logo-light">
                    <img src="{{ asset($header_logo->logo_header) }}" alt="Rinart Logo">
                </a>
            </div>
            <div class="header-main-nav">
                <!-- Start Mainmanu Nav -->
                <nav class="mainmenu-nav">
                    <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                    <div class="mobile-nav-brand">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset($header_logo->logo_header) }}" alt="Rinart Logo">
                        </a>
                    </div>

                    @php
                        $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
                    @endphp

                    <ul class="mainmenu">

                        <li><a href="{{ url('/') }}">TRANG CHỦ</a></li>

                        <li><a href="{{ route('home.about') }}">GIỚI THIỆU</a></li>

                        <li class="menu-item-has-children">
                            <a href="#">SẢN PHẨM</a>
                            <ul class="axil-submenu">

                                @foreach($categories as $category)
                                    {{-- get subcategory --}}
                                    @php
                                        $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name', 'ASC')->get();
                                    @endphp
                                    {{-- get subcategory --}}

                                    {{-- <li><a href="{{ url('categories/products/'.$category->category_slug.'/'.$category->id) }}">{{ $category->category_name }}</a></li> --}}

                                    <li>
                                        <a href="{{ route('show', ['slug' => $category->category_slug]) }}">
                                            {{ $category->category_name }}
                                        </a>
                                    </li>

                                @endforeach

                            </ul>
                        </li>

                        <li><a href="{{ route('pricing') }}">BÁO GIÁ</a></li>

                        <li><a href="{{ route('contact') }}">LIÊN HỆ</a></li>
                    </ul>
                </nav>
                <!-- End Mainmanu Nav -->
            </div>
            <div class="header-action">
                <ul class="action-list">
                    <li class="axil-search d-xl-block d-none" style="position: relative;">
                        {{-- <form action="{{ route('product.search') }}" method="post">
                            @csrf
                            <div class="input-group" style="flex-wrap: unset;">
                                <input type="search" class="placeholder2" name="search" placeholder="Tìm kiếm nhanh" required>
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </button>
                            </div>
                        </form> --}}

                        <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="Tìm kiếm nhanh" autocomplete="off">
                        <button type="submit" class="icon wooc-btn-search">
                            <i class="flaticon-magnifying-glass"></i>
                        </button>

                    </li>
                    <li class="axil-search d-xl-none d-block">
                        <a href="javascript:void(0)" class="header-search-icon" title="Search">
                            <i class="flaticon-magnifying-glass"></i>
                        </a>
                    </li>

                    <li class="shopping-cart">
                        <a href="#" class="cart-dropdown-btn">
                            <span class="cart-count" id="cartQty"></span>
                            <i class="flaticon-shopping-cart"></i>
                        </a>
                    </li>

                    <li class="my-account">
                        <a href="javascript:void(0)">
                            <i class="flaticon-person"></i>
                        </a>
                        <div class="my-account-dropdown">
                            @auth
                                <ul>
                                    <li>
                                        <a href="{{ route('dashboard') }}">Tài khoản của tôi</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.logout') }}">Đăng xuất</a>
                                    </li>
                                </ul>
                            @else
                                <a href="{{ route('login') }}" class="axil-btn btn-bg-primary">Login</a>
                            @endauth

                        </div>
                    </li>
                    <li class="axil-mobile-toggle">
                        <button class="menu-btn mobile-nav-toggler">
                            <i class="flaticon-menu-2"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Mainmenu Area -->



<!-- Header Search Modal End -->
<div class="header-search-modal" id="header-search-modal">
    <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
    <div class="header-search-wrap">
        <div class="card-header">
            <form action="{{ route('product.search') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="search" onfocus="search_result_show()" onblur="search_result_hide()" class="form-control" name="search" id="prod-search" placeholder="Bạn muốn tìm sản phẩm gì?">
                    <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="card-body" id="searchProducts">
            
        </div>
    </div>
</div>
<!-- Header Search Modal End -->


<script>
    function search_result_hide(){
        $("#searchProducts").slideUp();
      }
    function search_result_show(){
        $("#searchProducts").slideDown();
    }
</script>
    






































