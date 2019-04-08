<?php

class Users extends Controller {

    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function login() {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form
            //Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            //Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter email';
            }

            //Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter a password';
            }

            //Check for user/email
            if($this->userModel->findUserByEmail($data['email'])){
                //User found
            } else {
                //User not found
                $data['email_err'] = 'No User found';
            }

            //Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])){
                //Validated
                //Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                //Load view with errors
                /*
                 * This is where the statment is going to...
                 */
                $this->view('users/login', $data);
            }

        } else {
            //Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            //Load view
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
        }
    }

    public function contractor_register() {
        $data = [
            'title' => SITENAME,
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

        $this->view('users/google_login');
    }

    public function user_type() {

        $this->view('users/user_type');
    }


}
