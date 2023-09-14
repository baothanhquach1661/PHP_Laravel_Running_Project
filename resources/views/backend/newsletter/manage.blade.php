@extends('backend.admin.admin_master')
@section('title', 'Tất cả email khách đã đăng ký')
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
                        <li class="breadcrumb-item active" aria-current="page">Customer Registerd Newsletter Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h3 class="card-title">Quản lý tất cả email đã đăng ký</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive export-table">
								<table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
									<thead>
										<tr>
											<th class="border-bottom-0">No.</th>
											<th class="border-bottom-0">Customer Email</th>
											<th class="border-bottom-0">Date</th>
											<th class="border-bottom-0">Time</th>
											<th class="border-bottom-0">Action</th>
										</tr>
									</thead>
									<tbody>
										@php($i = 1)
										@foreach($newsletters as $data)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $data->email }}</td>
												<td>{{ $data->created_at }}</td>
												<td>{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</td>
												<td>
													<a href="{{ route('message.delete', $data->id) }}" class="btn btn-danger" id="delete">Delete</a>
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






















































