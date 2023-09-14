@extends('backend.admin.admin_master')
@section('title', 'Tạo coupon')
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
                        <li class="breadcrumb-item active" aria-current="page">create new coupon</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-header border-bottom">
							<h3>Lưu ý: Chỉ chọn 1 trong 2 cách giảm</h3>
						</div>

						<div class="card-body">
							<form method="post" action="{{ route('coupon.store') }}" class="form-horizontal">
								@csrf

								<div class="form-group">
									<label for="title" class="form-label">Tên Coupon *</label>
									<input type="text" name="coupon_name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Tiêu Đề</label>
									<input type="text" name="title" class="form-control">
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Giảm theo %</label>
									<input type="text" name="discount_percentage" class="form-control">
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Giảm theo ₫</label>
									<input type="text" name="discount_regular" class="form-control">
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Có hiệu lực đến ngày *</label>
									<input type="date" name="coupon_validity" class="form-control" required min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Màu chữ (#070707)</label>
									<input type="text" name="description" class="form-control">
								</div>
								<div class="form-group mt-3">
									<div>
										<button type="submit" class="btn btn-primary">Submit</button>
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






















































