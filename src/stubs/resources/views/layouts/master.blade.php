<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>@yield('title', 'Site') - {{ config('app.name') }}</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Roboto:300,400,700" rel="stylesheet" />
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
	<div id="app">
		@include('layouts.nav')
		@include('layouts.header')
		@yield('content')
		@include('layouts.footer')
	</div>
	<script src="{{ asset('js/manifest.js') }}"></script>
	<script src="{{ asset('js/vendor.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
