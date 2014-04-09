@extends('public.master')

@section('content')
	<div id='news'>
		<section class='news'>
			<header class='news-header'>
				<h2>
					<a href='{{{ URL::action('NewsController@show', array('slug' => $news->slug)) }}}'>{{{ $news->title }}}</a>
				</h2>
			</header><!--/.news-header-->
			<article>
				{{ Parsedown::instance()->parse(preg_replace('/\s*<!--\s*more\s*-->/i', '', $news->content)) }}
			</article>
			<footer class='news-footer'>
				<h6>{{{ Lang::get('news.published-at') }}} {{{ date('F jS, Y '.Lang::get('news.datetime-separator').' h:i A T', strtotime($news->created_at)) }}}</h6>
			</footer><!--/.news-footer-->
		</section><!--/.news-->
	</div><!--/#news-->
@stop
