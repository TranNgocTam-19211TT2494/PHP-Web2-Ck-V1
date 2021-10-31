<?php

require_once 'BaseModel.php';

class ProductModel extends BaseModel
{
    public function getProducts()
    {
        $sql = 'SELECT * FROM products';
        $products = $this->select($sql);
        return $products;
    }
}