<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ config('app.name') }} - @yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body style="background-color: #fff">
	<div class="container p-5">
		@yield('content')
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
	@stack('scripts')
</body>
</html>