<?php


namespace classes;

use classes\DataBase;

class Auth extends Users
{
    public static function authLoginAndPassword($login, $password)
    {
        $sql = "SELECT id , password FROM users WHERE email = ? ";
        $database = new DataBase();
        $statement = $database->dbConnect()->prepare($sql);
        $statement->execute([$login]);
        $user = $statement->fetch();
        if (isset($user['password']) && password_verify($password, $user['password'])) {
            Session::update($user['id']);
            return $user;
        } else {
            throw new Logger('Warning' ,'Пользователь не найден');
        }
    }
}