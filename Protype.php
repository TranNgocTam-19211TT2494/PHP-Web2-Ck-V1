<?php
require_once 'models/HomeModel.php';

// $protypeModel = new HomeModel();

// --------------Factory----------
require 'models/FactoryPattent.php';
$factory = new FactoryPattent();
$protypeModel = $factory->make('home');
// --------------Factory----------

$proty = $protypeModel->getProtype();

if (isset($_GET['type_id'])) {
    $typeid = $_GET['type_id'];
    $protype = $protypeModel->getprotypeOnProduct($typeid);
} 


?>
<!DOCTYPE html>
<html lang="en">

<?php include_once("views/head.php"); ?>

<body>
    
    <!--================Main Header Area =================-->
    <?php include_once("views/header.php"); ?>
    <!--================End Main Header Area =================-->
    <?php

  
    ?>
    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Protype</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Protype</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->
    <?php if(!empty($_GET['type_id'])) {?>
    <!--================Product Area =================-->
    <section class="product_area p_100">
        <div class="container">
            <div class="row product_inner_row">
                <div class="col-lg-9">
                    <!-- </?php if ($protype) { ?> -->
                        <input type="hidden" name="type_id" value="<?php echo $typeid ?>">
                        <div class="row m0 product_task_bar">
                            <div class="product_task_inner">
                                <div class="float-left">
                                  
                                </div>
                                    <div class="float-right">
                                        <h4>Protype</h4>
                                      
                                    </div>
                            </div>
                        </div>
                        <div class="row product_item_inner">
                            <?php foreach ($protype as $pro) { ?>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="cake_feature_item">
                                        <div class="cake_img">
                                            <img src="<?= $pro['pro_image'] ?>" >
                                        </div>
                                        <div class="cake_text">
                                            <h4>$<?= $pro['price'] ?></h4>
                                            <h3><?= $pro['name'] ?></h3>
                                            <a class="pest_btn" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <!-- </?php } ?> -->
                    <!-- Phân trang -->
                    <div class="product_pagination">
                        <div class="left_btn">
                            <a href="#"><i class="lnr lnr-arrow-left"></i> New posts</a>
                        </div>
                        <div class="middle_list">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">12</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="right_btn"><a href="#">Older posts <i class="lnr lnr-arrow-right"></i></a></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="product_left_sidebar">
                        <aside class="left_sidebar search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Search Keywords">
                                <div class="input-group-append">
                                    <button class="btn" type="button"><i class="icon icon-Search"></i></button>
                                </div>
                            </div>
                        </aside>
                        <aside class="left_sidebar p_catgories_widget">
                            <div class="p_w_title">
                                <h3>Product Categories</h3>
                            </div>
                            <?php 
                                $manufactures = $protypeModel->getManufactures();
                                
                            ?>
                            <ul class="list_style">
                                <?php foreach ($manufactures as $manufacture) { ?>
                                <li><a
                                        href="manufacture-shop.php?manu_id=<?=md5($manufacture['manu_id'] . 'chuyen-de-web-2') ?>"><?= $manufacture['manu_name'] ?>
                                        (<?= count($protypeModel->countProductWithManufacture($manufacture['manu_id']))?>)</a></li>
                                <?php } ?>

                            </ul>
                        </aside>
                        
                        <aside class="left_sidebar p_sale_widget">
                            <div class="p_w_title">
                                <h3>Top Sale Products</h3>
                            </div>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="img/product/sale-product/s-product-1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>Brown Cake</h4>
                                    </a>
                                    <ul class="list_style">
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    </ul>
                                    <h5>$29</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="img/product/sale-product/s-product-2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>Brown Cake</h4>
                                    </a>
                                    <ul class="list_style">
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    </ul>
                                    <h5>$29</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="img/product/sale-product/s-product-3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>Brown Cake</h4>
                                    </a>
                                    <ul class="list_style">
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    </ul>
                                    <h5>$29</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="img/product/sale-product/s-product-4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>Brown Cake</h4>
                                    </a>
                                    <ul class="list_style">
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                    </ul>
                                    <h5>$29</h5>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } else { ?>
        <?php include "404.php"; ?>
    <?php } ?>
    <!--================End Product Area =================-->

    <!--================Newsletter Area =================-->
    <?php include_once("views/layouts/news.php"); ?>
    <!--================End Newsletter Area =================-->

    <!--================Footer Area =================-->
    <?php include_once("views/layouts/footer.php"); ?>
    <!--================End Footer Area =================-->


    <!--================Search Box Area =================-->
    <?php include_once("views/layouts/search.php"); ?>
    <!--================End Search Box Area =================-->





    <?php include_once("views/footer.php"); ?>
</body>

</html>