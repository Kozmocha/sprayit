<?php

/**
 * User Model: This is a model for any given user. It handles login authentication and has custom methods related
 * to users.
 */
class User {

    /**
     * The table that this particular object belongs to within the database.
     *
     * @var string
     */
    protected $dataTable = 'user';

    /**
     * Authenticate User Login: Checks the credentials that are passed in as parameters and proceeds to perform
     * the login flow.
     *
     * @param null $_email
     * @param null $_password
     * @param array $_errors
     * @return bool
     */
    public static function authenticate($_email = null, $_password = null, $_errors = []) {
        if ($_email != '' && $_email != null && $_password != '' && $_password != null) {
            $user = DatabaseConnector::findUserByEmail($_email);
        } else {
            return false;
        }

        // If $user is not false.
        if ($user) {

            // Checks the parametrized password against the one found in the database.
            if ($_password == $user->password) {

                // Passwords matched, commence login.
                self::createSession($user);
                return true;
            } else {

                // Passwords did not match.
                return false;
            }
        }
        return false;
    }

    public static function isClient() {
        if (Session::isPost() && Session::fieldIsSet("user_type")) {
            return $_POST["user_type"] == "client";
        } else {
            return false;
        }
    }

    public static function isContractor() {
        if (Session::isPost() && Session::fieldIsSet("user_type")) {
            return $_POST["user_type"] == "contractor";
        } else {
            return false;
        }
    }

    /**
     * Create User Session: Sets the session variables to the passed in user's properties or values.
     *
     * @param $user
     */
    protected static function createSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
    }

    /**
     * Destroy User Session: Un-sets all of the session variables for the logged in user.
     */
    public function destroySession() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        session_destroy();
    }
}
?>
