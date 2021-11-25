<?php
require_once '../models/UserModel.php';
// $userModel = new UserModel();

// --------------Factory----------
require '../models/FactoryPattentAdmin.php';
$factory = new FactoryPattentAdmin();
$userModel = $factory->make('user');
// --------------Factory----------

$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
   
    $userModel->deleteUserById($id);//Delete existing user
  
}
header('location: admin.php');
?>
