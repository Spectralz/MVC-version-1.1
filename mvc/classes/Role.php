<?php


namespace classes;


class Role
{
    public static function getRole()
    {
        if (Session::read()){
            $sql = "SELECT role FROM users  WHERE session = '".session_id()."'";
            $statement = new DataBase();
            $role = $statement->dbConnect()->query($sql)->fetch();
            return $role['role'];
        }else{
            return $role = 3;
        }

    }

}