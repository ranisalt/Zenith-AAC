<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	{{ HTML::script('js/jquery-2.0.3.min.js'); }}
	{{ HTML::script('js/bootstrap.min.js'); }}
	@yield('scripts')
	{{ HTML::style('css/bootstrap.min.css'); }}
	{{ HTML::style('css/bootstrap-theme.min.css'); }}
	@yield('styles')
</head>
<body>
	<div class='navbar navbar-inverse' role='navigation'>
		<div class='container'>
			<div class='collapse navbar-collapse'>
				<ul class='nav navbar-nav'>
					<li><a href='/'><span class='glyphicon glyphicon-home'></span>Home</a></li>
					<li class='dropdown'>
						<a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-user'></span>Community <b class='caret'></b></a>
						<ul class='dropdown-menu'>
							<li><a href='#'>Highscores</a></li>
							<li class='divider'></li>
							<li><a href='#'>Characters</a></li>
							<li><a href='#'>Guilds</a></li>
							<li><a href='#'>Houses</a></li>
						</ul>
					</li>
					<li><a href='#'><span class='glyphicon glyphicon-book'></span>Library</a></li>
					<li><a href='#'><span class='glyphicon glyphicon-shopping-cart'></span>Shop</a></li>
					<li><a href='#'><span class='glyphicon glyphicon-comment'></span>Forum</a></li>
					<li><a href='#'><span class='glyphicon glyphicon-question-sign'></span>Help</a></li>
				</ul>
				<form class='navbar-form navbar-left' role='search'>
					<div class='form-group'>
						<input type='text' class='form-control' placeholder='Search'/>
					</div>
					<button type='submit' class='btn btn-default'>
						<span class='glyphicon glyphicon-search'></span>
					</button>
				</form>
				<ul class='nav navbar-nav navbar-right'>
					@if (Session::has('account_id'))
						<li><a href='{{ URL::to('account'); }}'><span class='glyphicon glyphicon-share-alt'></span>Manage your account</a></li>
						<li><a href='{{ URL::to('logout'); }}'><span class='glyphicon glyphicon-share-alt'></span>Logout</a></li>
					@else
						<li><a href='{{ URL::to('login'); }}'><span class='glyphicon glyphicon-share-alt'></span>Login or create account</a></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
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
			@section('sidebar')
				@section('highscores')
					<div class='panel panel-default'>
						<div class='panel-heading'>
							<h3 class='panel-title'>Highscores</h3>
						</div>
						<div class='list-group'>
							<a href='#' class='list-group-item'>
								<span class='badge'>717</span>
								<h4 class='list-group-item-heading'>Kharsek</h4>
								<p class='list-group-item-text'>Elite Knight</p>
							</a>
							<a href='#' class='list-group-item'>
								<span class='badge'>699</span>
								<h4 class='list-group-item-heading'>Maurolkit</h4>
								<p class='list-group-item-text'>Elite Knight</p>
							</a>
							<a href='#' class='list-group-item'>
								<span class='badge'>673</span>
								<h4 class='list-group-item-heading'>Hensh</h4>
								<p class='list-group-item-text'>Elite Knight</p>
							</a>
							<a href='#' class='list-group-item'>
								<span class='badge'>646</span>
								<h4 class='list-group-item-heading'>Dev onica</h4>
								<p class='list-group-item-text'>Elder Druid</p>
							</a>
						</div>
					</div>
				@show
			@show
		</div>
	</div>
	</div>
</body>
</html>
