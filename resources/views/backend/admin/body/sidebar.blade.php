<div class="sticky">
	<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
		<div class="app-sidebar">
			<div class="side-header">
				@php
	                $logo = App\Models\FooterSetting::find(1);
	            @endphp
				<a class="header-brand1" href="{{ url('admin/dashboard') }}">
					<img src="{{ asset($logo->logo_footer) }}" class="header-brand-img desktop-logo" alt="logo">
				</a><!-- LOGO -->
			</div>
			<div class="main-sidemenu">
	        <div class="slide-left disabled" id="slide-left">
	        	<svg xmlns="http://www.w3.org/2000/svg"
	                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
	                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
	            </svg>
			</div>

			<ul class="side-menu">

				@php 
					$brand = (auth()->guard('admin')->user()->brand == 1);
					$category = (auth()->guard('admin')->user()->category == 1);
					$subcategory = (auth()->guard('admin')->user()->subcategory == 1);
					$product = (auth()->guard('admin')->user()->product == 1);
					$slider = (auth()->guard('admin')->user()->slider == 1);
					$coupon = (auth()->guard('admin')->user()->coupon == 1);
					$delivery = (auth()->guard('admin')->user()->delivery == 1);
					$blog = (auth()->guard('admin')->user()->blog == 1);
					$setting = (auth()->guard('admin')->user()->setting == 1);
					$return_order = (auth()->guard('admin')->user()->return_order == 1);
					$review = (auth()->guard('admin')->user()->review == 1);
					$orders = (auth()->guard('admin')->user()->orders == 1);
					$stock = (auth()->guard('admin')->user()->stock == 1);
					$report = (auth()->guard('admin')->user()->report == 1);
					$all_client = (auth()->guard('admin')->user()->all_client == 1);
					$admin_user_role = (auth()->guard('admin')->user()->admin_user_role == 1);
				@endphp



				<!-- Product area -->

				@if($product == true)
					<li>
						<h3>Sản phẩm</h3>
					</li>
					<li class="product">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-linux" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Tất cả sản phẩm</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('product.management') }}" class="slide-item">Quản lý sản phẩm</a></li>
							<li><a href="{{ route('product.create') }}" class="slide-item">Tạo mới sản phẩm</a></li>
						</ul>
					</li>
				@else
				@endif
				


				@if($stock == true)
					<li class="stock">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-themeisle" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Stock</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('stock.management') }}" class="slide-item">Quản lý hàng tồn</a></li>
						</ul>
					</li>
				@else
				@endif
				


				@if($coupon == true)
					<li class="coupon">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-copyright" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Coupons</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('coupon.management') }}" class="slide-item">Quản lý coupons</a></li>
							<li><a href="{{ route('coupon.create') }}" class="slide-item">Tạo mới coupon</a></li>
							<li><a href="{{ route('coupon.image') }}" class="slide-item">Background coupons</a></li>
						</ul>
					</li>
				@else
				@endif
				


				@if($delivery == true)
					<li class="delivery">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i style="margin-right: 8px;" class="mdi mdi-baby-buggy" data-bs-toggle="tooltip" title="" data-bs-original-title="mdi-baby-buggy" aria-label="mdi-baby-buggy"></i>
							<span class="side-menu__label ml-1">Delivery</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('delivery.management') }}" class="slide-item">Quản lý vận chuyển</a></li>
						</ul>
					</li>
				@else
				@endif
				

				<hr style="border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);
						border-bottom: 1px solid rgba(255, 255, 255, 0.3);">




				<!-- Order area -->

				<li>
					<h3>Quản lý đơn hàng</h3>
				</li>


				@if($orders == true)
					<li class="orders">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-usd" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Đơn hàng</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('all-orders') }}" class="slide-item">Tất cả đơn hàng</a></li>
							<li><a href="{{ route('pending-orders') }}" class="slide-item">Đang chờ xử lý</a></li>
							<li><a href="{{ route('confirmed-orders') }}" class="slide-item">Đã xác nhận</a></li>
							<li><a href="{{ route('processing-orders') }}" class="slide-item">Xử lý đơn đã xác nhận</a></li>
							<li><a href="{{ route('picked-orders') }}" class="slide-item">Đơn hàng đã soạn xong</a></li>
							<li><a href="{{ route('shipped-orders') }}" class="slide-item">Đơn hàng đã gửi</a></li>
							<li><a href="{{ route('delivered-orders') }}" class="slide-item">Đơn hàng đã hoàn tất</a></li>
							<li><a href="{{ route('cancel-orders') }}" class="slide-item">Đơn hàng bị hủy</a></li>
						</ul>
					</li>
				@else
				@endif
				


				@if($review == true)
					<li class="review">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-envelope-o" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Tin nhắn khách hàng</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('customer_messages.management') }}" class="slide-item">Tất cả tin nhắn</a></li>
							<li><a href="{{ route('message.not_read') }}" class="slide-item">Tin chưa đọc</a></li>
							<li><a href="{{ route('message.read') }}" class="slide-item">Tin đã đọc</a></li>
						</ul>
					</li>
				@else
				@endif
				


				@if($return_order == true)
					<li class="return_order">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-heartbeat" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Return Order</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('return.orders.request') }}" class="slide-item">Đơn yêu cầu trả hàng</a></li>
							<li><a href="{{ route('return.orders.view') }}" class="slide-item">Tất cả đơn đã hoàn trả</a></li>
						</ul>
					</li>
				@else
				@endif
				


				@if($report == true)
					<li class="report">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-wpforms" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Báo cáo</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('all-reports') }}" class="slide-item">Tất cả báo cáo</a></li>
						</ul>
					</li>
				@else
				@endif
				



				<hr style="border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);
						border-bottom: 1px solid rgba(255, 255, 255, 0.3);">



				<!-- Rinart page -->

				<li>
					<h3>Trang Rinart</h3>
				</li>


				@if($slider == true)
					<li class="slider">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-newspaper-o" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Slides</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('slide.management') }}" class="slide-item">Quản lý slide</a></li>
							<li><a href="{{ route('slide.create') }}" class="slide-item">Tạo mới slide</a></li>
							<li><a href="{{ route('banner2.management') }}" class="slide-item">Banner quảng cáo</a></li>
						</ul>
					</li>
				@else
				@endif
				


				@if($blog == true)
					<li class="blog">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-qq" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Pages</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('about.management') }}" class="slide-item">Quản lý trang giới thiệu</a></li>
							<li><a href="{{ route('pricing.management') }}" class="slide-item">Quản lý trang báo giá</a></li>
							<li><a href="{{ route('contact.management') }}" class="slide-item">Quản lý trang liên hệ</a></li>
						</ul>
					</li>
				@else
				@endif
				

				@if($setting == true)
					<li class="setting">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-cog" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Thiết lập trang web</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('footer-setting') }}" class="slide-item">Quản lý footer</a></li>
							<li><a href="{{ route('site-setting') }}" class="slide-item">Header logo</a></li>
							<li><a href="{{ route('seo-setting') }}" class="slide-item">SEO setting</a></li>
							<li><a href="{{ route('whyus-setting') }}" class="slide-item">Quản lý why-us</a></li>
							<li><a href="{{ route('newsletter-setting') }}" class="slide-item">Quản lý newsletter</a></li>
						</ul>
					</li>
				@else
				@endif
				

				<hr style="border: 0; height: 0; border-top: 1px solid rgba(0, 0, 0, 0.1);
						border-bottom: 1px solid rgba(255, 255, 255, 0.3);">

				

				<!-- Category area -->

				<li>
					<h3>Danh mục</h3>
				</li>

				@if($brand == true)
					<li class="slide">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="icon icon-globe" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Thương Hiệu</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('brand.management') }}" class="slide-item">Quản lý thương hiệu</a></li>
							<li><a href="{{ route('brand.create') }}" class="slide-item">Tạo mới thương hiệu</a></li>
						</ul>
					</li>
				@else
				@endif


				@if($category == true)
					<li class="category">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-bicycle" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Danh Mục</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('category.management') }}" class="slide-item">Quản lý danh mục</a></li>
							<li><a href="{{ route('category.create') }}" class="slide-item">Tạo mới danh mục</a></li>
						</ul>
					</li>
				@else
				@endif
				


				@if($subcategory == true)
					<li class="subcategory">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-car" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Tiểu Danh Mục</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('subcategory.management') }}" class="slide-item">Quản lý tiểu danh mục</a></li>
							<li><a href="{{ route('subcategory.create') }}" class="slide-item">Tạo mới tiểu danh mục</a></li>
						</ul>
					</li>
				@else
				@endif
				


				<hr style="border: 0;
						    height: 0;
						    border-top: 1px solid rgba(0, 0, 0, 0.1);
						    border-bottom: 1px solid rgba(255, 255, 255, 0.3);">



				<!-- Client area -->

				<li>
					<h3>Client</h3>
				</li>


				@if($all_client == true)
					<li class="all_client">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-user" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Client</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('all-users') }}" class="slide-item">Tất cả kách hàng</a></li>
						</ul>
					</li>
				@else
				@endif


				@if($all_client == true)
					<li class="all_client">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-envelope-open-o" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Newsletter</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('newsletters-manage') }}" class="slide-item">Các email đã đăng ký</a></li>
						</ul>
					</li>
				@else
				@endif
				


				@if($admin_user_role == true)
					<li class="admin_user_role">
						<a class="side-menu__item" data-bs-toggle="slide">
							<i class="fa fa-user-secret" style="margin-right: 8px;"></i>
							<span class="side-menu__label ml-1">Admin Role</span><i class="angle fa fa-angle-right"></i>
						</a>
						<ul class="slide-menu">
							<li><a href="{{ route('admin-role') }}" class="slide-item">Admin management</a></li>
						</ul>
					</li>
				@else
				@endif


				<hr style="border: 0;
						    height: 0;
						    border-top: 1px solid rgba(0, 0, 0, 0.1);
						    border-bottom: 1px solid rgba(255, 255, 255, 0.3);">


				<!-- Other options area -->

				<li>
					<h3>Other options</h3>
				</li>


				<li class="all_client">
					<a class="side-menu__item" data-bs-toggle="slide">
						<i class="fa fa-user" style="margin-right: 8px;"></i>
						<span class="side-menu__label ml-1">Not ready</span><i class="angle fa fa-angle-right"></i>
					</a>
					<ul class="slide-menu">
						<li><a href="{{ route('admin.index') }}" class="slide-item">Not ready</a></li>
					</ul>
				</li>



				

			</ul>


			<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
					width="24" height="24" viewBox="0 0 24 24">
					<path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
				</svg>
			</div>
		</div>
	</div>
</div>





































