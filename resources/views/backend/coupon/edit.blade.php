@extends('backend.admin.admin_master')
@section('title', 'Cập nhật coupon')
@section('admin')

<div class="app-content main-content mt-0">
    <div class="side-app">
         <!-- CONTAINER -->
         <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">editing coupon</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('coupon.update') }}" class="form-horizontal">
								@csrf

								<input type="hidden" name="id" value="{{ $coupon->id }}">
                            	<input type="hidden" name="old_image" value="{{ $coupon->coupon_image }}">

								<div class="form-group">
									<label for="title" class="form-label">Tên Coupon *</label>
									<input type="text" name="coupon_name" class="form-control" value="{{ $coupon->coupon_name }}" required>
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Tiêu Đề</label>
									<input type="text" name="title" class="form-control" value="{{ $coupon->title }}">
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Giảm theo %</label>
									<input type="text" name="discount_percentage" value="{{ $coupon->discount_percentage }}" class="form-control">
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Giảm theo ₫</label>
									<input type="text" name="discount_regular" value="{{ $coupon->discount_regular }}" class="form-control">
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Có hiệu lực đến ngày *</label>
									<input type="date" name="coupon_validity" class="form-control" required min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupon->coupon_validity }}">
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Màu chữ (#070707)</label>
									<input type="text" name="description" class="form-control" value="{{ $coupon->description }}">
								</div>
								<div class="form-group mt-3">
									<div>
										<button type="submit" class="btn btn-primary">Update</button>
										<button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

        </div>
    </div>
</div>







@endsection






















































