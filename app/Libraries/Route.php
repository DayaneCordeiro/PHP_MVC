<?php

class Route {
    private $controller = "Pages";
    private $method     = 'index';
    private $params     = array();

    public function __construct() {
        $url = $this->url() ? $this->url() : [0];

        if (file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')) {
            $this->controller = ucwords($url[0]);
            unset($url);
        }

        require_once '../app/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;                  // Instantiate the controller

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /// @brief Recover and Filter URL
    public function url() {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL); // Validating URL - removing bad characters

        if (isset($url)) {
            $url = trim(rtrim($url, '/'));                          // Remove blank spaces of the start and the end of the string
            $url = explode('/', $url);

            return $url;
        }
    }
}