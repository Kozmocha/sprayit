<?php

/**
 * Database Connector class: Connects to the database translator which is specified in the config file.
 */
class DatabaseConnector {

    /**
     * The translator class's name (defined in config/config.php).
     */
    private static $translator = DB_TRANSLATOR;

    /**
     * Passes the email value to the specified database translator's findUserByEmail method.
     *
     * @author Christopher Thacker
     */
    public static function findUserByEmail($_email) {
        $dbTranslator = static::$translator;
        return $dbTranslator::findUserByEmail($_email);
    }

    /**
     * Checks to make sure User isn't adding same email to the database.
     *
     * @author Ioannis Batsios
     */
    public static function checkDuplicateEmails($_email) {
        $dbTranslator = static::$translator;
        return $dbTranslator::checkDuplicateEmails($_email);
    }

    /**
     * Returns all records from a specified table.
     *
     * @author Christopher Thacker
     */
    public static function getAll($_table) {
        $dbTranslator = static::$translator;
        return $dbTranslator::getAll($_table);
    }

    /**
     * Returns all posts from the `posts` table in the database.
     *
     * @author Christopher Thacker
     */
    public static function getAllPosts() {
        $dbTranslator = static::$translator;
        return $dbTranslator::getAllPosts();
    }

    /**
     *
     */
    public static function rowCount() {
        $dbTranslator = static::$translator;
        return $dbTranslator::rowCount();
    }


    public static function createUser($_fname, $_lname, $_email, $_password, $_uuid) {
        $dbTranslator = static::$translator;
        return $dbTranslator::createUser($_fname, $_lname, $_email, $_password, $_uuid);
    }

    public static function createPost($_title, $_body, $_userUuid, $_postUuid) {
        $dbTranslator = static::$translator;
        return $dbTranslator::createPost($_title, $_body, $_userUuid, $_postUuid);
    }

    public static function getUuid($_userId) {
        $dbTranslator = static::$translator;
        return $dbTranslator::getUuid($_userId);
    }

    public static function deletePost($_postUuid) {
        $dbTranslator = static::$translator;
        return $dbTranslator::deletePost($_postUuid);
    }

    public static function getPostByPostUuid($_postUuid) {
        $dbTranslator = static::$translator;
        return $dbTranslator::getPostByPostUuid($_postUuid);
    }

    public static function editPost($_postUuid, $_title, $_body) {
        $dbTranslator = static::$translator;
        return $dbTranslator::editPost($_postUuid, $_title, $_body);
    }
}