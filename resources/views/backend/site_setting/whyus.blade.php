@extends('backend.admin.admin_master')
@section('title', 'Cập nhật nội dung why us setting')
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
                        <li class="breadcrumb-item active" aria-current="page">editing why us setting</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!--  first content open -->
            <div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="card">
						<div class="card-body">

							<form class="row g-3 needs-validation" method="post" action="{{ route('whyus.update') }}">
								@csrf

								<input type="hidden" name="id" value="{{ $whyus->id }}">

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Why us 1</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $whyus->whyus_1 }}" name="whyus_1" class="form-control" required>
									</div>
								</div>

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Why us 2</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $whyus->whyus_2 }}" name="whyus_2" class="form-control" required>
									</div>
								</div>

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Why us 3</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $whyus->whyus_3 }}" name="whyus_3" class="form-control" required>
									</div>
								</div>

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Why us 4</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $whyus->whyus_4 }}" name="whyus_4" class="form-control" required>
									</div>
								</div>

								<div class="col-md-12">
									<label for="validationCustomUsername" class="form-label">Why us 5</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $whyus->whyus_5 }}" name="whyus_5" class="form-control" required>
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






















































