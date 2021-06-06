<?php

class Session {
    public static function alert($name, $message = null, $class = null) {
        if (!empty($name)) {
            if (!empty($message) && empty($_SESSION[$name])) {
                $_SESSION[$name] = $message;
                $_SESSION[$name . 'class'] = $class;
            }
            else if (!empty($_SESSION[$name]) && empty($message)) {
                $class = (!empty($_SESSION[$name . 'class'])) ? $_SESSION[$name . 'class'] : 'alert alert-success';
                echo '<div class="' . $class . '">' . $_SESSION[$name] . '</div>';

                unset($_SESSION[$name]);
                unset($_SESSION[$name . 'class']);
            }
        }
    }
}