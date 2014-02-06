<div class='panel panel-default'>
	<div class='panel-heading'>Character data</div>
	<div class='panel-body'>
		<table class='table'>
			<tbody>
				<tr>
					<td class='col-xs-3'>Account name:</td>
					<td class='col-xs-9'>{{{ $account['name'] }}}</td>
				</tr>
				<tr>
					<td class='col-xs-3'>Email address:</td>
					<td class='col-xs-9'>{{{ $account['email'] or 'not set' }}}</td>
				</tr>
				<tr>
					<td class='col-xs-3'>Created:</td>
					<td class='col-xs-9'>{{{ date('M d Y, H:i:s e', $account['creation']) }}}</td>
				</tr>
				<tr>
					<td class='col-xs-3'>Last login:</td>
					<td class='col-xs-9'>{{{ $account['lastday'] ? date('M d Y, H:i:s e', $account['lastday']) : 'never logged in' }}}</td>
				</tr>
				<tr>
					<td class='col-xs-3'>Account status:</td>
					<td class='col-xs-9'><strong>{{{ $account['premdays'] ? 'premium' : 'free' }}} account</strong>
@if ($account['premdays']) <small>until {{{ $account['premdays'] > 2 ? date('M d Y', strtotime("+{$account['premdays']} days")) : ($account['premdays'] & 1 ? 'today' : 'tomorrow') }}}</small> @endif
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