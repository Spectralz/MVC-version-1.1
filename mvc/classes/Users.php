<?php


namespace classes;

require_once ('DataBase.php');

use classes\DataBase;

class Users
{
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $statement = new DataBase();
        $query = $statement->dbconnect()->query($sql);

        while($row = $query->fetch()) {
            echo $row['id']." name: ".$row['name']."<br/>";
        }
    }
}