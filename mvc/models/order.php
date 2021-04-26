<?php
use classes\DataBase;
use classes\Order;

header('Location: http://mvc/');

DataBase::dbConnect();

if($_GET['pay'] = 'PayPal'){
   DataBase::sqlCreate(Order::createOrder());
}