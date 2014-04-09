@extends('public.master')

@section('content')
	@if ($errors)
		{{ implode($errors->all()) }}
	@endif
	<div class='character-form'>
		{{ Form::open(array('route' => 'character.store')) }}
			<div class='row'>
				<div class='name'>
					{{ Form::text('name', Input::old('name'), array('placeholder' => trans('character.forms.name'))) }}
				</div>
				@unless(empty(Config::get('zenith.sexes')))
					<div class='sex'>
						<span class='title'>{{{ trans('character.forms.sex') }}}:</span>
						@foreach(Config::get('zenith.sexes') as $id => $sex)
							<span class='radio-option'>
								{{ Form::radio('sex', $id, Input::old('sex') === $id) }} {{{ $sex }}}
							</span>
						@endforeach
					</div>
				@endunless
			</div>
			<div class='row'>
				@unless(empty(Config::get('zenith.vocations')))
					<div class='vocation'>
							<span class='title'>{{{ trans('character.forms.vocation') }}}:</span>
						@foreach(Config::get('zenith.new_player_vocations') as $vocation)
							<span class='radio-option'>
								{{ Form::radio('vocation', $vocation, Input::old('vocation') === $vocation) }} {{{ Config::get('zenith.vocations')[$vocation] }}}
							</span>
						@endforeach
					</div>
				@endunless
				@unless(empty(Config::get('zenith.new_player_cities')))
					<div class='city'>
						<span class='title'>{{{ trans('character.forms.city') }}}:</span>
						@foreach(Config::get('zenith.new_player_cities') as $city)
							<span class='radio-option'>
								{{ Form::radio('city', $city, Input::old('city') === $city) }} {{{ Config::get('zenith.cities')[$city]['name'] }}}
							</span>
						@endforeach
					</div>
				@endunless
			</div>
			{{ Form::submit(trans('character.forms.create'), array('class' => 'gradient')) }}
		{{ Form::close() }}
	</div>
@stop
