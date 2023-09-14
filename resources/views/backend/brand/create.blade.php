@extends('backend.admin.admin_master')
@section('title', 'Tạo mới thương hiệu')
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
                        <li class="breadcrumb-item active" aria-current="page">create new brand</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf

								<div class="form-group">
									<input type="text" name="brand_name" class="form-control" placeholder="Tên thương hiệu" required>
								</div>
								<div class="form-group">
									<input type="text" name="title" class="form-control" placeholder="Tiêu đề">
								</div>
								<div class="form-group">
									<input type="file" name="brand_image" class="form-control">
									@if($errors->has('brand_image'))
									       <div class="error" style="color: red;">{{ $errors->first('brand_image') }}</div>
									@endif
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



@endsection






















































