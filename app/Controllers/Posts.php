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

    public function register() {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($form)) {
            $data = array(
                "title" => trim($form['title']),
                "text"  => trim(ltrim($form['text']))
            );

            var_dump($form);

            if (in_array("", $form)) {
                // VALIDATING TITLE
                if (empty($form['title']))
                    $data['title_error'] = 'Title is required.';

                // VALIDATING TEXT
                if (empty($form['text']))
                    $data['text_error'] = 'Text is required.';
            } else {
                    // EVERYTHING OK
                    echo "OK";                
            }
        } else {
            $data = array(
                "title" => "",
                "text"  => ""
            );
        }

        $this->view('posts/register', $data);
    }
}