<?php 
session_start();
include '../../models/ManufactureModel.php';
$manusModel = new ManufactureModel();
// var_dump($manufacture);
$_id = null;
// if (isset($_GET['manu_id'])) {
//     $_id = $_GET['manu_id'];
//     $manusModel->deleteManufacture($_id); 
    
// }
if (isset($_GET['manu_id'])) {
    $_id = $_GET['manu_id'];
    if (!empty($_GET['token'])) {
        if (hash_equals($_SESSION['token'], $_GET['token'])) {
            $manusModel->deleteManufacture($_id);
        }
    }
}

header('location: ./index.php');
