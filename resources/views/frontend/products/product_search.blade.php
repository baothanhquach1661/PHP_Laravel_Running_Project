@extends('frontend.main_master')
@section('title')
   Bạn đang tìm kiếm sản phẩm {{ $item }}
@endsection
@section('content')


   <!-- Start Breadcrumb Area  -->
   <div class="axil-breadcrumb-area">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6 col-md-8">
                  <div class="inner">
                      <ul class="axil-breadcrumb">
                          <li class="axil-breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
                          <li class="separator"></li>
                          <li class="axil-breadcrumb-item active" aria-current="page">{{ $item }}</li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-6 col-md-4"></div>
          </div>
      </div>
   </div>
   <!-- End Breadcrumb Area  -->
   <!-- Start Shop Area  -->
   <div class="axil-shop-area axil-section-gap bg-color-white">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="axil-shop-top">
                      <div class="row">
                          <div class="col-lg-9">
                              <div class="category-select">

                                  <!-- Start Single Select  -->
                                  {{-- <select class="single-select">
                                      <option>Categories</option>
                                      @foreach($categories as $category)
                                          <a href="{{ url('categories/products/'.$category->category_slug.'/'.$category->id) }}"><option>{{ $category->category_name }}</option></a>
                                      @endforeach
                                  </select> --}}
                                  <!-- End Single Select  -->

                              </div>
                          </div>
                          {{-- <div class="col-lg-3">
                              <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">
                                  <!-- Start Single Select  -->
                                  <select class="single-select">
                                      <option>Sort by Latest</option>
                                      <option>Sort by Name</option>
                                      <option>Sort by Price</option>
                                      <option>Sort by Viewed</option>
                                  </select>
                                  <!-- End Single Select  -->
                              </div>
                          </div> --}}
                      </div>
                  </div>
              </div>
          </div>
          <div class="row row--15">
            @forelse($products as $product)

               @php
                 $formated_amount = number_format($product->discount_price);
                 $selling_price = number_format($product->selling_price);
                 $amount = $product->selling_price - $product->discount_price;
                 $discount = ($amount/$product->selling_price) * 100;
               @endphp
               <div class="col-xl-3 col-lg-4 col-sm-6">
                  <div class="axil-product product-style-one has-color-pick mt--40">
                      <div class="thumbnail">
                          <a href="{{ url('products/'.$product->product_slug.'/'.$product->id) }}">
                              <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name }}">
                          </a>
                          <div class="label-block label-right">
                            @if($product->discount_price == NULL)
                                <div class="product-badget" style="background-color: #EB455F;">NEW</div>
                            @else
                                <div class="product-badget">{{ round($discount) }}%</div>
                            @endif
                          </div>
                      </div>
                      <div class="product-content">
                          <div class="inner">
                              <h5 class="title"><a href="{{ url('products/'.$product->product_slug.'/'.$product->id) }}">{{ $product->product_name }}</a></h5>
                              <div class="product-price-variant">
                                  <span class="price current-price" style="color: #FF0032;">

                                      @if($product->discount_price == NULL)
                                        <span class="price current-price" style="color: rgba(0,0,0,.54);">
                                          ₫{{ $selling_price }}
                                        </span>
                                      @else
                                        <span class="price current-price" style="text-decoration: line-through;color: rgba(0,0,0,.54); font-size: 15px;">
                                          ₫{{ $selling_price }}
                                        </span>
                                        <span class="price current-price" style="color: #ee4d2d;">
                                          ₫{{ $formated_amount }}
                                        </span>
                                      @endif

                                    </span>
                              </div>
                          </div>
                      </div>
                  </div>
               </div>
            @empty
            <h2 class="text-danger"> Không tìm thấy sản phẩm bạn cần tìm</h2>
            @endforelse
              <!-- End Single Product  -->
              
          </div>
          <div class="text-center pt--30">
              {{ $products->links('vendor.pagination.custom') }}
          </div>
      </div>
      <!-- End .container -->
   </div>
   <!-- End Shop Area  -->
























@endsection




















































