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
let constraints = {
	minAge : 18, // Let's play it safe and assume the site isn't suitable for minors
	maxAge : 116, // The oldest known person alive is 116 years old
	reqTags : false
};

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
			responseObj = JSON.parse(response);
			ownLongitude = responseObj.longitude;
			ownLatitude = responseObj.latitude;
			ownTags = responseObj.tags;
			console.log('Longitude: ', ownLongitude)
			console.log('Latitude: ', ownLatitude)
			console.log('Tags: ', ownTags)
		}
	})
}

/* I know this creates hella load and makes transaction time
   super long, but the deadlines are too close */
const getUserGallery = () => {
	$.ajax({
		url: '/browse/getusers',
		type: 'get',
		success: response => {
			console.log(response);
			responseObj = JSON.parse(response);
			Object.values(responseObj).forEach(profile =>{
				console.log(profile);
				let card = document.createElement('div');
				card.setAttribute('class', 'card mb-4');

				let avatar = document.createElement('img');
				avatar.setAttribute('class', 'card-img-top');
				avatar.setAttribute('src', profile.avatar);
				card.appendChild(avatar);

				let cb = document.createElement('div');
				cb.setAttribute('class', 'card-body hideable collapse');
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
				details.setAttribute('class', 'list-group list-group-flush hideable collapse');
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

				// avatar.onclick = () => {
				// 	$(cb).toggle('slow');
				// 	$(details).toggle('slow');
				// }
				card.profile = profile;
				card.profile.distance = getDistance(ownLatitude,
																						ownLongitude,
																						card.profile.latitude,
																						card.profile.longitude);
				cards.push(card);
				resultsContainer.appendChild(card);
			});
			$('img').click(function() {
				$(this).siblings('.hideable').toggle('slow');
			});
			console.log(cards);
		}
	})
}

// I repeat myself a lot here, redo this with array & callback using "this"
const setFilterControl = () => {
	$('#minAge').change(() => {
		constraints.minAge = $('#minAge').children('option:selected').val();
		filterResults();
	})
	$('#maxAge').change(() => {
		constraints.maxAge = $('#maxAge').children('option:selected').val();
		filterResults();
	})
	$('#minDist').blur(() => {
		constraints.minDist = $('#minDist').val();
		filterResults();
	})
	$('#maxDist').blur(() => {
		constraints.maxDist = $('#maxDist').val();
		filterResults();
	})
	$('#minRate').blur(() => {
		constraints.minRate = $('#minRate').val();
		filterResults();
	})
	$('#maxRate').blur(() => {
		constraints.maxRate = $('#maxRate').val();
		filterResults();
	})
	$('#reqTags').change(event => {
		if(event.target.checked)
			constraints.reqTags = true;
		else
			constraints.reqTags = false;
		filterResults();
	})

	$('#sortCriteria').change(() => {
		sortResults($('#sortCriteria').val(), $('#sortDirection').val())
	})
	$('#sortDirection').change(() => {
		sortResults($('#sortCriteria').val(), $('#sortDirection').val())
	})
}

const filterResults = () => {
	Object.values(cards).forEach(card => {
		if (meetsConstraints(card.profile))
			$(card).show();
		else
			$(card).hide();
	});
}

function meetsConstraints(profile) {
	if (profile.age < constraints.minAge)
		return false;
	if (profile.age > constraints.maxAge)
		return false;
	if (profile.rate < constraints.minRate)
		return false;
	if (profile.rate > constraints.maxRate)
		return false;
	if (profile.distance < constraints.minDist)
		return false;
	if (profile.distance > constraints.maxDist)
		return false;
	if (constraints.reqTags &&
		!(profile.tags.some(tag => {return ownTags.includes(tag)})))
		return false;
	return true;
}

const sortResults = (criterium, direction) => {
	let modifier = direction == 'htl' ? 1 : -1;
	console.log(criterium);
	console.log(modifier);
	switch (criterium) {
		case 'age':
			sortByAge(modifier);
			break;
		case 'distance':
			sortByDistance(modifier);
			break;
		case 'rating':
			sortByRating(modifier);
			break;
		case 'tags':
			sortByTags(modifier);
			break;
		default:
			console.log('You\'re holding it wrong')
			break;
	}
	$('img').click(function() {
				$(this).siblings('.hideable').toggle('slow');
			});
}

const sortByAge = modifier => {
	if (cards.length < 2) return;

	for (var i = 1; i < cards.length; i++) {
		if ((cards[i].profile.age) * modifier < (cards[i - 1].profile.age) * modifier) {
			let bufferProfile = cards[i].profile;
			let bufferHTML = $(cards[i]).html();
			$(cards[i]).html($(cards[i - 1]).html());
			cards[i].profile = cards[i - 1].profile;
			$(cards[i - 1]).html(bufferHTML);
			cards[i - 1].profile = bufferProfile;
			i = 0;
		}
	}
}

const sortByDistance = modifier => {
	if (cards.length < 2) return;

	for (var i = 1; i < cards.length; i++) {
		if ((cards[i].profile.distance) * modifier < (cards[i - 1].profile.distance) * modifier) {
			let bufferProfile = cards[i].profile;
			let bufferHTML = $(cards[i]).html();
			$(cards[i]).html($(cards[i - 1]).html());
			cards[i].profile = cards[i - 1].profile;
			$(cards[i - 1]).html(bufferHTML);
			cards[i - 1].profile = bufferProfile;
			i = 0;
		}
	}
}

const sortByRating = modifier => {
	if (cards.length < 2) return;

	for (var i = 1; i < cards.length; i++) {
		if ((cards[i].profile.rating) * modifier < (cards[i - 1].profile.rating) * modifier) {
			let bufferProfile = cards[i].profile;
			let bufferHTML = $(cards[i]).html();
			$(cards[i]).html($(cards[i - 1]).html());
			cards[i].profile = cards[i - 1].profile;
			$(cards[i - 1]).html(bufferHTML);
			cards[i - 1].profile = bufferProfile;
			i = 0;
		}
	}
}

const sortByTags = modifier => {
	if (cards.length < 2) return;

	for (var i = 1; i < cards.length; i++) {
		if (countCommonTags(cards[i].profile.tags) * modifier < countCommonTags(cards[i - 1].profile.tags) * modifier) {
			let bufferProfile = cards[i].profile;
			let bufferHTML = $(cards[i]).html();
			$(cards[i]).html($(cards[i - 1]).html());
			cards[i].profile = cards[i - 1].profile;
			$(cards[i - 1]).html(bufferHTML);
			cards[i - 1].profile = bufferProfile;
			i = 0;
			console.log('flip')
		}
	}
}

const countCommonTags = counterpartTags => {
	let intersection = ownTags.filter(tag => counterpartTags.includes(tag));
	console.log('OTags', ownTags)
	console.log('CPags', counterpartTags)
	console.log('INTER', intersection)
	return intersection.length;
}

$(document).ready(() => {
	fillOptions();
	getOwnData();
	getUserGallery();
	setFilterControl();
});