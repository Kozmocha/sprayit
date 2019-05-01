<?php

require_once APP_ROOT . '/models/User.php';

class UserTest {

    /**
     * Normal Test Case 01: Checking if a user's credentials can be authenticated.
     *
     * @author Christopher Thacker
     */
    public static function authenticateTestNormal01UserExists() {
        $email = "csteven015@gmail.com";
        $password = "123456";
        $expectedResult = true;

        $result = User::authenticate($email, $password);

        if ($expectedResult === $result) {
            echo 'Normal test case 01: PASS';
        } else {
            echo 'Normal test case 01: FAIL';
        }
    }

    /**
     * Normal Test Case 02: Checking if another user's credentials can be authenticated.
     *
     * @author Christopher Thacker
     */
    public static function authenticateTestNormal02UserExists() {
        $email = "csthack2@uncg.edu";
        $password = "123456";
        $expectedResult = true;

        $result = User::authenticate($email, $password);

        if ($expectedResult === $result) {
            echo 'Normal test case 02: PASS';
        } else {
            echo 'Normal test case 02: FAIL';
        }
    }

    /**
     * Normal Test Case 03: Checking if a non-existent user's credentials are rejected.
     *
     * @author Christopher Thacker
     */
    public static function authenticateTestNormal03UserDoesNotExist() {
        $email = "idontexist@void.goodbye.com";
        $password = "123456";
        $expectedResult = false;

        $result = User::authenticate($email, $password);

        if ($expectedResult === $result) {
            echo 'Normal test case 03: PASS';
        } else {
            echo 'Normal test case 03: FAIL';
        }
    }

    /**
     * Edge Test Case 01: Testing if an empty email field is rejected.
     *
     * @author Christopher Thacker
     */
    public static function authenticateTestEdge01EmailEmpty() {
        $email = "";
        $password = "123456";
        $expectedResult = false;

        $result = User::authenticate($email, $password);

        if ($expectedResult === $result) {
            echo 'Edge test case 01: PASS';
        } else {
            echo 'Edge test case 01: FAIL';
        }
    }

    /**
     * Edge Test Case 02: Testing if an empty password field is rejected.
     *
     * @author Christopher Thacker
     */
    public static function authenticateTestEdge02PasswordEmpty() {
        $email = "csteven015@gmail.com";
        $password = "";
        $expectedResult = false;

        $result = User::authenticate($email, $password);

        if ($expectedResult === $result) {
            echo 'Edge test case 02: PASS';
        } else {
            echo 'Edge test case 02: FAIL';
        }
    }

    /**
     * Edge Test Case 03: Testing if both empty email and password fields are rejected.
     *
     * @author Christopher Thacker
     */
    public static function authenticateTestEdge03BothEmpty() {
        $email = "";
        $password = "";
        $expectedResult = false;

        $result = User::authenticate($email, $password);

        if ($expectedResult === $result) {
            echo 'Edge test case 03: PASS';
        } else {
            echo 'Edge test case 03: FAIL';
        }
    }

    /**
     * Edge Test Case 01: Testing if an email with SQL code in it is rejected.
     *
     * @author Christopher Thacker
     */
    public static function authenticateTestError01ScriptedEmail() {
        $email = "TRUNCATE TABLE `posts`";
        $password = "123456";
        $expectedResult = false;

        $result = User::authenticate($email, $password);

        if ($expectedResult === $result) {
            echo 'Error test case 01: PASS';
        } else {
            echo 'Error test case 01: FAIL';
        }
    }

    /**
     * Error Test Case 02: Testing if a password with SQL code is rejected.
     *
     * @author Christopher Thacker
     */
    public static function authenticateTestError02ScriptedPassword() {
        $email = "csteven015@gmail.com";
        $password = "TRUNCATE TABLE `posts`";
        $expectedResult = false;

        $result = User::authenticate($email, $password);

        if ($expectedResult === $result) {
            echo 'Error test case 02: PASS';
        } else {
            echo 'Error test case 02: FAIL';
        }
    }

    /**
     * Error Test Case 03: Testing if an email without the @ symbol is rejected.
     *
     * @author Christopher Thacker
     */
    public static function authenticateTestError03MissingAtSymbolEmail() {
        $email = "csteven015gmail.com";
        $password = "123456";
        $expectedResult = false;

        $result = User::authenticate($email, $password);

        if ($expectedResult === $result) {
            echo 'Error test case 02: PASS';
        } else {
            echo 'Error test case 02: FAIL';
        }
    }

    /**
     * Runs all available test methods.
     *
     * @author Christopher Thacker
     */
    public static function runAuthenticateTests() {

        // Set of normal test cases.
        self::authenticateTestNormal01UserExists();
        self::authenticateTestNormal02UserExists();
        self::authenticateTestNormal03UserDoesNotExist();

        // Set of edge test cases.
        self::authenticateTestEdge01EmailEmpty();
        self::authenticateTestEdge02PasswordEmpty();
        self::authenticateTestEdge03BothEmpty();

        //Set of error test cases.
        self::authenticateTestError01ScriptedEmail();
        self::authenticateTestError02ScriptedPassword();
        self::authenticateTestError03MissingAtSymbolEmail();
    }
}