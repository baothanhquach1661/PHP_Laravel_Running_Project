@extends('backend.admin.admin_master')
@section('title', 'Xử lý đơn hàng đã xác nhận')
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
                        <li class="breadcrumb-item active" aria-current="page">Processing Orders Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Quản lý tất cả đơn hàng đã xác nhận ( {{ count($orders) }} )</h3>
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
													@if($data->status == 'Processing')
														<span class="badge bg-info" style="font-size: 12px;">Đang chờ soạn</span>
													@else
														<span class="badge bg-danger" style="font-size: 12px;">Đang xử lý</span>
													@endif
												</td>
												<td>
													<a href="{{ route('pending-order.edit', $data->id) }}" class="btn btn-info">Cập nhật</a>
													<a href="{{ route('processing-picked', $data->id) }}" class="btn btn-dark" id="picked">Đã soạn xong</a>
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






















































