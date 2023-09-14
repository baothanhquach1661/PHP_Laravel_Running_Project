@extends('backend.admin.admin_master')
@section('title', 'Đơn hàng đã bị hủy')
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
                        <li class="breadcrumb-item active" aria-current="page">Cancel Orders Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Quản lý tất cả đơn hàng đã bị hủy ( {{ count($orders) }} )</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive export-table">
								<table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
									<thead>
										<tr>
											<th class="border-bottom-0">Date</th>
											<th class="border-bottom-0">Invoice</th>
											<th class="border-bottom-0">Đơn giá</th>
											<th class="border-bottom-0">Payment</th>
											<th class="border-bottom-0">Tình trạng</th>
											<th class="border-bottom-0">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($orders as $data)
											<tr>
												<td>
													<p>{{ $data->order_date }}</p>
												</td>
												<td>
													<a href="{{ route('pending-order.edit', $data->id) }}">
														#{{ $data->invoice_no }}
													</a>
												</td>
												<td>
													<p>{{ number_format($data->amount) }}₫</p>
												</td>
												<td>
													<p>{{ $data->payment_method }}</p>
												</td>
												<td>
													@if($data->status == 'Pending')
														<span class="badge bg-primary" style="font-size: 12px;">Đang chờ xử lý</span>
													@else
														<span class="badge bg-danger" style="font-size: 12px;">Đã xác nhận</span>
													@endif
												</td>
												<td>
													@if($data->status == 1)
														<a href="{{ route('category.inactive', $data->id) }}" class="btn btn-light" title="Inactive Product"><i class="fa fa-eye"></i></a>
													@else
														<a href="{{ route('category.active', $data->id) }}" class="btn btn-dark" title="active Product"><i class="fa fa-eye-slash"></i></a>
													@endif

													<a href="{{ route('pending-order.edit', $data->id) }}" class="btn btn-info">Edit</a>
													<a href="{{ route('category.delete', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
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






















































