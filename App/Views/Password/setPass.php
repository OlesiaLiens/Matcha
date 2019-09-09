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
	<style>

	</style>
</head>
<body>

<header class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="">Set new password</a></li>
			</ul>
		</div>
	</div>
</header>

<main>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 well">
				<h3 class="text-center">Set new password</h3>
				<p class="message"> <?= $params['message'] ?? null ?></p>
				<form class="form" method="post" action="/setNewPass/SetNewPass/token">
					<div class="col-xs-12">
						<div class="form-group">
							<input type="password" name="password" id="password"
								   value="<?= $params['password'] ?? null ?>"
								   class="form-control" placeholder="Enter new password"
								   required/>
							<p class="error"><?= $params['password_error'] ?? null ?></p>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<input type="password" name="repeat_password" id="repeat_password"
								   value="<?= $params['repeat_password'] ?? null ?>" class="form-control"
								   placeholder="Repeat new password"
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
</main>

<footer>
	<div class="container">
		<div class="row centered myhover">
		</div>
	</div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/styles/bootstrap.min.js"></script>
</body>
</html>
