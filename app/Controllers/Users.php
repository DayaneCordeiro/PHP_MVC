<?php

class Users extends Controller
{

    public function register()
    {
        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($form)) {
            $data = array(
                "name"             => trim($form['name']),
                "email"            => trim($form['email']),
                "password"         => trim($form['password']),
                "confirm_password" => trim($form['confirm_password'])
            );

            if (in_array("", $form)) {
                // VALIDATING NAME
                if (empty($form['name']))
                    $data["name_error"] = 'Name is required.';

                // VALIDATING E-MAIL
                if (empty($form['email']))
                    $data['email_error'] = 'E-mail is required.';

                // VALIDATING PASSWORD
                if (empty($form['password']))
                    $data['password_error'] = 'Password is required.';

                // VALIDATING PASSWORD CONFIRMATION
                if (empty($form['confirm_password']))
                    $data['confirm_password_error'] = "Password confirmation is required.";
            } else {
                // VALIDATING E-MAIL
                $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_error'] = 'Invalid e-mail.';
                }

                // VALIDATING PASSWORD
                $number       = preg_match('@[0-9]@', $data['password']);
                $uppercase    = preg_match('@[A-Z]@', $data['password']);
                $lowercase    = preg_match('@[a-z]@', $data['password']);
                $specialChars = preg_match('@[^\w]@', $data['password']);

                if (strlen($data['password']) < 8) {
                    $data['password_error'] = "Password must be at least 8 characters in length.<br>";
                }
                if (!$number) {
                    $data['password_error'] .= "Password must contain at least one number.<br>";
                }
                if (!$uppercase) {
                    $data['password_error'] .= "Password must contain at least one upper case letter.<br>";
                }
                if (!$lowercase) {
                    $data['password_error'] .= "Password must contain at least one lower case letter.<br>";
                }
                if (!$specialChars) {
                    $data['password_error'] .= "Password must contain at least one special character.";
                }

                // VALIDATING PASSWORD CONFIRMATION
                if (!($form['confirm_password'] === $form['password'])) {
                    $data['confirm_password_error'] = "Password confirmation must be equals password.";
                }
            }

            var_dump($data);
        } else {
            $data = array(
                "name"             => "",
                "email"            => "",
                "password"         => "",
                "confirm_password" => ""
            );
        }

        $this->view('users/register', $data);
    }
}
