<?php

/**
 * User Model: This is a model for any given user. It handles login authentication and has custom methods related
 * to users.
 */
class User {

    /**
     * The table that this particular object belongs to within the database.
     */
    protected $dataTable = 'user';


//  TODO: DO NOT DELETE THIS CODE. It is not necessary at the moment, but might be necessary later.
//    public function __construct($data = []) {
//        foreach ($data as $key => $value) {
//            $this->$key = $value;
//        };
//    }

    /**
     * Authenticate User Login: Checks the credentials that are passed in as parameters and proceeds to perform
     * the login flow.
     *
     * @author Christopher Thacker
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

    /**
     * Get User Email: Returns the email of the passed in user.
     *
     * @author Christopher Thacker
     */
    public function getEmail($user) {
        return $user->email;
    }

    /**
     * Create User Session: Sets the session variables to the passed in user's properties or values.
     *
     * @author Christopher Thacker
     */
    protected static function createSession($_user) {
        $_SESSION['user_id'] = $_user->id;
        $_SESSION['user_email'] = $_user->email;
    }

    /**
     * Destroy User Session: Un-sets all of the session variables for the logged in user.
     *
     * @author Christopher Thacker
     */
    public static function destroySession() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        session_destroy();
    }
}
?>
