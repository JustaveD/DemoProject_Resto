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
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/header2.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/detail.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/footer.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../ajax/ajax-delete-food-in-favorite.js"></script>
    <script src="../../ajax/ajax-addToCart.js"></script>

    <title>Favorite</title>
    <style>
        .new-price {
            font-size: 3rem;
            color: var(--green);
            font-weight: bold;
            margin-top: .5rem;
        }

        .fa-trash-alt {
            pointer-events: none !important;
        }

       

  
    </style>
</head>

<body>
    <!-- header section start     -->
    <header>
        <a href="../home" class="logo"><i class="fas fa-utensils"></i>resto.</a>
        <nav class="navbar">
            <a href="../home"><i class="fas fa-undo"></i>Back to home</a>
            <a href="#" class="active">Favorite food</a>

        </nav>


        <?php require "../icons.php" ?>

    </header>
    <!-- header section end     -->
    <!-- search form section start -->
    <?php require "../search.php" ?>
    <!-- search form section  end-->
    <!-- YOU main SECTION STARTS -->
    <section class="maybelike section--padding-top">
        <h3 class="sub-heading">your favorite food</h3>
        <h1 class="heading">let' enjoy it</h1>

        <div class="box-container">

            <?php

            $all_favorite = favorite_get_all_by_cus_id($_SESSION['login_id']);
            foreach ($all_favorite as $favorite) {
                extract($favorite);
                $food = food_get_one($food_id);
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
                <div class='ajax-addToCart ' food_id='$food_id' add_quantity='1'>+</div>
                <div class='tool-btn tool-btn--trash tool-btn--primary ajax-delete-food-in-favorite' favorite_id='$favorite_id'><i class='far fa-trash-alt'></i></div>
            </div>

    </div>
    


        ";
            }

            ?>

        </div>
    </section>

    <!-- YOU main SECTION END -->
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
    <!-- SECTION FOOTER END -->


    <script>
        let btns = document.querySelectorAll(".ajax-delete-food-in-favorite");
        let favoriteNumber = document.querySelector(".favorite-number");
        btns.forEach((btn) => {
            btn.addEventListener("click", function() {
                btn.parentElement.parentElement.remove();
                let value = parseInt(favoriteNumber.innerText);
                favoriteNumber.innerText = value - 1;
            })
        });
    </script>
</body>

</html>