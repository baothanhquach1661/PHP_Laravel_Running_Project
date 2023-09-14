@extends('backend.admin.admin_master')
@section('title', 'Cập nhật slide')
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
                        <li class="breadcrumb-item active" aria-current="page">editing slider</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('slide.update') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf

								<input type="hidden" name="id" value="{{ $slide->id }}">
                            	<input type="hidden" name="old_image" value="{{ $slide->slide_image }}">

								<div class="form-group">
									<label for="title" class="form-label">Tên Slide</label>
									<input type="text" name="slide_name" class="form-control" value="{{ $slide->slide_name }}" required>
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Tiêu Đề</label>
									<input type="text" name="title" class="form-control" value="{{ $slide->title }}">
								</div>
								<div class="form-group">
									<input type="file" name="slide_image" class="form-control" id="image">
								</div>
								<div class="mb-4">
                                    <img id="showImage" class="img-thumbnail" alt="150x150" width="160" src="{{ (!empty($slide->slide_image)) ? 
                                        url($slide->slide_image):
                                        url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                                </div>
                                <div class="form-group">
									<img id="showImage" class="img-thumbnail" width="300">
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Mô Tả</label>
									<textarea id="summernote" class="form-control" name="description">
										{!! $slide->description !!}
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






















































