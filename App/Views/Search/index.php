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
			<li class="nav-item"><a class="nav-link" href="/notification/index">Notification</a></li>
			<li class="nav-item"><a class="nav-link" href="/settings/index">Settings</a></li>
			<li class="nav-item"><a class="nav-link" href="/browse/index">Browse</a></li>
			<li class="nav-item active"><a class="nav-link" href="/search/index">Search</a></li>
			<li class="nav-item"><a class="nav-link" href="/chat/index">Chat</a></li>
			<li class="nav-item"><a class="nav-link" href="/logout/index">Logout</a></li>
		</ul>
	</div>
</nav>
	
<div id="jumbo" class="container jumbotron">
	<div class="row justify-content-center">
		<div class="col-3 text-center">
			<h3 class="mb-4">Search parameters</h3>
		</div>
	</div>
	
	<div class="row justify-content-center">
		<div class="col-xs-12 col-sm-4 col-md-2">
			<select id="minAge" class="custom-select">
				<option selected>Min. age</option>
			</select>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-2">
			<select id="maxAge" class="custom-select">
				<option selected>Max. age</option>
			</select>
		</div>
		<div class="form-group col-xs-12 col-sm-4 col-md-2">
			<input id="minRate"
						 class="form-control input-group-lg reg_name"
						 type="text"
						 name="minRate"
			 title="Minimal rating"
			 placeholder="Min. rating"/>
		</div>
		<div class="form-group col-xs-12 col-sm-4 col-md-2">
			<input id="maxRate"
						 class="form-control input-group-lg reg_name"
						 type="text"
						 name="maxDist"
			 title="Maximal rating"
			 placeholder="Max. rating"/>
		</div>
		<div class="form-group col-xs-12 col-sm-4 col-md-2">
			<input id="minDist"
						 class="form-control input-group-lg reg_name"
						 type="text"
						 name="minDist"
			 title="Minimal distance"
			 placeholder="Min. distance"/>
		</div>
		<div class="form-group col-xs-12 col-sm-4 col-md-2">
			<input id="maxDist"
						 class="form-control input-group-lg reg_name"
						 type="text"
						 name="maxDist"
			 title="Maximal Distance"
			 placeholder="Max. distance"/>
		</div>
	</div>
	
	<div class="row">
	<div class="form-group col-12">
			<input id="tags"
						 class="form-control input-group-lg reg_name"
						 type="text"
						 name="tags"
			 title="Tags"
			 placeholder="Tags (separate with commas)"/>
		</div>
	</div>
	
	<div class="row justify-content-center">
		<div class="col-3 text-center">
			<button id="searchBtn" type="button" class="btn btn-primary">Search</button>
		</div>
	</div>
</div>
	
<div id="resContainer" class="container-fluid m-4 mx-auto">
	<div id="spinnerRow" class="row justify-content-center d-none">
		<div class="spinner-border text-danger" role="status">
		<span class="sr-only">Loading...</span>
		</div>
	</div>
	
	<div id="resRow" class="row justify-content-center">
		<div id="resultsContainer" class="card-deck ml-5 mr-5">
			<!-- Generated dynamically -->
		</div>
	</div>
	
	<div id="pagRow" class="row justify-content-center" style="margin-bottom: 140px">
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>

<div class="hiden"></div>

<footer style="position: fixed;">
	<div class="container">
		<div class="row centered myhover">
		</div>
	</div>
</footer>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/notifications.js"></script>
<script type="text/javascript" src="/js/utils.js"></script>
<script type="text/javascript" src="/js/search.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
