@extends('backend.admin.admin_master')
@section('title', 'Tạo mới một nội dung trang báo giá')
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
                        <li class="breadcrumb-item active" aria-current="page">create new pricing list</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('pricing.store') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="title" class="form-label">Name</label>
											<input type="text" name="name" class="form-control" required>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="title" class="form-label">Title</label>
											<input type="text" name="title" class="form-control" required>
										</div>
									</div>

									<div class="col-md-6" style="margin-bottom: 10px;">
										<div class="form-group">
											<label for="title" class="form-label">Image (640x360)</label>
											<input type="file" name="image" class="form-control" id="image" required>
										</div>
										<div class="form-group">
											<img src="{{ !empty($admin->profile_photo_path) ? url('upload/admin_images/'.$admin->profile_photo_path):url('upload/no_image.jpg') }}" id="showImage" class="img-thumbnail" width="100">
										</div>
									</div>

									<div class="col-md-6" style="margin-bottom: 10px;">
										<div class="form-group">
											<label for="title" class="form-label">Banner (1600x750)</label>
											<input type="file" name="banner" class="form-control" id="banner" required>
										</div>
										<div class="form-group">
											<img src="{{ !empty($admin->profile_photo_path) ? url('upload/admin_images/'.$admin->profile_photo_path):url('upload/no_image.jpg') }}" id="showBanner" class="img-thumbnail" width="100">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="title" class="form-label">Mô tả ngắn</label>
											<input type="text" name="short_description" class="form-control">
										</div>
									</div>

									<div class="col-md-12">
										<label for="validationCustomUsername" class="form-label">Mô Tả Chính</label>
										<textarea name="long_description" id="summernote" class="form-control"></textarea>
									</div>


									<div class="form-group mt-3">
										<div>
											<button type="submit" class="btn btn-primary">Create</button>
											<button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
										</div>
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

<script type="text/javascript">

$(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});

</script>


<script type="text/javascript">

$(document).ready(function(){
    $('#banner').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showBanner').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});

</script>



@endsection






















































