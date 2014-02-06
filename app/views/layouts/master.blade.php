<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{{ Config::get('otserv.server_name') }}}@if (isset($title)) {{{ " - $title" }}} @endif</title>
	{{ HTML::script('js/jquery-2.0.3.min.js'); }}
	{{ HTML::script('js/bootstrap.min.js'); }}
	@yield('scripts')
	{{ HTML::style('css/bootstrap.min.css'); }}
	{{ HTML::style('css/bootstrap-theme.min.css'); }}
	@yield('styles')
</head>
<body>
	@include('layouts._navbar')
	<div class='container'>
		@if (Session::has('flash_notice'))
			<div id='flash_notice' class='alert alert-info'>
				{{ Session::get('flash_notice') }}
			</div>
		@endif
		@if (Session::has('flash_error'))
      <div id='flash_error' class='alert alert-error'>
        {{ Session::get('flash_error') }}
				@if ($errors)
					{{ implode($errors->all()) }}
				@endif
      </div>
    @endif
		<div class='col-sm-9'>
			@yield('content')
		</div>
		<div class='col-sm-3'>
			@include('sidebar/master')
		</div>
	</div>
	</div>
</body>
</html>
