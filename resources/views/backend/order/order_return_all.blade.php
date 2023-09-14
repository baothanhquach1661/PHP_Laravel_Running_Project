@extends('backend.admin.admin_master')
@section('title', 'Tất cả đơn hàng đã hoàn trả')
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
                        <li class="breadcrumb-item active" aria-current="page">All Return Orders Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Tất cả đơn hàng đang đã hoàn trả ( {{ count($orders) }} )</h3>
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
													<span class="badge bg-success" style="font-size: 12px;">Đã hoàn trả</span>
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






















































