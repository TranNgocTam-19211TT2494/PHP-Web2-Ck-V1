<?php

require_once 'BaseModel.php'; 
class HomeModel extends BaseModel {
    //   ------------ User ---------------//
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
      //Google
  
      //Forget password
    //   ---------------------- Protype ---------------- //
    public function getProtype()
    {
        $sql = 'SELECT * FROM protypes';
        $protypes = $this->select($sql);
        return $protypes;
    }
    public function getByIdProtype()
    {
        $sql = 'SELECT type_id FROM protypes';
        $protypes = $this->select($sql);
        return $protypes;
    }
    public function getprotypeOnProduct($typeid){
        $protypes = 'SELECT type_id FROM protypes';
        $protype = $this->select($protypes);
        $proty = null;
        foreach($protype as $idproty){
            $md5 = md5($idproty['type_id'] . 'chuyen-de-web-2');
            if($md5 == $typeid){
                $sql = 'SELECT * FROM `protypes`,products WHERE protypes.type_id = products.type_id AND protypes.type_id = '.$idproty['type_id'] .' ORDER BY products.id DESC';
            $proty = $this->select($sql);
            }
        }
        
        // $sql = 'SELECT * FROM `protypes`,products WHERE protypes.type_id = products.type_id AND protypes.type_id = '.$typeid .' ORDER BY products.id DESC';
        // $protypes = $this->select($sql);
        return $proty;
    }

    public function getProducts()
    {
        $sort ='';
        if(isset($_GET['sort'])){
            if($_GET['sort']=='desc'){
                $sort = 'DESC';
            }
            elseif($_GET['sort'] == 'asc'){
                $sort = 'ASC';
            }
           
        }

        $sql = 'SELECT * FROM `products` WHERE detele_at IS NULL ORDER BY products.price ' . $sort;
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
    // WSC
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

    protected static $_instance;
    public static function getInstance()
    {
        if (self::$_instance != null) {

            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }
}


