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

let useravatar = '';
let dialogues;
let counterpart;
let msgCounter;
let interval;

const getAvatar = () => {
	$.ajax({
		url: '/chat/getavatar',
		type: 'get',
		success: response => {useravatar = response}
	});
}

const loadMessages = () => {
	$.ajax({
		url: '/chat/getdialogues/',
		type: 'get',
		success: dialoguesJSON => {
			dialogues = JSON.parse(dialoguesJSON);
			console.log(dialogues);
			Object.keys(dialogues).forEach(key => {
				let dialogue = dialogues[key];

				let contacts = document.getElementById('contacts');
				let dialogueLi = document.createElement('li');
				dialogueLi.setAttribute('class', 'dialogue');
				dialogueLi.setAttribute('name', key);
				dialogueLi.onclick = openDialogue;
				let dialogueDiv = document.createElement('div');
				dialogueDiv.setAttribute('class', 'd-flex bd-highlight');
				let avatarDiv = document.createElement('div');
				avatarDiv.setAttribute('class', 'img_cont');
				let avatar = document.createElement('img');
				avatar.setAttribute('class', 'rounded-circle user_img');
				avatar.src = dialogue.avatar;
				let onlineIcon = document.createElement('span');
				onlineIcon.setAttribute('class', getOnlineClass(dialogue));
				let infoDiv = document.createElement('div');
				infoDiv.setAttribute('class', 'user_info');
				let nameDiv = document.createElement('span');
				nameDiv.innerText = `${dialogue.firstName} ${dialogue.lastName}`;
				let onlineText = document.createElement('p');
				onlineText.innerText = getOnlineText(dialogue);

				avatarDiv.appendChild(avatar);
				avatarDiv.appendChild(onlineIcon);
				infoDiv.appendChild(nameDiv);
				infoDiv.appendChild(onlineText);
				dialogueDiv.appendChild(avatarDiv);
				dialogueDiv.appendChild(infoDiv);
				dialogueLi.appendChild(dialogueDiv);
				contacts.appendChild(dialogueLi);
			});
		}
	});
};

const openDialogue = event => {
	if (typeof interval !== 'undefined')
		clearInterval(interval);
	let target;
	if (event.target.classList.contains('dialogue'))
		target = event.target;
	else
		target = event.target.closest('.dialogue');
	let selectedDialogue = target.getAttribute('name');
	counterpart = dialogues[selectedDialogue];

	Array.from(document.getElementsByClassName('dialogue')).forEach(
		dialogue => {dialogue.classList.remove('active')});
	target.classList.add('active');

	$('#selectedAvatar').attr('src', counterpart.avatar);
	$('#title').text(`Chat with ${counterpart.firstName} ${counterpart.lastName}`);
	$('#selectedOnline').attr('class', getOnlineClass(counterpart));
	msgCounter = Object.keys(counterpart.messages).length;
	$('#counter').text(`${msgCounter} messages`);
	$('#chatHeader').show();

	$('#messagesBlock').empty();
	Array.from(counterpart.messages).forEach(drawMessage);
	interval = setInterval(getUpdates, 10000, counterpart.counterpartID);
}

const getUpdates = id => {
	$.ajax({
		url: '/chat/getupdates/' + id,
		type: 'get',
		success: response => {
			let decoded = JSON.parse(response);
			count = Object.keys(decoded).length;
			if (count > 0) {
				let message = {
					'sender' : 'they',
					'text' : decoded.text,
					'time' : decoded.time
				};
				drawMessage(message);
			}
		}
	});
}

const drawMessage = message => {
	let messageBox = document.createElement('div');
	let just = (message.sender == 'they') ? 'start' : 'end';
	messageBox.setAttribute('class', `d-flex justify-content-${just} mb-4`);

	let avatarDiv = document.createElement('div');
	avatarDiv.setAttribute('class', 'img_cont_msg');
	let avatar = document.createElement('img');
	avatar.setAttribute('class', 'rounded-circle user_img_msg');
	let userpic = message.sender == 'they' ? counterpart.avatar : useravatar;
	avatar.setAttribute('src', userpic);

	let messageDiv = document.createElement('div');
	let msgClassExt = (message.sender == 'they') ? '' : '_send';
	messageDiv.setAttribute('class', `msg_cotainer${msgClassExt}`);
	messageDiv.innerText = message.text;
	let messageTime = document.createElement('span');
	messageTime.setAttribute('class', `msg_time${msgClassExt}`);
	messageTime.innerText = message.time;

	if (message.sender == 'they') {
		$('#messagesBlock').append(
			$(messageBox)
			.append($(avatarDiv).append(avatar))
			.append($(messageDiv).append(messageTime))
		);	
	} else {
		$('#messagesBlock').append(
			$(messageBox)
			.append($(messageDiv).append(messageTime))
			.append($(avatarDiv).append(avatar))
		);
	}
}

const getOnlineClass = dialogue => {
	if (dialogue.lastOnline == 'now')
		return 'online_icon'
	else
		return 'online_icon offline'
}

const getOnlineText = dialogue => {
	if (dialogue.lastOnline == 'now')
		return `${dialogue.firstName} is online`
	else
		return `${dialogue.firstName} was online ${dialogue.lastOnline}`
}

/* This finction is needed because without it, the hours or minutes 
   below 10 would be single-digit, e.g. 16:2, not 16:02 */
const getTimeString = () => {
	var date = new Date();
	currentHours = date.getHours();
	currentHours = ("0" + currentHours).slice(-2);
	currentMinutes = date.getMinutes();
	currentMinutes = ("0" + currentMinutes).slice(-2);
	return `${currentHours}:${currentMinutes}, Today`;
}

$(document).ready(() => {
	$('#action_menu_btn').click(() => {
		$('.action_menu').toggle();
	});
	$('.send_btn').click(() => {
		let message = {
			'sender' : 'you',
			'text' : $('#msgInput').val(),
			'time' : getTimeString()
		};
		drawMessage(message);

		$.ajax({
			url: '/chat/sendmessage'+ '/' + counterpart.counterpartID ,
			type: 'post',
			dataType: 'json',
			data: {"data" : JSON.stringify(message)}
		});

		console.log('/chat/sendmessage'+ '/' + counterpart.counterpartID);

		$('#counter').text(`${msgCounter += 1} messages`);
		$('#msgInput').val('');
		counterpart.messages.push(message);
	});
	getAvatar();
	loadMessages();
	console.log('ok');
});