<?php

class Route {
    public function __construct() {
        $this->url();
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