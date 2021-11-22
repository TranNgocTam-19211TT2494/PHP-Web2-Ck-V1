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
        // $sort ='';
        $sql = 'SELECT * FROM `protypes`,products WHERE protypes.type_id = products.type_id AND protypes.type_id = '.$typeid .' ORDER BY products.id DESC';
        $protypes = $this->select($sql);
        return $protypes;
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
        $sql = 'SELECT * FROM products ORDER BY products.price ' . $sort;
        // var_dump($sql).die();
        $products = $this->select($sql);
        return $products;
    }
}


