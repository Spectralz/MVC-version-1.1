<?php


namespace classes;


class Session
{
    public function __construct()
    {

    }

    public static function update($usersId)
    {
        $sql = "UPDATE users SET session = ? WHERE id = ? ";
        $database = new DataBase();
        $database->dbConnect()->prepare($sql)->execute([session_id() , $usersId]);
        return true;
    }

    public static function delete()
    {
        $sql = "DELETE FROM users WHERE session = ".session_id()."";
        $statement = new DataBase();
        $statement->dbConnect()->query($sql);
        session_regenerate_id();
    }

    public static function read()
    {
        $sql = "SELECT id FROM users WHERE session= '".session_id()."'";
        $statement = new DataBase();
        $id = $statement->dbConnect()->query($sql)->fetch();
        return $id;
    }
}