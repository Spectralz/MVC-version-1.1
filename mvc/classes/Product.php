<?php


namespace classes;


class Product
{
    public $name;
    public $price;
    public $quantity;
    public $category_id;
    public $description;

    public function __construct()
    {

    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}