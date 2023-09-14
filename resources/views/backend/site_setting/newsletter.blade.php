@extends('backend.admin.admin_master')
@section('title', 'Cập nhật nội dung newsletter')
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
                        <li class="breadcrumb-item active" aria-current="page">editing newsletter setting</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!--  first content open -->
            <div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="card">
						<div class="card-body">

							<form class="row g-3 needs-validation" method="post" action="{{ route('newsletter.update') }}" enctype="multipart/form-data">
								@csrf

								<input type="hidden" name="id" value="{{ $newsletter->id }}">
								<input type="hidden" name="old_image" value="{{ $newsletter->image }}">

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Tiêu đề</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $newsletter->title }}" name="title" class="form-control" required>
									</div>
								</div>

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Image (1300x400)</label>
									<input type="file" name="image" class="form-control" id="image">
                                    <img id="showImage" class="img-thumbnail" width="160" src="{{ (!empty($newsletter->image)) ? 
                                        url($newsletter->image):
                                        url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
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


        </div>
    </div>
</div>






@endsection






















































