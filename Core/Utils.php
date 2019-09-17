<?PHP

/*
 * This request contains an API token, so, for safety reasons,
 * it must be formed and executed on server side only.
 */

function getCoordinates($ipAddress) {
	$result = array();

	$requestURI = 'https://ipfind.co';
	$auth = '1efff2bf-2b6b-4ade-9d4b-a08bfa5b75a0';
	$url = $requestURI . "?ip=" . $ipAddress . "&auth=" . $auth;
	$document = file_get_contents($url);
	$response = json_decode($document);
	
	$result['longitude'] = $response->longitude;
	$result['latitude'] = $response->latitude;
	return $result;
}

?>