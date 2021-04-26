<?php

use classes\DataBase;
use controllers\Validation;

DataBase::dbConnect();

$_POST['email'] = Validation::email($_POST['email']);
$_POST['password'] = Validation::password($_POST['password']);
$check = DataBase::sqlPrepare("SELECT id FROM users WHERE  email ='".$_POST['email']."'");
if(count($check) > 0){
    throw new \classes\Logger('Warning', 'Такой пользователь уже существует');
}else {
    $_POST['date_registration'] = time();
    $_POST['role'] = 2;

    $getColumns = DataBase::getColumnsAndTypesFromTable('users');
    unset($getColumns['id']);

    $sqlPrepare = [];

    foreach ($getColumns as $value => $type) {
        try {
            $$value = \controllers\Validation::$type($_POST[$value]);
            $sqlPrepare[$value] = $$value;
        } catch (\classes\Logger $exception) {
            $_SESSION['warning'][$value] = gettype($_POST[$value]) . $exception->getMessage();
            echo $exception->getMessage();
        }
    }

    try {
        DataBase::prepareInsertSQL($sqlPrepare, 'users');
    } catch (PDOException $PDOException) {
        $_SESSION['warning'] = $PDOException->getMessage();
    }
}
