<?php

class User {

    private $db;
    protected $dataTable = 'user';

    public function __construct($data = []) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        };
        $this->db = new Database;
    }

    public function authenticate($email = null, $password = null, $errors = []) {

        if ($email != '' && $email != null && $password != '' && $password != null) {
            $user = $this->findByEmail($email);
        } else {
            return false;
        }

        if ($user) {
            /*if (password_verify($password, $user->password_hash)) {
                return $user;
            }*/

            // TODO: Assume the password matches for now (until register is finished).
            return $user;
        }
        return false;
    }

    public function findByEmail($email) {

        // TODO: MOVE SQL CODE TO THE DB TRANSLATOR
        /*$this->db->query('SELECT * FROM `user` WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return $row;
        } else {
            return false;
        }*/
    }

    public function getEmail($user) {
        return $user->email;
    }

    public function createSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
    }

    public function destroySession() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        session_destroy();
        Redirect::to('users/login');
    }

    public function isLoggedIn() {
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }
}
?>
