<?php

class Pages extends Controller {
    public function index() {
        if (Session::isLogged()) {
            Url::redirect('posts');
        }

        try {
            $data = array(
                'title' => 'Homepage'
            );

            $this->view('pages/home', $data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
    }

    public function about() {
        try {
            $data = array(
                'title' => 'About Us'
            );

            $this->view('pages/about', $data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}