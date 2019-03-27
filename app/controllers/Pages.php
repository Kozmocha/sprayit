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

    public function not_found() {
        $data = [
            'title' => SITENAME
        ];
        $this->view('pages/not_found', $data);
    }
}
