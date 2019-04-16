<?php

require_once APP_ROOT . '/models/User.php';

<<<<<<< HEAD
    public function __construct() {
        $this->userModel = $this->model('User');
=======
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
>>>>>>> 7aee0329b603842ae9a36944b3956e7c950aee86
    }

    /**
     * Login: Transfers login form data from the login view to the User model to be handled. First checks if the user
     * logged in, redirecting them to the calendar page if so.
     */
    public function login() {
        if (Session::isLoggedIn()) {
            Redirect::to('pages/calendar');
        }
<<<<<<< HEAD
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = Session::sanitizePost();
            $data = [
                'email' => trim($post['email']),
                'password' => trim($post['password'])
            ];
            // TODO: For future error identification.
            $errors = [
                'email_err' => '',
                'password_err' => ''
            ];
            $isLoggedIn = User::authenticate($post['email'], $post['password']);
            if ($isLoggedIn) {
                Redirect::to('pages/calendar');
            } else {
                $this->view('users/login', $data, $errors);
            }
        } else {
            $data = [
                'email' => '',
                'password' => ''
            ];
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
//        $_SESSION['user_name'] = $user->name;

        redirect('calendar');
    }

    public function client_register() {

        $this->view('users/client_register');

        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Process the form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init Data
            $_data =[
                'fname' => trim($_POST['fname']),
                'lname' => trim($_POST['lname']),
                'city' => trim($_POST['city']),
                'state' => trim($_POST['state']),
                'zip' => trim($_POST['zip']),
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'confirm_email' => trim($_POST['confirm_email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'fname_err' => '',
                'lname_err' => '',
                'city_err' => '',
                'state_err' => '',
                'zip_err' => '',
                'phone_err' => '',
                'email_err' => '',
                'confirm_email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            //Validate First Name
            if(empty($_data['fname'])){
                $_data['fname_err'] = 'Please enter a first name';
            }

            //Validate Last Name
            if(empty($_data['lname'])){
                $_data['lname_err'] = 'Please enter a last name';
            }

            //Validate city
            if(empty($_data['city'])){
                $_data['city_err'] = 'Please enter a city';
            }

            //Validate Email
            if(empty($_data['state'])){
                $_data['state_err'] = 'Please enter a state';
            }

            //Validate Email
            if(empty($_data['zip'])){
                $_data['zip_err'] = 'Please enter a zipcode';
            }

            //Validate Phone
            if(empty($_data['phone'])){
                $_data['phone_err'] = 'Please enter a phone number';
            }

            //Validate Email
            if(empty($_data['email'])){
                $_data['email_err'] = 'Please enter email';
            }

            //Validate Ccnfirm_email
            if(empty($_data['confirm_email'])){
                $_data['confirm_email_err'] = 'Please enter email';
            }

            //Validate Password
            if(empty($_data['password'])){
                $_data['password_err'] = 'Please enter a password';
            } elseif (strlen($_data['password']) < 6){
                $_data['password_err'] = 'Password must be at least 6 characters';
            }

            //Validate Confirm Password
            if(empty($_data['confirm_password'])){
                $_data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($_data['password'] != $_data['confirm_password_err']){
                    $_data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            //Make sure errors are empty
            if(empty($_data['fname_err']) && empty($_data['lname_err'])&& empty($_data['city_err'])&& empty($_data['state_err'])
                && empty($_data['zip_err'])&& empty($_data['phone_err'])&& empty($_data['email_err'])&& empty($_data['confirm_email_err'])
                && empty($_data['password'])&& empty($_data['confirm_password_err'])){
                //Validate
                die('SUCCESS');
            } else {
                //Load view with errors
                $this->view('Users/client_register', $_data);
            }

        } else {
            //Init data
            $_data =[
                'fname' => '',
                'lname' => '',
                'city' => '',
                'state' => '',
                'zip' => '',
                'phone' => '',
                'email' => '',
                'confirm_email' => '',
                'password' => '',
                'confirm_password' => '',
                'fname_err' => '',
                'lname_err' => '',
                'city_err' => '',
                'state_err' => '',
                'zip_err' => '',
                'phone_err' => '',
                'email_err' => '',
                'confirm_email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            //Load view
//            $this->view('users/client_register', $data);
=======

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
>>>>>>> 7aee0329b603842ae9a36944b3956e7c950aee86
        }
    }

    /**
     * Contractor registration: Transfers registration form data (contractor-specific) from the contractor_register
     * view to the User model to be handled. NOT YET IMPLEMENTED.
     */
    public function contractor_register() {
<<<<<<< HEAD
        $data = [
            'title' => SITE_NAME,
            'description' => MOTTO
        ];

        $this->view('users/contractor_register', $data);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init Data
            $_data = [
                'coname' => trim($_POST['coname'])
            ];

            //Validate First Name
            if(empty($_data['coname'])){
                $_data['coname_err'] = 'Please enter a first name';
            }

        }
    }

    public function google_login(){

        require ("../vendor/autoload.php");
        $scope = 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/calendar';

        $client = new Google_Client();
        $client->setApplicationName('BookIt');
        $client->setClientId("601469690265-ur4a5vfj2mkpeim0lhik9pjrvu4lruj1.apps.googleusercontent.com");
        $client->setClientSecret('erGg1m-Msi8kxG93GwHnwNfP');
        $client->setScopes($scope);
        $client->setRedirectUri('http://localhost/bookit/users/user_type');

        $auth_url = $client->createAuthUrl();
        //$auth_url = $client->createAuthUrl($_SERVER['REQUEST_METHOD'] == 'POST');
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

=======
        $this->view('users/contractor_register');
    }

    /**
     * Client registration: Transfers registration form data (client-specific) from the client_register view to the
     * User model to be handled. NOT YET IMPLEMENTED.
     */
    public function client_register() {
        $this->view('users/client_register');
>>>>>>> 7aee0329b603842ae9a36944b3956e7c950aee86
    }

    /**
     * User type: Gets the data from the user_type view and asks the User model which type of user they are. The
     * response determines which redirect to use or if the view is to be loaded again.
     */
    public function user_type() {
<<<<<<< HEAD
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST["user_type"] == "client") {
                Redirect::to('users/client_register');
                //exit;
            }
            if ($_POST["user_type"] == "contractor") {
                Redirect::to('users/contractor_register');
                //exit;
            }
        }

=======
        if (Session::isPost()) {
            if (User::isClient()) {
                Redirect::to('users/client_register');
            } else if (User::isContractor()) {
                Redirect::to('users/contractor_register');
            }
        }
>>>>>>> 7aee0329b603842ae9a36944b3956e7c950aee86
        $this->view('users/user_type');
    }


}
