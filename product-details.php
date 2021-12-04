<?php
session_start();
require_once 'models/FactoryPattent.php';
$factory = new FactoryPattent();
$HomeModel = $factory->make('home');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $HomeModel->firstProductDetail($id);
    //các sản phẩm liên quan:
    if ($product) {
        $ManuID = $product[0]['manu_id'];
        $products = $HomeModel->getProductManufactures($id, $ManuID);
    }
    // insert comment

    if (!empty($_POST['submit'])) {
        $a = $HomeModel->insertComment($_SESSION['lgUserID'], $id, $_POST);
        // var_dump($a).die();
    }
    $comments = $HomeModel->getAllCommentById($id);
    $comment_name = $HomeModel->getNameUserByComment($_SESSION['lgUserID']);
} else {
    echo "<br><center><h3>Vui lòng chọn 1 sản phẩm bất kỳ để xem thông tin chi tiết!</h3><center><br>";
}
// $id = $_GET['id'];
// $comments = $HomeModel->getAllCommentById($id);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("views/head.php"); ?>
    <style>
        .comment_list .name {
            color: #000;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php"); ?>
    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Thông tin chi tiết sản phẩm</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="shop.php">Cửa hàng</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Product Details Area =================-->
    <?php if (isset($id)) { ?>
        <section class="product_details_area p_100">
            <div class="container">
                <div class="row product_d_price">
                    <div class="col-lg-6">
                        <div class="product_img"><img class="img-fluid" src="<?= $product[0]['pro_image'] ?>" alt="<?= $product[0]['name'] ?>" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product_details_text">
                            <h4><?= $product[0]['name'] ?></h4>
                            <p><?= $product[0]['description'] ?>
                            </p>
                            <h5>Price :<span>$<?= $product[0]['price'] ?></span></h5>

                            <a class="pink_more" href="cart.php?id=<?= $product[0]['id'] ?>" onclick="return insertCart(<?= $product[0]['id'] ?>)">Thêm vào giỏ hàng</a>
                            <a class="pink_more" href="#">Yêu thích</a>
                        </div>
                    </div>
                </div>
                <div class="product_tab_area">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả</a>

                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Nhận xét</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <p><?= $product[0]['description'] ?></p>

                        </div>

                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <?php if (isset($_SESSION['lgUserID'])) { ?>
                                <div class="row">
                                    <div class="col-md-9">

                                        <form method="POST">
                                            <!-- <input class="name" name=""></input> -->
                                            <input type="hidden" name="name" id="name" value="<?= $comment_name[0]["username"] ?>">
                                            <br>
                                            <textarea name="content" id="content" cols="50" rows="5"></textarea>
                                            <br>
                                            <button class="pink_more" type="submit" name="submit" value="submit">Gửi</button>
                                        </form>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="comment_list">
                                            <?php foreach ($comments as $comment) {
                                                // var_dump($comment); 
                                            ?>
                                                <div class="comment_form">
                                                    <div class="name"><?= $comment["username"] ?></div>
                                                    <div class="content"><?= $comment["content"] ?></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="comment_list">
                                    <?php foreach ($comments as $comment) {
                                        // var_dump($comment); 
                                    ?>
                                        <div class="name">Name: <?= $comment["username"] ?></div>
                                        <div class="content">Comment: <?= $comment["content"] ?></div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <div class="alert alert-danger">Vui lòng chọn 1 sản phẩm bất kỳ để xem thông tin chi tiết!</div>
    <?php }  ?>
    <!--================End Product Details Area =================-->

    <!--================Similar Product Area =================-->
    <section class="similar_product_area p_100">
        <div class="container">
            <div class="main_title">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="row similar_product_inner">
                <?php
                if (!empty($products)) {
                    foreach ($products as $product) {

                ?>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="cake_feature_item">
                                <div class="cake_img">
                                    <img src="<?= $product['pro_image'] ?>" alt="<?= $product['name'] ?>">
                                </div>
                                <div class="cake_text">
                                    <h4>$<?= $product['price'] ?></h4>
                                    <h3><?= $product['name'] ?></h3>
                                    <a class="pest_btn" href="cart.php?id=<?= $product['id'] ?>" onclick="return insertCart(<?= $product['id'] ?>)">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>
    <!--================End Similar Product Area =================-->

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