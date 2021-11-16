<?php
	require_once 'models/ProductModel.php';

	$productModel = new ProductModel();

	$products = $productModel->getProducts();
	
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
       <?php include('views/head.php') ?>
    </head>
    <body>
        
        <!--================Main Header Area =================-->
		<?php include_once("views/header.php");?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Our Cakes</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="cakes.html">Services</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Blog Main Area =================-->
        <section class="our_cakes_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Our Cakes</h2>
        			<h5>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</h5>
        		</div>
        		<div class="cake_feature_row row">
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
								<img src="img/cake-feature/c-feature-9.jpg" alt="">
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
					<div class="col-lg-3 col-md-4 col-6">
						<div class="cake_feature_item">
							<div class="cake_img">
								<img src="img/cake-feature/c-feature-5.jpg" alt="">
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
								<img src="img/cake-feature/c-feature-6.jpg" alt="">
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
								<img src="img/cake-feature/c-feature-7.jpg" alt="">
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
								<img src="img/cake-feature/c-feature-8.jpg" alt="">
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
								<img src="img/cake-feature/c-feature-9.jpg" alt="">
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
								<img src="img/cake-feature/c-feature-5.jpg" alt="">
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
    </body>

</html>