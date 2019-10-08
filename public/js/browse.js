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

/* I know this creates hella load and makes transaction time
   super long, but the deadlines are too close */
const getUserGallery = () => {
	$.ajax({
		url: '/browse/getusers',
		type: 'get',
		success: response => {
			console.log(JSON.parse(response));
			
		}
	})
}

$(document).ready(() => {

	getUserGallery();

});