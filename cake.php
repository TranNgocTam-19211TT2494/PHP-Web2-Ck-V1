<?php 
	require_once 'models/FactoryPattent.php';
	$factory = new FactoryPattent();
	$HomeModel = $factory->make('home');
	$products = $HomeModel->getProductHosts();
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
        				<li><a href="index.php">Home</a></li>
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
					<?php 
						if(!empty($products)) { 
						foreach ($products as $product) {
							
					?>
					<div class="col-lg-3 col-md-4 col-6">
						<div class="cake_feature_item">
							<div class="cake_img">
								<img src="<?= $product['pro_image']?>" alt="<?= $product['name']?>">
							</div>
							<div class="cake_text">
								<h4>$<?= $product['price']?></h4>
								<h3><?= $product['name']?></h3>
								<a class="pest_btn" href="#">Add to cart</a>
							</div>
						</div>
					</div>
					<?php } } ?>
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