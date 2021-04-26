<?php


namespace classes;

use classes\GetProduct;

class UseProduct extends GetProduct
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createProduct()
    {

    }

    public function getProductById($id)
    {

    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM product";
        $database = new DataBase();
        $statement = $database->dbConnect()->query($sql);
        $statement->execute();
        $products = $statement->fetchAll();
        foreach ($products as $productData){
            $productsObj[$productData['id']] = new Product();
            $productsObj[$productData['id']]->setName($productData['name']);
            $productsObj[$productData['id']]->setPrice($productData['price']);
            $productsObj[$productData['id']]->setCategoryId($productData['category_id']);
            $productsObj[$productData['id']]->setDescription($productData['description']);
        }
        return $products;
    }
}