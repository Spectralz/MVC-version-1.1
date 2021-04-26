<?php

namespace classes;

require_once ('/var/www/mvc/configs/DataBaseConsts.php');

use configs\DataBaseConsts;
use PDO;

class DataBase
{
    private $db_host = DataBaseConsts::HOST;
    private $db_user = DataBaseConsts::USER;
    private $db_password = DataBaseConsts::PASSWORD;
    private $db_used = DataBaseConsts::DATABASE;

    public function dbConnect()
    {
        $link = "mysql:host=".$this->db_host.";dbname=".$this->db_used."";
        $pdo = new PDO($link, $this->db_user, $this->db_password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $set_utf8 = $pdo->query('SET NAMES UTF8');
        return $pdo;
    }
}