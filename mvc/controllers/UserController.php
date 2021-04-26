<?php


namespace controllers;

use classes\Logout;
use classes\Auth;
use classes\Cart;


class UserController extends Controller {

    public function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$classLoader === null) {
            self::$classLoader = new self();
        }

        return self::$classLoader;
    }

    public function registration()
    {
        $this->data('template' , 'registration');
        $this->display('index');
    }
    public function registrationModel()
    {
        $this->model('registration');
    }

    public function authentication()
    {

        try {
            $auth = Auth::authLoginAndPassword($_POST['email'] , $_POST['password'] );
            header('Location: http://mvc/');
        }catch (\classes\Logger $exception){
            header('Location: http://mvc/?warning='.$exception->getMessage().'');
        }
        $this->data('auth' , $auth);
        $this->data('email' , htmlspecialchars($_POST['email']));
        $this->data('password' , htmlspecialchars($_POST['password']));
        $this->data('template' , 'main');
        $this->display('index');
    }

    public function logout()
    {
        Logout::User();
        header('Location: /');
    }

    public function registrationForm(){
        $this->display('registrationForm');
    }

    public function addToCart(){
        $product_id = $_GET['id'];
        Cart::addToCart($product_id);
    }

    public function removeFromCart(){
        $cart_id = $_GET['id'];
        Cart::removeFromCart($cart_id);
        header('Location: /cart');
    }

    public function order(){
        $this->model('order');
    }

}