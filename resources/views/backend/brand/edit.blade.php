@extends('backend.admin.admin_master')
@section('title', 'Cập nhật thương hiệu')
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
                        <li class="breadcrumb-item active" aria-current="page">editing brand</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('brand.update') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf

								<input type="hidden" name="id" value="{{ $brand->id }}">
                            	<input type="hidden" name="old_image" value="{{ $brand->brand_image }}">

								<div class="form-group">
									<input type="text" name="brand_name" class="form-control" value="{{ $brand->brand_name }}" required>
								</div>
								<div class="form-group">
									<input type="text" name="title" class="form-control" value="{{ $brand->title }}">
								</div>
								<div class="form-group">
									<input type="file" name="brand_image" class="form-control">
								</div>
								<div class="mb-4">
                                    <img id="showImage" class="img-thumbnail" alt="150x150" width="150" src="{{ (!empty($brand->brand_image))? 
                                        url($brand->brand_image):
                                        url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                                </div>
								<div class="form-group">
									<textarea id="summernote" class="form-control" name="description">
										{!! $brand->description !!}
									</textarea>
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






















































