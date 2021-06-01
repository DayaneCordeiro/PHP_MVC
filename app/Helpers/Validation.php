<?php

class Validation {
    public static function validateString($string) {
        if (preg_match('/^([áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+((\s[áÁàÀãÃâÂéÉèÈêÊíÍìÌóÓòÒõÕôÔúÚùÙçÇaA-zZ]+)+)?$/', $string))
            return true;
        else
            return false;
    }

    public static function validateEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
            return true;
        else
            return false;
    }
}