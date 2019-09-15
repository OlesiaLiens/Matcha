<!DOCTYPE html>
<html>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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

	<style>

		body {
			padding-top : 70px;
			/* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
		}

		legend{
		text-align: center;

		}

		.othertop {
			text-align: center;

		}

		main{
			border: black solid 1px;
			display: flex;
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
				<li class="active"><a href="/info/index">User Info</a></li>
				<li><a href="/logout/index">Logout</a></li>
				<li><a href="/settings/index">Settings</a></li>
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
				<form class="form-horizontal">
					<fieldset>
						<legend>User profile information</legend>
						<div class="form-group">
							<label class="col-md-4 control-label" for="Date Of Birth">Date Of Birth</label>
							<div class="col-md-4">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-birthday-cake"></i>
									</div>
									<input id="Date Of Birth" name="Date Of Birth" type="text"
										   placeholder="Date Of Birth"
										   class="form-control input-md">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="Gender">Gender</label>
							<div class="col-md-4">
								<label class="radio-inline" for="Gender-0">
									<input type="radio" name="Gender" id="Gender-0" value="1" checked="checked">
									Male
								</label>
								<label class="radio-inline" for="Gender-1">
									<input type="radio" name="Gender" id="Gender-1" value="2">
									Female
								</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="radios">Sexual preferences:</label>
							<div class="col-md-4">
								<label class="radio-inline" for="radios-0">
									<input type="radio" name="radios" id="radios-0" value="1" checked="checked">
									Man
								</label>
								<label class="radio-inline" for="radios-1">
									<input type="radio" name="radios" id="radios-1" value="2">
									Women
								</label>
								<label class="radio-inline" for="radios-1">
									<input type="radio" name="radios" id="radios-1" value="2">
									Both
								</label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label col-xs-12" for="Permanent Address">City</label>
							<div class="col-md-2 col-xs-4">
								<input id="Permanent Address" name="Permanent Address" type="text" placeholder="City"
									   class="form-control input-md ">
							</div>
						</div>

<!--						//interests-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="">A list of interests</label>
							<div class="col-md-4">
								<div class="checkbox">
									<label for="">
										<input type="checkbox" name="" id="" value="1">Sport</label>
								</div>
								<div class="checkbox">
									<label for="">
										<input type="checkbox" name="" id="" value="2">Music</label>
								</div>
								<div class="checkbox">
									<label for="">
										<input type="checkbox" name="" id="" value="3">Dancing</label>
								</div>
								<div class="checkbox">
									<label for="">
										<input type="checkbox" name="" id="" value="4">Cooking</label>
								</div>
								<div class="othertop">
									<label for="">
									</label>
									<input type="input" name="interest" id="interest"
										   placeholder="Other interests ">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="Overview (max 200 words)">A biography</label>
							<div class="col-md-4">
							<textarea class="form-control" rows="10" id="Overview (max 200 words)"
									  name="Overview (max 200 words)">Overview</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span>
									Submit</a>
								<a href="#" class="btn btn-danger" value=""><span
											class="glyphicon glyphicon-remove-sign"></span> Clear</a>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</main>
<footer>
</footer>

<div class="hiden">
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/styles/bootstrap.min.js"></script>

</body>
</html>
