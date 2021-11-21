<?php
require_once 'BaseAdminModel.php'; 
class ManufactureModel extends BaseAdminModel {
    public function getManufactures()
    {
        $sql = 'SELECT * FROM `manufactures`';
        $manus = $this->select($sql);
        return $manus;
    }

    public function insertManufacture($input)
    {
        $sql = "INSERT INTO manufactures (`manu_name`) VALUES (" .
            "'" . $input['name'] . "')";
        $manus = $this->insert($sql);
        return $manus;
    }
    public function Manufacture($input)
    {
        $sql = "INSERT INTO `manufactures`(`manu_name`) VALUES (' .$input .')'";
        $manus = $this->insert($sql);
        return $manus;
    }
}