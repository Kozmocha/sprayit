<?php

require_once APP_ROOT . '/models/Post.php';

/**
 * Posts controller: This is the class that is used to control any data associated with user posts within the
 * application.
 */
class Posts extends Controller {

    public function __construct() {
        if (!Session::isLoggedIn()) {
            Redirect::to(LOGIN_PATH);
        }
    }

    /**
     * Index: THIS METHOD IS REQUIRED. It helps prevent access to the application directory index and is the
     * default method that is called when no method is specified in the URL. For example, without this method, if
     * someone typed "localhost/bookit/posts" into the browser, without a method, THE PROGRAM WOULD CRASH because
     * an index method would not be found.
     *
     * @author Christopher Thacker
     */
    public function index() {
        $posts = Post::getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view(POSTS_HOME, $data);
    }
}