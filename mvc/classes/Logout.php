<?php


namespace classes;

use classes\Session;

class Logout
{
    public static function User()
    {
        return Session::delete();
    }
}
