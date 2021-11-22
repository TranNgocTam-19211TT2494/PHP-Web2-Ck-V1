<?php 
include '../../models/ManufactureModel.php';
$manusModel = new ManufactureModel();
// var_dump($manufacture);
$_id = null;
if (isset($_GET['manu_id'])) {
    $_id = $_GET['manu_id'];
    $manusModel->deleteManufacture($_id); 
    
}


header('location: ./index.php');
