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