<section class="welcome_bakery_area">
    <div class="container">
        <div class="welcome_bakery_inner p_100">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main_title">
                        <h2>Welcome to our Bakery</h2>
                        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                            nisi ut aliquid ex ea commodi consequatur uis autem vel eum.</p>
                    </div>
                    <div class="welcome_left_text">
                        <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself,
                            because it is pain, but because occasionally circumstances occur in which toil and pain
                            can procure him some great pleasure. To take a trivial example, which of us ever
                            undertakes laborious physical exercise.</p>
                        <a class="pink_btn" href="contact.php">Know more about us</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="welcome_img">
                        <img class="img-fluid" src="public/img/cake-feature/welcome-right.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="cake_feature_inner">
            <div class="main_title">
                <h2>Our Featured Cakes</h2>
                <h5> Seldolor sit amet consect etur</h5>
            </div>
            <div class="cake_feature_slider owl-carousel">
                <?php $products = $HomeModel->getProductFeature();
                    foreach ($products as $product) {?>
                <div class="item">
                    <div class="cake_feature_item">
                        <div class="cake_img" style="max-height: 150px;">
                            <img src="<?= $product['pro_image']?>" alt="<?= $product['name']?>">
                        </div>
                        <div class="cake_text">
                            <h4>$<?= $product['price']?></h4>
                            <h3><?= $product['name']?></h3>
                            <a class="pest_btn" href="#">Add to cart</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>