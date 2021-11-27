<?php
session_start();
ob_start();
require_once 'models/HomeModel.php';

$protypeModel = new HomeModel();

$proty = $protypeModel->getProtype();

// var_dump($typeid) . die();

?>
<header class="main_header_area">

    <div class="top_header_area row m0">
        <div class="container">
            <div class="float-left">
                <a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> + (1800) 456 7890</a>
                <a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                    info@cakebakery.com</a>
            </div>
            <div class="float-right">
                <ul class="h_social list_style">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li> -->
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <ul class="h_search list_style">
                    <li class="shop_cart"><a href="#"><i class="lnr lnr-cart"></i></a></li>
                    <li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
                </ul>

            </div>
        </div>
    </div>
    <div class="main_menu_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.html">
                    <img src="img/logo.png" alt="">
                    <img src="img/logo-2.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="my_toggle_menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="dropdown submenu active">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php">Home</a></li>
                             
                            </ul>
                        </li>
                        <li><a href="cake.php">Our Cakes</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Protype Cake</a>
                            <ul class="dropdown-menu">
                                <?php foreach ($proty as $pro) { ?>
                                <li><a href="Protype.php?type_id=<?=md5($pro['type_id'] . 'chuyen-de-web-2') ?>">- <?= $pro['type_name'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav justify-content-end">
                       
                        <!-- Shop -->
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu">
                                <li><a href="shop.php">Main shop</a></li>
                                <li><a href="whishlist.php">Whishlist</a></li>
                                <li><a href="product-details.php">Product Details</a></li>
                                <li><a href="cart.php">Cart Page</a></li>
                                <li><a href="checkout.php">Checkout Page</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <!-- account -->
                        <li class="dropdown submenu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">Account</a>
                            <ul class="dropdown-menu">
                                <?php
                            if (!empty($_SESSION["lgUserID"])) {
                                $chuoi1 = <<<EOD
                            <li><a href="logout.php"><i class="fa fa-user"></i>Đăng xuất</a></li>
EOD;
                                echo $chuoi1;
                          
                            } else {
                            $chuoi1 = <<<EOD
                            
                            <li><a href="login.php"><i class="fa fa-user"></i>Đăng Nhập</a></li>
                            <li><a href="register.php"><i class="fa fa-user"></i>Đăng Ký</a></li>
EOD;
                            echo $chuoi1;
                        }

                        ?>


                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>