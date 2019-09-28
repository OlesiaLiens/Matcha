var like       = document.getElementById('like_user');
var ban        = document.getElementById('ban_user');
var user_email = document.getElementsByClassName('user_email')[0].id;

console.log('It works');
console.log('Like button', like);
if (like) {
		like.addEventListener('click', likeUser, true);
}

function likeUser() {
	if (like.classList.contains('red')) {
		like.classList.remove('red');
		like.classList.add('liked');

		$.ajax({
			url: '/actions/like/',
			type: 'post',
			dataType: 'json',
			//contentType: 'application/json',
			data: {"data": JSON.stringify(user_email)}
		})


	} else {
		like.classList.remove('liked');
		like.classList.add('red');

		$.ajax({
			url: '/actions/unLike/',
			type: 'post',
			dataType: 'json',
			//contentType: 'application/json',
			data: {"data": JSON.stringify(user_email)}
		})
	}
}

if (ban)
	ban.addEventListener('click', banUser, true);

function banUser() {
	if (ban.classList.contains('ban')) {
		ban.classList.remove('ban');
		ban.classList.add('baned');

		$.ajax({
			url: '/actions/ban/',
			type: 'post',
			dataType: 'json',
			//contentType: 'application/json',
			data: {"data": JSON.stringify(user_email)}
		})


	} else {
		ban.classList.remove('baned');
		ban.classList.add('ban');

		$.ajax({
			url: '/actions/unBan/',
			type: 'post',
			dataType: 'json',
			//contentType: 'application/json',
			data: {"data": JSON.stringify(user_email)}
		})
	}
}

//todo сделать вывод юзеров, которые посмотрели твой аккаунт
