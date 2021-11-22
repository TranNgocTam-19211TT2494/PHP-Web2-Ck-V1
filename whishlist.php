<?php
	require_once 'models/HomeModel.php';
	$productModel = new HomeModel();
	$products = $productModel->insertWhishList($_GET['id'],3);
    if($products){
        $kq = true;
        header('location: shop.php');
    }
?>