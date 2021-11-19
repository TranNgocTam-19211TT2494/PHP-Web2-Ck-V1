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
}