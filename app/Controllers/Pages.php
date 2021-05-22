<?php

class Pages extends Controller {
    public function index() {
        try {
            $this->view('pages/home');
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
    }

    public function about() {
        // to do
    }
}