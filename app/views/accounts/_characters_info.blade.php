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
				</tr>
			</thead>
			<tbody>
				@unless (empty($characters))
					@foreach ($characters as $character)
					<tr>
						<td class='col-xs-5'><strong>{{{ $character['name'] }}}</strong> <small>
{{ null/*Config::get('otserv.vocations')*/ }}
 - {{{ $character['level'] }}}</small></td>
						<td class='col-xs-3'>{{{ "OTservera" }}}</td>
						<td class='col-xs-2'>{{{ $character['is_hidden'] ? ($character['deleted_at'] ? 'hidden, deleted' : 'hidden') : ($character['deleted_at'] ? 'deleted' : null) }}}</td>
						<td class='col-xs-2'>{{ HTML::link('account/' . $character['name'] . '/edit', 'edit'), ', ', $character["deleted_at"] ? HTML::link('account/' . $character['name'] . '/undelete', 'undelete') : HTML::link('account/' . $character['name'] . '/delete', 'delete') }}</td>
					</tr>
					@endforeach
				@else
					<tr>
						<td colspan=4 class='col-xs-12 text-center'>You don't have any characters. Why don't you create your first now?</td>
					</tr>
				@endunless
			</tbody>
		</table>
		<div class='row'>
			<div class='col-xs-offset-9 col-xs-3'>
				<button type='button' class='btn btn-block btn-primary' data-action='create-character' data-target='#modal' data-toggle='modal'>Create character</button>
			</div>
		</div>
	</div>
	<div class='panel-footer'></div>
</div>
