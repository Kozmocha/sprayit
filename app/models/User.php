<?php

class User
{

    private $fname;
    private $lname;
    private $email;
    private $db;

//=============BEGIN GENERATED FUNCTIONS=============

    public function __construct(){
        $this->db = new Database;
    }

    public function getFirstName()
    {
        return $this->fname;
    }

    public function setFirstName($_fName)
    {
        $this->fname = $_fName;
    }

    public function getLastName()
    {
        return $this->lname;
    }

    public function setLastName($_lname)
    {
        $this->lname = $_lname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($_email)
    {
        $this->email = $_email;
    }

//=============END GENERATED FUNCTIONS=============
    // Find user by email
    //login user
    public function login($login, $password){
        $this->db->query('SELECT * FROM login WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        }else{
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM login WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

}

?>
