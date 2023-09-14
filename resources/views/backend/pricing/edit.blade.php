@extends('backend.admin.admin_master')
@section('title', 'Chỉnh sửa nội dung trang báo giá')
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
                        <li class="breadcrumb-item active" aria-current="page">editting pricing list</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('pricing.update') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf

								<input type="hidden" name="id" value="{{ $pricing_list->id }}">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="title" class="form-label">Name</label>
											<input type="text" name="name" value="{{ $pricing_list->name }}" class="form-control" required>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="title" class="form-label">Title</label>
											<input type="text" name="title" value="{{ $pricing_list->title }}" class="form-control">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="title" class="form-label">Mô tả ngắn</label>
											<input type="text" name="short_description" value="{{ $pricing_list->short_description }}" class="form-control">
										</div>
									</div>

									<div class="col-md-12">
										<label for="validationCustomUsername" class="form-label">Mô Tả Chính</label>
										<textarea name="long_description" id="summernote" class="form-control">
											{!! $pricing_list->long_description !!}
										</textarea>
									</div>


									<div class="form-group mt-3">
										<div>
											<button type="submit" class="btn btn-primary">Update</button>
											<button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
			{{-- end first row --}}

			<!-- ROW-2 OPEN -->
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Image</h3>
						</div>
						<div class="card-body">
							<div class="example">
								<div class="row mt-4">
									<div class="col-md-12 col-xl-4">
										<form method="post" action="{{ route('price_list-update-image') }}" enctype="multipart/form-data">
					                        @csrf

					                        <input type="hidden" name="id" value="{{ $pricing_list->id }}">
                        					<input type="hidden" name="old_img" value="{{ $pricing_list->image }}">

											<div class="thumbnail">
												<img src="{{ asset($pricing_list->image) }}" style="width: 360px; height: 180px;" class="thumbimg">
												<div class="caption">
													<div>
														<input name="image" type="file" class="form-control" onChange="mainThumbUrl(this)"/>
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
							<h3 class="card-title">Banner</h3>
						</div>
						<div class="card-body">
							<div class="example">
								<div class="row mt-4">
									<div class="col-md-12 col-xl-4">
										<form method="post" action="{{ route('price_list-update-banner') }}" enctype="multipart/form-data">
					                        @csrf


											<div class="thumbnail">
												@foreach($banner as $img)
                            
													<img src="{{ asset($img->photo_name) }}" style="width: 360px; height: 180px;" class="thumbimg">
													<div class="caption">
														<div>
															<input class="form-control" type="file" name="pricing_banner[{{ $img->id }}]">
															<img src="" id="mainThmbb">
														</div>
														<button type="submit" class="btn btn-primary my-1" role="button">Update</button>
													</div>

												@endforeach
											</div>


										</form>
									</div><!-- COL-END -->
								</div>
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



@endsection






















































