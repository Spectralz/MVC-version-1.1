<?php

use classes\Order;

$orderList = Order::showAllOrders();

?>
<h3>Список товаров</h3>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col" class="col-1">Номер заказа</th>
        <th scope="col" class="col-1">Пользователь</th>
        <th scope="col" class="col-1">Название товара</th>
        <th scope="col" class="col-1">Стоимость</th>
        <th scope="col" class="col-1">Количество</th>
        <th scope="col" class="col-1">Убрать из списка</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $cost = 0;
    foreach ($orderList as $key => $order){
    $cost += $order['price'] * $order['quantity'] ?>

    <tr>
        <th scope="row"><? echo $order['order_id'] ?>
        </th>
        <td>
            <? echo $order['user_name'] ?>
        </td>
        <td>
            <? echo $order['product_name'] ?>
        </td>
        <td>
            <? echo $order['price'] ?>
        </td>
        <td>
            <? echo $order['quantity'] ?>
        </td>
        <td>
            <?
            $date = date('Y-m-d H:i:s', $order['date'] );
            echo $date; ?>
        </td>
    </tr>
    <?
    }
    ?></table>
