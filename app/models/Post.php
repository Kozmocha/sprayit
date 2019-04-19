<?php

class Post {

    private static $dataTable = 'posts';

    public function getPosts() {
        return DatabaseConnector::getAllPosts();
    }
}