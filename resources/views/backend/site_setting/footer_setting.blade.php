@extends('backend.admin.admin_master')
@section('title', 'Cập nhật nội dung phần footer')
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
                        <li class="breadcrumb-item active" aria-current="page">editing footer setting</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!--  first content open -->
            <div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">

							<form class="row g-3 needs-validation" method="post" action="{{ route('footer.update') }}" enctype="multipart/form-data">
								@csrf

								<input type="hidden" name="id" value="{{ $footer->id }}">
								<input type="hidden" name="old_image" value="{{ $footer->logo_footer }}">

								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Footer Logo</label>
									<input type="file" name="logo_footer" class="form-control" id="image">
                                    <img id="showImage" class="img-thumbnail" width="160" src="{{ (!empty($footer->logo_footer)) ? 
                                        url($footer->logo_footer):
                                        url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                                </div>
                                <div class="col-md-6"></div>
								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Địa chỉ</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->address }}" name="address" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Số điện thoại 1</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->phone1 }}" name="phone1" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Số điện thoại 2</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->phone2 }}" name="phone2" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustomUsername" class="form-label">Số điện thoại 3</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->phone3 }}" name="phone3" class="form-control" required>
									</div>
								</div>

								<hr>

								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Chính sách</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->title_col2 }}" name="title_col2" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 2_1</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_2_1 }}" name="col_2_1" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 2_2</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_2_2 }}" name="col_2_2" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 2_3</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_2_3 }}" name="col_2_3" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 2_4</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_2_4 }}" name="col_2_4" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 2_5</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_2_5 }}" name="col_2_5" class="form-control" required>
									</div>
								</div>


								<hr>

								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Hỗ trợ</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->title_col3 }}" name="title_col3" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 3_1</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_3_1 }}" name="col_3_1" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 3_2</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_3_2 }}" name="col_3_2" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 3_3</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_3_3 }}" name="col_3_3" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 3_4</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_3_4 }}" name="col_3_4" class="form-control" required>
									</div>
								</div>

								<hr>

								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Kết nối với rinart</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->title_col4 }}" name="title_col4" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 3_1</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_4_1 }}" name="col_4_1" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 3_2</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_4_2 }}" name="col_4_2" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 3_3</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_4_3 }}" name="col_4_3" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 3_4</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_4_4 }}" name="col_4_4" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 3_3</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_4_5 }}" name="col_4_5" class="form-control" required>
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustomUsername" class="form-label">Nội dung cột 3_4</label>
									<div class="input-group has-validation">
										<input type="text" value="{{ $footer->col_4_6 }}" name="col_4_6" class="form-control" required>
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






















































