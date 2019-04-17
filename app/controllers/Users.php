<?php

require_once APP_ROOT . '/models/User.php';

/**
 * Users controller: This controller is used to handle all data transfers for any view within the 'users' directory.
 * Each method corresponds to a view (names must be EXACTLY the same).
 */
class Users extends Controller {

    /**
     * Index: THIS METHOD IS REQUIRED. It helps prevent access to the application directory index and is the
     * default method that is called when no method is specified in the URL. For example, without this method, if
     * someone typed "localhost/bookit/users" into the browser, without a method, THE PROGRAM WOULD CRASH because
     * an index method would not be found. Use this method to redirect to another page.
     */
    public function index() {
        Redirect::to('users/login');
    }

    /**
     * Login: Transfers login form data from the login view to the User model to be handled. First checks if the user
     * logged in, redirecting them to the calendar page if so.
     */
    public function login() {
        if (Session::isLoggedIn()) {
            Redirect::to('pages/calendar');
        }
        if (Session::isPost()) {
            $post = Session::sanitizePost();
            $data = [
                'email' => trim($post['email']),
                'password' => trim($post['password'])
            ];
            if (User::authenticate($post['email'], $post['password'])) {
                Redirect::to('pages/calendar');
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $this->view('users/login');
        }
    }

    /*
     * Register: Registers new users. No need to check if user is logged in because the login function would have redirected
     * them already.
     */

    /*
     * 1. Get Data
     * 2. Sanitize it
     * 3. Make sure there aren't duplicated users by checking email
     * 4. Redirect them to their userpage
     */
    public function register(){
        $this->view("users/register");
    }


//    public function google_login(){
//
//        require ("../vendor/autoload.php");
//        $scope = 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/calendar';
//
//        $client = new Google_Client();
//        $client->setApplicationName('BookIt');
//        $client->setClientId("601469690265-ur4a5vfj2mkpeim0lhik9pjrvu4lruj1.apps.googleusercontent.com");
//        $client->setClientSecret('erGg1m-Msi8kxG93GwHnwNfP');
//        $client->setScopes($scope);
//        $client->setRedirectUri('http://localhost/bookit/users/user_type');
//
//        $auth_url = $client->createAuthUrl();
//        //$auth_url = $client->createAuthUrl($_SERVER['REQUEST_METHOD'] == 'POST');
//        echo "<a href='$auth_url'>Login Through Google </a>";
//        $code = isset($_GET['code']) ? $_GET['code'] : NULL;
//        //prepare callback Login URL with permission
//        if(isset($code)) {
//            try {
//                $token = $client->fetchAccessTokenWithAuthCode($code);
//                $client->setAccessToken($token);
//            }catch (Exception $e){
//                echo $e->getMessage();
//            }
//            try {
//                $pay_load = $client->verifyIdToken();
//            }catch (Exception $e) {
//                echo $e->getMessage();
//            }
//        } else{
//            $pay_load = null;
//        }
//        if(isset($pay_load)){
//
//        }
//        $this->view('users/contractor_register');
//    }
}
