@extends('backend.admin.admin_master')
@section('title', 'Quản lý nội dung trang liên hệ')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="app-content main-content mt-0">
    <div class="side-app">
         <!-- CONTAINER -->
         <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">editing contact page content</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!--  first content open -->
            <div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">

							<form class="row g-3 needs-validation" method="post" action="{{ route('contact.update') }}">
								@csrf

								<input type="hidden" name="id" value="{{ $data->id }}">

								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Address</label>
									<div class="input-group has-validation">
										<input class="form-control" name="rinart_address" type="text" value="{{ $data->rinart_address }}" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Phone</label>
									<div class="input-group has-validation">
										<input class="form-control" name="rinart_phone" type="text" value="{{ $data->rinart_phone }}" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Email</label>
									<div class="input-group has-validation">
										<input class="form-control" name="rinart_email" type="text" value="{{ $data->rinart_email }}" required>
									</div>
								</div>


								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Rinart Adv</label>
									<div class="input-group has-validation">
										<input class="form-control" name="rinart_adv" type="text" value="{{ $data->rinart_adv }}" required>
									</div>
								</div>

								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Opening Hours 1</label>
									<div class="input-group has-validation">
										<input class="form-control" name="rinart_opening_hours" type="text" value="{{ $data->rinart_opening_hours }}" required>
									</div>
								</div>

								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Opening Hours 2</label>
									<div class="input-group has-validation">
										<input class="form-control" name="rinart_opening_hours_2" type="text" value="{{ $data->rinart_opening_hours_2 }}" required>
									</div>
								</div>
								

								<div class="col-12">
								  	<button type="submit" class="btn btn-primary">Submit</button>
									<button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End first content -->




        </div>
    </div>
</div>






@endsection






















































