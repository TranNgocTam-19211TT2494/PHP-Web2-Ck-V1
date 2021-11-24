<?php
session_start();
$token = null;
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];
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

    <!-- Fontfaces CSS-->
    <link href="../../public/backend/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="../../public/backend/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../public/backend/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
        media="all">
    <link href="../../public/backend/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../public/backend/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../public/backend/css/theme.css" rel="stylesheet" media="all">
</head>
<style>
.select2-hidden-accessible {
    border: 0 !important;
    clip: rect(0 0 0 0) !important;
    height: 1 px !important;
    margin: -1 px !important;
    overflow: hidden !important;
    padding: 0 !important;
    position: absolute !important;
    width: 1 px !important;
}
</style>

<body class="">
    <?php
    require_once("../../models/ProductModel.php");
    $productModel = new ProductModel();
    $allProduct =  $productModel->getAllTrashProduct();
    ?>
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="../../public/backend/images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="admin.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>
                                <!-- <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="index.html">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="index2.html">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="index3.html">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="index4.html">Dashboard 4</a>
                            </li>
                        </ul> -->
                            </li>
                            <!-- <li>
                        <a href="#">
                            <i class="fas fa-shopping-basket"></i>
                            <span class="bot-line"></span>eCommerce</a>
                    </li>
                    <li>
                        <a href="table.html">
                            <i class="fas fa-trophy"></i>
                            <span class="bot-line"></span>Features</a>
                    </li> -->
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-copy"></i>
                                    <span class="bot-line"></span>Pages</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="./index.php">Products</a>
                                    </li>
                                    <li>
                                        <a href="">Orders</a>
                                    </li>
                                    <li>
                                        <a href="">Manufactures</a>
                                    </li>
                                    <li>
                                        <a href="">Protype</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-desktop"></i>
                                    <span class="bot-line"></span>Table</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="button.html">Button</a>
                                    </li>
                                    <li>
                                        <a href="badge.html">Badges</a>
                                    </li>
                                    <li>
                                        <a href="tab.html">Tabs</a>
                                    </li>
                                    <!-- <li>
                                <a href="card.html">Cards</a>
                            </li>
                            <li>
                                <a href="alert.html">Alerts</a>
                            </li>
                            <li>
                                <a href="progress-bar.html">Progress Bars</a>
                            </li>
                            <li>
                                <a href="modal.html">Modals</a>
                            </li>
                            <li>
                                <a href="switch.html">Switchs</a>
                            </li>
                            <li>
                                <a href="grid.html">Grids</a>
                            </li>
                            <li>
                                <a href="fontawesome.html">FontAwesome</a>
                            </li>
                            <li>
                                <a href="typo.html">Typography</a>
                            </li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="header-button-item has-noti js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
                                <div class="notifi__title">
                                    <p>You have 3 Notifications</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a email notification</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c2 img-cir img-40">
                                        <i class="zmdi zmdi-account-box"></i>
                                    </div>
                                    <div class="content">
                                        <p>Your account has been blocked</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a new file</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="header-button-item js-item-menu">
                            <i class="zmdi zmdi-settings"></i>
                            <div class="setting-dropdown js-dropdown">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-money-box"></i>Billing</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-globe"></i>Language</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-pin"></i>Location</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-email"></i>Email</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="../../public/backend/images/icon/avatar-01.jpg" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">john doe</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="../../public/backend/images/icon/avatar-01.jpg"
                                                    alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">john doe</a>
                                            </h5>
                                            <span class="email">johndoe@example.com</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="#">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <?php include('../../views/admin/layouts/header-mobile.php')?>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">data table</h3>
                            <div class="active" style="display: flex; justify-content: space-between;">
                                <div class="table-data__tool">
                                    <a href="add.php"> <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item</button></a>
                                </div>
                                <div class="table-data__tool">
                                    <a href="trash.php"> <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-delete"></i>trash</button></a>
                                </div>
                            </div>

                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>Cake</th>
                                            <th>Image</th>
                                            <th>Manufacture</th>
                                            <th>Protype</th>
                                            <th>Price</th>
                                            <th>Feature</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($allProduct)) {
                                            foreach ($allProduct as $product) {?>
                                        <tr class="tr-shadow">
                                            <td><?= $product['name']; ?></td>
                                            <td>
                                                <div class="img-cake" style="width: 50%;">
                                                    <img src="<?= $product['pro_image']?>" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="block-email"><?= $productModel->getManuByProductId($product['manu_id'])[0]['manu_name'] ?></span>
                                            </td>
                                            <td class="desc">
                                                <?= $productModel->getProTypeByProductId($product['type_id'])[0]['type_name'] ?>
                                            </td>
                                            <td><?= number_format($product['price']);?> VND</td>
                                            <td>
                                                <?php if ($product['feature'] == 1) {?>
                                                <span class="status--process">Popular</span>
                                                <?php }else{?>
                                                <span class="status--denied">Normal</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a
                                                        href="rehibilitate.php?id=<?php echo rand(100, 999) . md5($product['id'] . "chuyen-de-web-2") . rand(100, 999) ?>"><button
                                                            class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Rehibilitate">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button></a>

                                                    <a
                                                        href="deleteforever.php?id=<?php echo rand(100, 999) . md5($product['id'] . "chuyen-de-web-2") . rand(100, 999) ?>&token=<?php echo $token ?>"><button
                                                            class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                            <input type="hidden" name="token" value="<?php echo $token ?>">
                                                        </button></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

            <!-- COPYRIGHT-->
            <?php include('../../views/admin/partials/copyright.php')?>
            <!-- END COPYRIGHT-->
        </div>

    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../public/js/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../public/js/popper.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <!-- Rev slider js -->
    <script src="../../public/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="../../public/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="../../public/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="../../public/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="../../public/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="../../public/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="../../public/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <!-- Extra plugin js -->
    <script src="../../public/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../../public/vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
    <script src="../../public/vendors/datetime-picker/js/moment.min.js"></script>
    <script src="../../public/vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../../public/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../../public/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="../../public/vendors/lightbox/simpleLightbox.min.js"></script>

    <script src="../../public/js/theme.js"></script>

</body>

</html>
<!-- end document-->