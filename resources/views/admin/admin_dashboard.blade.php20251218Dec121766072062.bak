<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="PMWay">
	<meta name="keywords" content="PMWay">

	<title>PMWay Blog</title>

  <!-- Fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('../backend/assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('../backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('../backend/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('../backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->
	<link rel="stylesheet" href="{{ asset('../backend/assets/css/demo2/style.css') }}">
  <!-- End layout styles -->

    <!--Favicon-->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
{{--  <link rel="shortcut icon" href="{{ asset('../backend/assets/images/favicon.png') }}" />--}}

  <!-- toaster link starts -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
   <!-- toaster link ends -->

   <!-- jquery cdn link starts -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <!-- jquery cdn link ends -->

   <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('../../../backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
  <!-- End plugin css for this page -->

</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
            @include('admin.partials.sidebar')
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
                @include('admin.partials.navbar')
			<!-- partial -->

            <div class="page-content">

                @yield('admin')

            </div>

			<!-- partial:partials/_footer.html -->
			  @include('admin.partials.footer')
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('../backend/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{ asset('../backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('../backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('../backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('../backend/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{ asset('../backend/assets/js/dashboard-dark.js') }}"></script>
	<!-- End custom js for this page -->

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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

	<!-- Plugin js for this page -->
	<script src="{{asset('../../../backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
	<script src="{{asset('../../../backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
	  <!-- End plugin js for this page -->

	  <!-- Custom js for this page -->
  	<script src="{{asset('../../../backend/assets/js/data-table.js')}}"></script>
  <!-- End custom js for this page -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{ asset('backend/assets/js/code.js') }}" ></script>

{{--  <script src="{{asset('../../../backend/assets/vendors/tinymce/tinymce.min.js')}}"></script>--}}
{{--  <script src="{{asset('../../../backend/assets/js/tinymce.js')}}"></script>--}}
    <script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
</body>
</html>
