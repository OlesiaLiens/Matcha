<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Search | MATCHA</title>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--        <link rel="stylesheet" href="/styles/bootstrap.css">-->
<!--    <link rel="stylesheet" href="./search_files/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/styles/login.css">
	<link rel="stylesheet" type="text/css" href="/styles/search.css">
	<style type="text/css">
		.user {
			transition: background-color 0.5s ease;
		}
		.user:hover {
			background-color: #bfbfbf !important;
			cursor: pointer !important;
		}
		.user:active {
			background-color: #989898 !important;
		}
	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<!--
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
-->
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="/account/index">Account</a></li>
			<li class="nav-item"><a class="nav-link" href="/info/info">Information</a></li>
			<li class="nav-item active"><a class="nav-link" href="/interaction/index">Interactions</a></li>
			<li class="nav-item"><a class="nav-link" href="/settings/index">Settings</a></li>
			<li class="nav-item"><a class="nav-link" href="/browse/index">Browse</a></li>
			<li class="nav-item"><a class="nav-link" href="/search/index">Search</a></li>
			<li class="nav-item"><a class="nav-link" href="/chat/index">Chat</a></li>
			<li class="nav-item"><a class="nav-link" href="/logout/index">Logout</a></li>
		</ul>
	</div>
</nav>
	
<div class="container">
	<div class="row justify-content-center align-content-center">

		<div class="col-xs-12 col-md-6 col-lg-3 mb-3">
			<div class="card">
				<div class="card-header">
					Who liked you
				</div>
				<ul id="likers" class="list-group list-group-flush">
					<!-- Dynamically generated content, example: -->
					<!-- <li class="list-group-item user">Snoop Dogg</li> -->
				</ul>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-3 mb-3">
			<div class="card">
				<div class="card-header">
					Who did you like
				</div>
				<ul id="liked" class="list-group list-group-flush">
					<!-- Dynamically generated content-->
				</ul>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-3 mb-3">
			<div class="card">
				<div class="card-header">
					With whom do you match
				</div>
				<ul id="matches" class="list-group list-group-flush">
				<!-- Dynamically generated content -->
				</ul>
			</div>
		</div>
	</div>
</div>

<footer style="position: fixed;">
	<div class="container">
		<div class="row centered myhover">
		</div>
	</div>
</footer>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script>
<script src="/js/hullabaloo.js"></script>
<script type="text/javascript" src="/js/notifications.js"></script>
<script type="text/javascript" src="/js/utils.js"></script>
<script type="text/javascript" src="/js/interaction.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>