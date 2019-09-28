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

/* Declare a jQuery function that creates an element
   with given properties */ 
$.extend({
	elem: function(elem, props) {
		var $elem = $(document.createElement(elem));
		$elem.attr(props);
		return $elem;
	}
});

const loadMessages = () => {
	$.ajax({
		url: './getJSON.php',
		type: 'get',
		success: dialoguesJSON => {
			let dialogues = JSON.parse(dialoguesJSON);
			Object.values(dialogues).forEach(dialogue => {
				console.log(dialogue);
				let dialogueLi = document.createElement('li');
				let dialogueDiv = document.createElement('div');
				let avatarDiv = document.createElement('div');
				let infoDiv = document.createElement('div');
				
				dialogueLi.setAttribute('class', 'dialogue');
				// dialogueLi.onclick = openDialogue;
				$('#contacts').append(dialogueLi.append(
					$.elem('div', {'class' : 'd-flex bd-highlight'}).append(
						$.elem('div', {'class' : 'img_cont'}).append(
							$.elem('img', {
								'src' : '',
								'class' : 'rounded-circle user_img'
							}).append(
							$.elem('span', {'class' : getOnlineClass(dialogue)})
						)
					).append(
						$.elem('div', {'class' : 'user_info'}).append(
							$.elem('span')
							.text('${dialogue[firstName]} ${dialogue[lastName]}')	
						).append(
							$.elem('p').text(getOnlineText(dialogue))
						)
					)
				)));
			});
		}
	});
};

function getOnlineClass() {return 'online-icon'}
function getOnlineText() {return 'kek'}

// elem.append(
//     $.el('div', {'class': 'wrapper'}).append(
//         $.el('div', {'class': 'inner'}).append(
//             $.el('span').text('Some text')
//         )
//     )
//     .append(
//         $.el('div', {'class': 'inner'}).append(
//             $.el('span').text('Other text')
//         )
//     )
// );

$(document).ready(() => {
	$('#action_menu_btn').click(() =>{
		$('.action_menu').toggle();
	});
	loadMessages();
	console.log('ok');
});