<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../ajax/ajax-addToCart.js"></script> 

    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/variable.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/basic.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/header2.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/detail.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/footer.css">
    <title>Detail </title>


    <style>
         .new-price {
            font-size: 3rem;
            color: var(--green);
            font-weight: bold;
            margin-top: .5rem;
        }

       
    </style>
</head>

<body>
    <!-- header section start     -->
    <header>
        <a href="../home" class="logo"><i class="fas fa-utensils"></i>resto.</a>
        <nav class="navbar">
            <a href="../home"><i class="fas fa-undo"></i>Back to home</a>
            <a href="#" class="active">Food's infomation</a>

        </nav>

        <?php require "../icons.php" ?>
    </header>
    <!-- header section end     -->
    <!-- search form section start -->
    <form action="" id='search-form'>
        <input type="search" name="" placeholder='search here' id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>
    <!-- search form section  end-->
    <!-- INFOMATION STARTS -->
    <section class="infomation">
        <div class="box-container">
            <?php
            extract($_GET);
            $food = food_get_one($food_id);
            extract($food);
            echo "
                <div class='image'>
                <img src='$ROOT_URL.$food_image_url'>
            </div>
            <div class='info'>
                <h2>$food_name</h2>
                <p>$food_des</p>
                <div class='stars'>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star'></i>
                    <i class='fas fa-star-half-alt'></i>
                </div>
                <div class='price'>$$food_price</div>
                <div class='quantity'>
                    <span>quantity</span>
                    <div class='change-value'>

                        <div class='tool-btn tool-btn--calculator' id='minus'>-</div>
                        <input type='number' >
                        <div class='tool-btn tool-btn--calculator' id='add'>+</div>
                    </div>
                </div>
                <div food_id='$food_id' add_quantity='1' class='ajax-addToCart' class='btn'>add to cart</div>
            </div>

                ";

            ?>
   
        </div>
    </section>
    <!-- INFOMATION ENDS -->
    <!-- YOU MAYBE LIKE SECTION STARTS -->
    <section class="maybelike">
        <h3 class="sub-heading">You maybe like</h3>
        <h1 class="heading">other food</h1>

        <div class="box-container">
        <?php
           
           $all_foods = food_most_view();
            
           foreach ($all_foods as $food) {
               extract($food);
               
               echo "

                   <div class='box'>
                   <div class='image'>
                       <img src='$ROOT_URL$food_image_url'>
                   </div>
                   <div class='info'>
                       <a href='../detail?food_id=$food_id'>
                       $food_name</a>
                       <div class='price'>
                           <div class='new-price'>$$food_price</div>
                       </div>
                       <div class='ajax-addToCart' food_id='$food_id' add_quantity='1'>+</div>
                   </div>

                   </div>



";
           }

           ?>

        </div>
    </section>

    <!-- YOU MAYBE LIKE SECTION END -->
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




    <!-- custom js file link -->
    <script src="<?php echo $CONTENT_URL ?>/js/search.js"></script>
    <script src="<?php echo $CONTENT_URL ?>/js/addAndMinus.js"></script>
</body>

</html>