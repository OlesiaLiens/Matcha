<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Send link</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/styles/reset.css"/>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well">
			<h3 class="text-center">Send link to reset your password</h3>
			<form class="form" method="post" action='/resetPassword/resetPassword'>
				<div class="col-xs-12">
					<div class="form-group">
						<input type="email" name="email" id="email" class="form-control" placeholder="Email" required/>
						<p class="error"><?= $params['email_error'] ?? null ?></p>
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
