<?php

	require_once 'vendor/autoload.php';
	$client = new Google_Client;
	$client->setAuthConfig('client_secret.json');
	$client->setApplicationName("BookIt");
	$redirect_uri = 'http://localhost/BookIt/calendar.php';
	$client->setRedirectUri($redirect_uri);
	$client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
