<?php

/*
 * App SprayitCore Class
 * Creates URL and loads SprayitCore controller
 * URL Format -/controller/method/params
 */

class SprayitCore {

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        // print_r($this->getURL());
        $url = $this->getURL();

        // Look in controllers for first value
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // If exists, set as controller
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate the controller class
        $this->currentController = new $this->currentController;

        // Check for second part of url
        if (isset($url[1])) {
            // Check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];

                // Unset 1 index.php
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        try {
            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        } catch (\Exception $e) {
            Redirect::to('pages/not_found');
        }

    }

    // Method to fetch URL and create array
    public function getURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
