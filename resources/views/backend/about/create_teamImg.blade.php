@extends('backend.admin.admin_master')
@section('title', 'Tạo thêm hình nền member')
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
                        <li class="breadcrumb-item active" aria-current="page">create member image</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">

							<form action="{{ route('about.store-TeamImg') }}" enctype="multipart/form-data" class="row g-3 needs-validation" method="post" >
								@csrf

								<input type="hidden" name="id" value="{{ $about->id }}">

								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Tên Thành Viên</label>
									<div class="input-group has-validation">
										<input type="text" name="title" required class="form-control">
									</div>
								</div>
								<div class="col-md-6"></div>

								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Chức Vụ</label>
									<div class="input-group has-validation">
										<input type="text" name="description" required class="form-control">
									</div>
								</div>
								<div class="col-md-6"></div>

								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Hình nền (330x380)</label>
									<div class="input-group has-validation">
										<input type="file" name="team_img" onChange="mainThumbUrl(this)" required class="form-control">
									</div>
									<img src="" id="mainThmb">
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

        </div>
    </div>
</div>


<script type="text/javascript">

    function mainThumbUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThmb').attr('src',e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }   

</script>




@endsection






















































