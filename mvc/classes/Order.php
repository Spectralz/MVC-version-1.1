<?php


namespace classes;


class Order
{
    public function __construct()
    {

    }

    public static function createOrder()
    {
        $user_id = Session::read();
        $date = time();
        var_dump($user_id[0]['id']);
        $sql = "START TRANSACTION;";
        $sql .= "INSERT INTO orders (user_id , date) VALUES (" . $user_id[0]['id'] . " , " . $date . ");";
        $cart = DataBase::sqlPrepare(Cart::showCart());

        foreach ($cart as $key => $product) {
            $sqlinsert .= "((SELECT id FROM orders WHERE user_id = " . $user_id[0]['id'] . " ORDER BY id DESC LIMIT 1) , " . $product['product_id'] . " , " . $product['quantity'] . " ),";
        }
        $sqlinsert = substr($sqlinsert,0,-1);
        $sql .= "INSERT INTO orders_list (order_id, product_id, quantity) VALUES " . $sqlinsert . ";";
        foreach ($cart as $key => $product) {
            $sql .= "DELETE FROM cart WHERE id ='".$product['id']."';";
        }
        $sql .= "COMMIT;";

        return $sql;
    }

    public static function showAllOrders(){
        $sql = "SELECT u.name as user_name, p.name as product_name, p.price, o.date , orders_list.product_id , orders_list.order_id, orders_list.quantity FROM orders_list
    LEFT JOIN orders o on o.id = orders_list.order_id
    LEFT JOIN users u on u.id = o.user_id
    LEFT JOIN product p on p.id = orders_list.product_id ORDER BY orders_list.id DESC ";
        $statement = new DataBase();
        $allProducts = $statement->dbConnect()->query($sql)->fetchAll();
        return $allProducts;
    }

    public static function showUserOrders(){
        return $sql = "SELECT u.name , p.name , p.price, orders_list.product_id , orders_list.order_id, orders_list.quantity FROM orders_list
    LEFT JOIN orders o on o.id = orders_list.order_id
    LEFT JOIN users u on u.id = o.user_id
    LEFT JOIN product p on p.id = orders_list.product_id WHERE session='".session_id()."'";

    }
}