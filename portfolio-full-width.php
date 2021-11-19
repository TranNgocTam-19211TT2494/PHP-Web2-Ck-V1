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
                <h3>Portfolio full width</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Main Header Area =================-->

    <!--================Portfolio Area Area =================-->
    <section class="portfolio_area portfolio_full p_100">
        <div class="portfolio_filter">
            <ul class="list_style">
                <li class="active" data-filter="*"><a href="#">All</a></li>
                <li data-filter=".cake"><a href="#">Cakes</a></li>
                <li data-filter=".bakery"><a href="#">Bakery</a></li>
                <li data-filter=".past"><a href="#">Pastries</a></li>
                <li data-filter=".choco"><a href="#">Chocolates</a></li>
                <li data-filter=".bread"><a href="#">Breads</a></li>

            </ul>
        </div>
        <div class="portfolio_full_width_area grid_portfolio_area imageGallery1">
            <div class="portfolio_full_item cake choco">
                <div class="portfolio_item">
                    <div class="portfolio_img">
                        <a class="light" href="img/portfolio/portfolio-1.jpg">
                            <img class="img-fluid" src="img/portfolio/portfolio-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="portfolio_text">
                        <a href="#">
                            <h4>Chocolate Pastry</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portfolio_full_item bakery">
                <div class="portfolio_item">
                    <div class="portfolio_img">
                        <a class="light" href="img/portfolio/portfolio-2.jpg">
                            <img class="img-fluid" src="img/portfolio/portfolio-2.jpg" alt="">
                        </a>
                    </div>
                    <div class="portfolio_text">
                        <a href="#">
                            <h4>Chocolate Pastry</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portfolio_full_item cake choco">
                <div class="portfolio_item">
                    <div class="portfolio_img">
                        <a class="light" href="img/portfolio/portfolio-3.jpg">
                            <img class="img-fluid" src="img/portfolio/portfolio-3.jpg" alt="">
                        </a>
                    </div>
                    <div class="portfolio_text">
                        <a href="#">
                            <h4>Chocolate Pastry</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portfolio_full_item cake bakery">
                <div class="portfolio_item past">
                    <div class="portfolio_img">
                        <a class="light" href="img/portfolio/portfolio-4.jpg">
                            <img class="img-fluid" src="img/portfolio/portfolio-4.jpg" alt="">
                        </a>
                    </div>
                    <div class="portfolio_text">
                        <a href="#">
                            <h4>Chocolate Pastry</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portfolio_full_item bakery choco">
                <div class="portfolio_item">
                    <div class="portfolio_img">
                        <a class="light" href="img/portfolio/portfolio-5.jpg">
                            <img class="img-fluid" src="img/portfolio/portfolio-5.jpg" alt="">
                        </a>
                    </div>
                    <div class="portfolio_text">
                        <a href="#">
                            <h4>Chocolate Pastry</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portfolio_full_item cake past">
                <div class="portfolio_item">
                    <div class="portfolio_img">
                        <a class="light" href="img/portfolio/portfolio-6.jpg">
                            <img class="img-fluid" src="img/portfolio/portfolio-6.jpg" alt="">
                        </a>
                    </div>
                    <div class="portfolio_text">
                        <a href="#">
                            <h4>Chocolate Pastry</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portfolio_full_item bakery past">
                <div class="portfolio_item">
                    <div class="portfolio_img">
                        <a class="light" href="img/portfolio/portfolio-7.jpg">
                            <img class="img-fluid" src="img/portfolio/portfolio-7.jpg" alt="">
                        </a>
                    </div>
                    <div class="portfolio_text">
                        <a href="#">
                            <h4>Chocolate Pastry</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portfolio_full_item past bread">
                <div class="portfolio_item">
                    <div class="portfolio_img">
                        <a class="light" href="img/portfolio/portfolio-8.jpg">
                            <img class="img-fluid" src="img/portfolio/portfolio-8.jpg" alt="">
                        </a>
                    </div>
                    <div class="portfolio_text">
                        <a href="#">
                            <h4>Chocolate Pastry</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portfolio_full_item past bread">
                <div class="portfolio_item">
                    <div class="portfolio_img">
                        <a class="light" href="img/portfolio/portfolio-9.jpg">
                            <img class="img-fluid" src="img/portfolio/portfolio-9.jpg" alt="">
                        </a>
                    </div>
                    <div class="portfolio_text">
                        <a href="#">
                            <h4>Chocolate Pastry</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="portfolio_full_item past bread">
                <div class="portfolio_item">
                    <div class="portfolio_img">
                        <a class="light" href="img/portfolio/portfolio-3.jpg">
                            <img class="img-fluid" src="img/portfolio/portfolio-3.jpg" alt="">
                        </a>
                    </div>
                    <div class="portfolio_text">
                        <a href="#">
                            <h4>Chocolate Pastry</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Portfolio Area Area =================-->

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