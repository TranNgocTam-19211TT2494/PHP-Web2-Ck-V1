<?php
	session_start();
	require_once 'models/FactoryPattent.php';
	$factory = new FactoryPattent();
	$HomeModel = $factory->make('home');
    $coupon = null;
	
    //var_dump($coupon[0]['discount']).die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('views/head.php') ?>
</head>

<body>

    <!--================Main Header Area =================-->
    <?php include_once("views/header.php");?>
    <style>
    .coupondiv {
        border: 1px solid #d3d3d3;
        min-width: 250px;
        margin-bottom: 25px;
        background-color: #f6f7f8;
        position: relative;
    }

    .coupondiv .promotiontype {
        padding: 15px 10px;
    }

    .promotag {
        float: left;
    }

    .promotagcont {
        background: #f6f7f8;
        color: #0E96B7;
        overflow: hidden;
        width: 70px;
        border-radius: 2px;
        -webkit-box-shadow: 1px 1px 4px rgb(34 34 34 / 20%);
        box-shadow: 1px 1px 4px rgb(34 34 34 / 20%);
        text-align: center;
    }

    .saveamount {
        min-height: 58px;
        color: #10b48a;
        font-size: 20px;
        margin: 0 auto;
        padding-top: 4px;
        font-weight: 500;
        line-height: 2.5;
    }

    .promotagcont .saleorcoupon {
        background: #0E96B7;
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        line-height: 2em;
        text-transform: uppercase;
    }

    .promotiondetails {
        margin-left: 15px;
        width: calc(100% - 270px);
        word-wrap: break-word;
        float: left;
    }

    .coupontitle {
        display: block;
        margin-bottom: 8px;
        color: #222;
        font-weight: 500;
        line-height: 1.2;
        text-decoration: none;
        font-size: 18px;
    }

    .cpinfo {
        display: block;
        margin-bottom: 5px;
        color: #222;
        line-height: 1.7;
        text-decoration: none;
        font-size: 15px;
    }

    .coupondiv .cpbutton {
        float: right;
        position: relative;
        z-index: 1;
        width: 150px;
        margin-top: 20px;
        margin-right: 20px;
    }

    .copyma {
        display: block;
        margin-left: -20px;
    }

    .coupon-code {
        position: absolute;
        top: 0;
        right: -15px;
        z-index: -1;
        min-width: 100px;
        height: 45px;
        font-weight: 500;
        line-height: 3;
        text-align: right;
        padding-right: 5px;
        text-decoration: none;
        cursor: pointer;
        border-radius: 0;
        font-size: 15px;
        color: #222;
        border: 1px solid #ddd;
    }

    .copyma .text {
        width: 135px;
        min-width: 140px;
        display: inline-block;
        position: relative;
        border: 0;
        background: #0E96B7;
        color: #fff;
        font-size: 15px;
        font-weight: 500;
        line-height: 3;
        text-align: right;
        padding-right: 35px;
        text-decoration: none;
        cursor: pointer;
        border-style: solid;
        border-color: #0E96B7;
        border-radius: 0;
    }

    .copyma .text:after {
        border-left-color: #0E96B7;
        content: "";
        display: block;
        width: 0;
        height: 0;
        border-top: 45px solid transparent;
        border-left: 45px solid #0E96B7;
        position: absolute;
        right: -45px;
        top: 0;
    }

    .coupondiv .promotiontype:after {
        content: '';
        display: table;
        clear: both;
    }
    </style>
    <!--================End Main Header Area =================-->

    <!--================End Main Header Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_text">
                <h3>Mã khuyến mãi của tôi</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="coupon.php">Mã khuyễn mãi</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Blog Main Area =================-->
    <section class="our_cakes_area p_100">
        <div class="container">
            <?php 
                if(!empty($_SESSION['lgUserID'])) {
                    $coupon = $HomeModel->getCouponByID($_SESSION['lgUserID']);
               
                    if(isset($coupon)) { 
                        if($coupon[0]['status'] == 1) {
                
            ?>
            <div class="coupondiv">
                <div class="promotiontype">
                    <div class="promotag">
                        <div class="promotagcont">
                            <div class="saveamount">
                                <?= $coupon[0]['discount'] ?> %
                            </div>
                            <div class="saleorcoupon">
                                COUPON
                            </div>
                        </div>
                    </div>
                    <div class="promotiondetails">
                        <a href="" class="coupontitle">Mã giảm giá  <?= $coupon[0]['discount'] ?>% cho đơn hàng đầu hàng đầu tiên của bạn</a>
                        <div class="cpinfo">
                            <i class="fa fa-history"></i> Hạn dùng: <?= date( "d-m-Y", strtotime($coupon[0]['created_at']));?> <br>
                            <i class="fa fa-check"></i> Áp dụng

                        </div>
                    </div>
                    <div class="cpbutton">
                        <a href="" class="copyma">
                            <input type="text" value="<?= $coupon[0]['zipcode'] ?>" class="coupon-code" id="copy">
                            <div onclick="myFunction()" class="text">LẤY MÃ</div>
                        </a>
                    </div>
                </div>
            </div>
            <?php }  } } ?>
        </div>
    </section>
    <!--================End Blog Main Area =================-->

    <!--================Special Recipe Area =================-->
    <?php include_once("views/layouts/special.php");?>
    <!--================End Special Recipe Area =================-->

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
    <script>
    function myFunction() {

        var copyText = document.getElementById("copy");


        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        navigator.clipboard.writeText(copyText.value);

        alert("Copied the text: " + copyText.value);
    }
    </script>
</body>

</html>