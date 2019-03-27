<?php

class Redirect {
    public function __construct() {

    }

    public function redirect($_page) {
        header('location: ' . URLROOT . '/' . $_page);
    }

}