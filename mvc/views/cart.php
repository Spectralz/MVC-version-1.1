<?php

use classes\DataBase;
use classes\Cart;

$productsInCart = Cart::showCart();

if(!is_null($productsInCart[0]['id'])){?>
    <h3>Список товаров</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" class="col-1">Id</th>
            <th scope="col" class="col-1">Name</th>
            <th scope="col" class="col-1">Price</th>
            <th scope="col" class="col-1">Count</th>
            <th scope="col" class="col-1"></th>
            <th scope="col" class="col-1">Убрать из списка</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $cost = 0;
        foreach ($productsInCart as $key => $product){
            $cost += $product['price'] * $product['quantity'] ?>

        <tr>
            <th scope="row"><? echo $product['id'] ?>
            </th>
            <td>
                <? echo $product['name'] ?>
            </td>
            <td>
                <? echo $product['price'] ?>
            </td>
            <td>
                <? echo $product['quantity'] ?>
            </td>
            <td>
                <a class="" href="removeFromCart?id=<? echo $product['id'] ?>"><button>Удалить</button></a>
            </td>
        </tr>
        <?
        }
        ?></table>
    <h3>Итоговая стоимость : <?php echo $cost ?></h3>
    <a href="order?pay=PayPal"><button>Оформить</button></a>
    <?php
    }else{
        echo '<h4>Ваша карзина пуста<h4>';
}
?>

