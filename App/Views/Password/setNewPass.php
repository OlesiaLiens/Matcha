<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>New password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/styles/login.css"/>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well">
			<h3 class="text-center">Set new password</h3>
			<p class="message"> <?= $params['message'] ?? null ?></p>
			<!--			<form class="form" method="post" action="/setNewPass/changePass">-->
			<div class="col-xs-12">
				<div class="form-group">
					<input type="password" name="password" id="password" value="" class="form-control" required/>
					<p class="error"><?= $params['password_error'] ?? null ?></p>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="form-group">
					<input type="password" name="repeat_password" id="repeat_password" value="" class="form-control"
						   required/>
					<p class="error"><?= $params['repeat_password_error'] ?? null ?></p>
				</div>
			</div>
			<div class="text-center col-xs-12">
				<input type="submit" name="submit" value="OK" class="btn btn-default"/>
			</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
