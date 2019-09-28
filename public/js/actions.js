var like = document.getElementById('like_user');
var user_email = document.getElementsByClassName('user_email')[0].id;

console.log('It works');
console.log('Like button', like);
if (like)
	like.addEventListener('click', likeUser, true);

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
			url: '/actions/unlike/',
			type: 'post',
			dataType: 'json',
			//contentType: 'application/json',
			data: {"data": JSON.stringify(user_email)}
		})
	}
}


//todo отправить с этого файла post запросс в контроллер actions, с переменной 'liked' и записать это в базу
//todo сделать вывод юзеров, которые посмотрели твой аккаунт
