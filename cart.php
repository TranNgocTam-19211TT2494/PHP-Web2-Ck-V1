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
                <h3>Cart</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="cart.html">Cart</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Cart Table Area =================-->
    <section class="cart_table_area p_100">
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Preview</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="img/product/cart-img.jpg" alt="">
                            </td>
                            <td>Wheel Axel</td>
                            <td>$25.00</td>
                            <td>
                                <select class="product_select">
                                    <option data-display="1">1</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </td>
                            <td>$25.00</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>
                                <form class="form-inline">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Coupon code">
                                    </div>
                                    <button type="submit" class="btn">Apply Coupon</button>
                                </form>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class="pest_btn" href="#">Add To Cart</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row cart_total_inner">
                <div class="col-lg-7"></div>
                <div class="col-lg-5">
                    <div class="cart_total_text">
                        <div class="cart_head">
                            Cart Total
                        </div>
                        <div class="sub_total">
                            <h5>Sub Total <span>$25.00</span></h5>
                        </div>
                        <div class="total">
                            <h4>Total <span>$25.00</span></h4>
                        </div>
                        <div class="cart_footer">
                            <a class="pest_btn" href="#">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Table Area =================-->

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