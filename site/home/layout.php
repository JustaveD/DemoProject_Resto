<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/variable.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/basic.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/loader.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/footer.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/footer.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../ajax/ajax.js"></script>
    <script src="../../ajax/ajax-addToCart.js"></script> 
    <script src="../../ajax/ajax-favorite.js"></script> 
    <!-- SWIPER CDN LINK -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <title>Resto Web Page</title>
</head>

<body>
    <!-- header section start     -->
    <header>
        <a href="#" class="logo"><i class="fas fa-utensils"></i>resto.</a>
        <nav class="navbar">
            <a href="#home" class="active">home</a>
            <a href="#dishes">dishes</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#review">review</a>
        </nav>

        <?php
        require "../icons.php";
        ?>

    </header>
    <!-- header section end     -->
    <!-- search form section start -->
    <?php include "../search.php" ?>
    <!-- search form section  end-->
    <!-- home section start  -->
    <section id="home" class="home">
        <div class="swiper home-silder">
            <div class="swiper-wrapper wrapper">
                <?php

                $foods = food_3_main();
                foreach ($foods as $food) {
                    extract($food);

                    echo "
                    <div class='swiper-slide slide'>
                        <div class='content'>
                            <span>our special dish</span>
                            <h3>$food_name</h3>
                            <p>$food_des</p>
                            <a href='../detail?food_id=$food_id' class='btn'>order now</a>
                        </div>
                        <div class='image'>
                            <img src='$ROOT_URL$food_image_url'>
                        </div>
                    </div>
                ";
                }

                ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>

        </div>
    </section>
    <!-- home section end  -->
    <!-- Dishes section starts -->
    <section class="dishes" id="dishes">
        <h3 class="sub-heading">our dishes</h3>
        <h1 class="heading">popular dishes</h1>

        <div class="box-container" >
            <?php
            // get all food
            $all_foods = food_most_view();
            foreach ($all_foods as $food) {
                extract($food);
                echo "<div class='box'>
                <a href='' class='fas fa-heart ajax-favorite' food_id='$food_id'></a>
                <a href='../detail?food_id=$food_id' class='fas fa-eye'></a>
                <img src=$ROOT_URL$food_image_url alt=''>
                <div class='stars'>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star-half-alt'></i>
                </div>
                <span>$$food_price</span>
                <div food_id='$food_id' add_quantity='1' class='ajax-addToCart' class='btn'>add to cart</div>
            </div>";
            }

            ?>


        </div>
    </section>
    <!-- Dishes section end -->
    <!-- ABOUT SECTION STARTS  -->
    <section class="about" id="about">
        <h3 class="sub-heading">about us</h3>
        <h1 class="heading">why choose us?</h1>

        <div class="row">
            <div class="image">
                <img src="<?php echo $CONTENT_URL ?>/images/about-img.png" alt="">

            </div>
            <div class="content">
                <h3>best food in the country</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa iure animi illum fugiat consequatur neque hic perspiciatis maiores accusantium repellendus nostrum aspernatur eveniet est accusamus ad nihil, vero saepe id?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt error sint nesciunt soluta quibusdam debitis in rem nobis laborum voluptatum.</p>
                <div class="icons-container">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>free delivery</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-dollar-sign"></i>
                        <span>easy payment</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-headset"></i>
                        <span>24/7 service</span>
                    </div>
                </div>
                <a href="#" class="btn">learn more</a>
            </div>
        </div>
    </section>
    <!-- ABOUT SECTION END  -->
    <!-- MENU SECTION STARTS-->
    <section class="menu" id="menu">
        <h3 class="sub-heading">our menu</h3>
        <h1 class="heading">today's speciality</h1>

        <div class="box-container" id="load-more">
            <?php
                require "../../ajax/loadmore.php";
            ?>
            
            
            
        </div>
        <div  class="button" id="load_more">LOAD MORE</div>
    </section>
    <!-- MENU SECTION ENDS-->
    <!-- REVIEW SECTION STARTS -->
    <section class="review" id="review">
        <h3 class="sub-heading">custum's review</h3>
        <h1 class="heading">what they say </h1>

        <div class="swiper review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="<?php echo $CONTENT_URL ?>/images/pic-1.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>

                        </div>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit consectetur id, nemo dicta eum culpa doloribus alias debitis tempore distinctio quibusdam deleniti illo excepturi nesciunt eaque. Ipsum accusamus in voluptatem.</p>
                </div>
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="<?php echo $CONTENT_URL ?>/images/pic-2.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>

                        </div>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit consectetur id, nemo dicta eum culpa doloribus alias debitis tempore distinctio quibusdam deleniti illo excepturi nesciunt eaque. Ipsum accusamus in voluptatem.</p>
                </div>
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="<?php echo $CONTENT_URL ?>/images/pic-3.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>

                        </div>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit consectetur id, nemo dicta eum culpa doloribus alias debitis tempore distinctio quibusdam deleniti illo excepturi nesciunt eaque. Ipsum accusamus in voluptatem.</p>
                </div>
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="<?php echo $CONTENT_URL ?>/images/pic-4.png" alt="">
                        <div class="user-info">
                            <h3>john deo</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>

                        </div>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit consectetur id, nemo dicta eum culpa doloribus alias debitis tempore distinctio quibusdam deleniti illo excepturi nesciunt eaque. Ipsum accusamus in voluptatem.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- REVIEW SECTION END -->
    <!-- FOOTER SECTION STARTS -->
    <section class="footer" id="footer">
        <div class="box-container">
            <div class="box">
                <h3>locations</h3>
                <a href="#">việt nam</a>
                <a href="#">japan</a>
                <a href="#">use</a>
                <a href="#">france</a>
                <a href="#">china</a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#home">home</a>
                <a href="#dishes">dishes</a>
                <a href="#about">about us</a>
                <a href="#menu">menu</a>

            </div>
            <div class="box">
                <h3>contact info</h3>
                <a href="#">+(84)-869-189-734</a>
                <a href="#" class='email--nomal'>duydh050202@gmail.com</a>
                <a href="#" class='email--nomal'>duydhps15446@fpt.edu.vn</a>
                <a href="#">khanh hoa, viet nam</a>


            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">twitter</a>
                <a href="#">instagram</a>
                <a href="#">linkedin</a>



            </div>

        </div>
        <div class="credit">
            code in @ 2021 by <span>Duy THE NIGHTs</span>
        </div>
    </section>
    <!-- FOOTER SECTION ENDS -->
    <!-- LOADER -->
    <!-- <div class="loader-container">
        <img src="<?php echo $CONTENT_URL ?>/images/loader.gif" alt="">
    </div> -->






 
    <!-- SWIPER  -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link -->
    <script src="<?php echo $CONTENT_URL ?>/js/script.js"></script>

</body>

</html>