<?php
class Pages extends Controller {
    public function __construct() {
    }
    public function index() {
        $data = [
            'title' => SITE_NAME,
            'description' => MOTTO
        ];
        $this->view('pages/index', $data);
    }
    public function calendar() {
        if (!Session::isLoggedIn()) {
            Redirect::to('users/login');
        }
        $data = [
            'title' => SITE_NAME,
            'description' => COMING_SOON
        ];
        $this->view('pages/calendar', $data);
    }
    public function not_found() {
        $data = [
            'title' => SITE_NAME
        ];
        $this->view('pages/not_found', $data);
    }
}