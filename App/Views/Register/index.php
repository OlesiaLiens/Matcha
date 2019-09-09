<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/styles/register.css"/>
<!--	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
	<!--	<link rel="stylesheet" type="text/css" href="/styles/gallery.css">-->
	<!--	<link rel="stylesheet" href="../../../styles/register.css"/>-->

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
				<?php if ($log_user !== false): ?>
					<li><a href="/account/index">Account</a></li>
				<?php endif; ?>
				<?php if ($log_user !== false): ?>
					<li><a href="/logout/index">Logout</a></li>
				<?php else : ?>
					<li class="active"><a href="/register/index">Registration</a></li>
					<li><a href="/login/login">Log in</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</header>

<main>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 well">
				<h3 class="text-center">Registration</h3>
				<form class="form" method="post" action='/register/register'>
					<div class="col-xs-12">
						<div class="form-group">
							<input type="text" name="username" id="username" class="form-control"
								   placeholder="Username" required/>
							<p class="error"><?= $params['user_error'] ?? null ?></p>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control" placeholder="Email"
								   required/>
							<p class="error"><?= $params['email_error'] ?? null ?></p>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<input type="password" name="password" id="password" value="" class="form-control"
								   placeholder="Password" required/>
							<p class="error"><?= $params['password_error'] ?? null ?></p>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<input type="password" name="repeat_password" id="repeat_password" value=""
								   placeholder="Repeat Password" class="form-control" required/>
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
