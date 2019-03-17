<?php

class Pages extends Controller {

    public function __construct() {

    }

    public function index() {
        $data = [
            'title' => SITENAME,
            'description' => MOTTO
        ];

        $this->view('pages/index', $data);
    }

    public function calendar() {
        $data = [
            'title' => SITENAME,
            'description' => COMINGSOON
        ];
        $this->view('pages/calendar', $data);
    }
}