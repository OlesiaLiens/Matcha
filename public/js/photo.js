document.getElementById('computer').addEventListener('change', readURL, true);

function readURL() {
	var file                                         = document.getElementById('computer').files[0];
	var photo                                        = document.getElementById('avatar');
	document.querySelector('#show_errors').innerHTML = null;

	if (file === undefined)
		return;

	var reader = new FileReader();

	if (file.size > 10000000)
		document.querySelector('#show_errors').innerHTML = 'Upload limit 10mb';
	else if (file.type.split('/')[0] !== 'image')
		document.querySelector('#show_errors').innerHTML = 'This file is not image';
	else if (file.type !== '' &&
		file.type.split('/')[0] === 'image') {
		reader.onloadend = function () {
			document.getElementById('avatar').src = reader.result;

			var fd = new FormData();
			fd.append('img', photo.src);
			let header = {
				method: 'POST',
				body: fd,
			};
			fetch('http://localhost:1997/account/saveAvatar', header)
				.then(res => res.text())
				.then(result => {
					console.log(result)
				})
		}
	}
	if (file) {
		reader.readAsDataURL(file);
	} else {
		console.log("Error");
	}
}

var res = document.getElementById('photos');

if (res)
	addEventListener('change', readURLPhotos, true);

document.querySelector('#show_errors').innerHTML = null;

function readURLPhotos() {
	var file   = document.getElementById('photos').files[0];
	var photo  = document.getElementById('empty_photo');
	var reader = new FileReader();

	if (file === undefined)
		return;

	if (file.size > 10000000)
		document.querySelector('#show_photos_errors').innerHTML = 'Upload limit 10mb';
	else if (file.type.split('/')[0] !== 'image')
		document.querySelector('#show_photos_errors').innerHTML = 'This file is not image';
	else if (file.type !== '' &&
		file.type.split('/')[0] === 'image') {
		reader.onloadend = function () {
			photo.src           = reader.result;
			photo.style.display = 'block';
			var fd              = new FormData();

			fd.append('img', photo.src);
			let header = {
				method: 'POST',
				body: fd,
			};

			fetch('http://localhost:1997/account/savePhoto', header)
				.then(res => res.text())
				.then(result => {
					console.log(result)
				})
		}
	}
	if (file) {
		reader.readAsDataURL(file);
	} else {
		console.log("Error");
	}
}

//$.getJSON("https://ipfind.co/?ip=178.214.196.34&auth=0ac6d115-a822-4816-91df-758840e64763", function(result){
//	console.log('res', result);
//});

//todo сделать вывод юзеров, которые посмотрели твой аккаунт
//todo сделать fame rating (вывод количества пользователей, которые посмотрели твой аккаунт)
