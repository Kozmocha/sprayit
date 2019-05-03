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

        echo ("Testing normal case 02.");
        echo ((self::testCheckFields("Título 2", "¡Este es el cuerpo!", true)) ? "Pass" : "Fail");

        echo ("Testing normal case 03.");
        echo ((self::testCheckFields("タイトル 3", "これが体です！", true)) ? "Pass" : "Fail");

        // Edge test cases below.
        echo ("Testing edge case 01.");
        echo ((self::testCheckFields("", "This is the body!", false)) ? "Pass" : "Fail");

        echo ("Testing edge case 02.");
        echo ((self::testCheckFields("Title 2", "", false)) ? "Pass" : "Fail");

        echo ("Testing edge case 03.");
        echo ((self::testCheckFields("", "", false)) ? "Pass" : "Fail");

        // Error test cases below.
        echo ("Testing error case 01.");
        echo ((self::testCheckFields("Title 1", null, false)) ? "Pass" : "Fail");

        echo ("Testing error case 02.");
        echo ((self::testCheckFields(null, "Body stuff here", false)) ? "Pass" : "Fail");

        echo ("Testing error case 03.");
        echo ((self::testCheckFields("TRUNCATE TABLE `posts`", "TRUNCATE TABLE `posts`", true)) ? "Pass" : "Fail");
    }
}