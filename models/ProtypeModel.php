<?php

require_once 'BaseAdminModel.php';

class ProtypeModel extends BaseAdminModel
{
    public function getProtype()
    {
        $sql = 'SELECT * FROM protypes';
        $protypes = $this->select($sql);
        return $protypes;
    }
    public function UpdateProtype($input)
    {
        $sql = 'UPDATE protypes SET 
        type_name = "' . $input['name'] . '"
        WHERE type_id = ' . $input['type_id'];
        $protypes = $this->update($sql);
        return $protypes;
    }
    public function FindProtypebyid($id){
        $protypes = 'SELECT * FROM protypes WHERE type_id = '.$id;
        $protypes = $this->select($protypes);
        return $protypes;
    }
    public function DeleteProtype($id) {
        $sql = 'DELETE FROM protypes WHERE type_id = '.$id;
        return $this->delete($sql);

    }
}
