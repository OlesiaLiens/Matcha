<!DOCTYPE html>
<html>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<head>
	<title>Info</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--	<link rel="stylesheet" href="/styles/bootstrap.css">-->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"
		  integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg=="
		  crossorigin="anonymous">

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw=="
		  crossorigin="anonymous">

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/styles/account.css">
	<link rel="stylesheet" href="../styles/bootstrap.css">
	<link rel="stylesheet" href="/styles/main.css">

	<script type="text/javascript" src="/js/onload.js"></script>
	<script type="text/javascript" src="/js/info.js"></script>

	<style>

		body {
			padding-top : 70px;
			/* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
		}


		.navbar-inverse .navbar-nav > .active > a {
			background-color : #ff7878;
		}


		input[type="button"]:not(.default), input[type="submit"]:not(.default) {
			-webkit-border-radius   : 3px;
			-webkit-background-clip : padding-box;
			-moz-border-radius      : 3px;
			-moz-background-clip    : padding;
			border-radius           : 3px;
			background-clip         : padding-box;
			-webkit-transition      : color 0.2s ease, border 0.2s ease, background 0.2s ease, -webkit-box-shadow 0.2s ease;
			-moz-transition         : color 0.2s ease, border 0.2s ease, background 0.2s ease, -moz-box-shadow 0.2s ease;
			-o-transition           : color 0.2s ease, border 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
			transition              : color 0.2s ease, border 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
			position                : relative;
			margin                  : 0 7px;
			display                 : inline-block;
			min-width               : 144px;
			max-width               : 100%;
			padding                 : 15px 25px;
			font-family             : "Arial", "Helvetica Neue", Arial, Helvetica, sans-serif;
			font-size               : 14px;
			font-weight             : 600;
			text-transform          : uppercase;
			line-height             : 1;
			border-width            : 1px;
			border-style            : solid;
			background-color        : steelblue;
			color                   : #ddd;
		}


		legend {
			text-align : center;

		}

		.othertop {
			text-align : center;

		}

		main {
			border  : black solid 1px;
			display : flex;
		}

		.container {
			display         : flex;
			flex-direction  : column;
			justify-content : center;
			align-items     : center;
		}

		.photos img {
			flex-direction : row;
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

		#photos-container img {
			height : 300px;
			width  : 400px;
		}

		@media (max-width : 901px) {
			footer {
				width : 901px;
			}

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
				<li class="active"><a href="/info/index">Information</a></li>
				<li><a href="/settings/index">Settings</a></li>
					<li class=""><a href="/search/index">Search</a></li>
				<li class=""><a href="/chat/index">Chat</a></li>
				<li><a href="/logout/index">Logout</a></li>
			</ul>
		</div>
	</div>
</header>

<div class="hiden">

</div>

<main>
	<div class="container">
		<div class="row">
			<div class="col-md-10 ">
				<form class="form-horizontal" method="post" action="/info/info">
					<fieldset>
						<legend>User profile information</legend>

						<!--					Date Of Birth-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="Date Of Birth">How old are you?</label>
							<div class="col-md-4">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-birthday-cake"></i>
									</div>
									<input id="bday" name="bday" type="text"
										   placeholder=""
										   class="form-control input-md"/>
								</div>
							</div>
						</div>

						<!--					Gender-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="Gender">Gender</label>
							<div class="col-md-4">
								<label class="radio-inline" for="Gender-0">
									<input type="radio" name="gender" id="gender-0" value="male" checked="checked">
									Male
								</label>
								<label class="radio-inline" for="Gender-1">
									<input type="radio" name="gender" id="gender-1" value="female">
									Female
								</label>
							</div>
						</div>

						<!--					Sexual preferences:-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="radios">Sexual preferences:</label>
							<div class="col-md-4">
								<label class="radio-inline" for="radios-0">
									<input type="radio" name="preferences" id="man" value="man" checked="checked">
									Man
								</label>
								<label class="radio-inline" for="radios-1">
									<input type="radio" name="preferences" id="women" value="women">
									Women
								</label>
								<label class="radio-inline" for="radios-1">
									<input type="radio" name="preferences" id="both" value="both">
									Both
								</label>
							</div>
						</div>

						<!--					City-->
						<div class="form-group">
							<label class="col-md-4 control-label col-xs-12" for="city">City</label>
							<div class="col-md-2 col-xs-4">
								<input id="city" name="city" type="text" placeholder="City"
									   class="form-control input-md ">
							</div>
						</div>


						<!--					interests>-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="">A list of interests</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="">Options</label>
								</div>
								<select class="custom-select" id="interest" name="interest">
									<?php foreach ($params as $param => $tag): ?>
										<option selected><?= $tag['tag'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="form-group" id="selectedTags">

						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="Overview (max 200 words)">A biography</label>
							<div class="col-md-4">
							<textarea class="form-control" rows="10" id="biography"
									  name="bio">Overview</textarea>
							</div>
						</div>

					</fieldset>

					<div class="text-center col-xs-12">
						<input id="okBtn" type="button" name="submit" value="OK" class="btn btn-default"/>
					</div>

				</form>
			</div>
		</div>
	</div>
</main>

<div class="hiden">
</div>

<footer>
</footer>
</body>
</html>
