<?php

class Users extends Controller {

    public function register() {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($form)) {
            $data = array(
                "name"             => trim($form['name']),
                "email"            => trim($form['email']),
                "password"         => trim($form['password']),
                "confirm_password" => trim($form['password'])
            );
            var_dump($data);
        } else {
            $data = array(
                "name"             => "",
                "email"            => "",
                "password"         => "",
                "confirm_password" => ""
            );
        }

        // if (is_null($data['name']))
        //     return 'Name is required.';

        // if (is_null($data['email'])) {
        //     return 'E-mail is required.';
        // } else {
        //     $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

        //     if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        //         return 'Invalid E-mail.';
        //     }
        // }

        // if (is_null($data['password'])) {
        //     return 'Password is required.';
        // } else { 
        //     $number = preg_match('@[0-9]@', $data['password']);
        //     $uppercase = preg_match('@[A-Z]@', $data['password']);
        //     $lowercase = preg_match('@[a-z]@', $data['password']);
        //     $specialChars = preg_match('@[^\w]@', $data['password']);
            
        //     if(strlen($data['password']) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        //         echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
        //     } else {
        //         echo "Your password is strong.";
        //     }
        // }

        // if (is_null($data['confirm_password'])) {
        //     return "Password confirmation is required.";
        // } else {
        //     if (!($data['confirm_password'] === $data['password'])) {
        //         return "Password confirmation must be equals password.";
        //     }
        // }

        $this->view('users/register', $data);
    }
}