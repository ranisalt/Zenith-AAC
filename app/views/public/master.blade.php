<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>{{{ Config::get('zenith.server_name') }}}</title>
	{{ HTML::style('css/zenith.css') }}
</head>
<body>
	<header id='page-header'>
		@include('public.header')
	</header><!--/#page-header-->
	<main id='content-container' class='container'>
		<div id='page-content'>
			@yield('content')
		</div><!--/#page-content-->
		<div id='page-aside'>
			@include('public.aside')
		</div><!--/#page-aside-->
	</main><!--/#content-container.container-->
	<footer id='page-footer'>
		@include('public.footer')
	</footer><!--/#page-footer-->
	@section('scripts')
		<script>var token = '{{{ csrf_token() }}}'</script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	@show
</body>
</html>
