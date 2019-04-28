<?php

class Post {

    private static $dataTable = 'posts';

    public static function createPost($_title, $_body) {
        $_userUuid = Post::getUuid();
        $_postUuid = uniqid();
        if (DatabaseConnector::createPost($_title, $_body, $_userUuid, $_postUuid)){
            return true;
        }
        else {
            echo "post not created.";
            return false;
        }
    }

    public static function getUuid() {
        $userId = Session::getField('user_id');
        return DatabaseConnector::getUuid($userId);
    }

    public function getPosts() {
        return DatabaseConnector::getAllPosts();
    }
}