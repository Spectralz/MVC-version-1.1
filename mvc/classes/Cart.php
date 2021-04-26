<?php


namespace classes;


class Cart
{
    public function __construct()
    {

    }

    public static function addToCart($product_id)
    {
        $quantity = 1;

        if(Session::read()){
            $user_id = Session::read();
            $getIdFromCart = Cart::issetInCart($product_id , $user_id['id']);
            if(!empty($getIdFromCart)){
                Cart::updateCart($getIdFromCart['id'] , $getIdFromCart['quantity']+$quantity);
            }else{
                $sql = "INSERT INTO cart (product_id , user_id ,quantity) VALUES ( ? , ? , ? )";
                $statement = new DataBase();
                $statement->dbConnect()->prepare($sql)->execute([$product_id , $user_id['id'], $quantity]);
            }
        }
    }

    public static function showCart()
    {
        $sql = "SELECT c.id , product.id as product_id , product.name, product.price , c.quantity FROM product
    RIGHT JOIN cart c on product.id = c.product_id
    RIGHT JOIN users u on u.id = c.user_id WHERE session='".session_id()."'";
        $statement = new DataBase();
        $cart = $statement->dbConnect()->query($sql)->fetchAll();
        return $cart;
    }

    public static function issetInCart($productId , $userId)
    {
        $sql = "SELECT id , quantity FROM cart WHERE product_id= ? AND user_id= ?";
        $database = new DataBase();
        $statement = $database->dbConnect()->prepare($sql);
        $statement->execute([$productId , $userId] );
        $product = $statement->fetch();
        return $product;
    }

    public static function updateCart($cartId ,  $quantity)
    {
        $sql = "UPDATE cart SET quantity=".$quantity." WHERE id=".$cartId."";
        $statement = new DataBase();
        $statement->dbConnect()->prepare($sql)->execute([$quantity , $cartId]);
    }

    public static function removeFromCart($cartId)
    {
        $sql = "DELETE FROM cart WHERE id =?";
        $statement = new DataBase();
        $statement->dbConnect()->prepare($sql)->execute([$cartId]);
    }
}