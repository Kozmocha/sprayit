<?php

class Post {

    private static $dataTable = 'posts';

    /**
     * A function that checks to make sure the title and body are not empty.
     *
     * @param $_title
     * @param $_body
     * @return bool
     *
     * @author Ioannis Batsios
     */
    public static function checkFields($_title, $_body){
        if ($_title == ""){
            echo 'There must be a title';
            return false;
        } else {
            if ($_body == ""){
                echo "There must be a body";
                return false;
            }
            else return true;
        }
    }

    /**
     * A function that creates a new post.
     *
     * @param $_title
     * @param $_body
     * @return bool
     *
     * @author Ioannis Batsios
     */
    public static function createPost($_title, $_body) {
        $_userUuid = Post::getUuid();
        $_postUuid = uniqid();
        if (self::checkFields($_title, $_body)) {
            if (DatabaseConnector::createPost($_title, $_body, $_userUuid, $_postUuid)){
                return true;
            } else {
                echo "post not created.";
                return false;
            }
        } else {
            return false;
        }
    }

    public static function editPost($_postUuid, $_title, $_body) {
        if (self::checkFields($_title, $_body)) {
            if (DatabaseConnector::editPost($_postUuid, $_title, $_body)) {
                return true;
            } else {
                echo "post not updated";
                return false;
            }
        }
    }

    public static function getUuid() {
        $userId = Session::getField('user_id');
        return DatabaseConnector::getUuid($userId);
    }

    public static function getPosts() {
        return DatabaseConnector::getAllPosts();
    }

    public static function deletePost($_postUuid) {
        return DatabaseConnector::deletePost($_postUuid);
    }

    public static function getPostByPostUuid($_postUuid) {
        return DatabaseConnector::getPostByPostUuid($_postUuid);
    }
}
