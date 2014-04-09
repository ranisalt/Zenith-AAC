@extends('public.master')

@section('content')
	@if (Config::get('zenith.enable_newstickers'))
		@include('news.newstickers');
	@endif

	<div id='news'>
		@foreach($news as $n)
			<section class='news'>
				<header class='news-header'>
					<h2>
						<a href='{{{ URL::action('NewsController@show', array('slug' => $n->slug)) }}}'>{{{ $n->title }}}</a>
					</h2>
				</header><!--/.news-header-->
				<article>
					{{ Parsedown::instance()->parse($n->lead) }}
					@if ($n->rest)
						<a href='{{{ URL::action('NewsController@show', array('slug' => $n->slug)) }}}'>{{{ Lang::get('news.read-more') }}}</a>
					@endif
				</article>
				<footer class='news-footer'>
					<h6>{{{ Lang::get('news.published-at') }}} {{{ date('F jS, Y '.Lang::get('news.datetime-separator').' h:i A T', strtotime($n->created_at)) }}}</h6>
				</footer><!--/.news-footer-->
			</section><!--/.news-->
		@endforeach
	</div><!--/#news-->
@stop
