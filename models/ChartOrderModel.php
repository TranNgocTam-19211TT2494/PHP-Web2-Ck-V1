<?php
require_once "../models/BaseAdminModel.php";
class ChartOrderModel extends BaseAdminModel
{
    public function getAllOrderByMonth($month)
    {
        $sql = "SELECT * 
        FROM checkouts  
        WHERE MONTH(addedDate) = $month;";
        $id = $this->select($sql);
        return $id;
    }
    
}