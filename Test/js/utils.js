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