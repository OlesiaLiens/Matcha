document.getElementById('computer').addEventListener('change', readURL, true);

function readURL() {
	var file   = document.getElementById('computer').files[0];
	var photo  = document.getElementById('avatar');
	var reader = new FileReader();

	reader.onloadend = function () {
		document.getElementById('avatar').src = reader.result;
		var fd                                = new FormData();

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
	if (file) {
		reader.readAsDataURL(file);
	} else {
		console.log("Error");
	}
}

var res = document.getElementById('photos');

if (res)
	addEventListener('change', readURLPhotos, true);

function readURLPhotos() {
	var file   = document.getElementById('photos').files[0];
	var photo  = document.getElementById('empty_photo');
	var reader = new FileReader();

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
	if (file) {
		reader.readAsDataURL(file);
	} else {
		console.log("Error");
	}
}
