@extends('backend.admin.admin_master')
@section('title', 'Quản lý tồn kho')
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
                        <li class="breadcrumb-item active" aria-current="page">Product Stock Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Quản lý tồn kho sản phẩm</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive export-table">
								<table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
									<thead>
										<tr>
											<th class="border-bottom-0" width="10">SKU</th>
											<th class="border-bottom-0">Hình ảnh</th>
											<th class="border-bottom-0">Tên sản phẩm</th>
											<th class="border-bottom-0">Số lượng</th>
											<th class="border-bottom-0">Giá bán/Giá giảm( VND )</th>
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
													<strong style="color:red; font-size: 21px;">{{ $data->product_qty }}</strong>
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
													<a href="{{ route('product.edit', $data->id) }}" class="btn btn-info">Nhập hàng</a>
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






















































