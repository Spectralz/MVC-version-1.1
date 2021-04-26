<?php

require_once('/var/www/mvc/classes/DataBase.php');

use \classes\DataBase;

$name = $_POST['name'];
$price= $_POST['price'];
$quantity = $_POST['quantity'];
$category_id = $_POST['category_id'];
$description = $_POST['description'];

DataBase::dbConnect();
$sql = "INSERT INTO product (name , price , quantity, category_id , description ) 
VALUES ('" . $name . "','" . $price . "','" . $quantity . "','" . $category_id . "','" . $description . "')";
$newProduct = DataBase::sqlCreate($sql);
if ($newProduct) {
    echo 'Товар добавлен';
} else {
    echo 'Товар не добавлен';
}