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

//  TODO: DO NOT DELETE THIS CODE. It is not necessary at the moment, but might be necessary later.
//    public function __construct($data = []) {
//        foreach ($data as $key => $value) {
//            $this->$key = $value;
//        };
//    }

    /**
     * Sanitize POST: Returns a sanitized version of the $_POST associative array without overriding it.
     *
     * @return mixed
     */
    public static function sanitizePost() {
        return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    }

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
            $user = self::findByEmail($_email);
        } else {
            return false;
        }

        // If $user is not false.
        if ($user) {

            // Checks the parametrized password against the one found in the database.
            if ($_password == $user->password) {

                // Passwords matched, commence login.
                self::createSession($user);

                // TODO: FLASH MESSAGE

                return true;
            } else {

                // Passwords did not match.
                return false;
            }
        }
        return false;
    }


    /**
     * Find User by Email: Returns a row from the database where the row's 'email' field matches the parameterized
     * email that is passed in.
     *
     * @param $email
     * @return bool
     */
    public static function findByEmail($email) {
        $db = new Database;
        // TODO: MOVE SQL CODE TO THE DB TRANSLATOR
        $db->query('SELECT * FROM `user` WHERE email = :email');
        // Bind value
        $db->bind(':email', $email);

        $row = $db->single();

        // Check row
        if($db->rowCount() > 0){
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Get User Email: Returns the email of the passed in user.
     *
     * @param $user
     * @return mixed
     */
    public function getEmail($user) {
        return $user->email;
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

    /**
     * Check if User is Logged In: Checks if a a user is logged in; returns true if they are, false if not.
     *
     * @return bool
     */
    public static function isLoggedIn() {
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }
}
?>
