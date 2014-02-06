<div class='panel panel-default'>
	<div class='panel-heading'>Character information</div>
	{{ Form::open(array('url' => 'account/' . str_replace(' ', '+', $character['name']) . '/edit', 'method' => 'put', 'class' => 'form-horizontal')) }}
		<fieldset>
			<div class='panel-body'>
				<table class='table'>
					<tbody>
						<tr>
							<td class='col-xs-3'>Hidden:</td>
							<td class='col-xs-9'>
								{{ Form::checkbox('is_hidden', 'hide-character', $character['is_hidden']) }} check to hide your account information
							</td>
						</tr>
						<tr>
							<td class='col-xs-3'>Comment:</td>
							<td class='col-xs-9'>
								<div class='form-group'>
									{{ Form::textarea('comment', $character['comment']) }}
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</fieldset>
		<div class='form-group'>
			<div class='col-sm-offset-4 col-sm-4'>
				{{ Form::submit('Submit', array('class' => 'btn btn-block btn-lg btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
	<div class='panel-footer'></div>
</div>