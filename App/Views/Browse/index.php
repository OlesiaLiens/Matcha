<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Search | MATCHA</title>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--        <link rel="stylesheet" href="/styles/bootstrap.css">-->
<!--    <link rel="stylesheet" href="./search_files/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="http://localhost:1997/styles/login.css">
	<link rel="stylesheet" type="text/css" href="http://localhost:1997/styles/search.css">
	<style type="text/css">
		@media (min-width: 34em) {
			.card-columns {
				-webkit-column-count: 2;
				-moz-column-count: 2;
				column-count: 2;
			}
		}

		@media (min-width: 48em) {
			.card-columns {
				-webkit-column-count: 3;
				-moz-column-count: 3;
				column-count: 3;
			}
		}

		@media (min-width: 62em) {
			.card-columns {
				-webkit-column-count: 4;
				-moz-column-count: 4;
				column-count: 4;
			}
		}

		@media (min-width: 75em) {
			.card-columns {
				-webkit-column-count: 5;
				-moz-column-count: 5;
				column-count: 5;
			}
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
			<li class="nav-item"><a class="nav-link" href="/notification/index">Notification</a></li>
			<li class="nav-item"><a class="nav-link" href="/settings/index">Settings</a></li>
			<li class="nav-item active"><a class="nav-link" href="/browse/index">Browse</a></li>
			<li class="nav-item"><a class="nav-link" href="/search/index">Search</a></li>
			<li class="nav-item"><a class="nav-link" href="/chat/index">Chat</a></li>
			<li class="nav-item"><a class="nav-link" href="/logout/index">Logout</a></li>
		</ul>
	</div>
</nav>
	
<div id="resContainer" class="container-fluid m-4 mx-auto">
	<div id="spinnerRow" class="row justify-content-center d-none">
		<div class="spinner-border text-danger" role="status">
		<span class="sr-only">Loading...</span>
		</div>
	</div>
	
	<div id="genRow" class="row justify-content-center">
	
														<!--            -->
														<!-- MENU BLOCK -->
														<!--            -->
	  
		<div id="menuCol" class="col-3 col-xs-12">
			<div class="row"
				 style="background-color: #2b2b2b;
						border-radius: 0 25px 25px 0;
						height: auto;
						padding-bottom: 30px;">
				<div id="innerMenuCol" class="col">

														<!--           -->
														<!-- SORT MENU -->
														<!--           -->

					<div class="row mt-3"><div class="col text-center"><h3 class="text-white">Sort by</h3></div></div>
					<div class="row mt-3 justify-content-center text-center align-content-center">
						<div class="col-1"></div>
						<div id="sortCriteriaCol" class="col-xs-12 col-sm-12 col-md-8">
							<select id="sortCriteria" class="custom-select">
								<option value="age" selected>Age</option>
								<option value="distance">Distance</option>
								<option value="rating">Rating</option>
								<option value="tags">Common Tags</option>
							</select>
						</div>
						<div id="sortDirectionCol" class="col-xs-12 col-sm-12 col-md-2">
							<select id="sortDirection">
								<option value="htl" selected>↓</option>
								<option value="lth">↑</option>
							</select>
						</div>
						<div class="col-1"></div>
					</div>

														<!--             -->
														<!-- FILTER MENU -->
														<!--             -->

					<div class="row mt-3"><div class="col text-center"><h3 class="text-white">Filter criteria</h3></div></div>

														<!--            -->
														<!-- AGE FILTER -->
														<!--            -->

					<div id="ageBtnRow" class="row justify-content-center text-center">
						<button class="btn btn-primary m-3" type="button" data-toggle="collapse" data-target="#ageSets" aria-expanded="false" aria-controls="ageSets">Age</button>
					</div>
					<div id="ageFiltRow" class="row justify-content-center text-center">
						<div class="ml-1 mr-1 collapse" id="ageSets" style="width: 100%;">
							<div class="row no-gutters">
								<div class="col-5">
									<select id="minAge" class="custom-select">
										<option value="any" selected>Any</option>
										<option value="18">18</option>
										<option value="19">19</option>
									</select>
								</div>
								<div class="col-2"><p>-</p></div>
								<div class="col-5">
									<select id="maxAge" class="custom-select">
										<option value="any" selected>Any</option>
										<option value="18">18</option>
										<option value="19">19</option>
									</select>
								</div>
							</div>
						</div>
					</div>

														<!--                 -->
														<!-- DISTANCE FILTER -->
														<!--                 -->

					<div id="distBtnRow" class="row justify-content-center text-center">
						<button class="btn btn-primary m-3" type="button" data-toggle="collapse" data-target="#distSets" aria-expanded="false" aria-controls="distSets">Distance</button>
					</div>
					<div id="distFiltRow" class="row justify-content-center text-center">
						<div class="ml-2 mr-2 collapse" id="distSets" style="width: 100%;">
							<div class="row no-gutters">
								<div class="col-5">
									<input id="minDist"
										   class="form-control input-group-lg reg_name"
										   type="text"
										   name="minDist"
										   title="Minimal distance"
										   placeholder="From"/>
								</div>
								<div class="col-2"><p>-</p></div>
								<div class="col-5">
									<input id="maxDist"
										   class="form-control input-group-lg reg_name"
										   type="text"
										   name="minDist"
										   title="Minimal distance"
										   placeholder="To"/>
								</div>
							</div>
						</div>
					</div>
					
														<!--               -->
														<!-- RATING FILTER -->
														<!--               -->

					<div id="rateBtnRow" class="row justify-content-center text-center">
						<button class="btn btn-primary m-3" type="button" data-toggle="collapse" data-target="#rateSets" aria-expanded="false" aria-controls="rateSets">Rating</button>
					</div>
					<div id="rateFiltRow" class="row justify-content-center text-center">
						<div class="ml-2 mr-2 collapse" id="rateSets" style="width: 100%;">
							<div class="row no-gutters">
								<div class="col-5">
									<input id="minRate"
										   class="form-control input-group-lg reg_name"
										   type="text"
										   name="minRate"
										   title="Minimal rating"
										   placeholder="From"/>
								</div>
								<div class="col-2"><p>-</p></div>
								<div class="col-5">
									<input id="maxRate"
										   class="form-control input-group-lg reg_name"
										   type="text"
										   name="minRate"
										   title="Minimal rating"
										   placeholder="To"/>
								</div>
							</div>
						</div>
					</div>
					
														<!--             -->
														<!-- TAGS FILTER -->
														<!--             -->

					<div id="tagsBtnRow" class="row justify-content-center text-center">
						<button class="btn btn-primary m-3" type="button" data-toggle="collapse" data-target="#tagsSets" aria-expanded="false" aria-controls="tagSets">Required Tags</button>
					</div>
					<div id="tagsFiltRow" class="row justify-content-center text-center">
						<div class="ml-2 mr-2 collapse" id="tagsSets" style="width: 100%;">
							<div class="row no-gutters">
								<div class="col">
									<input id="reqTags"
										   class="form-control input-group-lg reg_name"
										   type="text"
										   name="reqTags"
										   title="Required tags"
										   placeholder="Required tags (commas)"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
												<!--                       -->
												<!-- RESULTS OF THE FILTER -->
												<!--                       -->
		<div id="resCol" class="col-9 col-xs-12">
			<div id="resRow" class="row">
				<div id="resultsContainer" class="card-columns ml-5 mr-5">
					<!-- Content of this div i dinamically generated -->
				</div>
			</div>
		  
												<!--            -->
												<!-- PAGINATION -->
												<!--            -->
		  
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
	</div>
	
	
</div>

<div class="hiden"></div>

<footer style="position: fixed;">
	<div class="container">
		<div class="row centered myhover">
		</div>
	</div>
</footer>


<script src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/notifications.js"></script>
<script type="text/javascript" src="/js/browse.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
