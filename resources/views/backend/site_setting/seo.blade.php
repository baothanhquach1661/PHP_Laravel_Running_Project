@extends('backend.admin.admin_master')
@section('title', 'Cập nhật nội dung seo setting')
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
                        <li class="breadcrumb-item active" aria-current="page">editing seo setting</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!--  first content open -->
            <div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="card">
						<div class="card-body">

							<form class="row g-3 needs-validation" method="post" action="{{ route('seo.update') }}">
								@csrf

								<input type="hidden" name="id" value="{{ $seo->id }}">

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Meta title</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $seo->meta_title }}" name="meta_title" class="form-control" required>
									</div>
								</div>

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Meta author</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $seo->meta_author }}" name="meta_author" class="form-control" required>
									</div>
								</div>

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Meta keyword</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $seo->meta_keyword }}" name="meta_keyword" class="form-control" required>
									</div>
								</div>

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Meta description</label>
									<div class="input-group has-validation">
										<textarea name="meta_description" class="form-control">{{ $seo->meta_description }}</textarea>
									</div>
								</div>

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Google analystics</label>
									<div class="input-group has-validation">
										<textarea name="google_analystics" class="form-control">{{ $seo->google_analystics }}</textarea>
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


        </div>
    </div>
</div>






@endsection






















































