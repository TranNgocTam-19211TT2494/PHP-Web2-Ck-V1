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
                <h3>Product Details</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="product-details.html">Product Details</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Product Details Area =================-->
    <section class="product_details_area p_100">
        <div class="container">
            <div class="row product_d_price">
                <div class="col-lg-6">
                    <div class="product_img"><img class="img-fluid" src="img/product/product-details-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product_details_text">
                        <h4>Brown Cake</h4>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ
                            untur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est,
                        </p>
                        <h5>Price :<span>$24.5</span></h5>
                        <div class="quantity_box">
                            <label for="quantity">Quantity :</label>
                            <input type="text" placeholder="1" id="quantity">
                        </div>
                        <a class="pink_more" href="#">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="product_tab_area">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Descripton</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Specification</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Review (0)</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Details Area =================-->

    <!--================Similar Product Area =================-->
    <section class="similar_product_area p_100">
        <div class="container">
            <div class="main_title">
                <h2>Similar Products</h2>
            </div>
            <div class="row similar_product_inner">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="img/cake-feature/c-feature-1.jpg" alt="">
                        </div>
                        <div class="cake_text">
                            <h4>$29</h4>
                            <h3>Strawberry Cupcakes</h3>
                            <a class="pest_btn" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="img/cake-feature/c-feature-2.jpg" alt="">
                        </div>
                        <div class="cake_text">
                            <h4>$29</h4>
                            <h3>Strawberry Cupcakes</h3>
                            <a class="pest_btn" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="img/cake-feature/c-feature-3.jpg" alt="">
                        </div>
                        <div class="cake_text">
                            <h4>$29</h4>
                            <h3>Strawberry Cupcakes</h3>
                            <a class="pest_btn" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="cake_feature_item">
                        <div class="cake_img">
                            <img src="img/cake-feature/c-feature-4.jpg" alt="">
                        </div>
                        <div class="cake_text">
                            <h4>$29</h4>
                            <h3>Strawberry Cupcakes</h3>
                            <a class="pest_btn" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
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