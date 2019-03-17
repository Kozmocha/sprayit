<?php

class Users extends Controller {
    public function __construct() {

    }

    public function login() {
        $data = [
            'title' => 'BookIt',
            'description' => 'Let us set the <span class="red">appointments</span> so you have more time to do the things you <span class="green">need </span>to.'
        ];

        $this->view('users/login', $data);
    }

    public function register() {
        $data = [
            'title' => 'BookIt',
            'description' => 'Let us set the <span class="red">appointments</span> so you have more time to do the things you <span class="green">need </span>to.'
        ];

        $this->view('users/register', $data);
    }

    public function user_type() {
        $data = [
            'title' => 'BookIt',
            'description' => 'Let us set the <span class="red">appointments</span> so you have more time to do the things you <span class="green">need </span>to.',
            'instructions' => '<span class="blue">Select</span> the type of <span class="pink">account</span> you\'ll be using <span class="purple">BookIt</span> for.'
        ];
        $this->view('users/user_type', $data);
    }
}
