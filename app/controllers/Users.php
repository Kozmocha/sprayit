<?php

require_once APP_ROOT . '/models/User.php';

class Users extends Controller {

    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function login() {

        if (Session::isLoggedIn()) {
            Redirect::to('pages/calendar');
        }

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

    public function contractor_register() {
        $data = [
            'title' => SITE_NAME,
            'description' => MOTTO
        ];

        $this->view('users/contractor_register', $data);
    }

    public function client_register() {
        $data = [
            'title' => SITE_NAME,
            'description' => MOTTO
        ];

        $this->view('users/client_register', $data);
    }

    public function user_type() {
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

        $data = [
            'title' => SITE_NAME,
            'description' => MOTTO,
            'instructions' => TYPE_INSTRUCTIONS
        ];
        $this->view('users/user_type', $data);
    }
}
