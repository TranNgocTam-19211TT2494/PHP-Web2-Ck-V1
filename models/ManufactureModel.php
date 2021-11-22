<?php
require_once 'BaseTwoAdmin.php';
class ManufactureModel extends BaseTwoAdmin
{
    public function getManufactures()
    {
        $sql = 'SELECT * FROM `manufactures`';
        $manus = $this->select($sql);
        return $manus;
    }
    public function findManufactureById($id)
    {
        $sql = 'SELECT * FROM manufactures WHERE manu_id = ' . $id;
        $manus = $this->select($sql);
        return $manus;
    }
    public function insertManufacture($input)
    {
        $sql = "INSERT INTO manufactures (`manu_name`) VALUES (" .
            "'" . $input['manu_name'] . "')";
        $manus = $this->insert($sql);
        return $manus;
    }
    public function updateManufacture($input)
    {
        $sql = 'UPDATE manufactures SET 
                manu_name = "' . $input['manu_name'] . '"
                WHERE manu_id = ' .  $input['manu_id'];
        $manus = $this->update($sql);
        return $manus;
    }
    public function deleteManufacture($id)
    {
        $sql = 'DELETE FROM manufactures WHERE manu_id = ' .$id;
        return $this->delete($sql);
    }
}
