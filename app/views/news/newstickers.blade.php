<div id='newstickers'>
	@foreach($tickers as $t)
		<section class='newsticker'>
			<article class='closed'>{{{ $t->content }}}</article>
		</section><!--/.newsticker-->
	@endforeach
</div><!--/#newsticker-->
