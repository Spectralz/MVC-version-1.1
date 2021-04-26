<?php


namespace controllers;


use classes\Logger;

class Validation
{
    public function __construct()
    {

    }
    public static function int($integer)
    {
        $integer = Validation::htmlSpecChars($integer);
        $setint = settype($integer, "integer");
        if($integer == $setint){
            $result = strip_tags(htmlspecialchars($integer));
        }else{
            throw new Logger('Error' , 'Введено не число');
        }
        return $result;
    }

    public static function var($string)
    {
        $string = Validation::htmlSpecChars($string);
        if(is_string($string)){
            $result = strip_tags(htmlspecialchars($string));
        }else{
            throw new Logger('Error' , 'Неправильный формат');
        }
        return $result;
    }

    public static function password($password)
    {
        $password_hash = password_hash(Validation::htmlSpecChars($password), PASSWORD_DEFAULT);
        if(is_string($password_hash)){
            $result = $password_hash;
        }else{
            throw new Logger('Error' , 'Неправильный формат');
        }
        return $result;
    }

    public static function email($email)
    {
        $email = Validation::htmlSpecChars($email);
        return $email;
    }
    public static function date($date)
    {
        $date = strtotime($date);
        if(is_int($date)){
            $result = strip_tags(htmlspecialchars($date));
        }else{
            throw new Logger('Error' , 'Неправильный формат');
        }
        return $result;
    }

    public static function htmlSpecChars($val)
    {
        return htmlspecialchars($val);

    }
}