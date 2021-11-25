<?php 
include '../../models/ManufactureModel.php';

// -----------Factory------------------
require '../../models/FactoryPattentTwoAdmin.php';
$facrory = new FactoryPattentTwoAdmin();
$manusModel = $facrory->make('manu');
// -----------Factory------------------

// $manusModel = new ManufactureModel();
// var_dump($manufacture);
$_id = null;
if (isset($_GET['manu_id'])) {
    $_id = $_GET['manu_id'];
    $manusModel->deleteManufacture($_id); 
}
header('location: ./index.php');
