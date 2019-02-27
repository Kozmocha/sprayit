<?php
session_start();

//Contains the necessary Google APIs.
require_once('../models/GoogleApi.php');

//Contains necessary client_secret information to use the various Google APIs.
require_once('../settings.php');

//Google's API passes a parameter value for an authorization code within the redirect URL. This 'code' will grant us the ability to make a login call to grab an access token.
if(isset($_GET['code'])) {
	try {

		//Creates an API object.
		$api = new GoogleApi();
		
		//Grabs the access token using credentials and the authorization code that was given by Google.
		$data = $api->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		//The retrieved access token is saved as a session variable. This allows the information to be used across multiple pages and will not be stored on the user's computer.
		$_SESSION['access_token'] = $data['access_token'];

		//Redirects to the page where an event can be created.
		header('Location: home.php');
		exit();
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}

?>
<!DOCTYPE html>
<html>
<body>

<?php

$login_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';

?>

<a href="<?= $login_url ?>">Login with Google</a>

</body>
</html>