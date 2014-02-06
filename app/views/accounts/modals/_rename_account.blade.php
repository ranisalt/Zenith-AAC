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