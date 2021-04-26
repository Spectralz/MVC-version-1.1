<?php


namespace classes;

use classes\Product;

class GetProduct extends Product
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function getDescription()
    {
        return $this->description;
    }
}