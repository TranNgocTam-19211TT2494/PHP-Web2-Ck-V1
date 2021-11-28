<?php
session_start();
// --------------Factory----------
require 'models/FactoryPattent.php';
$factory = new FactoryPattent();
$productModel = $factory->make('home');
// --------------Factory----------
$noti = 0;
// $products = $productModel->getProducts();
if (!empty($_SESSION["lgUserID"])) {
    if (!empty($_GET['id'])) {
        $inserWhishlist = $productModel->insertWhishList($_GET['id'], $_SESSION['lgUserID']);
        $noti = 1;
    }
} else {
    $noti = 2;
}
$search  = '';
$searchCate  = '';
if (isset($_GET['submit'])) {
    if (!empty($_GET['search'])) {
        $search = $_GET['search'];
        $products = $productModel->searchProduct($search);
        $num_result = $productModel->num_result($search);
    }
    if (!empty($_GET['search-cate'])) {
        $searchCate = $_GET['search-cate'];
        $products = $productModel->searchCategories($searchCate);
        // var_dump($products);
        // die();
        $num_result_cate = $productModel->num_result($searchCate);
    }
} else {
    $products = $productModel->getProducts();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once("views/head.php"); ?>

<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php"); ?>
    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Shop</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Product Area =================-->
    <section class="product_area p_100">
        <div class="container">
            <div class="row product_inner_row">

                <div class="col-lg-9">
                    <?php if (isset($noti) && $noti == 1) { ?>
                        <div class="alert alert-success" role="alert">
                            ADD WHISHLIST SUCCESS
                        </div>
                    <?php } else if ($noti == 2) { ?>
                        <div class="alert alert-success" role="alert">
                            YOU CAN LOGIN
                        </div>
                    <?php } ?>
                    <div class="row m0 product_task_bar">
                        <div class="product_task_inner">
                            <div class="float-left">
                                <a class="active" href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                                <?php if (isset($num_result)) { ?>
                                    <span>Showing 1 - 6 of <?php echo $num_result ?> results</span>
                                <?php } else { ?>
                                    <span>Showing 1 - 6 of <?php echo $num_result_cate ?> results</span>
                                <?php } ?>
                            </div>
                            <div class="float-right">
                                <h4>Sort by :</h4>
                                <select class="short" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option>Sort</option>
                                    <option value="?field=price&sort=desc">Reduce</option>
                                    <option value="?field=price&sort=asc">Augment</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row product_item_inner">
                        <?php foreach ($products as $product) { ?>
                            <div class="col-lg-4 col-md-4 col-6">
                                <div class="cake_feature_item">
                                    <div class="cake_img">
                                        <img src="<?= $product['pro_image'] ?>" alt="">
                                        <?php if (isset($_SESSION['lgUserID'])) { ?>
                                            <?php if (empty($productModel->getWhishlistExist($_SESSION['lgUserID'], $product['id']))) { ?>
                                                <div class="icon-whishlist">
                                                    <a href="shop.php?id=<?= md5($product['id'] . 'chuyen-de-web-2') ?>">
                                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>
                                    <div class="cake_text">
                                        <h4>$<?= $product['price'] ?></h4>
                                        <h3><?= $product['name'] ?></h3>
                                        <a class="pest_btn" href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
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
                            <form method="get" class="input-group">
                                <input type="text" name="search-cate" value="<?= $searchCate ?>" class="form-control" placeholder="Enter Search Keywords">
                                <div class="input-group-append">
                                    <button class="btn" type="submit" name="submit" value="submit"><i class="icon icon-Search"></i></button>
                                </div>
                            </form>
                        </aside>
                        <aside class="left_sidebar p_catgories_widget">
                            <div class="p_w_title">
                                <h3>Product Categories</h3>
                            </div>
                            <ul class="list_style">
                                <li><a href="#">Cupcake (17)</a></li>
                                <li><a href="#">Chocolate (15)</a></li>
                                <li><a href="#">Celebration (14)</a></li>
                                <li><a href="#">Wedding Cake (8)</a></li>
                                <li><a href="#">Desserts (11)</a></li>
                            </ul>
                        </aside>
                        <aside class="left_sidebar p_price_widget">
                            <div class="p_w_title">
                                <h3>Filter By Price</h3>
                            </div>
                            <div class="filter_price">
                                <div id="slider-range"></div>
                                <label for="amount">Price range:</label>
                                <input type="text" id="amount" readonly />
                                <a href="#">Filter</a>
                            </div>
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