<?php
require_once 'BaseAdminModel.php'; 
class UserModel extends BaseAdminModel {
    
    // Lay danh sach: 
    public function getUsers($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users 
            WHERE name LIKE "%' . mysqli_real_escape_string(self::$_connection, $params['keyword']) . '%"';
            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            //$users = self::$_connection->multi_query($sql);
            $users = $this->select($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }
    //Xoa người dùng: 
    public function deleteUserById($id)
    {
        $sql = 'DELETE FROM users WHERE id = ' . $id;
        return $this->delete($sql);
    }
    //Tìm id 
    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);
        return $user;
    }
    public function updateUser($input) {
        $sql = 'UPDATE users SET 
        name = "' . mysqli_real_escape_string(self::$_connection, $input['username']) .'", 
        password="'. md5($input['password']) .'",
        email = "' . $input['email'] .'",
        permission = "' . $input['permission'] .'",
        WHERE id = ' . $input['id'];

        $user = $this->update($sql);

        return $user;
    }

}