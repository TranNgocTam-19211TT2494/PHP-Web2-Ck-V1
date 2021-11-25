<?php 
require "../../models/ProtypeModel.php";

// -----------Factory------------------
require "../../models/FactoryPattentTwoAdmin.php";
$factory = new FactoryPattentTwoAdmin();
$protypesModel = $factory->make('protype');
// -----------Factory------------------

// $protypesModel = new ProtypeModel();

$protype = NULL; 
$id = NULL;

if (!empty($_GET['type_id'])) {
    $id = $_GET['type_id'];
    $protypesModel->DeleteProtype($id);//Delete existing user
}
header('location: ./index.php');