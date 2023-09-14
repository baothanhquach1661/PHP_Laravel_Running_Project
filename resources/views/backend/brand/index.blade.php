@extends('backend.admin.admin_master')
@section('title', 'Tất cả thương hiệu')
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
                        <li class="breadcrumb-item active" aria-current="page">Brand Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Quản lý thương hiệu</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive export-table">
								<table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
									<thead>
										<tr>
											<th class="border-bottom-0">Tên thương hiệu</th>
											<th class="border-bottom-0">Hình ảnh</th>
											<th class="border-bottom-0">Tình trạng</th>
											<th class="border-bottom-0">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($brands as $data)
											<tr>
												<td>
													<a href="{{ route('brand.edit', $data->id) }}">
														{{ $data->brand_name }}
													</a>
												</td>
												<td>
													<img src="{{ asset($data->brand_image) }}" style="width: 70px; height: 30px;" alt="{{ $data->brand_name }}">
												</td>
												<td>
													@if($data->status == 1)
														<span class="badge bg-success" style="font-size: 12px;">Active</span>
													@else
														<span class="badge bg-danger" style="font-size: 12px;">Inactive</span>
													@endif
												</td>
												<td>
													@if($data->status == 1)
														<a href="{{ route('brand.inactive', $data->id) }}" class="btn btn-light" title="Inactive Product"><i class="fa fa-eye"></i></a>
													@else
														<a href="{{ route('brand.active', $data->id) }}" class="btn btn-dark" title="active Product"><i class="fa fa-eye-slash"></i></a>
													@endif

													<a href="{{ route('brand.edit', $data->id) }}" class="btn btn-info">Edit</a>
													<a href="{{ route('brand.delete', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
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






















































