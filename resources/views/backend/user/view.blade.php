@extends('backend.admin.admin_master')
@section('title', 'Tất cả client')
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
                        <li class="breadcrumb-item active" aria-current="page">Client Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Các khách hàng đã tạo tài khoản ( {{ count($users) }} )</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive export-table">
								<table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
									<thead>
										<tr>
											<th class="border-bottom-0">Hình nền</th>
											<th class="border-bottom-0">Họ tên</th>
											<th class="border-bottom-0">Email</th>
											<th class="border-bottom-0">Số điện thoại</th>
											<th class="border-bottom-0">Địa chỉ</th>
											<th class="border-bottom-0">Tình trạng</th>
											<th class="border-bottom-0">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($users as $data)
											<tr>
												<td>
													<img src="{{ !empty($data->profile_photo_path) ? url('upload/user_images/'.$data->profile_photo_path):url('upload/no_image.jpg') }}" style="width: 50px; height: 50px;" alt="{{ $data->name }}">
												</td>
												<td>
													<a href="#">
														{{ $data->name }}
													</a>
												</td>
												<td>
													<p>{{ $data->email }}</p>
												</td>
												<td>
													<p>{{ $data->phone_number }}</p>
												</td>
												<td>
													<p>{{ $data->address }}</p>
												</td>

												<td>
													<span class="badge bg-primary" style="font-size: 12px;">Active now</span>
													{{-- @if($data->userOnline())
														<span class="badge bg-primary" style="font-size: 12px;">Active now</span>
													@else
														<span class="badge bg-danger" style="font-size: 12px;">
															{{ Carbon\Carbon::parse($data->last_seen->diffForHumans()) }}
														</span>
													@endif --}}
												</td>
												<td>
													<a href="#" class="btn btn-info">Edit</a>
													<a href="#" class="btn btn-danger" id="delete">Delete</a>
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






















































