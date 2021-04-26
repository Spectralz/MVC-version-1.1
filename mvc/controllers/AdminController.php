<?php


namespace controllers;

use classes\Category;
use classes\Role;

class AdminController extends Controller {

    public function __construct()
    {
        if(Role::getRole() != 1){
            header('Location: /');
        }
    }

    public static function getInstance()
    {

        if (self::$classLoader === null) {
            self::$classLoader = new self();
        }

        return self::$classLoader;
    }

    public function adminCreateProduct()
    {
        $this->data('template' , 'adminCreateProduct');
        $this->display('index');
    }

    public function createProduct()
    {
        $this->data('template' , 'adminCreateProduct');
        $this->display('index');
    }

    public function createCategory()
    {
        $category = new Category();
        $category->setName($_POST['name']);
        $category->create();

        $this->data('template' , 'adminCreateProduct');
        $this->display('index');
    }

    public function admin()
    {
        $this->data('template' , 'admin');
        $this->display('index');
    }

    public function downloadFiles(){
        $this->data('template' , 'downloadFiles');
        $this->display('index');
    }

    public function download(){
        $this->data('template' , 'download');
        $this->display('download');
    }
}