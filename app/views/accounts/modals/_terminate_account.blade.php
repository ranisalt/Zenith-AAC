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