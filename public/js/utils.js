function recursiveFind(object, key) {
	let value;
	Object.keys(object).some(k => {
		if (k === key) {
			value = object[k];
			return true;
		}
		if (object[k] && typeof object[k] === 'object') {
			value = recursiveFind(object[k], key);
			return value !== undefined;
		}
	});
	return value;
}

function isAlphaNumeric(str) {
	let charCode;
	let i;
	let len;

	for (i = 0, len = str.length; i < len; i++) {
		charCode = str.charCodeAt(i);
		if (!(charCode > 47 && charCode < 58) && 
			!(charCode > 64 && charCode < 91) &&
			!(charCode > 96 && charCode < 123) &&
			(charCode != 32))
			return false;
	}
	return true;
}

function emailValid (email) {
	return /\S+@\S+\.\S+/.test(email);
}

function getDistance(latitudeOrig, longitudeOrig, latitudeDest, longitudeDest) {
	let R = 6371; // Radius of the earth in km
	let degLat = deg2rad(latitudeDest - latitudeOrig);
	let degLon = deg2rad(longitudeDest - longitudeOrig);
	let a = 
		Math.sin(degLat/2) * Math.sin(degLat/2) +
		Math.cos(deg2rad(latitudeOrig)) * Math.cos(deg2rad(latitudeDest)) * 
		Math.sin(degLon/2) * Math.sin(degLon/2)
		; 
	let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)); 
	return (R * c); // Distance in km
}

function deg2rad(deg) {
	return deg * (Math.PI/180)
}