<?php
require_once 'BaseTwoAdmin.php';

class ProtypeModel extends BaseTwoAdmin
{
    public function getProtype()
    {
        $sql = 'SELECT * FROM protypes';
        $protypes = $this->select($sql);
        return $protypes;
    }
    public function insertProtype($input)
    {
        $sql = "INSERT INTO protypes (type_name) VALUES (" .
        "'" . $input['name'] ."')";
        $protypes = $this->insert($sql);
        return $protypes;
    }
    public function UpdateProtype($input)
    {

        $protypes = 'SELECT type_id FROM protypes';
        $protype = $this->select($protypes);
        $proty = null;
        foreach($protype as $idprotys){
            $md5 = md5($idprotys['type_id'] . 'chuyen-de-web-2');
            if($md5 == $input['type_id']){
                $sql ='UPDATE protypes SET 
                type_name = "' . $input['name'] . '"
                WHERE type_id = ' . $idprotys['type_id'];
                $proty = $this->update($sql);
            }
        }
        return $proty;
    }
    public function FindProtypebyid($id){
        $protypes = 'SELECT type_id FROM protypes';
        $protype = $this->select($protypes);
        $proty = null;
        foreach($protype as $idproty){
            $md5 = md5($idproty['type_id'] . 'chuyen-de-web-2');
            if($md5 == $id){
                $sql = 'SELECT * FROM protypes WHERE type_id = ' . $idproty['type_id'];
                $proty = $this->select($sql);
            }
        }
        return $proty;
    }
    public function DeleteProtype($id) {
        $protypes = 'SELECT type_id FROM protypes';
        $protype = $this->select($protypes);
        $proty = null;
        foreach($protype as $idproty){
            $md5 = md5($idproty['type_id'] . 'chuyen-de-web-2');
            if($md5 == $id){
                $sql = 'DELETE FROM protypes WHERE type_id = '.$idproty['type_id'] ;
                $proty = $this->delete($sql);
            }
        }
        return $proty;
       
    }
}
