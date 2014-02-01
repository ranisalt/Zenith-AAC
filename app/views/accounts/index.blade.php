@extends('layouts.master')

@section('scripts')
{{ HTML::script('js/account.js'); }}
@stop

@section('content')
	<div class='panel panel-default'>
		<div class='panel-heading'>General information</div>
		<div class='panel-body'>
			<table class='table'>
				<tbody>
					<tr>
						<td class='col-xs-3'>Account name:</td>
						<td class='col-xs-9'>{{{ $name }}}</td>
					</tr>
					<tr>
	          <td class='col-xs-3'>Email address:</td>
	          <td class='col-xs-9'>{{{ $email ? $email : 'not set' }}}</td>
	        </tr>
					<tr>
	          <td class='col-xs-3'>Created:</td>
	          <td class='col-xs-9'>{{{ date('M d Y, H:i:s e', $creation) }}}</td>
	        </tr>
					<tr>
	        	<td class='col-xs-3'>Last login:</td>
	          <td class='col-xs-9'>{{{ $lastday ? date('M d Y, H:i:s e', $lastday) : 'never logged in' }}}</td>
	        </tr>
					<tr>
	          <td class='col-xs-3'>Account status:</td>
		        <td class='col-xs-9'><strong>{{{ $premdays ? 'premium' : 'free' }}} account</strong>
@if ($premdays) <small>until {{{ $premdays > 2 ? date('M d Y', strtotime("+{$premdays} days")) : ($premdays & 1 ? 'today' : 'tomorrow') }}}</small> @endif
						</td>
	        </tr>
				</tbody>
			</table>
			<div class='row'>
				<div class='col-xs-3'>
					<button type='button' class='btn btn-block btn-primary' data-action='change-password' data-target='#modal' data-toggle='modal'>Change password</button>
				</div>
				<div class='col-xs-3'>
          <button type='button' class='btn btn-block btn-primary' data-action='change-email' data-target='#modal' data-toggle='modal'>Change email</button>
        </div>
				<div class='col-xs-3'>
          <button type='button' class='btn btn-block btn-primary' data-action='rename-account' data-target='#modal' data-toggle='modal'>Rename account</button>
        </div>
				<div class='col-xs-3'>
          <button type='button' class='btn btn-block btn-primary' data-action='terminate-account' data-target='#modal' data-toggle='modal'>Terminate account</button>
        </div>
			</div>
		</div>
		<div class='panel-footer'></div>
	</div>
	<div class='panel panel-default'>
		<div class='panel-heading'>Characters</div>
		<div class='panel-body'>
			<table class='table'>
				<thead>
					<tr>
						<th class='col-xs-5'>Information</th>
						<th class='col-xs-3'>World</th>
						<th class='col-xs-2'>Status</th>
						<th class='col-xs-2'>Options</th>
				<tbody>
					@if ($characters)
						@foreach ($characters as $character)
						<tr>
							<td class='col-xs-5'><strong>{{{ $character['name'] }}}</strong> <small>{{{ Config::get('otserv.vocations')[$character['vocation']], ' - ', $character['level'] }}}</small></td>
							<td class='col-xs-3'>{{{ "OTservera" }}}</td>
							<td class='col-xs-2'>{{{ $character["hidden"] ? ($character["deleted_at"] ? "hidden, deleted" : "hidden") : ($character["deleted_at"] ? "deleted" : null) }}}</td>
							<td class='col-xs-2'>{{ HTML::link('#', 'edit', array('data-action' => 'edit', 'data-id' => $character['id'])), ', ', $character["deleted_at"] ? HTML::link('#', 'undelete', array('data-action' => 'undelete', 'data-id' => $character['id'])) : HTML::link('#', 'delete', array('data-action' => 'delete', 'data-id' => $character['id'])) }}</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td colspan=4 class='col-xs-12 text-center'>You don't have any characters. Why don't you create your first now?</td>
						</tr>
					@endif
				</tbody>
			</table>
			<div class='row'>
				<div class='col-xs-offset-9 col-xs-3'>
          <button type='button' class='btn btn-block btn-primary' data-target='#modal' data-toggle='modal'>Create character</button>
        </div>
			</div>
		</div>
		<div class='panel-footer'></div>
	</div>
	<div id='modal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='modal-title' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				{{ Form::open(array('url' => 'account', 'class' => 'form-horizontal')) }}
					<div class='modal-header'>
						<h3 id='modal-title'></h3>
					</div>
					<div class='modal-body' data-action='change-email'>
						<fieldset>
							<div class='form-group'>
								{{ Form::label('ce_password', 'Password:', array('class' => 'col-sm-3 control-label')) }}
								<div class='col-sm-9'>{{ Form::password('ce_password', $attributes = array('class' => 'form-control')) }}</div>
							</div>
							<div class='form-group'>
								{{ Form::label('new_email', 'New email:', array('class' => 'col-sm-3 control-label')) }}
								<div class='col-sm-9'>{{ Form::text('new_email', null, $attributes = array('class' => 'form-control')) }}</div>
							</div>
						</fieldset>
					</div>
					<div class='modal-body' data-action='change-password'>
						<fieldset>
							<div class='form-group'>
								{{ Form::label('old_password', 'Old password:', array('class' => 'col-sm-3 control-label')) }}
								<div class='col-sm-9'>{{ Form::password('old_password', $attributes = array('class' => 'form-control')) }}</div>
							</div>
							<div class='form-group'>
								{{ Form::label('new_password', 'New password:', array('class' => 'col-sm-3 control-label')) }}
								<div class='col-sm-9'>{{ Form::text('new_password', null, $attributes = array('class' => 'form-control')) }}</div>
							</div>
						</fieldset>
					</div>
					<div class='modal-body' data-action='rename-account'>
						<fieldset>
							<div class='form-group'>
								{{ Form::label('ra_password', 'Password:', array('class' => 'col-sm-3 control-label')) }}
								<div class='col-sm-9'>{{ Form::password('ra_password', $attributes = array('class' => 'form-control')) }}</div>
							</div>
							<div class='form-group'>
								{{ Form::label('new_name', 'New name:', array('class' => 'col-sm-3 control-label')) }}
								<div class='col-sm-9'>{{ Form::text('new_name', null, $attributes = array('class' => 'form-control')) }}</div>
							</div>
						</fieldset>
					</div>
					<div class='modal-body' data-action='terminate-account'>
						<fieldset>
							<div class='form-group'>
								{{ Form::label('ta_password', 'Password:', array('class' => 'col-sm-3 control-label')) }}
								<div class='col-sm-9'>{{ Form::password('ta_password', $attributes = array('class' => 'form-control')) }}</div>
							</div>
							<div class='form-group'>
								{{ Form::label('ta_password_confirm', 'Confirmation:', array('class' => 'col-sm-3 control-label')) }}
								<div class='col-sm-9'>{{ Form::text('ta_password_confirm', null, $attributes = array('class' => 'form-control')) }}</div>
							</div>
						</fieldset>
					</div>
					<div class='modal-footer'>
						<button class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
						{{ Form::submit('Submit', array('name' => 'submit', 'class' => 'btn btn-primary')) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop
