<?php

/*
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return row and results
 */

class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public static function findUserByEmail($email) {
        $db = new Database;
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

    public function readObject($field, $table) {

    }

    // Prepare statement with query
    public function query($_sql) {
        $this->stmt = $this->dbh->prepare($_sql);
    }

    // Method to bind the values
    public function bind($_param, $_value, $_type = null) {
        if (is_null($_type)) {
            switch (true) {
                case is_int($_value):
                    $_type = PDO::PARAM_INT;
                    break;
                case is_bool($_value):
                    $_type = PDO::PARAM_BOOL;
                    break;
                case is_null($_value):
                    $_type = PDO::PARAM_NULL;
                    break;
                default:
                    $_type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($_param, $_value, $_type);
    }

    // Execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row Count
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
