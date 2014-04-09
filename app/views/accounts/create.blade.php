@extends('public.master')

@section('content')
	@if ($errors)
		{{ implode($errors->all()) }}
	@endif
	<div class='account-form'>
		{{ Form::open(array('route' => 'account.store')) }}
			{{ Form::text('name', Input::old('name'), array('placeholder' => trans('account.forms.name'))) }}
			{{ Form::password('password', array('placeholder' => trans('account.forms.password'))) }}
			{{ Form::submit(trans('account.forms.create'), array('class' => 'gradient')) }}
		{{ Form::close() }}
	</div>
@stop
