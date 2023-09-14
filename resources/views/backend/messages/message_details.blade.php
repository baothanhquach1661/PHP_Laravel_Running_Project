@extends('backend.admin.admin_master')
@section('title')
	Tin nhắn của {{ $message_details->name }}
@endsection
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
                        <li class="breadcrumb-item active" aria-current="page">message details</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row row-sm">
				<div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
					<div class="card box-shadow-0">
						<div class="card-body">

							<div class="form-group">
								<input readonly type="text" name="name" class="form-control" value="{{ $message_details->name }}" required>
							</div>
							<div class="form-group">
								<input readonly type="text" name="phone" class="form-control" value="{{ $message_details->phone }}">
							</div>
							<div class="form-group">
								<input readonly type="email" name="email" class="form-control" value="{{ $message_details->email }}">
							</div>
							<div class="form-group">
								<textarea readonly type="text" name="email" class="form-control" rows="10" cols="50">
									{{ $message_details->message }}
								</textarea>
							</div>
							<div class="form-group mt-3">
								<div>
									<a href="{{ route('message.inactive2', $message_details->id) }}" class="btn btn-primary">Xác nhận</a>
									<button type="button" class="btn btn-secondary" onclick="history.back()">Cancel</button>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>

        </div>
    </div>
</div>



@endsection






















































