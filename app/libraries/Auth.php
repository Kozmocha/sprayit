<?php

class Auth {

    public static function login($user) {
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user->id;
    }
}