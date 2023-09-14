@extends('backend.admin.admin_master')
@section('title', 'Tạo mới sản phẩm')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="app-content main-content mt-0">
    <div class="side-app">
         <!-- CONTAINER -->
         <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">create new product</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">

							<form enctype="multipart/form-data" class="row g-3 needs-validation" method="post" action="{{ route('product.store') }}">
								@csrf

								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Danh Mục</label>
									<select class="form-select" name="category_id" required>
										<option selected disabled value="">Chọn danh mục</option>
											@foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
									</select>
								</div>
								<div class="col-md-6">
								  <label for="validationCustom02" class="form-label">Tiểu Danh Mục</label>
								  <select class="form-select" name="subcategory_id">
										<option selected disabled value="">Choose...</option>
									</select>
								</div>


								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Tên Sản Phẩm</label>
									<div class="input-group has-validation">
										<input type="text" name="product_name" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Code | SKU</label>
									<div class="input-group has-validation">
										<input type="text" name="product_code" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Số Lượng</label>
									<div class="input-group has-validation">
										<input type="text" name="product_qty" class="form-control">
									</div>
								</div>


								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Giá Bán</label>
									<div class="input-group has-validation">
										<input type="text" name="selling_price" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Giá Giảm</label>
									<div class="input-group has-validation">
										<input type="text" name="discount_price" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Mô Tả Ngắn</label>
									<div class="input-group has-validation">
										<input type="text" name="short_description" class="form-control">
									</div>
								</div>


								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Màu Sắc</label>
									<div class="input-group has-validation">
										<input type="text" data-role="tagsinput" name="product_color" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Tags</label>
									<div class="input-group has-validation">
										<input type="text" data-role="tagsinput" name="product_tags" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Kích Thước</label>
									<div class="input-group has-validation">
										<input type="text" data-role="tagsinput" name="product_size" class="form-control">
									</div>
								</div>


								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Hình Nền sp (630x630)</label>
									<div class="input-group has-validation">
										<input type="file" name="product_thumbnail" class="form-control" onChange="mainThumbUrl(this)" required>
									</div>
									<img src="" id="mainThmb">
								</div>
								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Hình con sp (630x630)</label>
									<div class="input-group has-validation">
										<input type="file" name="multi_img[]" multiple="" id="multiImg" required class="form-control">
									</div>
									<div id="preview_img" class="row"></div>
								</div>


								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Mô Tả Chính</label>
									<textarea name="longs_description" id="summernote" class="form-control"></textarea>
								</div>


								<div class="col-md-3">
									<label class="ckbox" for="ckbox-unchecked">
										<input type="checkbox" value="1" name="new_arrivals" id="ckbox-unchecked">
										<span>New Arrival</span>
									</label>
								</div>
								<div class="col-md-3">
									<label class="ckbox" for="ckbox-unchecked2"><input type="checkbox" value="1" name="best_sellers" id="ckbox-unchecked2"><span>Best Sellers</span></label>
								</div>
								<div class="col-md-3">
									<label class="ckbox" for="ckbox-unchecked3"><input type="checkbox" value="1" name="features" id="ckbox-unchecked3"><span>Features</span></label>
								</div>
								<div class="col-md-3">
									<label class="ckbox" for="ckbox-unchecked4"><input type="checkbox" value="1" name="flash_deals" id="ckbox-unchecked4"><span>Flash Deals</span></label>
								</div>
								

								<div class="col-12">
								  	<button type="submit" class="btn btn-primary">Submit</button>
									<button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
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

    function mainThumbUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThmb').attr('src',e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }   

</script>

<script>
 
    $(document).ready(function(){
	    $('#multiImg').on('change', function(){ //on file input change
	      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
	      {
	          var data = $(this)[0].files; //this file data

	          $.each(data, function(index, file){ //loop though each file
	              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
	                  var fRead = new FileReader(); //new filereader
	                  fRead.onload = (function(file){ //trigger function on successful read
	                      return function(e) {
	                          var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
	                  .height(80); //create image element 
	                      $('#preview_img').append(img); //append image to output element
	                  };
	              })(file);
	                  fRead.readAsDataURL(file); //URL representing the file's data.
	              }
	          });

	      }else{
	          alert("Your browser doesn't support File API!"); //if File API is absent
	      }
	  });
	});

</script>

<script type="text/javascript">

      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('admin/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });

</script>




@endsection






















































