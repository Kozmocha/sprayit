<?php

/**
 * Auth class: Library used for universal authentication procedures.
 */
class Auth {

    /**
     * Sanitize String: Used to sanitize a string for database input.
     *
     * @param $_str
     * @return mixed
     *
     * @author Christopher Thacker
     */
    public static function sanitizeString($_str) {
        return filter_var($_str, FILTER_SANITIZE_STRING);
    }

    /**
     * Sanitize Email: Used to sanitize an email for database input.
     *
     * @param $_email
     * @return mixed
     *
     * @author Christopher Thacker
     */
    public static function sanitizeEmail($_email) {
        return filter_var($_email, FILTER_SANITIZE_EMAIL);
    }
}