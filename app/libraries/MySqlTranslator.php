<?php

/**
 * MySQL Translator: A class which connects to a MySQL database (specified in config/config.php), allowing
 * access to persistent data.
 */
class MySqlTranslator {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    /**
     * MySqlTranslator constructor: Establishes the connection to the database upon instantiation using
     * config-defined credentials.
     *
     * @author Christopher Thacker, Ioannis Batsios
     */
    public function __construct() {

        // Sets up DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Creates a PDO instance.
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Find a User by Email: Takes an email address parameter and tries to match it with one in the database. If
     * a match is found, it returns the corresponding row. If not, it returns false.
     *
     * @author Christopher Thacker
     */
    public static function findUserByEmail($_email) {

        // Establishes a connection to the database.
        $db = new MySqlTranslator;

        // Sends the SQL to be prepared for database use.
        $db->query("SELECT * FROM `user` WHERE email = :email");

        // Bind the email value (expected string) to the prepared variable.
        $db->bind(':email', $_email);

        // Gets a single row for the matching email.
        $row = $db->single();

        // Checks the number of rows.
        if($db->rowCount() > 0){
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Checks to make sure User isn't adding same email to the database.
     *
     * @author Ioannis Batsios
     */
    public static function checkDuplicateEmails($_email) {
        // Establishes a connection to the database.
        $db = new MySqlTranslator;

        // Sends the SQL to be prepared for database use.
        $db->query("SELECT * FROM `user` WHERE email = :email");

        // Gets a single row for the matching email.
        $row = $db->single();

        // Checks the number of rows.
        if($db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get all records from a table: Returns all of the rows within a specified table.
     *
     * @author Christopher Thacker
     */
    public static function getAll($_table) {
        $db = new MySqlTranslator();

        $db->query("SELECT * FROM `{$_table}`");

        $results = $db->resultSet();
        return $results;
    }

    /**
     * Returns all posts within the database with the poster's information.
     *
     * @author Christopher Thacker
     */
    public static function getAllPosts() {
        $db = new MySqlTranslator();

        $db->query('SELECT *,
                     `posts`.id as postId,
                     `user`.id as userId,
                     `posts`.created_at as postCreated
                     FROM `posts`
                     INNER JOIN `user`
                     ON posts.user_id = `user`.id
                     ORDER BY `posts`.created_at DESC
                     ');

        $results = $db->resultSet();
        return $results;
    }

    /**
     * Query SQL: Prepares the passed in SQL code for database use.
     *
     * @author Christopher Thacker, Ioannis Batsios
     */
    public function query($_sql) {
        $this->stmt = $this->dbh->prepare($_sql);
    }

    /**
     * Bind value to parameter: Binds a given value to a given parameter based on its type so that the database can
     * safely use it. This process defaults to string if no other type can be determined. A type can be passed in to
     * automatically bind the value as that type without checking for a matching one.
     *
     * @author Christopher Thacker, Ioannis Batsios
     */
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

    /**
     * Execute statement: Runs the stmt property against the database.
     *
     * @author Christopher Thacker, Ioannis Batsios
     */
    public function execute() {
        return $this->stmt->execute();
    }

    /**
     * Return single result: Returns a single row from the database if it matches the stmt property's query code.
     *
     * @author Christopher Thacker, Ioannis Batsios
     */
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Return set of results: Returns all results of the SQL statement.
     *
     * @author Christopher Thacker, Ioannis Batsios
     */
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get row count: Returns the number of rows in the database that were affected by the execution of the stmt
     * property.
     *
     * @author Christopher Thacker, Ioannis Batsios
     */
    public function rowCount() {
        return $this->stmt->rowCount();
    }

    /**
     * MySQL to create a new user from the Registration page
     *
     * @author Ioannis Batsios
     */
    public static function createUser($_fname, $_lname, $_email, $_password) {
        try {
            $host = DB_HOST;
            $dbname = DB_NAME;
            $dsn = "mysql:host=$host;dbname=$dbname";
            $conn = new PDO($dsn, DB_USER, DB_PASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $firstName = $_fname;
            $lastName = $_lname;
            $email = $_email;
            $password = $_password;
            $query = "INSERT INTO user (fname, lname, email, password) VALUES ('$firstName ','$lastName','$email','$password')";
            $conn->exec($query);
            echo "New record created successfully";
        } catch(PDOException $e) {
             echo $query . "<br>" . $e->getMessage();
        }
            $conn = null;
    }
}
