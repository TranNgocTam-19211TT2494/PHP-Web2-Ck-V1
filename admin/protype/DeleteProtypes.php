<?php 
require "../../models/ProtypeModel.php";
$protypesModel = new ProtypeModel();

$protype = NULL; 
$id = NULL;

if (!empty($_GET['type_id'])) {
    $id = $_GET['type_id'];
    $protypesModel->DeleteProtype($id);//Delete existing user
}
header('location: ./Protypes.php');