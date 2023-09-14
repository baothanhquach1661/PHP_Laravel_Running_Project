@extends('backend.admin.admin_master')
@section('title', 'Reports')
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
                        <li class="breadcrumb-item active" aria-current="page">Report Management</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">

				<div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-header border-bottom">
							<h3 class="card-title">Tìm theo ngày</h3>
						</div>
						<div class="card-body">
							<form method="post" action="{{ route('search-by-date') }}" class="form-horizontal">
								@csrf

								<div class="form-group">
									<label class="form-label">Chọn ngày</label>
									<input type="date" name="date" class="form-control" required>
								</div>
								
								<div class="form-group mt-3">
									<div>
										<button type="submit" class="btn btn-dark-light">Tìm kiếm</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-header border-bottom">
							<h3 class="card-title">Tìm theo tháng</h3>
						</div>
						<div class="card-body">
							<form method="post" action="{{ route('search-by-month') }}" class="form-horizontal">
								@csrf

								<div class="form-group">
									<label class="form-label">Chọn tháng</label>
									<select name="month" class="form-control">
										<option label="--Choose--"></option>
										<option value="January">January</option>
										<option value="February">February</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="Jun">Jun</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
								</div>

								<div class="form-group">
									<label class="form-label">Chọn năm</label>
									<select name="year" class="form-control">
										<option label="--Choose--"></option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
										<option value="2026">2026</option>
										<option value="2027">2027</option>
										<option value="2028">2028</option>
										<option value="2029">2029</option>
									</select>
								</div>
								
								<div class="form-group mt-3">
									<div>
										<button type="submit" class="btn btn-dark-light">Tìm kiếm</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-header border-bottom">
							<h3 class="card-title">Tìm theo năm</h3>
						</div>
						<div class="card-body">
							<form method="post" action="{{ route('search-by-year') }}" class="form-horizontal">
								@csrf

								<div class="form-group">
									<label class="form-label">Chọn năm</label>
									<select name="year" class="form-control">
										<option label="--Choose--"></option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
										<option value="2026">2026</option>
										<option value="2027">2027</option>
										<option value="2028">2028</option>
										<option value="2029">2029</option>
									</select>
								</div>
								
								<div class="form-group mt-3">
									<div>
										<button type="submit" class="btn btn-dark-light">Tìm kiếm</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>



        </div>
    </div>
</div>



@endsection






















































