<?php

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
     * 404: Loads the 404 page not found view.
     */
    public function not_found() {
        $this->view('pages/not_found');
    }
}