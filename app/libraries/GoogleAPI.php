<?php
/**
 * Created by PhpStorm.
 * User: Yanni
 * Date: 4/5/2019
 * Time: 8:02 PM
 */

require ("../vendor/autoload.php");
$scope = 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/calendar';

$client = new Google_Client();
$client->setApplicationName('BookIt');
$client->setClientId("601469690265-ur4a5vfj2mkpeim0lhik9pjrvu4lruj1.apps.googleusercontent.com");
$client->setClientSecret('erGg1m-Msi8kxG93GwHnwNfP');
$client->setScopes($scope);
$client->setRedirectUri('http://localhost/bookit/users/user_type');
$auth_url = $client->createAuthUrl();
echo "<a href='$auth_url'>Login Through Google </a>";
$code = isset($_GET['code']) ? $_GET['code'] : NULL;
//prepare callback Login URL with permission
if(isset($code)) {
    try {
        $token = $client->fetchAccessTokenWithAuthCode($code);
        $client->setAccessToken($token);
    }catch (Exception $e){
        echo $e->getMessage();
    }
    try {
        $pay_load = $client->verifyIdToken();
    }catch (Exception $e) {
        echo $e->getMessage();
    }
} else{
    $pay_load = null;
}
if(isset($pay_load)){

}
