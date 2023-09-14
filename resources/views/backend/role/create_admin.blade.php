@extends('backend.admin.admin_master')
@section('title', 'Tạo mới một admin')
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
                        <li class="breadcrumb-item active" aria-current="page">create new admin</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">
							<form method="post" action="{{ route('admin.role.store') }}" enctype="multipart/form-data" class="form-horizontal">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="title" class="form-label">Admin Name</label>
											<input type="text" name="name" class="form-control" required>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="title" class="form-label">Email</label>
											<input type="email" name="email" class="form-control">
										</div>
										@if($errors->has('email'))
										       <div class="error" style="color: red;">{{ $errors->first('email') }}</div>
										@endif
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="title" class="form-label">Phone</label>
											<input type="text" name="phone" class="form-control">
										</div>
										@if($errors->has('phone'))
										       <div class="error" style="color: red;">{{ $errors->first('phone') }}</div>
										@endif
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label for="title" class="form-label">Password</label>
											<input type="password" name="password" class="form-control">
										</div>
									</div>

									<div class="col-md-12" style="margin-bottom: 10px;">
										<div class="form-group">
											<label for="title" class="form-label">Avatar</label>
											<input type="file" name="profile_photo_path" class="form-control" id="image">
										</div>
										<div class="form-group">
											<img src="{{ !empty($admin->profile_photo_path) ? url('upload/admin_images/'.$admin->profile_photo_path):url('upload/no_image.jpg') }}" id="showImage" class="img-thumbnail" width="100">
										</div>
										@if($errors->has('profile_photo_path'))
										       <div class="error" style="color: red;">{{ $errors->first('profile_photo_path') }}</div>
										@endif
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecked1">
											<input type="checkbox" value="1" name="brand" id="ckbox-unchecked1">
											<span>Brand</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked2">
											<input type="checkbox" value="1" name="category" id="ckbox-unchecked2">
											<span>Category</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecked3">
											<input type="checkbox" value="1" name="subcategory" id="ckbox-unchecked3">
											<span>Subcategory</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked4">
											<input type="checkbox" value="1" name="product" id="ckbox-unchecked4">
											<span>Product</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecke5">
											<input type="checkbox" value="1" name="slider" id="ckbox-unchecke5">
											<span>Slider</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked6">
											<input type="checkbox" value="1" name="coupon" id="ckbox-unchecked6">
											<span>Coupon</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecke7">
											<input type="checkbox" value="1" name="delivery" id="ckbox-unchecke7">
											<span>Delivery</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked8">
											<input type="checkbox" value="1" name="blog" id="ckbox-unchecked8">
											<span>Blog</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecke9">
											<input type="checkbox" value="1" name="setting" id="ckbox-unchecke9">
											<span>Setting</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked10">
											<input type="checkbox" value="1" name="return_order" id="ckbox-unchecked10">
											<span>Return Order</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecked11">
											<input type="checkbox" value="1" name="review" id="ckbox-unchecked11">
											<span>Review</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked12">
											<input type="checkbox" value="1" name="orders" id="ckbox-unchecked12">
											<span>Đơn hàng</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecked13">
											<input type="checkbox" value="1" name="stock" id="ckbox-unchecked13">
											<span>Stock</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked14">
											<input type="checkbox" value="1" name="report" id="ckbox-unchecked14">
											<span>Report</span>
										</label>
									</div>

									<div class="col-md-4">
										<label class="ckbox" for="ckbox-unchecked15">
											<input type="checkbox" value="1" name="all_client" id="ckbox-unchecked15">
											<span>All Clients</span>
										</label>
										<label class="ckbox" for="ckbox-unchecked16">
											<input type="checkbox" value="1" name="admin_user_role" id="ckbox-unchecked16">
											<span>Admin User</span>
										</label>
									</div>


									
									<div class="form-group mt-3">
										<div>
											<button type="submit" class="btn btn-primary">Create</button>
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






















































