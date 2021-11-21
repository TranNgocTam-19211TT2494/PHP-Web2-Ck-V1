<?php

require_once 'BaseAdminModel.php';
require_once 'ProductModel.php';

class HomeModel extends ProducModel
{
   public function getAllProduct()
   {
       $productModel = new ProductModel();
       return $productModel->getProducts();
   }
}