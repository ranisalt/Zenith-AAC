<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Email change</h2>

	<div>
		A request was made to change the email of your account ({{{ $name }}}). If it was you, complete the action following this url: {{ URL::to('account/change-email/' . $email_token) }}.
	</div>
</body>
</html>