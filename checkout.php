<?php
session_start();
    require 'models/FactoryPattent.php';
    $factory = new FactoryPattent();
    $HomeModel = $factory->make('home');
    
    if(isset($_SESSION['lgUserID']) && isset($_SESSION['mycart'])) {
        if(isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $note = $_POST['message'];
            //Đặt hàng:
            $Orders = $HomeModel->insertOrder($_SESSION['lgUserID'],$firstname,$lastname,$address,$email,$phone,$note);
            
            if($Orders == true) {
                $OrderID = $HomeModel->getOrderMaxById();
                //var_dump($OrderID).die();
                $sum = 0;
                foreach ($_SESSION['mycart'] as $key => $value) {
                    $row = $HomeModel->firstProductDetail($key);
                    $sum += $value * $row[0]["price"];
                    $total = $value * $row[0]["price"];
                    $HomeModel->insertOrderItem($OrderID , $key , $value);

                    
                }
                //var_dump($sum).die();
                //cập nhập tổng tiền giỏ hàng:
                $HomeModel->updateSum($OrderID,$sum);
                unset($_SESSION['mycart']);
                header("location: index.php");
            }
        }
    } else {
        header("location: login.php");
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
                <h3>Đặt hàng</h3>
                <ul>
                    <li><a href="index.php">Nhà</a></li>
                    <li><a href="checkout.php">Đặt hàng</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Billing Details Area =================-->
    <section class="billing_details_area p_100">
        <div class="container">
            <div class="return_option">
                <h4>Phản hồi khách hàng? <a href="login.php">Nhấn vào đây để đăng nhập</a></h4>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="main_title">
                        <h2>Chi tiết thanh toán</h2>
                    </div>
                    <div class="billing_form_area">
                        <form class="billing_form row" method="post" id="contactForm" novalidate="novalidate"
                            onSubmit="return IsInsertOrder()">
                            <div class="form-group col-md-6">
                                <label for="first">Tên đầu tiên *</label>
                                <input type="text" class="form-control" id="first" name="firstname"
                                    placeholder="Tên đầu tiên">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last">Họ *</label>
                                <input type="text" class="form-control" id="last" name="lastname" placeholder="Họ">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="address">Địa chỉ nhà *</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Địa chỉ">

                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Địa chỉ email *</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Địa chỉ email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Điện thoại *</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Chọn một tùy chọn">
                            </div>
                            <!-- <div class="select_check col-md-12">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Tạo một tài khoản?</label>
                                    <div class="check"></div>
                                </div>
                            </div> -->
                            <!-- <div class="select_check2 col-md-12">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Ship to a different address?</label>
                                    <div class="check"></div>
                                </div>
                            </div> -->
                            <div class="form-group col-md-12">
                                <label for="phone">Ghi chú đơn hàng</label>
                                <textarea class="form-control" name="message" id="message" rows="1"
                                    placeholder="Lưu ý về đặt hàng của bạn. ví dụ: lưu ý đặt biệt để giao hàng"></textarea>
                            </div>
                            <button type="submit" value="submit" name="submit" class="btn pest_btn"
                                style="margin-left: 15px;">Đặt hàng</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="order_box_price">
                        <div class="main_title">
                            <h2>Đơn hàng của bạn</h2>
                        </div>
                        <div class="payment_list">
                            <div class="price_single_cost">
                                <h5>SẢN PHẨM <span>TOÀN BỘ</span></h5>
                                <?php
                                    $sum = 0;
                                    foreach ($_SESSION['mycart'] as $key => $value) {
                                        $row = $HomeModel->firstProductDetail($key);
                                        // Tổng:
                                        $sum += $value * $row[0]["price"];
                                        $total = $value * $row[0]["price"];
                                        
                                ?>
                                <h5><?= $row[0]['name'] ?> X <?= $value ?><span>$<?= $total ?></span></h5>
                                <?php } ?>
                                <h4>TỔNG PHỤ <span>$<?= $sum ?></span></h4>
                                <h5>Vận chuyển và xử lý<span class="text_f">Miễn phí vận chuyển</span></h5>
                                <h3>TOÀN BỘ <span>$<?= $sum ?></span></h3>
                            </div>
                            <div id="accordion" class="accordion_area">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Chuyển khoản trực tiếp
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng
                                            tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn
                                            đặt hàng của bạn sẽ không được giao cho đến khi tiền đã hết trong tài khoản
                                            của chúng tôi.
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Billing Details Area =================-->

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
    function IsInsertOrder() {
        if (IsNull("email")) {
            $("error").innerHTML = "Vui lòng nhập địa chỉ";
            return false;
        }
        if (IsNull("phone")) {
            $("error").innerHTML = "Vui lòng nhận số điện thoại";
            return false;
        }
        dienThoai = $("phone");
        if (isNaN(dienThoai.value)) {
            dienThoai.focus();
            $("error").innerHTML = "Số điện thoại không hợp lệ";
            return false;
        }
        return true;
    }
    </script>
</body>

</html>