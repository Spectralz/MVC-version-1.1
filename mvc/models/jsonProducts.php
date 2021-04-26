<?php

use classes\DataBase;

require_once ('../classes/DataBase.php');


$sql = 'SELECT product.id, product.name , price, c.name as category , description FROM product LEFT JOIN category c on c.id = product.category_id';
$statement = new DataBase();
$products = $statement->dbConnect()->query($sql)->fetchAll();
echo json_encode($products);