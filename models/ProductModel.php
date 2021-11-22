<?php

require_once 'BaseTwoAdmin.php';

class ProductModel extends BaseTwoAdmin
{
    public function getProducts()
    {
        $sql = 'SELECT * FROM products';
        $products = $this->select($sql);
        return $products;
    }
}