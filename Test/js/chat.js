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

let dialogues;

const loadMessages = () => {
	$.ajax({
		url: './getJSON.php',
		type: 'get',
		success: dialoguesJSON => {
			dialogues = JSON.parse(dialoguesJSON);
			Object.keys(dialogues).forEach(key => {
				let dialogue = dialogues[key];
				console.log(dialogue);

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
	let target;
	if (event.target.classList.contains('dialogue'))
		target = event.target;
	else
		target = event.target.closest('.dialogue');
	let selectedDialogue = target.getAttribute('name');
	let counterpart = dialogues[selectedDialogue];

	Array.from(document.getElementsByClassName('dialogue')).forEach(
		dialogue => {dialogue.classList.remove('active')});
	target.classList.add('active');

	$('#selectedAvatar').attr('src', counterpart.avatar);
	$('#title').text(`Chat with ${counterpart.firstName} ${counterpart.lastName}`);
	$('#selectedOnline').attr('class', getOnlineClass(counterpart));
	$('#counter').text(`${Object.keys(counterpart.messages).length} messages`);

	Array.from(counterpart.messages).forEach(message =>{
		let messageBox = document.createElement('div');
		let just = (message.sender == 'they') ? 'start' : 'end';
		messageBox.setAttribute('class', `d-flex justify-content-${just} mb-4`);

		let avatarDiv = document.createElement('div');
		avatarDiv.setAttribute('class', 'img_cont_msg');
		let avatar = document.createElement('img');
		avatar.setAttribute('class', 'rounded-circle user_img_msg');
		let userpic = (message.sender == 'they') ? message.avatar : dialogues.userpic;
		avatar.setAttribute('src', userpic);

		let messageDiv = document.createElement('div');
		messageDiv.setAttribute('class', 'msg_cotainer');
		messageDiv.innerText = message.text;
		let messageTime = document.createElement('span');
		messageTime.setAttribute('class', 'msg_time');
		messageTime.innerText = message.time;

		$('#messagesBlock').append(messageBox.append(avatarDiv.append(avatar)).append(messageDiv.append(messageTime)));
	});
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

$(document).ready(() => {
	$('#action_menu_btn').click(() =>{
		$('.action_menu').toggle();
	});
	loadMessages();
	console.log('ok');
});