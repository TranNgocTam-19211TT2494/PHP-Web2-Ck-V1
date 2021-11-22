<?php
require_once 'BaseModel.php'; 
class HomeModel extends BaseModel {
      //Login
      public function login($username, $password)
      {
          $md5Password = md5($password);
          $sql = 'SELECT * FROM users WHERE username = "' . $username . '" AND password = "' . $md5Password . '"';
  
          $user = $this->select($sql);
          return $user;
      }
  
      //Register
      public function createNewUser($input)
      {
          $sql = "INSERT INTO `users`(`username`, `email`, `password`,`permission`) 
          VALUES ('" . $input['username'] . "','" . $input['email'] . "','" . md5($input['password']) . "','" . 'User' . "')";
  
          $user = $this->insert($sql);
  
          return $user;
      }
      public function getProducts()
    {
        $sql = 'SELECT * FROM `products` WHERE detele_at IS NULL ORDER BY `id` DESC;';
        $products = $this->select($sql);
        return $products;
    }
    public function getWhishlist()
    {
        $sql = 'SELECT * FROM `whishlist` ORDER BY `id` DESC;';
        $whishlist = $this->select($sql);
        return $whishlist;
    }
    public function getWhishlistExist($userid,$pro_id)
    {
        $sql = "SELECT * FROM `whishlist` WHERE `user_id` = $userid and `pro_id` = $pro_id";
        $whishlist = $this->select($sql);
        return $whishlist;
    }
    public function getWhishlistByUserID($userid)
    {
        $sql = "SELECT whishlist.id as whishlistId,products.pro_image,products.name,products.price 
        FROM `whishlist`,products 
        WHERE whishlist.pro_id = products.id 
        AND whishlist.user_id = $userid ORDER BY `whishlist`.`id` DESC";
        $whishlist = $this->select($sql);
        return $whishlist;
    }
    public function insertWhishList($id,$userId)
    {
        $allProduct = $this->getProducts();
        foreach ($allProduct as $value) {
           if(md5($value['id'].'chuyen-de-web-2') == $id){
            $sql = "INSERT INTO `webbanhkem`.`whishlist` (`user_id` ,`pro_id`) VALUES (" .
            "'" . $userId
            . "','" . $value['id'] . "')";
            $allWhishlist = $this->getWhishlistExist($userId,$value['id']);
            if(empty($allWhishlist)){
                $products = $this->insert($sql);
                return $products;
            }else{
                return 2;
            }
           }
        }
    }
    public function deleteWhishList($id)
    {
        $allWhishlist = $this->getWhishlist();
        foreach ($allWhishlist as $value) {
            $md5 = md5($value['id'] . "chuyen-de-web-2");
            if($md5 == $id){
                $sql = "DELETE FROM whishlist WHERE id =  " . $value['id'] ;
                $whishlist = $this->delete($sql);
                return $whishlist;
             }
        }
      return false;
    }
      //Google
  
      //Forget password
}