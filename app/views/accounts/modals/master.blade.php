<div id='modal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='modal-title' aria-hidden='true'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			{{ Form::open(array('url' => 'account', 'class' => 'form-horizontal')) }}
				<div class='modal-header'>
					<h3 id='modal-title'></h3>
				</div>
				@include('accounts.modals._change_password')
				@include('accounts.modals._change_email')
				@include('accounts.modals._rename_account')
				@include('accounts.modals._terminate_account')
				@include('accounts.modals._create_character')	
				<div class='modal-footer'>
					<button class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
					{{ Form::submit('Submit', array('name' => 'submit', 'class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>