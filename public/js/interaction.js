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

$(document).ready(() => {
	$.ajax({
		url: '/interaction/getInteractions',
		type: 'get',
		dataType: 'json',
		success: response => {
			let likers = response.likers;
			let liked = response.liked;
			let viewers = response.viewers;
			// console.log('Likers', likers);
			// console.log('Liked', liked);
			// console.log('Viewers', viewers);

			Object.values(likers).forEach(liker => {
				$('#likers').append(`
					<li class="list-group-item user" onclick="window.location = '/user/${liker.id}';">
						${liker.first_name} ${liker.last_name}
					</li>
				`)
			});

			Object.values(liked).forEach(crush => {
				$('#liked').append(`
					<li class="list-group-item user" onclick="window.location = '/user/${crush.id}';">
						${crush.first_name} ${crush.last_name}
					</li>
				`)
			});

			Object.values(viewers).forEach(viewer => {
				$('#viewers').append(`
					<li class="list-group-item user" onclick="window.location = '/user/${viewer.id}';">
						${viewer.first_name} ${viewer.last_name}
					</li>
				`)
			});
		}
	})
});