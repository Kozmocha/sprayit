<?php

class User
{

    private $fname;
    private $lname;
    private $email;

//=============BEGIN GENERATED FUNCTIONS=============

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
}

?>
