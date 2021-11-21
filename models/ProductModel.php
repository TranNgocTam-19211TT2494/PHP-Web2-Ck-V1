<?php

require_once 'BaseAdminModel.php';

class ProductModel extends BaseAdminModel
{
    public function insertProduct($input)
    {
        if (isset($input) && is_array($input)) {
                $url = 'http://localhost/PHP-Web2-Ck-V1.git/public/img/product/';
                $name = $url . $_FILES["image"]['name'];
                $sql = "INSERT INTO `webbanhkem`.`products` (`name`, `manu_id` ,`type_id`,`price`, `pro_image`,`feature`,`description`  ) VALUES (" .
                    "'" . $input['name'] . "','" . $input['manufacture'] . "','" . $input['protype'] . "','" . $input['price'] 
                    . "','" . $name
                    . "','" . $input['feature']
                    . "','" . $input['description'] . "')";
                $bank = $this->insert($sql);
                return $bank;
        }
        return false;
    }
    public function trashProduct($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $allProduct = $this->getProducts();
        $now =  strftime('%Y-%m-%d');
        foreach ($allProduct as $value) {
            $md5 = md5($value['id'] . "chuyen-de-web-2");
            if($md5 == $id){
                $sql = "UPDATE `products` SET `detele_at`= CURTIME() WHERE id = " . $value['id'] ;
                $bank = $this->update($sql);
                return $bank;
             }
        }
      return false;
    }
    public function rehibilitate($id)
    {
        $allProduct = $this->getAllTrashProduct();
        $now =  strftime('%Y-%m-%d');
        foreach ($allProduct as $value) {
            $md5 = md5($value['id'] . "chuyen-de-web-2");
            if($md5 == $id){
                $sql = "UPDATE `products` SET `detele_at`= NULL WHERE id = " . $value['id'] ;
                $bank = $this->update($sql);
                return $bank;
             }
        }
      return false;
    }
    public function deleteProduct($id)
    {
        $allProduct = $this->getAllProducts();
        foreach ($allProduct as $value) {
            $md5 = md5($value['id'] . "chuyen-de-web-2");
            if($md5 == $id){
                $sql = "DELETE FROM products WHERE id =  " . $value['id'] ;
                $bank = $this->delete($sql);
                return $bank;
             }
        }
      return false;
    }
    public function getAllTrashProduct()
    {
        $sql = 'SELECT * FROM `products` WHERE detele_at IS NOT NULL ORDER BY `id` DESC;';
        $products = $this->select($sql);
        return $products;
    }
    public function getProducts()
    {
        $sql = 'SELECT * FROM `products` WHERE detele_at IS NULL ORDER BY `id` DESC;';
        $products = $this->select($sql);
        return $products;
    }
    public function getAllProducts()
    {
        $sql = 'SELECT * FROM `products` ORDER BY `id` DESC;';
        $products = $this->select($sql);
        return $products;
    }
    public function getManufacture()
    {
        $sql = 'SELECT * FROM manufactures  ORDER BY `manu_id` DESC';
        $manufactures = $this->select($sql);
        return $manufactures;
    }
    public function getProtypes()
    {
        $sql = 'SELECT * FROM protypes  ORDER BY `type_id` DESC';
        $protypes = $this->select($sql);
        return $protypes;
    }
    public function getManuByProductId($id)
    {
        $sql = 'SELECT manu_name FROM manufactures WHERE manu_id = '.$id;
        $manu = $this->select($sql);
        return $manu;
    }
    public function getProTypeByProductId($id)
    {
        $sql = 'SELECT type_name FROM protypes WHERE type_id = '.$id;
        $manu = $this->select($sql);
        return $manu;
    }
}