<!DOCTYPE html>
<html>
<head>


	<b><title>Calendar System Version 2</title></b>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">


	@yield('links')

</head>
<body>

	@include('partials.nav')
	
	@yield('content')

</body>

	<script src="{{ asset('js/app.js') }}"></script>
	
	@yield('scripts')

</html>

