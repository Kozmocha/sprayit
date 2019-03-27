<?php

class Redirect {
    public function to($_page = null) {
        if($_page) {
            header('location: ' . URLROOT . '/' . $_page);
        }
    }

}