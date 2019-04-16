<?php
<<<<<<< HEAD
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
=======

/**
 * Pages controller: This controller handles all data transfers for any view within the 'pages' directory. Each method
 * corresponds to a view (the name must be EXACTLY the same).
 */
class Pages extends Controller {

    /**
     * Index: THIS METHOD IS REQUIRED. It helps prevent access to the application directory index and is the
     * default method that is called when no method is specified in the URL. For example, without this method, if
     * someone typed "localhost/bookit/pages" into the browser, without a method, THE PROGRAM WOULD CRASH because
     * an index method would not be found. Use this method to redirect to another page.
     */
    public function index() {
        Redirect::to('pages/calendar');
    }

    /**
     * Calendar: Loads the calendar view with any data that is necessary. Note, this class is only accessible if the
     * user is logged in. Otherwise, it redirects to the login page.
     */
    public function calendar() {
        if (Session::isLoggedIn()) {
            $this->view('pages/calendar');
        } else {
            Redirect::to('users/login');
        }
    }

    /**
     * 404: Loads the 404 page not found view.
     */
    public function not_found() {
        $this->view('pages/not_found');
>>>>>>> 7aee0329b603842ae9a36944b3956e7c950aee86
    }
    public function not_found() {
        $data = [
            'title' => SITE_NAME
        ];
        $this->view('pages/not_found', $data);
    }
}