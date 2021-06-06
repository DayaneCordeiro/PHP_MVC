<?php

class Posts extends Controller {
    public function __construct() {
        if (!Session::isLogged()) {
            Url::redirect('users/login');
        }
    }

    public function index() {
        $this->view('posts/index');
    }
}