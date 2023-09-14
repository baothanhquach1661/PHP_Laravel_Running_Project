@extends('backend.admin.admin_master')
@section('title', 'Cập nhật hình nền coupon')
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
                        <li class="breadcrumb-item active" aria-current="page">editing coupon background</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('coupon.image.update') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf

								<input type="hidden" name="id" value="{{ $coupon_image->id }}">
                            	<input type="hidden" name="old_image" value="{{ $coupon_image->coupon_image }}">

								<div class="form-group">
									<label for="title" class="form-label">Tiêu Đề</label>
									<input type="text" name="title" class="form-control" value="{{ $coupon_image->title }}" required>
								</div>

								<div class="form-group">
									<input type="file" name="coupon_image" class="form-control" id="image">
								</div>
								<div class="mb-4">
                                    <img id="showImage" class="img-thumbnail" alt="150x150" width="160" src="{{ (!empty($coupon_image->coupon_image)) ? 
                                        url($coupon_image->coupon_image):
                                        url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                                </div>
                                <div class="form-group">
									<img id="showImage" class="img-thumbnail" width="300">
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






















































