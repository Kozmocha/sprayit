<?php

class Session{
    /**
     * Sanitize POST: Returns a sanitized version of the $_POST associative array without overriding it.
     *
     * @return mixed
     */
    public static function sanitizePost() {
        return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }

    /**
     * Check if User is Logged In: Checks if a a user is logged in; returns true if they are, false if not.
     *
     * @return bool
     */
    public static function isLoggedIn() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * If the request method is POST: Returns true if the server's request method is 'POST', false if not.
     *
     * @return bool
     */
    public static function isPost() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public static function fieldIsSet($_field) {
        return (isset($_POST["{$_field}"]));
    }
}