<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="stylesheet" href="/styles/chat.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/utils.js"></script>
		<script type="text/javascript" src="/js/chat.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
		<!-- <div class="bg-img"></div> -->
		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ui id="contacts" class="contacts"></ui>
					</div>
					<div class="card-footer"></div>
				</div></div>
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div id="chatHeader" class="d-flex bd-highlight" style="display: none !important">
								<div class="img_cont">
									<img id="selectedAvatar" src="/res/alien.jpg" class="rounded-circle user_img">
									<span id="selectedOnline" class="online_icon offline"></span>
								</div>
								<div class="user_info">
									<span id="title">Chat with Nobody</span>
									<p id="counter"></p>
								</div>
							</div>
							<!-- <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div> -->
						</div>
						<div id="messagesBlock" class="card-body msg_card_body">
						</div>
						<div class="card-footer">
							<div class="input-group">
								<textarea id="msgInput" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="position: absolute; bottom: 0px; display: block !important; background-color: #2b2b2b; width: 120vh; height: 50px;">
					<div class="container">
						<div class="row centered myhover">
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
