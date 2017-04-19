<?php
require_once 'database/singleton.php';
require_once 'database/config.php';

class shopData
{
    private $products;

    function __construct()
    {
        $productsQuery = singleton::getInstance()->prepare("SELECT * FROM product");
        $productsQuery->execute();
        $this->products = $productsQuery->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProducts()
    {
        return $this->products;
    }

}