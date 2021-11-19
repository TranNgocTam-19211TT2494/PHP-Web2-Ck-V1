<?php
require "../../models/ProtypeModel.php";

$protypesModel = new ProtypeModel();


$protype = NULL; //Add new user
$type_id = NULL;

if (!empty($_GET['type_id'])) {
    $type_id = $_GET['type_id'];
    $protype = $protypesModel->FindProtypebyid($type_id); //Update existing user
}
// var_dump($protype);die();

if (!empty($_POST['submit'])) {

    if (!empty($type_id)) {
        $protypesModel->UpdateProtype($_POST);
        // var_dump($protypesModel->UpdateProtype($_POST));die();
    } else {
        // $protypesModel->insertUser($_POST);
    }
    header('location: ./Protypes.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">

    <!-- Title Page-->
    <title>Dashboard</title>
    <?php include('../../views/admin/layouts/head.php') ?>

    <!-- Fontfaces CSS-->
    <link href="../../public/backend/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../public/backend/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../public/backend/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../public/backend/css/theme.css" rel="stylesheet" media="all">
    <link href="../../public/backend/css/protype.css" rel="stylesheet" media="all">

</head>
<style>
    .table-data__tool {
        justify-content: flex-end;
    }
</style>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php include('../../views/admin/layouts/header-desktop.php') ?>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <?php include('../../views/admin/layouts/header-mobile.php') ?>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">data table</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-right">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <?php if ($protype || !isset($type_id)) { ?>
                                        <form method="POST">
                                            <input type="hidden" name="type_id" value="<?php echo $type_id ?>">
                                            <div class="form-group">
                                                <label for="name">Protypes</label>
                                                <input class="form-control" name="name" placeholder="name" value="<?php if(!empty($protype[0]['type_name'])) echo $protype[0]['type_name']?>">
                                            </div>
                                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->
        </div>

    </div>

    <?php include('../../views/admin/layouts/footer.php') ?>

</body>

</html>
<!-- end document-->