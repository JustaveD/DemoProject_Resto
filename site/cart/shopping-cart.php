<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../ajax/ajax-delete-food-in-cart.js"></script>
    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/variable.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/basic.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/header2.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/detail.css">
    <link rel="stylesheet" href="<?php echo $CONTENT_URL ?>/css/footer.css">

    <title>Favorite</title>
</head>

<body>
    <!-- header section start     -->
    <header>
        <a href="../home" class="logo"><i class="fas fa-utensils"></i>resto.</a>
        <nav class="navbar">
            <a href="../home"><i class="fas fa-undo"></i>Back to home</a>
            <a href="#" class="active">shopping cart</a>

        </nav>

        <?php require "../icons.php" ?>
    </header>
    <!-- header section end     -->
    <!-- search form section start -->
    <?php require "../search.php" ?>
    <!-- search form section  end-->
    <!-- YOU main SECTION STARTS -->


    <section class='maybelike section--padding-top'>
        <h3 class='sub-heading'>shopping cart</h3>
        <h1 class='heading'>buy now or later :D</h1>

        <div class='box-container'>
            <?php
            $carts = cart_get_all_food_of_specific_cus_id($_SESSION['login_id']);

            foreach ($carts as $cart) {
                extract($cart);
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
                    <div class='quantity'>
                    <span>quantity</span>
                    <div class='change-value'>

                        <div class='tool-btn tool-btn--calculator' id='minus'>-</div>
                        <input type='number' value='$cart_quantity' add_quantity='$cart_quantity'>
                        <div class='tool-btn tool-btn--calculator' id='add'>+</div>
                    </div>
                </div>
                        <div class='item-price'>$<span>$food_price</span></div>
                    </div>
                    
                   <input type='checkbox' class='check-btn'id='checked-item'>
                    <div class='tool-btn tool-btn--trash ajax-delete-food-in-cart' cart_id='$cart_id'><i class='far fa-trash-alt '></i></div>
                </div>

            </div>
            ";
            }


            ?>

            <div class="total-price">$<span id='total-price'>0</span></div>
            <div class="tool-btn tool-btn--long tool-btn--secondary tool-btn--margin-bottom tool-btn--opacity" id='selected-btn'>select all</div>
            <div class="tool-btn tool-btn--long tool-btn--primary tool-btn--opacity">Check out</div>
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


    <script src="<?php echo $CONTENT_URL ?>/js/selectAll.js"></script>
    <script src="<?php echo $CONTENT_URL ?>/js/autoCalTotalPrice.js"></script>
    <script>
        let addBtns = document.querySelectorAll('#add');
        let minusBtns = document.querySelectorAll('#minus');

        addBtns.forEach(btn => {
            btn.onclick = () => {
                let quantity = btn.previousElementSibling;

                let currentValue = parseInt(quantity.value);
                quantity.value = currentValue + 1;

                (function() {
                    const allItem = document.querySelectorAll("#checked-item");
                    const selectBtn = document.querySelector("#selected-btn");
                    const totalPrice = document.querySelector("#total-price");

                    totalPrice.innerText = 0;
                    let value = 0;
                    allItem.forEach((i) => {
                        if (i.checked) {

                            let quantity = parseInt(
                                i.previousElementSibling.firstElementChild.lastElementChild
                                .lastElementChild.previousElementSibling.value
                            );
                            let price = parseFloat(
                                i.previousElementSibling.lastElementChild.lastElementChild.innerText
                            );
                            price = price * quantity;
                            value = value + price;
                            totalPrice.innerText = value;
                        }
                    });
                })()

            }
        })
        minusBtns.forEach(btn => {

            btn.onclick = () => {
                let quantity = btn.nextElementSibling;

                let currentValue = parseInt(quantity.value);
                if (currentValue > 1) {
                    quantity.value = currentValue - 1;
                }

                (function() {
                    const allItem = document.querySelectorAll("#checked-item");
                    const selectBtn = document.querySelector("#selected-btn");
                    const totalPrice = document.querySelector("#total-price");

                    totalPrice.innerText = 0;
                    let value = 0;
                    allItem.forEach((i) => {
                        if (i.checked) {

                            let quantity = parseInt(
                                i.previousElementSibling.firstElementChild.lastElementChild
                                .lastElementChild.previousElementSibling.value
                            );
                            let price = parseFloat(
                                i.previousElementSibling.lastElementChild.lastElementChild.innerText
                            );
                            price = price * quantity;
                            value = value + price;
                            totalPrice.innerText = value;
                        }
                    });
                })()
            }
        })
    </script>
    <script src="<?php echo $CONTENT_URL ?>/js/deleteFoodInCart.js"></script>
</body>

</html>