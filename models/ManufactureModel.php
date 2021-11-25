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
        $manufac = 'SELECT manu_id FROM manufactures';
        $manu = $this->select($manufac);
        $ma = null;
        foreach ($manu as $man) {
            $md5 = md5($man['manu_id'] . 'chuyen-de-web-2');
            if($md5 == $id){
            $sql = 'SELECT * FROM manufactures WHERE manu_id = ' . $man['manu_id'];
            $manus = $this->select($sql);
            }
        }
        // $sql = 'SELECT * FROM manufactures WHERE manu_id = ' . $id;
        // $manus = $this->select($sql);
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
        $versionOld = null;
        
        $allManufactures = $this->getManufactures();
        foreach ($allManufactures as  $value) {
            if($value['manu_id'] == $input['manu_id']){
                $idNew = $value['manu_id'];
                $versionOld = $value['version'];
               
            }
        }

        if(md5($versionOld.'chuyen-de-web-2') == $input['version']){
            $versionNew = (int)$versionOld + 1;
            $sql = 'UPDATE manufactures SET 
            manu_name = "' . $input['manu_name'] . '",
            version = "' . $versionNew. '"
            WHERE manu_id = ' .  $input['manu_id'];
            $manus = $this->update($sql);
            return $manus;
        }else{
            return false;
        }
        
    }
    public function deleteManufacture($id)
    {
        $manufac = 'SELECT manu_id FROM manufactures';
        $manu = $this->select($manufac);
        $ma = null;
        foreach ($manu as $man) {
            $md5 = md5($man['manu_id'] . 'chuyen-de-web-2');
            if($md5 == $id){
            $sql = 'DELETE FROM manufactures WHERE manu_id = ' . $man['manu_id'];
            $ma = $this->delete($sql);
            }
        }
        $sql = 'DELETE FROM manufactures WHERE manu_id = ' . $id;
        return $ma;
    }
}