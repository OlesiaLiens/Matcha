//avatar = document.getElementById('avatar');
////context = canvas.getContext('2d');
//
//let photos_container = document.getElementById('photos-container'),
//	vendorUrl        = window.URL || window.webkitURL;
//
//
//navigator.getMedia = navigator.getUserMedia ||
//	navigator.webkitGetUserMedia ||
//	navigator.mozGetUserMedia ||
//	navigator.webkitGetUserMedia;
//
//
//navigator.getMedia({
//		video: true,
//		audio: false
//	}, function (stream) {
//		video.srcObject = stream;
//		//video.src = vendorUrl.createObjectURL(stream);
//		video.play();
//	},
//	function (error) {
//		//
//	});

//
//document.getElementById('save_photo').addEventListener('click', function () {
//
//	let active_photo = photos_container.getElementsByClassName('photo-active')[0].src;
//
//	if (active_photo === null) {
//		alert('Choose photo to save');
//		return;
//	}
//	if (active_photo) {
//
//		var fd = new FormData();
//
//		fd.append('img', active_photo);
//		let header = {
//			method: 'POST',
//			body: fd,
//		};
//
//		fetch('http://localhost:9500/account/savePhoto', header)
//			.then(res => res.json())
//			.then(result => {
//				//console.log(result)
//				//document.getElementById("lala").setAttribute("src", result.path);
//			})
//		//console.log(JSON.stringify(response.body));
//		//let result = await response.body;
//		//console.log(result);
//	} else {
//		console.log("Error");
//	}
//});


document.getElementById('computer').addEventListener('change', readURL, true);

function readURL() {
	var file         = document.getElementById('computer').files[0];
	var reader       = new FileReader();
	reader.onloadend = function () {
		document.getElementById('avatar').src = reader.result;
	}
	if (file) {
		reader.readAsDataURL(file);
	} else {
	}
}

//document.getElementById('computer').addEventListener('change', function (event) {
//
//	document.querySelector('#show_errors').innerHTML = null;
//	var file                                         = event.target.files[0];
//	if (file === undefined)
//		return;
//	//console.log(file);
//
//	var reader = new FileReader();
//
//	if (file.size > 10000000)
//		document.querySelector('#show_errors').innerHTML = 'Upload limit 10mb';
//	else if (file.type.split('/')[0] !== 'image')
//		document.querySelector('#show_errors').innerHTML = 'This file is not image';
//	else if (file.type !== '' &&
//		file.type.split('/')[0] === 'image') {
//		reader.onload = function (event) {
//			let image = new Image();
//
//			image.onload = () => {
//				avatar.prepend(image);
//				//context.drawImage(image, 0, 0, canvas.width, canvas.height);
//				////document.querySelector('#video').style.display  = 'none';
//				//document.querySelector('#canvas').style.display = 'inline-block';
//				//document.querySelector('#capture').innerHTML    = 'Add frames';
//
//			};
//			image.src    = event.target.result;
//		};
//		reader.readAsDataURL(file);
//	}
//});
//
