<?php

class User {

    private $firstName;
    private $lastName;
    private $email;
    private $username;

//=============BEGIN GENERATED FUNCTIONS=============

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($_firstName) {
        $this->firstName = $_firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($_lastName) {
        $this->lastName = $_lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($_email) {
        $this->email = $_email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($_username) {
        $this->username = $_username;
    }

//=============END GENERATED FUNCTIONS=============

//TODO: add constructor and functions that affect all users.

}

?>
