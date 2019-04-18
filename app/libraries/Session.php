<?php

class Session {
    /**
     * Sanitize POST: Returns a sanitized version of the $_POST associative array without overriding it.
     *
     * @return mixed
     * @author Christopher Thacker
     */
    public static function sanitizePost() {
        return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }

    /**
     * Check if User is Logged In: Checks if a a user is logged in; returns true if they are, false if not.
     *
     * @return bool
     * @author Christopher Thacker
     */
    public static function isLoggedIn() {
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }

    /**
     * If the request method is POST: Returns true if the server's request method is 'POST', false if not.
     *
     * @return bool
     * @author Christopher Thacker
     */
    public static function isPost() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    /**
     * Returns true if a given field within the $_SESSION array is set, false otherwise.
     *
     * @param $_field
     * @return bool
     * @author Christopher Thacker
     */
    public static function fieldIsSet($_field) {
        return (isset($_SESSION["{$_field}"]));
    }

    /**
     * Returns the specified field if found, false if otherwise.
     *
     * @param $_field
     * @return bool
     * @author Christopher Thacker
     */
    public static function getField($_field) {
        if (self::fieldIsSet($_field)) {
            return ($_SESSION["{$_field}"]);
        }
        return false;
    }
}