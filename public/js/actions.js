var like = document.getElementById('like_user');
console.log('It works');
console.log('Like button', like);
if (like)
	like.addEventListener('click', likeUser, true);

function likeUser() {
	if (like.classList.contains('red')) {
		like.classList.remove('red');
		like.classList.add('liked');

		const xhr = new XMLHttpRequest();
		let url = '/actions/like/' + fixedEncodeURIComponent2(JSON.stringify('liked'));
		xhr.open("GET", url);
		xhr.onload = () => {console.log(xhr.responseText)};
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		// xhr.send('tags=' + encodeURIComponent(JSON.stringify(tags)));
		xhr.send();

	} else {
		like.classList.remove('liked');
		like.classList.add('red');
		const xhr = new XMLHttpRequest();
		let url = '/actions/unliked/' + fixedEncodeURIComponent2(JSON.stringify('unliked'));
		xhr.open("GET", url);
		xhr.onload = () => {console.log(xhr.responseText)};
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		// xhr.send('tags=' + encodeURIComponent(JSON.stringify(tags)));
		xhr.send();
	}
}


//todo отправить с этого файла post запросс в контроллер actions, с переменной 'liked' и записать это в базу
//todo сделать вывод юзеров, которые посмотрели твой аккаунт
