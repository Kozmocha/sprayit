<?php

class Users extends Controller {

    public function __construct() {

    }

    public function login() {
        $data = [
            'title' => SITENAME,
            'description' => MOTTO
        ];

        $this->view('users/login', $data);
    }

    public function register() {
        $data = [
            'title' => SITENAME,
            'description' => MOTTO
        ];

        $this->view('users/register', $data);
    }

    public function contractor_register() {
        $data = [
            'title' => SITENAME,
            'description' => MOTTO
        ];

        $this->view('users/contractor_register', $data);
    }

    public function client_register() {
        $data = [
            'title' => SITENAME,
            'description' => MOTTO
        ];

        $this->view('users/client_register', $data);
    }

    public function user_type() {
        $data = [
            'title' => SITENAME,
            'description' => MOTTO,
            'instructions' => TYPEINSTRUCTIONS
        ];
        $this->view('users/user_type', $data);
    }
}
