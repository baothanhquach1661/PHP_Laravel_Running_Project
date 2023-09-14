@extends('backend.admin.admin_master')
@section('title', 'Editing admin user information')
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
                        <li class="breadcrumb-item active" aria-current="page">Editing {{ $admin_user->name }}</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('admin.role.update') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf

								<input type="hidden" name="id" value="{{ $admin_user->id }}">
                            	<input type="hidden" name="old_image" value="{{ $admin_user->profile_photo_path }}">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="title" class="form-label">Admin Name</label>
											<input type="text" name="name" class="form-control" value="{{ $admin_user->name }}" required>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="title" class="form-label">Email</label>
											<input type="email" name="email" class="form-control" value="{{ $admin_user->email }}">
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="title" class="form-label">Phone</label>
											<input type="text" name="phone" class="form-control" value="{{ $admin_user->phone }}">
										</div>
									</div>

									<div class="col-md-12" style="margin-bottom: 10px;">
										<div class="form-group">
											<label for="title" class="form-label">Avatar</label>
											<input type="file" name="profile_photo_path" class="form-control" id="image">
										</div>
										<div class="form-group">
											<img id="showImage" class="img-thumbnail" alt="150x150" width="160" src="{{ (!empty($admin_user->profile_photo_path)) ? 
                                        		url($admin_user->profile_photo_path):
                                        		url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
										</div>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecked1">
											<input type="checkbox" value="1" name="brand" id="ckbox-unchecked1" {{ $admin_user->brand == 1 ? 'checked' : '' }}>
											<span>Brand</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked2">
											<input type="checkbox" value="1" name="category" id="ckbox-unchecked2" {{ $admin_user->category == 1 ? 'checked' : '' }}>
											<span>Category</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecked3">
											<input type="checkbox" value="1" name="subcategory" id="ckbox-unchecked3" {{ $admin_user->subcategory == 1 ? 'checked' : '' }}>
											<span>Subcategory</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked4">
											<input type="checkbox" value="1" name="product" id="ckbox-unchecked4" {{ $admin_user->product == 1 ? 'checked' : '' }}>
											<span>Product</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecke5">
											<input type="checkbox" value="1" name="slider" id="ckbox-unchecke5" {{ $admin_user->slider == 1 ? 'checked' : '' }}>
											<span>Slider</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked6">
											<input type="checkbox" value="1" name="coupon" id="ckbox-unchecked6" {{ $admin_user->coupon == 1 ? 'checked' : '' }}>
											<span>Coupon</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecke7">
											<input type="checkbox" value="1" name="delivery" id="ckbox-unchecke7" {{ $admin_user->delivery == 1 ? 'checked' : '' }}>
											<span>Delivery</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked8">
											<input type="checkbox" value="1" name="blog" id="ckbox-unchecked8" {{ $admin_user->blog == 1 ? 'checked' : '' }}>
											<span>Blog</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecke9">
											<input type="checkbox" value="1" name="setting" id="ckbox-unchecke9" {{ $admin_user->setting == 1 ? 'checked' : '' }}>
											<span>Setting</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked10">
											<input type="checkbox" value="1" name="return_order" id="ckbox-unchecked10" {{ $admin_user->return_order == 1 ? 'checked' : '' }}>
											<span>Return Order</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecked11">
											<input type="checkbox" value="1" name="review" id="ckbox-unchecked11" {{ $admin_user->review == 1 ? 'checked' : '' }}>
											<span>Review</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked12">
											<input type="checkbox" value="1" name="orders" id="ckbox-unchecked12" {{ $admin_user->orders == 1 ? 'checked' : '' }}>
											<span>Đơn hàng</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecked13">
											<input type="checkbox" value="1" name="stock" id="ckbox-unchecked13" {{ $admin_user->stock == 1 ? 'checked' : '' }}>
											<span>Stock</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked14">
											<input type="checkbox" value="1" name="report" id="ckbox-unchecked14" {{ $admin_user->report == 1 ? 'checked' : '' }}>
											<span>Report</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecked15">
											<input type="checkbox" value="1" name="all_client" id="ckbox-unchecked15" {{ $admin_user->all_client == 1 ? 'checked' : '' }}>
											<span>All Clients</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked16">
											<input type="checkbox" value="1" name="admin_user_role" id="ckbox-unchecked16" {{ $admin_user->admin_user_role == 1 ? 'checked' : '' }}>
											<span>Admin User</span>
										</label>
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






















































