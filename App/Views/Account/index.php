<!DOCTYPE html>
<html>

<head>
	<title>Account</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/styles/account.css">
	<link rel="stylesheet" href="../styles/bootstrap.css">
	<link rel="stylesheet" href="../styles/font-awesome.css">
	<link rel="stylesheet" href="/styles/main.css">
	<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"-->
	<!--		  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
	<!--	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.m,in.css">-->
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
				<li class="active"><a href="#">Account</a></li>
				<li class=""><a href="/info/index">Information</a></li>
				<li class=""><a href="/notification/index">Notification</a></li>
				<li><a href="/settings/index">Settings</a></li>
				<li><a href="/search/index">Search</a></li>
				<li><a href="/chat/index">Chat</a></li>
				<li><a href="/logout/index">Logout</a></li>
			</ul>
		</div>
	</div>
</header>


<main>
	<div id="headerwrap">
		<div class="container">
			<div class="col-lg-8 col-lg-offset-2">
				<h1>Matcha</h1>
				<h2>Because, love too can be industrialized</h2>
			</div>
		</div>
	</div>

	<section class="container w">
		<div class="row centered">

			<div class="col-lg-4">
				<img src="/images/idea.png">
				<h4>Information</h4>
				<p> <?= 'Full Name : ' . $args['first_name'] . ' ' .  $args['last_name']?> <br>
					<?= 'Preference:' . ' ' . $args['preference'] ?> <br>
					<?= 'Location:' . ' ' . $args['location'] ?> <br>
					<?= 'Gender:' . ' ' . $args['gender'] ?> <br>
					<?= 'Age:' . ' ' . $args['bday'] ?> <br>
				</p>
			</div>

			<div class="col-lg-4">
				<img src="/images/plane.png">
				<h4>Interests</h4>
				<p><?= $args[0] ?? null ?? null ?> <br></p>
				<p><?= $args[1] ?? null ?> <br></p>
				<p><?= $args[2] ?? null ?> <br></p>
				<p><?= $args[3] ?? null ?> <br></p>
				<p><?= $args[4] ?? null ?> <br></p>
				<p><?= $args[5] ?? null ?> <br></p>
			</div>

			<div class="col-lg-4">
				<img src="/images/planet.png">
				<h4>Fame Rating</h4>
				<p> <?= $args['rating'] ?> </p>
			</div>

		</div>
	</section>


	<section id="dg">
		<div class="container">
			<div class="row centered">
				<h4></h4>
				<br/>
				<div class="col-lg-4">
					<div class="tilt">
						<label for="computer" class="btn btn-default" style="display: inline-table">
							<div id="image"></div>
							Upload avatar<input type="file" id="computer" hidden style="display:none">
						</label>
						<p class="error" id="show_errors"></p>
						<img id="avatar" src="<?= $args['avatars'] ?>" alt="img1">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="mycolor">
		<div class="container w ">
			<div class="row centered mycolor">
				<div class="col-lg-12">
					<h4><?= $args['username'] . ' ' ?></h4>
					<p> <?= $args['bio'] ?> </p>
				</div>
			</div>
	</section>


	<section class="container wb">
		<div class="row centered">

			<div class="col-lg-10 col-lg-offset-1">
				<h4>More photos</h4>
				<p>We travel, initially, to lose ourselves; and we travel, next, to find ourselves. We travel to open
					our hearts and eyes and learn more about the world than our newspapers will accommodate. We travel
					to bring what little we can, in our ignorance and knowledge, to those parts of the globe whose
					riches are differently dispersed. And we travel, in essence, to become young fools again -- to slow
					time down and get taken in, and fall in love once more.</p>
			</div>

			<div class="col-lg-2"></div>
			<div class="col-lg-10 col-lg-offset-1">
				<?php if (count($args['photos']) < 4): ?>
					<label for="photos" class="btn btn-default">
						<div id="image_2"></div>
						Upload photos<input type="file" id="photos" hidden style="display:none">
					</label>
					<p class="error" id="show_photos_errors"></p>
					<img id="empty_photo" src="" alt="img" class="img-responsive" style="display: none">
				<?php endif; ?>
				<?php foreach ($args['photos'] as $photo): ?>
					<img id="" src="<?= $photo['path'] ?>" alt="img" class="img-responsive">
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section id="lg">
		<div class="row centered">

			<div class="col-lg-2 col-lg-offset-1">
				<img src="../images/logo1a.gif" alt="img" width="200px" height="200px">
			</div>

			<div class="col-lg-2">
				<img src="../images/logo2a.gif" alt="img" width="200px" height="200px">
			</div>

			<div class="col-lg-2">
				<img src="../images/logo3a.gif" alt="img" width="200px" height="200px">
			</div>

			<div class="col-lg-2">
				<img src="../images/logo4a.gif" alt="img" width="200px" height="200px">
			</div>

			<div class="col-lg-2">
				<img src="../images/logo5a.gif" alt="img" width="200px" height="200px">
			</div>
		</div>
	</section>

