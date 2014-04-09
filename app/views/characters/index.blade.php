@extends('public.master')

@section('content')
	@if($error = Session::get('error'))
		<div class='errors'>
			{{ $error }}
		</div>
		@endif
	<div class='search-character-form'>
		{{ Form::open(array('route' => 'character.show', 'method' => 'GET')) }}
			{{ Form::text('name', null, array('placeholder' => trans('character.forms.name'))) }}
			{{ HTML::link(URL::route('character.show'), trans('character.forms.search'), array('class' => 'submit', 'data-method' => true)) }}
		{{ Form::close() }}
		@section('scripts')
				@parent
				<script defer>
					$(document).ready(function() {
						var form = $('.search-character-form form');
						$('.submit').click(function(event) {
							event.preventDefault();
							window.location = form.attr('action').replace(encodeURI('{name}'), form.find('input[type="text"]').val());
						});
						form.submit(function(event) {
							event.preventDefault();
							$('.submit').click();
						});
					});
				</script>
			@stop
	</div>
@stop
