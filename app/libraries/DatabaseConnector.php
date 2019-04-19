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

    public static function getAll($_table) {
        $dbTranslator = static::$translator;
        return $dbTranslator::getAll($_table);
    }

    public static function getAllPosts() {
        $dbTranslator = static::$translator;
        return $dbTranslator::getAllPosts();
    }
}