@extends('backend.admin.admin_master')
@section('title', 'Tất cả coupons')
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
                        <li class="breadcrumb-item active" aria-current="page">Coupon Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Quản lý coupons</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive export-table">
								<table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
									<thead>
										<tr>
											<th class="border-bottom-0">Tên Coupon</th>
											<th class="border-bottom-0">Giảm ( % / ₫ )</th>
											<th class="border-bottom-0">Thời hạn</th>
											<th class="border-bottom-0">Tình trạng</th>
											<th class="border-bottom-0">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($coupons as $data)
											<tr>
												<td>
													<a href="{{ route('coupon.edit', $data->id) }}">
														{{ $data->coupon_name }}
													</a>
												</td>
												<td>
													<span>
														@if($data->discount_percentage == null)
															₫{{ number_format($data->discount_regular) }}
														@else
															{{ $data->discount_percentage }}%
														@endif
													</span>
												</td>
												<td>
													<span>{{ Carbon\Carbon::parse($data->coupon_validity)->format('D, d F Y') }}</span>
												</td>

												<td>
													@if($data->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
														<span class="badge bg-success" style="font-size: 12px;">Còn hạn</span>
													@else
														<span class="badge bg-danger" style="font-size: 12px;">Hết hạn</span>
													@endif
												</td>
												<td>
													@if($data->status == 1)
														<a href="{{ route('coupon.inactive', $data->id) }}" class="btn btn-light" title="Inactive"><i class="fa fa-eye"></i></a>
													@else
														<a href="{{ route('coupon.active', $data->id) }}" class="btn btn-dark" title="active"><i class="fa fa-eye-slash"></i></a>
													@endif

													<a href="{{ route('coupon.edit', $data->id) }}" class="btn btn-info">Edit</a>
													<a href="{{ route('coupon.delete', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
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






















































