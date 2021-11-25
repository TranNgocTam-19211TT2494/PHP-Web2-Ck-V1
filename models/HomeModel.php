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
    public function insertUserDecorator($input,$zipcode)
    {
        $allUser = $this->getAllUser();
        foreach ($allUser as  $value) {
           if($input['email'] == $value['email']){
               return false;
           }
        }
        $sql = "INSERT INTO `users`(`username`, `email`, `password`,`permission`) 
        VALUES ('" . $input['username'] . "','" . $input['email'] . "','" . md5($input['password']) . "','" . 'User' . "')";
        $user = $this->insert($sql);

        $lastUserId = $this->lastUserId();
       
        $data = [
            'zipcode' =>$this->getToken(8),
            'user_id' => $lastUserId
        ];
        $sql1 = "INSERT INTO `zipcode`(`zipcode`, `user_id`) 
        VALUES ('" . $data['zipcode'] . "','" . $data['user_id'] . "')";
        $zipcode = $this->insert($sql1);

        return $user;
    }
    public function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;
    }
    public function getAllUser()
    {
        $sql = 'SELECT * FROM users';
        $users = $this->select($sql);
        return $users;
    }
    public function lastUserId()
    {
        $sql = "SELECT MAX(id) FROM users";
        $id = $this->select($sql);
        return $id[0]['MAX(id)'];
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