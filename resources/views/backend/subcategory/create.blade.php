@extends('backend.admin.admin_master')
@section('title', 'Tạo mới tiểu danh mục')
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
                        <li class="breadcrumb-item active" aria-current="page">create new subcategory</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('subcategory.store') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf

								<div class="form-group">
									<input type="text" name="subcategory_name" class="form-control" placeholder="Tên tiểu danh mục*" required>
									@if($errors->has('subcategory_name'))
									       <div class="error" style="color: red;">{{ $errors->first('subcategory_name') }}</div>
									@endif
								</div>
								<div class="form-group">
									<select class="form-select" id="validationCustom04" name="category_id" required>

                                        <option selected disabled value="">Chọn danh mục*</option>

                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach

                                    </select>
                                    @if($errors->has('category_id'))
									       <div class="error" style="color: red;">{{ $errors->first('category_id') }}</div>
									@endif
								</div>
								<div class="form-group">
									<input type="text" name="title" class="form-control" placeholder="Tiêu đề">
								</div>
								<div class="form-group">
									<input type="file" name="subcategory_image" class="form-control" id="image">
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





















































