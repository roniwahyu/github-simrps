<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
		<meta name="theme-color" content="#000000" />
		<meta name="author" content="" />
		<meta name="keyword" content="" />
		<meta name="description" content="" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/blueimp-gallery.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-theme-pulse.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/custom-style.css') }}" />
		<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
		@yield('pagecss')
		@yield('plugins')
		<script>
			var siteAddr = "{{ url('') }}/";
			var defaultPageLimit = 20;
			var csrfToken = "{{ csrf_token() }}";
			var requestErrorMessage = "Unable to complete request";
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': csrfToken
				}
			});
		</script>
	</head>
	<?php
		$page_name = request()->segment(1)  ?? 'index';
		$page_action = request()->segment(2)  ?? 'index';
		$body_class = "$page_name-$page_action";
	?>
	<body id="main" class="<?php echo $body_class ?>">
		<div id="page-wrapper">
			<!-- Show progress bar when ajax upload-->
			<div id="ajax-progress-bar" class="progress"  style="display:none">
				<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0"></div>
			</div>
			@include('appheader')
			<div id="main-content">
				<!-- Page Main Content Start -->
					<div id="page-content">
						@yield('content')
					</div>	
				<!-- Page Main Content [End] -->
				<!-- Page Footer Start -->
				@include('appfooter')
				<!-- Page Footer Ends -->
				<!-- Modal page for displaying ajax page -->
				<div id="main-page-modal" class="modal right fade" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body p-0 reset-grids inline-page">
							</div>
							<div style="top: 15px; right:5px; z-index: 999;" class="position-absolute">
								<button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="modal"
							aria-label="Close"></button>
							</div>
						</div>
					</div>
				</div>
				<!-- Right SideDrawer for displaying ajax page -->
				<div class="offcanvas offcanvas-end" tabindex="-1" id="sidedrawer-page-modal">
					<div class="position-absolute" style="top: 20px; right:15px; z-index: 999;">
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
					</div>
					<div class="offcanvas-body p-0 reset-grids inline-page">
					</div>
				</div>
				<!-- Modal page for displaying record delete prompt -->
				<div class="modal fade" id="delete-record-modal-confirm" tabindex="-1" role="dialog" aria-labelledby="delete-record-modal-confirm" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Delete record</h5>
								<button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="modal"
							aria-label="Close"></button>
							</div>
							<div id="delete-record-modal-msg" class="modal-body"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
								<a href="" id="delete-record-modal-btn" class="btn btn-primary">Delete</a> 
							</div>
						</div>
					</div>
				</div>
				<!-- Image Preview Dialog -->
				<div id="preview-img-modal" class="modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered mx-auto modal-lg">
						<div class="modal-content mx-auto" style="width:auto;">
							<div class="modal-body p-0 d-flex position-relative">
								<img style="width:auto; max-width:100%; max-height:90vh;" class="mx-auto img" />
								<button style="top: 10px; right:10px; z-index: 999;" type="button" class="btn-close btn-close-white m-2 position-absolute" data-bs-dismiss="modal"></button>
							</div>
						</div>
					</div>
				</div>
				<template id="saving-indicator">
					<div class="p-2 text-center m-2 text-muted">
						<div class="lds-dual-ring"></div>
						<h4 class="p-3 mt-2 font-weight-light">Saving...</h4>
					</div>
				</template>
				<template id="loading-indicator">
					<div class="p-2 text-center d-flex justify-content-center align-items-center">
						<span class="loader mr-3"></span>
						<span class="px-2 text-muted font-weight-light">Loading...</span>
					</div>
				</template>
			</div>
			<div class="toast-container fixed-alert top-0 start-50 translate-middle-x pt-3">
				<div id="app-toast-success" data-bs-autohide="true" data-bs-delay="3000" class="animated bounceIn toast align-items-center text-bg-success" role="alert" aria-live="assertive"
					aria-atomic="true">
					<div class="d-flex">
						<div class="toast-body">
							<i class="fa fa-check-circle"></i>
							<span class="msg">{{ Session::get('success') }}</span>
						</div>
						<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
							aria-label="Close"></button>
					</div>
				</div>
				<div id="app-toast-danger" data-bs-autohide="true" data-bs-delay="3000" class="animated bounceIn toast align-items-center text-bg-danger" role="alert" aria-live="assertive"
					aria-atomic="true">
					<div class="d-flex">
						<div class="toast-body">
							<i class="fa fa-exclamation"></i>
							<span class="msg">{{ Session::get('danger') }}</span>
						</div>
						<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
							aria-label="Close"></button>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/plugins/app-plugins.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/plugins/flatpickr.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/plugins/dropzone.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/page-scripts.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/form-page-scripts.js') }}"></script>
		@yield('pagejs')
		<script>
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar, #main-content').toggleClass('active');
	});
	var navTopHeight = $('#topbar').outerHeight() + 'px';
	document.body.style.paddingTop = navTopHeight;
	$('#sidebar').css('top', navTopHeight);
	$('#sidebar').css('height', 'calc(100vh - ' +  navTopHeight + ')');
</script>
		<script>
			window.onload = (event) => {
				@if (Session::has('success'))
					let successAlert = document.getElementById('app-toast-success');
					let bsAlert = new bootstrap.Toast(successAlert);
					bsAlert.show();
				@endif
				@if (Session::has('danger'))
					let errorAlert = document.getElementById('app-toast-danger');
					let bsAlert = new bootstrap.Toast(errorAlert);
					bsAlert.show();
				@endif
			}
		</script>
	</body>
</html>