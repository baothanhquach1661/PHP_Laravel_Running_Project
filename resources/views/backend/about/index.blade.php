@extends('backend.admin.admin_master')
@section('title', 'Quản lý nội dung trang giới thiệu')
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
                        <li class="breadcrumb-item active" aria-current="page">editing about page content</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!--  first content open -->
            <div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">

							<form class="row g-3 needs-validation" method="post" action="{{ route('about-update-withoutImage') }}">
								@csrf

								<input type="hidden" name="id" value="{{ $about->id }}">

								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Tiêu Đề</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $about->about_title }}" name="about_title" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Mô Tả Ngắn</label>
									<div class="input-group has-validation">
										<textarea type="text" name="short_description" class="form-control" required>{{ $about->short_description }}</textarea>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Mô Tả</label>
									<div class="input-group has-validation">
										<textarea type="text" name="long_description" class="form-control" required>{{ $about->long_description }}</textarea>
									</div>
								</div>


								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Box 1 Title</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $about->box_1_title }}" name="box_1_title" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Box 1 Mô Tả</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $about->box_1_des }}" name="box_1_des" class="form-control" required>
									</div>
								</div>


								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Box 2 Title</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $about->box_2_title }}" name="box_2_title" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Box 2 Mô Tả</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $about->box_2_des }}" name="box_2_des" class="form-control" required>
									</div>
								</div>


								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Box 3 Title</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $about->box_3_title }}" name="box_3_title" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Box 3 Mô Tả</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $about->box_3_des }}" name="box_3_des" class="form-control" required>
									</div>
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
			<!-- End first content -->

			<!-- ROW-2 OPEN -->
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Hình nền trang giới thiệu (400x480)</h3>
						</div>
						<div class="card-body">
							<div class="example">
								<div class="row mt-4">
									<div class="col-md-12 col-xl-4">
										<form method="post" action="{{ route('about-update-image') }}" enctype="multipart/form-data">
					                        @csrf

					                        <input type="hidden" name="id" value="{{ $about->id }}">
					                        <input type="hidden" name="old_img" value="{{ $about->about_image }}">

											<div class="thumbnail">
												<img src="{{ asset($about->about_image) }}" style="width: 300px; height: 300px;" class="thumbimg">
												<div class="caption">
													<div>
														<input name="about_image" type="file" class="form-control" onChange="mainThumbUrl(this)"/>
                                                		<img src="" id="mainThmb">
													</div>
													<button type="submit" class="btn btn-primary my-1" role="button">Update</button>
												</div>
											</div>
										</form>
									</div><!-- COL-END -->
								</div>
							</div>
						</div>
					</div>
				</div><!-- COL-END -->
			</div>
			<!-- ROW-2 CLOSED -->

			<!-- ROW-3 OPEN -->
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Hình nền members</h3>
						</div>
						<div class="card-body">
							<div class="example">
								<a href="{{ route('about.create-TeamImgs', $about->id) }}" class="btn btn-gray-dark" role="button" style="float:right;">Tạo thêm thành viên</a>
								{{-- <form method="post" action="{{ route('about-update-teamImgs') }}" enctype="multipart/form-data">
                        			@csrf --}}
									<div class="row mt-4">
										@foreach($teamImgs as $img)
											<div class="col-md-12 col-xl-3">
												<div class="thumbnail">
													<img src="{{ asset($img->photo_name) }}" style="width: 300px; height: 300px;" class="thumbimg">
													<div class="caption">
															{{-- <input name="multi_img[{{ $img->id }}]" type="file" class="form-control" required> --}}
														<a href="{{ route('about.edit-TeamImgs', $img->id) }}" class="btn btn-primary my-1" role="button">Edit</a>
														<a href="{{ route('about.TeamImgs.delete', $img->id) }}" class="btn btn-danger my-1" role="button">Delete</a>
													</div>
												</div>
											</div><!-- COL-END -->
										@endforeach
									</div>
								{{-- </form> --}}
							</div>
						</div>
					</div>
				</div><!-- COL-END -->
			</div>
			<!-- ROW-3 CLOSED -->




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





@endsection






















































