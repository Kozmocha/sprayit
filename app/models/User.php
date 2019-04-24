<?php

/**
 * User Model: This is a model for any given user. It handles login authentication and has custom methods related
 * to users.
 */
class User {

    /**
     * The table that this particular object belongs to within the database.
     */
    private $dataTable = 'user';


//  TODO: DO NOT DELETE THIS CODE. It is not necessary at the moment, but might be necessary later.
    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        };
    }

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
                self::createUserSession($user);
                return true;
            } else {

                // Passwords did not match.
                return false;
            }
        }
        return false;
    }

    /**
     * Create User Session: Sets the session variables to the passed in user's properties or values.
     *
     * @author Christopher Thacker
     */
    protected static function createUserSession($_user) {
        $_SESSION['user_id'] = $_user->id;
        $_SESSION['user_email'] = $_user->email;
        $_SESSION['user_fname'] = $_user->fname;
        Redirect::to(POSTS_HOME);
    }

    /**
     * Destroy User Session: Un-sets all of the session variables for the logged in user.
     *
     * @author Christopher Thacker
     */
    public static function destroyUserSession() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_fname']);
        session_destroy();
        Redirect::to(LOGIN_PATH);
    }

    public static function getUuid() {
        $userId = Session::getField('user_id');
        return DatabaseConnector::getUuid($userId);
    }

    /**
     * Function registers user. Gets sanitized data from the controller, calls the Database Connector, and passes to database.
     *
     * @author Ioannis Batsios
     *
     * To Do: split if statements into their own functions so if Registrations changes, easy to change function.
     */
    public static function registerUser($_fname, $_lname, $_email, $_confirmEmail, $_password, $_confirmPassword) {
        // Checks to make sure emails match. If not, returns false
        if (self::confirmEmail($_email, $_confirmEmail) && self::checkPasswords($_password, $_confirmPassword)) {
            //creates a unique user id
            $uuid = uniqid();
            DatabaseConnector::createUser($_fname, $_lname, $_email, $_password, $uuid);
            MailConnector::send($_email, $_fname, REGISTRATION_EMAIL_SUBJECT, REGISTRATON_EMAIL_BODY);
            return true;
        } else {
            return false;
        }
    }

    /*
     * Function to see if emails typed match.
     * Returns false if not.
     *
     * @author Ioannis Batsios
     */
    public static function confirmEmail($_email, $_emailToConfirm) {
        if ($_email != $_emailToConfirm) {
            ?>
            <script>alert("Emails do not match!")</script><?php
            return false;
        } else {
            return true;
        }
    }

    /**
     * Function to see if passwords match.
     * Returns false if not
     *
     * @author Ioannis Batsios
     */
    public static function checkPasswords($_password, $_samePassword) {
        if ($_password != $_samePassword) {
            ?>
            <script>alert("Passwords do not match!")</script><?php
            return false;
        } else {
            return true;
        }
    }

    /**
     * A function that returns a salted hash for a password. Used to make database more secure from outside threats.
     *
     * @author Ioannis Batsios
     */
    public static function saltPassword($_password) {
        $salt = random_bytes(16);
        return $password_hash = crypt($_password, $salt);
    }

    /**
     * Get User Email: Returns the email of the passed in user.
     *
     * @author Christopher Thacker
     */
    public function getEmail($user) {
        return $user->email;
    }
}

?>
