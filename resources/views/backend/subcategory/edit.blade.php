@extends('backend.admin.admin_master')
@section('title', 'Cập nhật tiểu danh mục')
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
                        <li class="breadcrumb-item active" aria-current="page">editing subcategory</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('subcategory.update') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf

								<input type="hidden" name="id" value="{{ $subcategory->id }}">
                            	<input type="hidden" name="old_image" value="{{ $subcategory->subcategory_image }}">

								<div class="form-group">
									<label for="title" class="form-label">Tên tiểu danh mục</label>
									<input type="text" name="subcategory_name" class="form-control" value="{{ $subcategory->subcategory_name }}" required>
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Danh mục</label>
									<select class="form-select" id="validationCustom03" name="category_id">

                                    <option selected disabled value="">Chọn danh mục</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }} >{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
								</div>
								<div class="form-group">
									<label for="title" class="form-label">Tiêu đề</label>
									<input type="text" name="title" class="form-control" value="{{ $subcategory->title }}">
								</div>

								<div class="form-group">
									<input type="file" name="subcategory_image" class="form-control" id="image">
								</div>

								<div class="mb-4">
                                    <img id="showImage" class="img-thumbnail" alt="150x150" width="160" src="{{ (!empty($subcategory->subcategory_image)) ? 
                                        url($subcategory->subcategory_image):
                                        url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                                </div>
                                <div class="form-group">
									<img id="showImage" class="img-thumbnail" width="300">
								</div>
								<div class="form-group">
									<label for="description" class="form-label">Mô tả</label>
									<textarea id="summernote" class="form-control" name="description">
										{!! $subcategory->description !!}
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






















































