<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/styles/register.css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<title>Settings</title>
	<style>

		footer {
			position : fixed;
			bottom   : 0;
			width    : 100%;
		}

		.navbar-inverse .navbar-nav > .active > a {
			background-color : #ff7878;
		}


		.flex {
			display      : flex;
			text-align   : center;
			margin-top   : 200px;
			margin-left  : 10px;
			margin-right : 100px;
		}

		.container {
			margin-left     : 10px;
			flex-direction  : column;
			justify-content : center;
			align-items     : center;
		}


		.hidden {
			height : 100px;
		}

		p {
			color : green;
		}

		@media (max-width : 1166px) {
			.flex {
				flex-direction  : column;
				justify-content : center;
				align-items     : center;
				margin-top      : 100px;
				margin-bottom   : 100px;
				margin-left     : 250px;
				margin-right    : 50px;
				flex-basis      : 400px;
				width           : 400px;
			}

			.container {
				flex-direction  : column;
				justify-content : center;
				align-items     : center;
				margin-left     : 60px;
				margin-right    : 20px;
			}

			.hiden {
				height : 300px;
			}
		}

		@media (max-width : 415px) {
			.row {
				width : 200px;
			}

			.container {
				margin-left  : 0;
				padding-left : 0;
			}

			.flex {
				margin-left  : 0;
				padding-left : 0;
			}
		}

		@media (max-width : 850px) {
			.row {
				width : 200px;
			}

			.container {
				margin-left : 20px;
			}
		}

		@media (max-width : 414px) {

			.container {
				margin-left : 100px;
			}
		}

		@media (max-width : 320px) {
			.row {
				width : 200px;
			}

			.container {
				margin-left : -20px;
			}
		}

		@media (max-width : 375px) {
			.container {
				margin-left : 15px;
			}
		}

		@media (max-width : 768px) {
			.container {
				margin-left : -40px;
			}
		}

		@media (max-width : 1024px) {
			.container {
				margin-left : -20px;
			}

			.flex {
				text-align : center;
			}
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
				<li class=""><a href="/account/index">Account</a></li>
				<li class=""><a href="/info/index">Information</a></li>
				<li class="active"><a href="/settings/index">Settings</a></li>
				<li class=""><a href="/search/index">Search</a></li>
				<li class=""><a href="/chat/index">Chat</a></li>
				<li><a href="/login/login">Logout</a></li>
			</ul>
		</div>
	</div>
</header>

<div class="flex">

	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-3 well">
				<h3 class="text-center">Change username</h3>
				<form class="form" method="post">
					<div class="col-xs-12">
						<div class="form-group">
							<p>New username</p>
							<input type="text" name="username" id="username" class="form-control"
								   placeholder="Username" required/>
							<p class="error"><?= $params['user_error'] ?? null ?></p>
						</div>
					</div>

					<div class="text-center col-xs-12">
						<input type="submit" name="submit" value="name" class="btn btn-default"/>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-3 well">
				<h3 class="text-center">Change password</h3>
				<form class="form" method="post">
					<div class="col-xs-12">
						<div class="form-group">
							<p>New password</p>
							<input type="password" name="password" id="password" value="" class="form-control"
								   placeholder="Password" required/>
							<p class="error"><?= $params['password_error'] ?? null ?></p>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<p>Repeat new password</p>
							<input type="password" name="repeat_password" id="repeat_password" value=""
								   class="form-control"
								   placeholder="Password" required/>
							<p class="error"><?= $params['repeat_password_error'] ?? null ?></p>
						</div>
					</div>
					<div class="text-center col-xs-12">
						<input type="submit" name="submit" value="password" class="btn btn-default"/>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-3 well">
				<h3 class="text-center">Change email</h3>
				<form class="form" method="post">

					<div class="col-xs-12">
						<div class="form-group">
							<p>New email</p>
							<input type="email" name="email" id="new_email" class="form-control" placeholder="Email"
								   required/>
							<p class="error"><?= $params['email_error'] ?? null ?></p>
						</div>
					</div>
					<div class="text-center col-xs-12">
						<input type="submit" name="submit" value="email" class="btn btn-default"/>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-3 well">
				<form method="post">
					<p>Send you comments notifications:</p>
					<div>
						<input type="checkbox" value="OK"
							   name="notification" <?= $params['notification'] == 1 ? 'checked' : '' ?>>
						<input type="submit" name="submit" value="notification">
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="hiden">
	</div>
</div>

<footer>

</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/styles/bootstrap.min.js"></script>
</body>
</html>
