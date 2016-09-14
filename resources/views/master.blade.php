<html>
<head>
	<title> @yield('title') </title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"rel="stylesheet">
<!-- Include roboto.css to use the Roboto web font, material.css to include \
	the theme and ripples.css to style the ripple effect -->
	<link href="/css/roboto.min.css" rel="stylesheet">
	<link href="{!! asset('css/bootstrap-material-design.min.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/ripples.min.css') !!}" rel="stylesheet">
	<meta charset="utf-8">
</head>
<body>
	@include('shared.navbar')
	@yield('content')
	<script src="//code.jquery.com/jquery-1.12.2.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="/js/ripples.min.js"></script>
	<script src="/js/material.min.js"></script>
	<script>

		$(document).ready(function() {
			$.material.init();
		});
	</script>
</body>
</html>
