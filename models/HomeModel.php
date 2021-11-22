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
}