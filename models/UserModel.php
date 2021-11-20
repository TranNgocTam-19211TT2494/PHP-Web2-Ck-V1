<?php
require_once 'BaseModel.php'; 
class UserModel extends BaseModel {
    //Login

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