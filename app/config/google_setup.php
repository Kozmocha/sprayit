<?php

$client = new Google_Client();
$client->setApplicationName('BookIt');
$client->setClientId($config['google']['id']);
$client->setClientSecret($config['google']['secret']);
$client->setScopes($config['google']['scope']);
$client->setRedirectUri($config['google']['callback_url']);

//instantiate Google OAuth2 service
$oauth2 = new Google_Service_Oauth2($client);

//prepare callback Login URL with permission
$googleLoginUrl = $client->createAuthUrl();