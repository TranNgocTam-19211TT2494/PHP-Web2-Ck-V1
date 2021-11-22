<?php
require_once '../models/UserModel.php';
$userModel = new UserModel();

$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
   
    $userModel->deleteUserById($id);//Delete existing user
  
}
header('location: admin.php');
?>
