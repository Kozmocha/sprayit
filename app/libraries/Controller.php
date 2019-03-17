<?php

/*
 * Base Controller
 * Loads the models and views
 */

class Controller {

    // Load the model
    public function model($_model) {
        // Require model file
        require_once '../app/models/' . $_model . '.php';

        // Instantiate the model
        return new $_model();
    }

    // Load the view
    public function view($_view, $_data = []) {
        // Check for view file
        if (file_exists('../app/views/' . $_view . '.php')) {
            require_once '../app/views/' . $_view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}
