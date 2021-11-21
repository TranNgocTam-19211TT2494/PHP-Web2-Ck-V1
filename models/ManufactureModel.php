<?php
require_once 'BaseAdminModel.php';
class ManufactureModel extends BaseAdminModel
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
            "'" . $input['name'] . "')";
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
    public function deleteManufacture($input)
    {
        $sql = 'DELETE FROM manufactures WHERE id = ' . $input['id'];
        return $this->delete($sql);
    }
}
