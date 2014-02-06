<div class='panel panel-default'>
	<div class='panel-heading'>Character data</div>
	<div class='panel-body'>
		<table class='table'>
			<tbody>
				<tr>
					<td class='col-xs-3'>Name:</td>
					<td class='col-xs-9'>
						{{{ $character['name'] }}}
						<div class='pull-right'>
							<button type='button' class='btn btn-primary btn-xs' data-action='change-name' data-target='#modal' data-toggle='modal'>Change name</button>
						</div>
					</td>
				</tr>
				<tr>
					<td class='col-xs-3'>Sex:</td>
					<td class='col-xs-9'>
						{{{ $character['sex'] ? 'female' : 'male' }}}
						<div class='pull-right'>
							<button type='button' class='btn btn-primary btn-xs' data-action='change-name' data-target='#modal' data-toggle='modal'>Change sex</button>
						</div>
					</td>
				</tr>
				<tr>
					<td class='col-xs-3'>World:</td>
					<td class='col-xs-9'>{{{ 'OTservera' }}}</td>
				</tr>
				<tr>
					<td class='col-xs-3'>Last login:</td>
					<td class='col-xs-9'>{{{ $character['lastlogin'] ? date('M d Y, H:i:s e', $character['lastlogin']) : 'never logged in' }}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class='panel-footer'></div>
</div>