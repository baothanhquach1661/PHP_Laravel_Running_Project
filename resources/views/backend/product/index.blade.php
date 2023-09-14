@extends('backend.admin.admin_master')
@section('title', 'Tất cả sản phẩm')
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
                        <li class="breadcrumb-item active" aria-current="page">Product Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Quản lý tất cả sản phẩm ( {{ count($products) }} )</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive export-table">
								<table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
									<thead>
										<tr>
											<th class="border-bottom-0" width="10">SKU</th>
											<th class="border-bottom-0">Hình ảnh</th>
											<th class="border-bottom-0">Tên sản phẩm</th>
											<th class="border-bottom-0" style="widows: 5%;">Qty</th>
											<th class="border-bottom-0">Giá bán/Giá giảm( VND )</th>
											<th class="border-bottom-0">Tình trạng</th>
											<th class="border-bottom-0">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($products as $data)
											<tr>
												<td>
													<p>{{ $data->product_code }}</p>
												</td>
												<td>
													<img src="{{ asset($data->product_thumbnail) }}" style="width: 150px; height: 150px;" alt="{{ $data->product_name }}">
												</td>
												<td>
													<a href="{{ route('product.edit', $data->id) }}">
														{{ $data->product_name }}
													</a>
												</td>
												<td>
													@if($data->product_qty < 10)
														<p style="color: red;">{{ $data->product_qty }}</p>
													@else
														{{ $data->product_qty }}
													@endif
												</td>
												<td>
													@if($data->selling_price == NULL and $data->discount_price == NULL)
														Sẩn phẩm hiện tại chưa có giá
													@elseif($data->selling_price == NULL and $data->discount_price != NULL)
														{{ number_format($data->discount_price) }}
													@elseif($data->selling_price != NULL and $data->discount_price == NULL)
														{{ number_format($data->selling_price) }}
													@elseif($data->selling_price != NULL and $data->discount_price != NULL)
														{{ number_format($data->selling_price) }} / <span style="color:red;">{{ number_format($data->discount_price) }}</span>
													@endif
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
														<a href="{{ route('product.inactive', $data->id) }}" class="btn btn-light" title="Inactive Product"><i class="fa fa-eye"></i></a>
													@else
														<a href="{{ route('product.active', $data->id) }}" class="btn btn-dark" title="active Product"><i class="fa fa-eye-slash"></i></a>
													@endif

													<a href="{{ route('product.edit', $data->id) }}" class="btn btn-info">Edit</a>
													<a href="{{ route('product.delete', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
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






















































