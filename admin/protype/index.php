<?php
require "../../models/ProtypeModel.php";

// -----------Factory------------------
require "../../models/FactoryPattentTwoAdmin.php";
$factory = new FactoryPattentTwoAdmin();
$protypesModel = $factory->make('protype');
// -----------Factory------------------

$protypes = $protypesModel->getProtype();

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
                            <h3 class="title-5 m-b-35">Protypes table</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-right">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small" onclick="window.location.href='./ViewProtypes.php'" >
                                        <i class="zmdi zmdi-plus"></i>add item</button>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>name</th>
                                            <th>Create_at</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($protypes as $proty) { ?>
                                            <tr class="tr-shadow">
                                            <td class="stt"></td>
                                                <td><?= $proty['type_name'] ?></td>
                                                <td><?= date( "d-m-Y", strtotime($proty['create_at']));?> </td>
                                                <td class="edit-delete">
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href='./ViewProtypes.php?type_id=<?php echo md5( $proty['type_id'] . 'chuyen-de-web-2') ?>'">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" onclick="window.location.href='./DeleteProtypes.php?type_id=<?php echo md5($proty['type_id'] . 'chuyen-de-web-2')  ?>'">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
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