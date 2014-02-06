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