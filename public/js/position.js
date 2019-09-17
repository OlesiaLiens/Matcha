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

/*
 * This function tries to get GPS from a browser, which will succeed
 * if a user's browser supports it and if a user grants a permisson to
 * use their location.
 *
 * In case of success, a POST request is sent to a file specified in
 * the single parameter. The request contains "gps=success" followed
 * by the latitute and longtitude the browser provided.
 *
 * In case of fail for any reason, it makes a request to ipify to
 * obtain the user's IP, and sends it to the specified receiver
 * along with "gps=fail".
 *
 * NOTE: serverSideReceiver may be hardcoded later, no reason to
 * keep it a variable.
 */

const getGPS = serverSideReceiver => {
	const xhr = new XMLHttpRequest();
	xhr.open("POST", serverSideReceiver);

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(position => {
			let lat = position.coords.latitude;
			let lon = position.coords.longitude;
			xhr.send('gps=success&latitude=' + lat + '&longitude=' + lon);
		}, error => {
			const ipReq = new XMLHttpRequest();
			ipReq.onload = () => {
				xhr.send('gps=fail&ip=' + ipReq.responseText);
			}
			ipReq.open("GET", 'https://api.ipify.org', true);
			ipReq.send(null);
		});		
	}
}