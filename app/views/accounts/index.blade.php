@extends('layouts.master')

@section('content')
	@if (Session::has('flash_error'))
		<div id='flash_error'>{{ Session::get('flash_error') }}</div>
	@endif
	@if ($errors->any())
		<h2>Errors</h2>
		<ul>
			{{ implode('', $errors->all('<li>:message</li>')) }}
		</ul>
	@endif
	<div class='row'>
		{{ Form::open(array('url' => 'account/auth', 'class' => 'form-horizontal')) }}
			<fieldset>
				<div class='form-group'>
					{{ Form::label('name', 'Account name:', array('class' => 'col-sm-4 control-label')) }}
					<div class='col-sm-8'>
						{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
					</div>
				</div>
				<div class='form-group'>
					{{ Form::label('password', 'Account password:', array('class' => 'col-sm-4 control-label')) }}
					<div class='col-sm-8'>
						{{ Form::password('password', $attributes = array('class' => 'form-control')) }}
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-offset-4 col-sm-4'>
						{{ Form::submit('Create account', array('name' => 'create', 'class' => 'btn btn-block btn-lg btn-primary')) }}
					</div>
					<div class='col-sm-4'>
						{{ Form::submit('Log in', array('name' => 'login', 'class' => 'btn btn-block btn-lg btn-primary')) }}
					</div>
				</div>
			</fieldset>
		{{ Form::close() }}
	</div>
@stop
