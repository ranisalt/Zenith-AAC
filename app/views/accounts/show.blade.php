@extends('layouts.master')

@section('content')
	<div class='panel panel-default'>
		<div class='panel-heading'>General information</div>
		<div class='panel-body'>
			<table class='table'>
				<tbody>
					<tr>
						<td class='col-xs-3'>Account name:</td>
						<td class='col-xs-9'>{{ $name }}</td>
					</tr>
					<tr>
	          <td class='col-xs-3'>Email address:</td>
	          <td class='col-xs-9'>{{ $email ? $email : 'not set' }}</td>
	        </tr>
					<tr>
	          <td class='col-xs-3'>Created:</td>
	          <td class='col-xs-9'>{{ date('M d Y, H:i:s e', $creation) }}</td>
	        </tr>
					<tr>
	        	<td class='col-xs-3'>Last login:</td>
	          <td class='col-xs-9'>{{ $lastday ? date('M d Y, H:i:s e', $lastday) : 'never logged in' }}</td>
	        </tr>
					<tr>
	          <td class='col-xs-3'>Account status:</td>
		        <td class='col-xs-9'>{{ $premdays ? 'Premium account' : 'Free account' }}</td>
	        </tr>
				</tbody>
			</table>
			<div class='row'>
				<div class='col-xs-3'>
					<button type='button' class='btn btn-block btn-primary'>Change password</button>
				</div>
				<div class='col-xs-3'>
          <button type='button' class='btn btn-block btn-primary'>Change email</button>
        </div>
				<div class='col-xs-3'>
          <button type='button' class='btn btn-block btn-primary'>Rename account</button>
        </div>
				<div class='col-xs-3'>
          <button type='button' class='btn btn-block btn-primary'>Terminate account</button>
        </div>
			</div>
		</div>
		<div class='panel-footer'></div>
	</div>
@stop
