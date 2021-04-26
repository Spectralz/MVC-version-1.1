<?php

use classes\DataBase;

DataBase::dbConnect();

$email = \controllers\Validation::email($_POST['email']);
$check = DataBase::sqlPrepare("SELECT id FROM users WHERE  email ='" . $email . "'");
if (count($check) > 0) {
    echo "Такой email уже существует";
} else {
    $_POST['date_create'] = time();
    $_POST['role'] = 2;
    $_POST['session'] = session_id();

    $getColumns = DataBase::getColumnsAndTypesFromTable('users');
    unset($getColumns['id']);

    $sqlPrepare = [];

    foreach ($getColumns as $value => $type) {
        try {
            $$value = \controllers\Validation::$type($_POST[$value]);
            $sqlPrepare[$value] = $$value;
        } catch (\classes\Logger $exception) {
            echo $_POST[$value]." - ".$exception->getMessage();
        }
    }

    try {
        DataBase::prepareInsertSQL($sqlPrepare, 'users');
    } catch (PDOException $PDOException) {
        $_SESSION['warning'] = $PDOException->getMessage();
    }
    echo true;
}