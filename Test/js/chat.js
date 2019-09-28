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

const loadMessages = () => {
	$.ajax({
		url: './getJSON.php',
		type: 'get',
		success: dialoguesJSON => {
			let dialogues = JSON.parse(dialoguesJSON);
			Object.values(dialogues).forEach(dialogue => {
				console.log(dialogue);

				let contacts = document.getElementById('contacts');
				let dialogueLi = document.createElement('li');
				dialogueLi.setAttribute('class', 'dialogue');
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

	Array.from(document.getElementsByClassName('dialogue')).forEach(
		dialogue => {dialogue.classList.remove('active')});
	target.classList.add('active');
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