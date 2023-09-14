@extends('backend.admin.admin_master')
@section('title', 'Admin Profile')
@section('admin')

	<div class="app-content main-content mt-0">
	    <div class="side-app">
	         <!-- CONTAINER -->
	         <div class="main-container container-fluid">
	            <!-- PAGE-HEADER -->
	            <div class="page-header">
	                <div class="ms-auto pageheader-btn">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
	                        <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
	                    </ol>
	                </div>
	            </div>
	            <!-- PAGE-HEADER END -->

				<div class="row" id="user-profile">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-lg-12 col-md-12 col-xl-6">
										<div class="d-flex flex-wrap align-items-center">
											<div class="profile-img-main rounded">
												<img src="{{ !empty($adminData->profile_photo_path) ? asset($adminData->profile_photo_path):asset('upload/no_image.jpg') }}" 
													alt="admin avatar" class="m-0 p-1 rounded hrem-6">
											</div>
											<div class="ms-4">
												<h4>{{ $adminData->name }}</h4>
												<p class="text-muted mb-2">{{ $adminData->created_at }}</p>
												<h4>Email: {{ $adminData->email }}</h4>
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-xl-6">
										<div class="d-md-flex flex-wrap justify-content-lg-end">
											<div class="media m-3">
												<div class="media-icon bg-primary me-3 mt-1">
													<i class="fe fe-file-plus fs-20 text-white"></i>
												</div>
												<div class="media-body">
													<span class="text-muted">Posts</span>
													<div class="fw-semibold fs-25">
														328
													</div>
												</div>
											</div>
											<div class="media m-3">
												<div class="media-icon bg-info me-3 mt-1">
													<i class="fe fe-users  fs-20 text-white"></i>
												</div>
												<div class="media-body">
													<span class="text-muted">Followers</span>
													<div class="fw-semibold fs-25">
														937k
													</div>
												</div>
											</div>
											<div class="media m-3">
												<div class="media-icon bg-warning me-3 mt-1">
													<i class="fe fe-wifi fs-20 text-white"></i>
												</div>
												<div class="media-body">
													<span class="text-muted">Following</span>
													<div class="fw-semibold fs-25">
														2,876
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="border-top">
								<div class="wideget-user-tab">
									<div class="tab-menu-heading">
										<div class="tabs-menu1">
											<ul class="nav">
												<li><a href="#editProfile" data-bs-toggle="tab">Edit Profile</a></li>
												<li><a href="#accountSettings" data-bs-toggle="tab">Change Password</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-content">

							<div class="tab-pane" id="editProfile">
								<div class="card">
									<div class="card-body border-0">

										<form method="post" action="{{ route('admin.profile.store') }}" class="form-horizontal" enctype="multipart/form-data">
											@csrf

											<div class="row mb-4">
												<p class="mb-4 text-17">Thông tin cá nhân</p>

												<div class="col-md-12 col-lg-12 col-xl-6">
													<div class="form-group">
														<label for="name" class="form-label">Admin Name</label>
														<input type="text" class="form-control" name="name" value="{{ $adminData->name }}" required>
													</div>
												</div>

												<div class="col-md-12 col-lg-12 col-xl-6">
													<div class="form-group">
														<label for="email" class="form-label">Email</label>
														<input type="email" name="email" class="form-control" value="{{ $adminData->email }}" required>
													</div>
												</div>

												<div class="col-md-12 col-lg-12 col-xl-6">
													<div class="form-group">
														<label for="email" class="form-label">Phone</label>
														<input type="text" name="phone" class="form-control" value="{{ $adminData->phone }}" required>
													</div>
												</div>

												<div class="col-md-12 col-lg-12 col-xl-6">
													<div class="form-group">
														<label for="profile_photo_path" class="form-label">Admin Avatar</label>
														<input id="image" type="file" name="profile_photo_path" class="form-control">

														<img id="showImage" class="img-thumbnail mt-4" alt="200x200" width="100" src="{{ (!empty($adminData->profile_photo_path))? 
                                                                url($adminData->profile_photo_path):
                                                                url('upload/no_image.jpg') }}">
													</div>
												</div>

												<div class="col-md-12 col-lg-12 col-xl-6">
													<div class="form-group">
														
													</div>
												</div>

											</div>

											<div class="form-group float-end">
												<div class="row row-sm">
													<div class="col-md-12">
														<button type="submit" class="btn btn-w-sm btn-info">Edit Profile</button>
													</div>
												</div>
											</div>
											
										</form>

									</div>
								</div>
							</div>

							<div class="tab-pane" id="accountSettings">
								<div class="card">
									<div class="card-body">

										<form method="post" action="{{ route('admin.change.password') }}" class="form-horizontal">
											@csrf

											<div class="mb-4 main-content-label">Thay đổi mật khẩu</div>

											<div class="form-group ">
												<div class="row row-sm">
													<div class="col-md-2">
														<label for="userName" class="form-label">Current Password</label>
													</div>
													<div class="col-md-6">
														<input type="password" class="form-control" id="current_password" name="current_password" required>
													</div>
												</div>
											</div>
											<div class="form-group ">
												<div class="row row-sm">
													<div class="col-md-2">
														<label for="userName" class="form-label">New Password</label>
													</div>
													<div class="col-md-6">
														<input type="password" class="form-control" id="password" name="password" required>
													</div>
												</div>
											</div>
											<div class="form-group ">
												<div class="row row-sm">
													<div class="col-md-2">
														<label for="userName" class="form-label">Confirm Password</label>
													</div>
													<div class="col-md-6">
														<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
													</div>
												</div>
											</div>

											<div class="form-group float-end">
												<div class="row row-sm">
													<div class="col-md-12">
														<button type="submit" class="btn btn-w-sm btn-info">Change</button>
													</div>
												</div>
											</div>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div><!-- COL-END -->
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
























































