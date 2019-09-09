<!DOCTYPE html>
<html>

<head>
	<title>Account</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--	<link rel="stylesheet" href="/styles/bootstrap.css">-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/styles/account.css">

	<style>
		.main {
			display         : flex;
			justify-content : center;
			margin-bottom   : 40px;
		}

		.container {
			display         : flex;
			flex-direction  : column;
			justify-content : center;
			align-items     : center;
		}

		.booth {
			width            : 400px;
			background-color : #ccc;
			margin-top       : 150px;
		}

		.booth-capture-button {
			display          : block;
			margin           : 10px 0;
			padding          : 10px 20px;
			height           : 40px;
			background-color : cornflowerblue;
			color            : #fff;
			text-align       : center;
			text-decoration  : none;
		}

		#save_photo {
			text-align    : center;
			margin-bottom : 10px;
			height        : 40px;
			width         : 400px;
		}

		.photo-active {
			border : solid 5px blueviolet;
		}

		#canvas {
			display : none;
		}

		img {
			margin-left   : 10px;
			margin-top    : 10px;
			margin-bottom : 10px;
		}

		input {
			padding-top : 0;
			width       : 400px;
		}

		.hiden {
			height : 100px;

		}

		#frame-container {
			padding-top      : 30px;
			background-color : antiquewhite;
			text-align       : center;
		}

		#computer {
			text-align    : center;
			margin-bottom : 10px;
			height        : 40px;
			width         : 400px;
		}

		#photos-container {
			margin-left : 30px;
		}

		#photos-container img {
			height : 300px;
			width  : 400px;
		}

		@media (max-width : 901px) {
			footer {
				width : 901px;
			}

		}

		.error {
			color: red;
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
				<li class="active"><a href="#">Account</a></li>
				<li><a href="/logout/index">Logout</a></li>
				<li><a href="/settings/index">Settings</a></li>
			</ul>
		</div>
	</div>
</header>



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
