@extends('backend.admin.admin_master')
@section('title', 'Cập nhật nội dung site setting')
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
                        <li class="breadcrumb-item active" aria-current="page">editing site setting</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!--  first content open -->
            <div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">

							<form class="row g-3 needs-validation" method="post" action="{{ route('site.update') }}" enctype="multipart/form-data">
								@csrf

								<input type="hidden" name="id" value="{{ $site->id }}">
								<input type="hidden" name="old_image" value="{{ $site->logo_header }}">

								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Header Logo</label>
									<input type="file" name="logo_header" class="form-control" id="image">
                                    <img id="showImage" class="img-thumbnail" width="160" src="{{ (!empty($site->logo_header)) ? 
                                        url($site->logo_header):
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






















































