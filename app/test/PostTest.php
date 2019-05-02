<?php

require_once APP_ROOT . '/models/Post.php';

class PostTest {

    public static function testCheckFields($_title, $_body, $_expected) {
        $result = Post::checkFields($_title, $_body);

        if ($result === $_expected) {
            return true;
        } else {
            return false;
        }
    }

    public static function systemTest() {
        // Normal test cases below.
        echo ("Testing normal case 01.");
        echo ((self::testCheckFields("Title 1", "This is the body!", true)) ? "Pass" : "Fail");

        // Edge test cases below.

        // Error test cases below.
    }
}