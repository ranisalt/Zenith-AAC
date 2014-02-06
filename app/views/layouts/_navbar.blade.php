<div class='navbar navbar-inverse' role='navigation'>
	<div class='container'>
		<div class='collapse navbar-collapse'>
			<ul class='nav navbar-nav'>
				<li><a href='/'><span class='glyphicon glyphicon-home'></span> Home</a></li>
				<li class='dropdown'>
					<a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-user'></span> Community <b class='caret'></b></a>
					<ul class='dropdown-menu'>
						<li><a href='#'>Highscores</a></li>
						<li class='divider'></li>
						<li><a href='#'>Characters</a></li>
						<li><a href='#'>Guilds</a></li>
						<li><a href='#'>Houses</a></li>
					</ul>
				</li>
				<li><a href='#'><span class='glyphicon glyphicon-book'></span> Library</a></li>
				<li><a href='#'><span class='glyphicon glyphicon-shopping-cart'></span> Shop</a></li>
				<li><a href='#'><span class='glyphicon glyphicon-comment'></span> Forum</a></li>
				<li><a href='#'><span class='glyphicon glyphicon-question-sign'></span> Help</a></li>
			</ul>
			<ul class='nav navbar-nav navbar-right'>
				@if (Session::has('account_id'))
					<li><a href='{{ URL::to('account'); }}'><span class='glyphicon glyphicon-share-alt'></span> Manage your account</a></li>
					<li><a href='{{ URL::to('logout'); }}'><span class='glyphicon glyphicon-share-alt'></span> Logout</a></li>
				@else
					<li><a href='{{ URL::to('login'); }}'><span class='glyphicon glyphicon-share-alt'></span> Login or create account</a></li>
				@endif
			</ul>
		</div>
	</div>
</div>