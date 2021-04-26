<?php


namespace classes;


class Category
{
    public $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function create()
    {
        $sql = "INSERT INTO category (name) VALUES (?)";
        $database = new DataBase();
        $statement = $database->dbConnect()->prepare($sql);
        $statement->execute([$this->name] );
    }

    public function read($id)
    {
        $sql = "SELECT * FROM category WHERE id = ? ";
        $database = new DataBase();
        $statement = $database->dbConnect()->prepare($sql);
        $statement->execute([$id] );
        $category = $statement->fetch();
        return $category;
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM category";
        $database = new DataBase();
        $statement = $database->dbConnect()->query($sql);
        $statement->execute();
        $categories = $statement->fetchAll();
        foreach ($categories as $categoryData){
            $category[$categoryData['id']] = new Category();
            $category[$categoryData['id']]->setName($categoryData['name']);
        }
        return $category;
    }
}