<?php
session_start();
require_once 'models/FactoryPattent.php';
$factory = new FactoryPattent();
$HomeModel = $factory->make('home');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $product = $HomeModel->firstProductDetail($id);
    //các sản phẩm liên quan:
    if(!empty($product)) {
        $ManuID = $product[0]['manu_id'];
        $manufactures = $HomeModel->getProductManufactures($id , $ManuID);
       

    }
} else {
    echo "<br><center><h3>Vui lòng chọn 1 sản phẩm bất kỳ để xem thông tin chi tiết!</h3><center><br>";
}
$noti = 0;
if (!empty($_SESSION["lgUserID"])) {
    if (!empty($_GET['id']) && !empty($_GET['submit'])) {
        $inserWhishlist = $HomeModel->insertWhishList($_GET['id'], $_SESSION['lgUserID']);
        $noti = 1;
    }
}else {
    $noti = 2;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("views/head.php");?>
</head>

<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php");?>
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

    <?php if(isset($id)) { ?>
    <section class="product_details_area p_100">
        <div class="container">
            <?php if($noti == 1) {?>
            <div class="alert alert-success" role="alert">
                Thêm vào danh sách thành công.
            </div>
            <?php }else if($noti == 2){?>
            <div class="alert alert-success" role="alert">
                Bạn cần phải đăng nhập
            </div>
            <?php }?>
            <div class="row product_d_price">
                <div class="col-lg-6">
                    <div class="product_img"><img class="img-fluid" src="<?= $product[0]['pro_image']?>"
                            alt="<?= $product[0]['name']?>" style="width: 100%;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product_details_text">
                        <h4><?= $product[0]['name']?></h4>
                        <p><?= $product[0]['description']?>
                        </p>
                        <h5>Price :<span>$<?= $product[0]['price']?></span></h5>

                        <a class="pink_more" href="cart.php?id=<?= $product[0]['id'] ?>"
                            onclick="return insertCart(<?= $product[0]['id'] ?>)">Thêm vào giỏ hàng</a>
                        <?php if(!empty($_SESSION['lgUserID'])) {?>
                    
                        <a class="pink_more"
                            href="product-details.php?id=<?= md5($product[0]['id'].'chuyen-de-web-2')?>&submit=<?= md5('chuyen-de-web-2')?>">Yêu thích</a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="product_tab_area">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Mô tả</a>

                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Nhận xét (0)</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <p><?= $product[0]['description']?></p>

                    </div>

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p>Nỗi đau chính là tình yêu của nỗi đau, những vấn đề sinh thái chính, nhưng tôi cho loại thời
                            gian này để rơi xuống, để một số nỗi đau và nỗi đau lớn. Vì mục đích tối thiểu, ai trong
                            chúng ta nên thực hiện bất kỳ công việc nào ngoại trừ việc tận dụng những hậu quả từ việc
                            đó. Nhưng nỗi đau trong phim là không thể lên án, trong niềm vui sướng nó muốn thoát khỏi
                            nỗi đau bị co cụm trong đau đớn, không có kết quả.</p>
                        <p>Excepteur, họ bị mù quáng bởi mong muốn không xuất hiện, họ là lỗi của những người rời bỏ văn
                            phòng của họ, xoa dịu tâm hồn, tức là những người lao động của tầng lớp đại học chính quy,
                            nhưng họ làm loại thời gian này, khi họ sa ngã. vào một số lao động và đau đớn lớn. Vì vậy,
                            phần lớn, bất kỳ ai trong chúng ta cũng sẽ thực hiện bất kỳ loại công việc nào ngoại trừ để
                            tận dụng các mục tiêu từ nó. Nhưng nỗi đau trong phim là không thể lên án, trong niềm vui
                            sướng nó muốn thoát khỏi nỗi đau bị co cụm trong đau đớn, không có kết quả. Những kẻ thèm
                            khát đen đủi là ngoại lệ, họ không nhìn thấy, họ là những người rũ bỏ trách nhiệm một cách
                            có lỗi đang xoa dịu nỗi vất vả.</p>
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
                
                    if(!empty($manufactures)) { 
                        foreach ($manufactures as $product) {
                           
                ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="<?= $product['pro_image'] ?>" alt="<?= $product['name'] ?>">
                        </div>
                        <div class="cake_text">
                            <h4>$<?= $product['price'] ?></h4>
                            <h3><?= $product['name'] ?></h3>
                            <a class="pest_btn" href="cart.php?id=<?= $product['id'] ?>"
                                onclick="return insertCart(<?= $product['id'] ?>)">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>
    <!--================End Similar Product Area =================-->

    <!--================Newsletter Area =================-->
    <?php include_once("views/layouts/news.php");?>
    <!--================End Newsletter Area =================-->

    <!--================Footer Area =================-->
    <?php include_once("views/layouts/footer.php");?>
    <!--================End Footer Area =================-->


    <!--================Search Box Area =================-->
    <?php include_once("views/layouts/search.php");?>
    <!--================End Search Box Area =================-->





    <?php include_once("views/footer.php");?>
</body>

</html>