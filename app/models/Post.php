<?php

class Post {

    private static $dataTable = 'posts';

    public function getPosts() {
        return DatabaseConnector::getAllPosts();
    }

    public static function getUuid(){
        $userId = Session::getField('user_id');
        return DatabaseConnector::getUuid($userId);
    }

    public static function createPost($_title, $_body){
        $_uuid = Post::getUuid();
        return DatabaseConnector::createPost($_title, $_body, $_uuid);
    }
}