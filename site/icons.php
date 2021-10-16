<?php require "../../dao/pdo_account.php";?>
<?php require "../../dao/pdo_carts.php";?>
<?php require "../../dao/pdo_favorite.php";?>
<style>
    .ajax-addToCart{
        display: inline-block;
        padding: 1rem;
        background-color: var(--black);
        min-width: 15rem;
        border-radius: 1rem;
        cursor: pointer;
        color:#fff;
        font-size: 1.7rem;
        transition: all .3s ease;
        text-align: center;
    }
    .ajax-addToCart:hover{
        background-color: var(--green);
        letter-spacing: .1rem;
        
    }
</style>
<div class="icons">



    <i class="fas fa-bars" id="menu-bars"></i>
    <i class="fas fa-search" id="search-icon"></i>
    <?php
    
    $food_in_favorite = favorite_count_food($_SESSION['login_id']);
    extract($food_in_favorite);

?>

<?php
    if (isset($_SESSION['login']) !== true) {
        echo "<a href='../sign up' class='fas fa-heart'><span class='favorite-number'>$favorite_quantity</span></a>";
    } else if ($_SESSION['login'] !== true) {
        echo "<a href='../sign up' class='fas fa-heart'><span class='favorite-number'>$favorite_quantity</span></a>";
    } else {
        echo " <a href='../favorite' class='fas fa-heart'><span class='favorite-number'>$favorite_quantity</span></a></a>";
    }
    ?>
<?php
    
    $food_in_cart = cart_count_food_in_cart($_SESSION['login_id']);
    extract($food_in_cart);

?>
    <?php
    if (isset($_SESSION['login']) !== true) {
        echo "<a href='../sign up' class='fas fa-shopping-cart'><span class='cart-number'>$food_quantity</span></a>";
    } else if ($_SESSION['login'] !== true) {
        echo "<a href='../sign up' class='fas fa-shopping-cart'><span class='cart-number'>$food_quantity</span></a>";
    } else {
        echo "<a href='../cart' class='fas fa-shopping-cart'><span class='cart-number'>$food_quantity</span></a>";
    }
    ?>
    <?php

    if (isset($_SESSION['login']) !== true) {
        echo "<a href='../sign up' class='fas fa-user'></a>";
    } else if ($_SESSION['login'] !== true) {
        echo "<a href='../sign up' class='fas fa-user'></a>";
    } else {
        $id = $_SESSION['login_id'];
        $acc = account_get_one($id);
        
        if($acc['cus_admin'] == 1){
            echo "<a href='../../admin/dashboard/index.php' class='fas fa-user'></a>";
        }else{
            echo "<a href='../account' class='fas fa-user'></a>";
        }
    }

    ?>
</div>