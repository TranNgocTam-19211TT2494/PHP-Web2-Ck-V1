
<?php
require_once 'BaseModel.php';
class ZipcodeModel extends BaseModel{
    public function insertZipcode($data)
    {
        $sql1 = "INSERT INTO `zipcode`(`zipcode`, `user_id`) 
        VALUES ('" . $data['zipcode'] . "','" . $data['user_id'] . "')";
        $this->insert($sql1);
    }
}