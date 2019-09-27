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
		url: '/chat/getdialogues/',
		type: 'get',
		success: dialoguesJSON => {
			let dialogues = JSON.parse(dialoguesJSON);
			Object.keys(dialogues).forEach(dialogue => {
				console.log(dialogues[dialogue]);
				let dialogueLi = document.createElement('li');
				let dialogueDiv = document.createElement('div');
				let avatarDiv = document.createElement('div');
				let infoDiv = document.createElement('div');
				
			});
		}
	});
};

$(document).ready(() => {
	$('#action_menu_btn').click(() =>{
		$('.action_menu').toggle();
	});
	loadMessages();
	console.log('ok');
});