@extends('backend.admin.admin_master')
@section('title', 'Tất cả admin')
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
                        <li class="breadcrumb-item active" aria-current="page">Admin Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<div style="text-align:right;">
								<a href="{{ route('create.admin') }}" class="btn btn-dark"> Create Admin</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive export-table">
								<table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
									<thead>
										<tr>
											<th class="border-bottom-0">Avatar</th>
											<th class="border-bottom-0">Name</th>
											<th class="border-bottom-0">Email</th>
											<th class="border-bottom-0">Phone</th>
											<th class="border-bottom-0">Access</th>
											<th class="border-bottom-0">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($admins as $data)
											<tr>
												<td>
													<img src="{{ asset($data->profile_photo_path)}}" style="width: 50px; height: 50px;" alt="{{ $data->name }}">
												</td>
												<td>
													<a href="{{ route('admin.role.edit', $data->id) }}">
														{{ $data->name }}
													</a>
												</td>
												<td>
													<p>{{ $data->email }}</p>
												</td>
												<td>
													<p>{{ $data->phone }}</p>
												</td>

												<td>

													@if($data->brand == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Brand</span>
													@else
													@endif

													@if($data->category == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Category</span>
													@else
													@endif

													@if($data->subcategory == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Subcategory</span>
													@else
													@endif

													@if($data->product == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Product</span>
													@else
													@endif

													@if($data->slider == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Slider</span>
													@else
													@endif

													@if($data->coupon == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Coupon</span>
													@else
													@endif

													@if($data->delivery == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Delivery</span>
													@else
													@endif

													@if($data->blog == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Blog</span>
													@else
													@endif

													@if($data->setting == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Setting</span>
													@else
													@endif

													@if($data->return_order == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Return order</span>
													@else
													@endif

													@if($data->review == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Review</span>
													@else
													@endif

													@if($data->orders == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Orders</span>
													@else
													@endif

													@if($data->stock == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Stock</span>
													@else
													@endif

													@if($data->report == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Report</span>
													@else
													@endif

													@if($data->all_client == 1)
														<span class="badge bg-primary" style="font-size: 12px;">All client</span>
													@else
													@endif

													@if($data->admin_user_role == 1)
														<span class="badge bg-primary" style="font-size: 12px;">Admin role</span>
													@else
													@endif

													

												</td>
												<td>
													<a href="{{ route('admin.role.edit', $data->id) }}" class="btn btn-info">Edit</a>
													<a href="{{ route('admin.role.delete', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

        </div>
    </div>
</div>



@endsection






















































