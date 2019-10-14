//——————————————————————————————————//
//          xeee      .--~*teu.     //
//         d888R     dF     988Nx   //
//        d8888R    d888b   `8888>  //
//       @ 8888R    ?8888>  98888F  //
//     .P  8888R     "**"  x88888~  //
//    :F   8888R          d8888*`   //
//   x"    8888R        z8**"`   :  //
//  d8eeeee88888eer   :?.....  ..F  //
//         8888R     <""888888888~  //
//         8888R     8:  "888888*   //
//      "*%%%%%%**~  ""    "**"`    //
//——————————————————————————————————//

let resultsContainer = document.getElementById('resultsContainer');
let ownLongitude;
let ownLatitude;
let ownTags = [];
let cards = [];
let request = {
	minAge : 18,
	maxAge : 116,
	minRate : 0,
	maxRate : 99999,
	minDist : 0,
	maxDist : 200, // Let's concider same region everything that's < 200km away
	tags : []
};
let results = [];

$(document).ready(() => {
	fillOptions();
	getOwnData();
	setControlElements();
});

// const testFunc = () => {
// 	$.ajax({
// 		url: '/search/getResults',
// 		type: 'post',
// 		data: {"data" : JSON.stringify(request)},
// 		success: res => {$('#resultsContainer').html(res.replace(/(?:\r\n|\r|\n)/g, '<br>'))}
// 	})
// }

const fillOptions = () => {
	for (var i = 18; i <= 116; i++) {
		$('#minAge').append(`<option value="${i}">${i}</option>`);
		$('#maxAge').append(`<option value="${i}">${i}</option>`);
	}
	$('#minAge').val('18'); // Must re-do this the clever way
	$('#maxAge').val('116'); // that considers 1st & last elements
}

const getOwnData = () => {
	$.ajax({
		url: '/browse/getowndata',
		type: 'get',
		success: response => {
			// console.log(response)
			responseObj = JSON.parse(response);
			ownLongitude = responseObj.longitude;
			ownLatitude = responseObj.latitude;
			ownTags = responseObj.tags;
			// console.log('Longitude: ', ownLongitude)
			// console.log('Latitude: ', ownLatitude)
			// console.log('Tags: ', ownTags)
		}
	})
}

const setControlElements = () => {
	$('#minAge').change(() => {
		let selected = $('#minAge').children('option:selected').val();
		request.minAge = selected == 'Min. age' ? 0 : selected;
	})
	$('#maxAge').change(() => {
		let selected = $('#maxAge').children('option:selected').val();
		request.maxAge = selected == 'Max. age' ? 0 : selected;
	})
	$('#minRate').on('input', () => {request.minRate = $('#minRate').val() || 0})
	$('#maxRate').on('input', () => {request.maxRate = $('#maxRate').val() || 99999})
	$('#minDist').on('input', () => {request.minDist = $('#minDist').val() || 0})
	$('#maxDist').on('input', () => {request.maxDist = $('#maxDist').val() || 99999})
	$('#tags').blur(() => {
		let tagsStr = $('#tags').val();
		let tagsArr = tagsStr.split(',');
		Object.values(tagsArr).forEach(tag => {
			request.tags.push(tag.trim());
			// console.log(request.tags)
		})
	})
	$('#tags').focus(() => {request.tags = []})
	$('#searchBtn').click(() => {getSearchResults()})
	// $('#searchBtn').click(() => {testFunc()})
}

const getSearchResults = () => {
	$.ajax({
		url: '/search/getResults',
		type: 'post',
		dataType: 'json',
		data: {"data" : JSON.stringify(request)},
		success: res => {
			// console.log(res)
			let filtered = res.filter(element => {
				let distance = getDistance(ownLatitude,
																	ownLongitude,
																	element.latitude,
																	element.longitude);
				// console.log('dist', distance);
				return (distance >= request.minDist && distance <= request.maxDist);
			});
			drawResults(filtered);
		}
	})
}

const drawResults = results => {
	let pagesCount = Math.ceil(results.length / 6);

	$('.pagination').empty();
	for(var i = 1; i <= pagesCount; i++) {
		$('.pagination').append(
			`<li class="page-item"><a id="page${i}" class="page-link">${i}</a></li>`
		);
	}

	$('.page-link').click(function() {
		let pageNum = this.innerText;
		if (6 * pageNum > results.len)
			drawSixBlock(results.slice(6 * (pageNum - 1), -1));
		else
			drawSixBlock(results.slice(6 * (pageNum - 1), 6 * pageNum));
	})

	if (results.length <= 6)
		drawSixBlock(results);
	else
		drawSixBlock(results.slice(0, 6));
}

const drawSixBlock = sixBlock => {
	let counter = 0;
	$('#resultsContainer').empty();
	Object.values(sixBlock).forEach(profile => {
		// console.log(profile);
		let card = document.createElement('div');
		card.setAttribute('class', 'card mb-4');
		resultsContainer.appendChild(card);

		let avatar = document.createElement('img');
		avatar.setAttribute('class', 'card-img-top');
		avatar.setAttribute('src', profile.avatar);
		card.appendChild(avatar);

		let cb = document.createElement('div');
		cb.setAttribute('class', 'card-body');
		card.appendChild(cb);

		let name = document.createElement('h5');
		name.setAttribute('class', 'card-title');
		name.innerText = `${profile.firstName} ${profile.lastName}`;
		cb.appendChild(name);

		let bio = document.createElement('p');
		bio.setAttribute('class', 'card-text');
		bio.innerText = profile.bio;
		cb.appendChild(bio);

		let details = document.createElement('ul');
		details.setAttribute('class', 'list-group list-group-flush');
		card.appendChild(details);

		let age = document.createElement('li');
		age.setAttribute('class', 'list-group-item');
		age.innerText = `Age: ${profile.age}`;
		details.appendChild(age);

		let rating = document.createElement('li');
		rating.setAttribute('class', 'list-group-item');
		rating.innerText = `Rating: ${profile.rating}`;
		details.appendChild(rating);

		let location = document.createElement('li');
		location.setAttribute('class', 'list-group-item');
		location.innerText = `Age: ${profile.location}`;
		details.appendChild(location);

		let interests = document.createElement('li');
		interests.setAttribute('class', 'list-group-item');
		interests.innerText = 'Interests: ';
		Object.values(profile.tags).forEach(tag => {
			interests.innerHTML += `${tag} <br />`
		});
		details.appendChild(interests);

		let footer = document.createElement('div');
		footer.setAttribute('class', 'card-footer text-center');
		card.appendChild(footer);

		let viewProfBtn = document.createElement('a');
		viewProfBtn.setAttribute('class', 'btn btn-primary');
		viewProfBtn.setAttribute('href', `/user/${profile.userID}`);
		viewProfBtn.innerText = 'View profile';
		footer.appendChild(viewProfBtn);

		counter++;
		if (counter % 2 == 0)
			$('#resultsContainer').append('<div class="w-100 d-none d-sm-block d-md-none" />');
		if (counter % 3 == 0)
			$('#resultsContainer').append('<div class="w-100 d-none d-md-block d-xxl-none" />');
	});
}