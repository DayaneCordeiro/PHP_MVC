<?php

class Pages extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Homepage"
        ];

        $this->view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            "title" => "About Us"
        ];

        $this->view('pages/about', $data);
    }
}