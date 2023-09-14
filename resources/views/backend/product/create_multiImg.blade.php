@extends('backend.admin.admin_master')
@section('title', 'Tạo thêm hình con sản phẩm')
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
                        <li class="breadcrumb-item active" aria-current="page">create product multiImage</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">

							<form action="{{ route('product.store-multiImage') }}" enctype="multipart/form-data" class="row g-3 needs-validation" method="post" >
								@csrf

								<input type="hidden" name="id" value="{{ $products->id }}">

								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Hình con sp (630x630)</label>
									<div class="input-group has-validation">
										<input type="file" name="multi_img[]" multiple="" id="multiImg" required class="form-control">
									</div>
									<div id="preview_img" class="row"></div>
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




@endsection






















































