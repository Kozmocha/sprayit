<?php

class Pages extends Controller {

    public function __construct() {

    }

    public function index() {
        $data = [
            'title' => 'BookIt',
            'description' => 'Let us set the <span class="red">appointments</span> so you have more time to do the things you <span class="green">need </span>to.'
        ];

        $this->view('pages/index', $data);
    }

    public function register() {
        $data = [
            'title' => 'Registration',
            'description' => 'Here is where to register'
        ];

        $this->view('pages/register', $data);
    }
}