</main>

<!--<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">-->
<!--	<!-- Position it -->
<!--	<div style="position: absolute; top: 0; right: 0;">-->
<!---->
<!--		<!-- Then put toasts within -->
<!--		<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">-->
<!--			<div class="toast-header">-->
<!--				<img src="..." class="rounded mr-2" alt="...">-->
<!--				<strong class="mr-auto">Bootstrap</strong>-->
<!--				<small class="text-muted">just now</small>-->
<!--				<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">-->
<!--					<span aria-hidden="true">&times;</span>-->
<!--				</button>-->
<!--			</div>-->
<!--			<div class="toast-body">-->
<!--				See? Just like this.-->
<!--			</div>-->
<!--		</div>-->
<!---->
<!--		<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">-->
<!--			<div class="toast-header">-->
<!--				<img src="..." class="rounded mr-2" alt="...">-->
<!--				<strong class="mr-auto">Bootstrap</strong>-->
<!--				<small class="text-muted">2 seconds ago</small>-->
<!--				<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">-->
<!--					<span aria-hidden="true">&times;</span>-->
<!--				</button>-->
<!--			</div>-->
<!--			<div class="toast-body">-->
<!--				Heads up, toasts will stack automatically-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->

<div class="hiden"></div>

<footer>
</footer>


<script src="/js/photo.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="/styles/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
		crossorigin="anonymous"></script>


<!--<script src="/js/hullabaloo.js"></script>
<!--<script>-->
<!--	var hulla = new hullabaloo();-->
<!---->
<!--	hulla.send("Success Message", "success");-->
<!--	hulla.send("Info Message", "info");-->
<!--	hulla.send("Warning Message", "warning");-->
<!--	hulla.send('Danger Message', 'danger');-->
<!--</script>-->

<script>
	//var hulla = new hullabaloo({
	//	ele: "body",
	//	offset: {
	//		from: "top",
	//		amount: 20
	//	},
	//	align: "right",
	//	width: 250,
	//	delay: 5000,
	//	allow_dismiss: true,
	//	stackup_spacing: 10,
	//	// notification message here
	//	text: "<a href="https: www.jqueryscript.net / tags.php ? /Notification/">Notification</a> Message Here",
	//	icon: {
	//		success: "fa fa-check-circle",
	//		info: "fa fa-info-circle",
	//		warning: "fa fa-life-ring",
	//		danger: "fa fa-exclamation-circle",
	//		light: "fa fa-sun",
	//		dark: "fa fa-moon"
	//	},
	//
	//	status: "danger",
	//	alertClass: "",
	//	fnStart: false,
	//	fnEnd: false,
	//	fnEndHide: false,
	//});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>

<script type="text/javascript" src="/js/position.js"></script>
</body>
</html>
