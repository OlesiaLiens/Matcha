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
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				<option value="32">32</option>
				<option value="33">33</option>
				<option value="34">34</option>
				<option value="35">35</option>
				<option value="36">36</option>
				<option value="37">37</option>
				<option value="38">38</option>
				<option value="39">39</option>
				<option value="40">40</option>
				<option value="41">41</option>
				<option value="42">42</option>
				<option value="43">43</option>
				<option value="44">44</option>
				<option value="45">45</option>
			</select>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-2">
			<select id="maxAge" class="custom-select">
				<option selected>Max. age</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				<option value="32">32</option>
				<option value="33">33</option>
				<option value="34">34</option>
				<option value="35">35</option>
				<option value="36">36</option>
				<option value="37">37</option>
				<option value="38">38</option>
				<option value="39">39</option>
				<option value="40">40</option>
				<option value="41">41</option>
				<option value="42">42</option>
				<option value="43">43</option>
				<option value="44">44</option>
				<option value="45">45</option>
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
			<input id="maxDist"
						 class="form-control input-group-lg reg_name"
						 type="text"
						 name="maxDist"
			 title="Maximal distance"
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
			<button type="button" class="btn btn-primary">Search</button>
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
		<div class="card-deck ml-5 mr-5">
			<div class="card mb-4">
				<img src="/images/1photo.png" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Admin De</h5>
					<p class="card-text">Currently the only damn user with a biography</p>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Age: 1337</li>
					<li class="list-group-item">Rating: 100500</li>
					<li class="list-group-item">Location: Kyiv</li>
				</ul>
				<div class="card-footer text-center">
					<button class="btn btn-primary">View profile</button>
				</div>
			</div>
			
			<div class="card mb-4">
				<img src="/default/jean.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Klava Klava</h5>
					<p class="card-text">Actually not Klava, but Jean, according to the avatar name</p>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Age: 64</li>
					<li class="list-group-item">Rating: 0</li>
					<li class="list-group-item">Location: Kyiv</li>
				</ul>
				<div class="card-footer text-center">
					<button class="btn btn-primary">View profile</button>
				</div>
			</div>
			
			<div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
			
			<div class="card mb-4">
				<img src="/default/zaria.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Zaria Maxwell</h5>
					<p class="card-text">This a one was in the chat cause she matched admin</p>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Age: 31</li>
					<li class="list-group-item">Rating: 0</li>
					<li class="list-group-item">Location: Cherkassy</li>
				</ul>
				<div class="card-footer text-center">
					<button class="btn btn-primary">View profile</button>
				</div>
			</div>
			
			<div class="w-100 d-none d-md-block d-xxl-none"><!-- wrap every 3 on md--></div>
			
			<div class="card mb-4">
				<img src="/default/claire.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Claire Flores</h5>
					<p class="card-text">Resembles Skylar from Breaking bad in some weird way</p>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Age: 36</li>
					<li class="list-group-item">Rating: 0</li>
					<li class="list-group-item">Location: Vyshneve</li>
				</ul>
				<div class="card-footer text-center">
					<button class="btn btn-primary">View profile</button>
				</div>
			</div>
			
			<div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
			
			<div class="card mb-4">
				<img src="/default/gina.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Gina Matthews</h5>
					<p class="card-text">Currently the only damn user with a biography</p>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Age: 28</li>
					<li class="list-group-item">Rating: 0</li>
					<li class="list-group-item">Location: Brovary</li>
				</ul>
				<div class="card-footer text-center">
					<button class="btn btn-primary">View profile</button>
				</div>
			</div>
			
			<div class="card mb-4">
				<img src="/default/helen.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Helen Odom</h5>
					<p class="card-text">Had to pull this one from the master branch, cause I only had 5 results in a sample</p>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Age: 22</li>
					<li class="list-group-item">Rating: 0</li>
					<li class="list-group-item">Location: Kyiv</li>
				</ul>
				<div class="card-footer text-center">
					<button class="btn btn-primary">View profile</button>
				</div>
			</div>
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



<script type="text/javascript" src="./search_files/notifications.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
