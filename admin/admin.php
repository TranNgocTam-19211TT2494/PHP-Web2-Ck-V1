<?php 
// Start the session
session_start();
require('../models/UserModel.php');

// --------------Factory----------
require '../models/FactoryPattentAdmin.php';
$factory = new FactoryPattentAdmin();
$userModel = $factory->make('user');
// --------------Factory----------

// $userModel = new UserModel();
$params = [];

if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
    //Kiểm tra keyword bằng regex trong PHP
    // $pattern = '/^[A-Za-z0-9]$/';
    // if (!preg_match($pattern, $params['keyword'])) {
    //     echo "Không đúng định dạng";
    //     $params['keyword'] = null;
    // }
}
$users = $userModel->getUsers($params);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>
    <?php include('../views/admin/layouts/head.php')?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php include('../views/admin/layouts/header-desktop.php')?>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <?php include('../views/admin/layouts/header-mobile.php')?>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <?php include('../views/admin/partials/breadcrumb.php')?>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <?php include('../views/admin/partials/welcome.php')?>
            <!-- END WELCOME-->

            <!-- STATISTIC-->
            <?php include('../views/admin/partials/statistic.php')?>
            <!-- END STATISTIC-->

            <!-- STATISTIC CHART-->
            <?php include('../views/admin/partials/chart.php')?>
            <!-- END STATISTIC CHART-->

            <!-- DATA TABLE-->
            <?php include('../views/admin/partials/data.php')?>
            <!-- END DATA TABLE-->

            <!-- COPYRIGHT-->
            <?php include('../views/admin/partials/copyright.php')?>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <?php include('../views/admin/layouts/footer.php')?>
   
</body>

</html>
<!-- end document-->