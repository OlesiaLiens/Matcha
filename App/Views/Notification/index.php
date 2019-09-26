<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/styles/account.css">
	<link rel="stylesheet" href="../styles/bootstrap.css">
	<link rel="stylesheet" href="../styles/font-awesome.css">
	<link rel="stylesheet" href="/styles/main.css">
		<style>
		.container {
			display         : flex;
			flex-direction  : column;
			justify-content : center;
			align-items     : center;
		}

		.btn-default {
			background-color : #f2f2f2;;;

		}

		.photos img {
			flex-direction : row;
		}

		.navbar-inverse .navbar-nav > .active > a {
			background-color : #ff7878;
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

		[hidden] {
			display : none !important;
		}

		.hiden {
			height : 100px;

		}

		#computer {
			text-align    : center;
			margin-bottom : 10px;
			height        : 40px;
			width         : 400px;
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
			color : red;
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
				<li ><a href="/account/index">Account</a></li>
				<li class=""><a href="/info/index">Information</a></li>
				<li class="active"><a href="/notification/index">Notification</a></li>
				<li><a href="/settings/index">Settings</a></li>
				<li><a href="/search/index">Search</a></li>
				<li><a href="/chat/index">Chat</a></li>
				<li><a href="/logout/index">Logout</a></li>
			</ul>
		</div>
	</div>
</header>


<footer></footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/styles/bootstrap.min.js"></script>


</body>
</html>
