@extends('backend.admin.admin_master')
@section('title', 'Quản lý phí vận chuyển')
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
                        <li class="breadcrumb-item active" aria-current="page">create new delivery fee</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">

							<form>
								@csrf

								<div class="col-md-6">
									<label for="validationCustom01" class="form-label">Chọn thành phố</label>
									<select class="form-select choose city" name="city" id="city">
										<option value="">Tỉnh / thành</option>

										@foreach($city as $city_name)
											<option value="{{ $city_name->matp }}">{{ $city_name->city_name }}</option>
										@endforeach

									</select>
								</div>
								<div class="col-md-6"></div>

								<div class="col-md-6">
								  <label for="validationCustom02" class="form-label">Chọn quận huyện</label>
								  <select class="form-select choose province" name="province" id="province">
								  		<option value="">Quận / huyện</option>
									</select>
								</div>
								<div class="col-md-6"></div>

								<div class="col-md-6">
								  <label for="validationCustom02" class="form-label">Chọn phường xã</label>
								  <select class="form-select ward" name="ward" id="ward">
								  	<option value="">Phường / xã</option>
									</select>
								</div>
								<div class="col-md-6"></div>

								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Phí vận chuyển</label>
									<div class="input-group has-validation">
										<input type="text" name="shipping_fees" class="form-control shipping_fees">
									</div>
								</div>



								<div class="form-group mt-3">
									<div class="col-md-4">
										<button type="button" name="create_delivery_fee" class="btn btn-primary create_delivery_fee">Thêm phí vận chuyển</button>
										<button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body" id="load_delivery">

							
					</div>
				</div>
			</div>

        </div>
    </div>
</div>



@endsection






















































