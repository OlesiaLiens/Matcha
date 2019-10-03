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

let seeCounter;
let likeCounter;
let matchCounter;
let msgsCounter;

const checkUpdates = () => {
	$.ajax({
		url: '/notification/getcounters',
		type: 'get',
		success: countersJSON => {
			let counters = JSON.parse(countersJSON);
			let newSee = counters.see;
			let newLike = counters.like;
			let newMatch = counters.match;
			let newMsgs = counters.msgs;

			if (newSee > seeCounter) {
				notify('see');
				seeCounter = newSee;
			}
			if (newLike > likeCounter) {
				notify('like');
				likeCounter = newLike;
			}
			if (newLike < likeCounter) {
				notify('unlike');
				likeCounter = newLike;
			}
			if (newMatch > matchCounter) {
				notify('match');
				matchCounter = newMatch;
			}
			if (newMatch < matchCounter) {
				notify('unmatch');
				matchCounter = newMatch;
			}
			if (newMsgs > msgsCounter) {
				notify('msgs');
				msgsCounter = newMsgs;
			}
		}
	});
};

// TODO: Create hullabaloo notifications with these messages
function notify(typeOfEvent) {
	if (typeOfEvent == 'see') {
		console.log('Someone has a great interest int your profile...')
	}
	if (typeOfEvent == 'like') {
		console.log('Congrats! Someone has liked you!')
	}
	if (typeOfEvent == 'unlike') {
		console.log('Too bad! Someone who liked you previously doesn\'t like you anymore :(')
	}
	if (typeOfEvent == 'match') {
		console.log('Yay! You matched with someone, check the chat now to see who that was!')
	}
	if (typeOfEvent == 'unmatch') {
		console.log('Too bad, someone you previously matched with isn\'t that fond of you now :(')
	}
	if (typeOfEvent == 'msgs') {
		console.log('Hey! Check the chat, someone wrote you!')
	}
}

$(document).ready(() => {
	$.ajax({
		url: '/notification/getcounters',
		type: 'get',
		success: countersJSON => {
			let counters = JSON.parse(countersJSON);
			console.log(counters);
			seeCounter = counters.see;
			likeCounter = counters.like;
			matchCounter = counters.match;
			msgsCounter = counters.msgs;
			setInterval(checkUpdates, 5000);
		}
	});
});