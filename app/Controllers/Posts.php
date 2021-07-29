<?php

class Posts extends Controller {
    public function __construct() {
        if (!Session::isLogged()) {
            Url::redirect('users/login');
        }

        $this->postsModel = $this->model('Post');
    }

    public function index() {
        $data = array(
            'posts' => $this->postsModel->read()
        );

        $this->view('posts/index', $data);
    }

    public function register() {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($form)) {
            $data = array(
                "title" => trim($form['title']),
                "text"  => trim(ltrim($form['text']))
            );

            if (in_array("", $form)) {
                // VALIDATING TITLE
                if (empty($form['title']))
                    $data['title_error'] = 'Title is required.';

                // VALIDATING TEXT
                if (empty($form['text']))
                    $data['text_error'] = 'Text is required.';
            } else {
                    // EVERYTHING OK
                    if ($this->postsModel->store($data)) {
                        Session::alert("posts", "Post created successfully.");

                        Url::redirect('posts');
                    } else
                        throw new Exception("Error creating post.");                
            }
        } else {
            $data = array(
                "title" => "",
                "text"  => ""
            );
        }

        $this->view('posts/register', $data);
    }

    public function show($id) {
        $post = $this->postsModel->readById($id);

        $data = array(
            'post' => $post
        );

        $this->view('posts/show', $data);
    }

    public function update($id) {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($form)) {
            $data = array(
                "id"    => trim($id),
                "title" => trim($form['title']),
                "text"  => trim(ltrim($form['text']))
            );

            if (in_array("", $form)) {
                // VALIDATING TITLE
                if (empty($form['title']))
                    $data['title_error'] = 'Title is required.';

                // VALIDATING TEXT
                if (empty($form['text']))
                    $data['text_error'] = 'Text is required.';
            } else {
                    // EVERYTHING OK
                    if ($this->postsModel->update($data)) {
                        Session::alert("posts", "Post updated successfully.");

                        Url::redirect('posts');
                    } else
                        throw new Exception("Error updating post.");                
            }
        } else {
            $post = $this->postsModel->readById($id);

            if ($post->id_user != $_SESSION['user_id']) {
                Session::alert("posts", "Access denied.", "alert alert-danger");

                Url::redirect('posts');
            }

            $data = array(
                "id_post"    => $post->id_post,
                "title" => $post->title,
                "text"  => $post->text
            );
        }

        $this->view('posts/update', $data);
    }

    public function delete($id) {
        if (!$this->checkAuthorization($id)) {
            $id     = filter_var($id, FILTER_VALIDATE_INT);
            $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

            if ($id && $method == "POST") {
                if ($this->postsModel->delete($id)) {
                    Session::alert("posts", "Post deleted successfully.");
    
                    Url::redirect('posts');
                } else
                    throw new Exception("Error deleting post.");
            } else {
                Session::alert("posts", "Access denied.", "alert alert-danger");

                Url::redirect('posts');
            }         
        } else {
            Session::alert("posts", "Access denied to delete this post.", "alert alert-danger");

            Url::redirect('posts');
        }
        
    }

    private function checkAuthorization($id) {
        $post = $this->postsModel->readById($id);

        if ($post->id_user != $_SESSION['user_id'])
            return true;
        else
            return false;
    }
}