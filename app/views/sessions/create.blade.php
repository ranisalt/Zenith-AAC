@extends('public.master')

@section('content')
	@if ($errors)
		{{ implode($errors->all()) }}
	@endif
	<div class='account-form'>
		{{ Form::open(array('route' => 'session.store')) }}
			{{ Form::text('name', Input::old('name'), array('placeholder' => 'Account name')) }}
			{{ Form::password('password', array('placeholder' => 'Account password')) }}
			{{ Form::submit('Login account', array('class' => 'gradient')) }}
		{{ Form::close() }}
	</div>
@stop
