@extends('backend.admin.admin_master')
@section('title', 'Tạo mới slide')
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
                        <li class="breadcrumb-item active" aria-current="page">create new slide</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('slide.store') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf

								<div class="form-group">
									<label for="title" class="form-label">Tên Slide</label>
									<input type="text" name="slide_name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Tiêu Đề</label>
									<input type="text" name="title" class="form-control">
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Image (1700x650)</label>
									<input type="file" name="slide_image" class="form-control" id="image">
									@if($errors->has('slide_image'))
									       <div class="error" style="color: red;">{{ $errors->first('slide_image') }}</div>
									@endif
								</div>
								<div class="form-group">
									<img id="showImage" class="img-thumbnail" width="300">
								</div>
								<div class="form-group">
									<textarea id="summernote" class="form-control" name="description"></textarea>
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



@endsection






















































