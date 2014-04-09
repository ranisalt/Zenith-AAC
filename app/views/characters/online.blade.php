@extends('public.master')

@section('content')
	<div class='online-list'>
		@unless($characters->isEmpty())
			<header>
				<h2 class='name'>Name</h2>
				<h2 class='level'>Level</h2>
				<h2 class='vocation'>Vocation</h2>
			</header>
			<section>
				@foreach($characters as $character)
					<div>
						<span class='name'>{{ HTML::link(URL::route('character.show', array('skill' => $character->name)), $character->name) }}</span>
						<span class='level'>{{{ $character->level }}}</span>
						<span class='vocation'>{{{ Config::get('zenith.vocations')[$character->vocation] }}}</span>
					</div>
				@endforeach
			</section>
		@else
			<h2>There are no online characters.</h2>
		@endunless
	</div>
@stop
