<!doctype html>
<html lang="en" dir="ltr">

<head>

	<!-- META DATA -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Noa – Bootstrap 5 Admin & Dashboard Template">
	<meta name="author" content="Spruko Technologies Private Limited">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

	<!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.png') }}"/>

	<!-- TITLE -->
	<title>@yield('title')</title>

	<!-- BOOTSTRAP CSS -->
	<link id="style" href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

	<!-- STYLE CSS -->
	<link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/css/skin-modes.css') }}" rel="stylesheet" />

	<!--- FONT-ICONS CSS -->
	<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="{{ asset('backend/assets/css/rinart.css') }}" rel="stylesheet" />


</head>

<body class="ltr app sidebar-mini">

	<!-- GLOBAL-LOADER -->
	<div id="global-loader">
		<img src="{{ asset('backend/assets/images/loader.svg') }}" class="loader-img" alt="Loader">
	</div>
	<!-- /GLOBAL-LOADER -->

	<!-- PAGE -->
	<div class="page">
		<div class="page-main">


			<!-- app-Header -->
            @include('backend.admin.body.header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            @include('backend.admin.body.sidebar')
			<!--/APP-SIDEBAR-->


			<!--app-content open-->
			@yield('admin')
			<!-- CONTAINER END -->


		</div>

		<!-- another modal TASK MODAL-->

		<!-- We have one modal Country-selector modal-->

		
	</div>

	<!-- FOOTER -->
	@include('backend.admin.body.footer')
	<!-- FOOTER END -->

	<!-- BACK-TO-TOP -->
	<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>


		


	<!-- JQUERY JS -->
	<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>

	<!-- BOOTSTRAP JS -->
	<script src="{{ asset('backend/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

	<!-- SIDE-MENU JS-->
	<script src="{{ asset('backend/assets/plugins/sidemenu/sidemenu.js') }}"></script>

	<!-- APEXCHART JS -->
	<script src="{{ asset('backend/assets/js/apexcharts.js') }}"></script>

	<!-- INTERNAL SELECT2 JS -->
	<script src="{{ asset('backend/assets/plugins/select2/select2.full.min.js') }}"></script>

	<!-- CHART-CIRCLE JS-->
	<script src="{{ asset('backend/assets/js/circle-progress.min.js') }}"></script>{{ asset('backend') }}

	<!-- INTERNAL & EXTERNAL DATA-TABLES JS-->
	<script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/jszip.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/table-data.js') }}"></script>

	<!-- INTERNAL Summernote Editor js -->
	<script src="{{ asset('backend/assets/plugins/summernote-editor/summernote1.js') }}"></script>
	<script src="{{ asset('backend/assets/js/summernote.js') }}"></script>

	<!-- WYSIWYG Editor JS -->
	<script src="{{ asset('backend/assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/wysiwyag/wysiwyag.js') }}"></script>

	<!-- FORMEDITOR JS -->
	<script src="{{ asset('backend/assets/plugins/quill/quill.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/form-editor2.js') }}"></script>


	<!-- INDEX JS -->
	<script src="{{ asset('backend/assets/js/index1.js') }}"></script>

	<!-- REPLY JS-->
	<script src="{{ asset('backend/assets/js/reply.js') }}"></script>

	<!-- PERFECT SCROLLBAR JS-->
	<script src="{{ asset('backend/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/p-scroll/pscroll.js') }}"></script>

    <!-- STICKY JS -->
    <script src="{{ asset('backend/assets/js/sticky.js') }}"></script>

    <!-- COLOR THEME JS -->
    <script src=".{{ asset('backend/assets/js/themeColors.js') }}"></script>

    <!-- Internal Input tags js-->
	<script src="{{ asset('backend/assets/plugins/inputtags/inputtags.js') }}"></script>

	<!-- CUSTOM JS -->
	<script src="{{ asset('backend/assets/js/custom.js') }}"></script>
	<script src="{{ asset('backend/assets/js/rinart.js') }}"></script>

	<script>
		// ______________ PAGE LOADING
		$(window).on("load", function (e) {
			$("#global-loader").fadeOut("slow");
		})
	</script>
	

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	</script>

	<script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
        }
        @endif 
    </script>

    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">

		$(document).ready(function(){
		    $('#image').change(function(e){
		        var reader = new FileReader();
		        reader.onload = function(e){
		            $('#showImage').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(e.target.files['0']);
		    });
		});

	</script>


	<script type="text/javascript">
		$(document).ready(function (){

			fetch_delivery();

			function fetch_delivery(){
				var _token = $('input[name="_token"]').val();

				$.ajax({

					url: '/admin/shipping/show-delivery',
					method: 'POST',
					data: {_token:_token},
					success: function(data){
						$('#load_delivery').html(data);
					}

				});
			}

			$(document).on('blur', '.fee_edit', function(){

				var shippingfee_id = $(this).data('shippingfee_id');
				var fee_value = $(this).text();
				var _token = $('input[name="_token"]').val();
				
				 $.ajax({

					url: '/admin/shipping/update-delivery-fee',
					method: 'POST',
					data: {shippingfee_id:shippingfee_id, fee_value:fee_value, _token:_token},
					success: function(data){
						fetch_delivery();
					}

				});
			});

			$('.create_delivery_fee').click(function(){

				var city = $('.city').val();
				var province = $('.province').val();
				var ward = $('.ward').val();
				var shipping_fees = $('.shipping_fees').val();

				var _token = $('input[name="_token"]').val();

				$.ajax({
					url: "{{ url('/admin/shipping/store-delivery') }}",
					method: 'POST',
					data: { city:city, province:province, ward:ward, shipping_fees:shipping_fees, _token:_token},
					success: function(data){
						fetch_delivery();
					}
				});

			});

			$('.choose').change(function(){
				var action = $(this).attr('id');
				var ma_id = $(this).val();
				var _token = $('input[name="_token"]').val();
				var result = '';

				if(action == 'city'){
					result = 'province';
				}else{
					result = 'ward';
				}
				$.ajax({
					url: "{{ url('/admin/shipping/select-delivery') }}",
					method: 'POST',
					data: { action:action, ma_id:ma_id, _token:_token},
					success: function(data){
						$('#'+result).html(data);
					}
				});
			});
		});

	</script>


	




</body>

</html>






















































