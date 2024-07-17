<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
		<meta name="author" content="" />
		<meta name="keyword" content="" />
		<meta name="description" content="" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{ asset('css/material-icons.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-theme-pulse.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/custom-style.css') }}" />
		<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
		@yield('pagecss')
	</head>
	<body>
		<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ url('/home') }}">
					<img class="img-fluid" src="{{ asset('images/logo.png') }}" /> {{ config('app.name') }}
				</a>
			</div>
		</div>
		<div id="main-content">
			<div id="page-content">
				@yield('content')
			</div>
			@include('appfooter')
		</div>
		@if(Session::has('success'))
		<div data-show-duration="5000" id="flashmsgholder" class="toast-alert row alert bg-success bounce text-white animated fixed-alert" role="alert">
			<div><i class="fa fa-check-circle"></i></div>
			<div class="msg">{{ Session::get('success') }}</div>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
		@endif
		@if(Session::has('danger'))
		<div data-show-duration="5000" id="flashmsgholder" class="toast-alert row alert bg-danger shake text-white animated fixed-alert" role="alert">
			<div><i class="fa fa-exclamation"></i></div>
			<div class="msg">{{ Session::get('danger') }}</div>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
		@endif
		<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
		@yield('pagejs')
	</body>
</html>