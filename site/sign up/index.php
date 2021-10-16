<?php 
    session_start();
    
    require "../../global.php";
    require "../../dao/pdo.php";
    require "../../dao/pdo_food.php";
    require "../../dao/pdo_food_categories.php";
    require "../../dao/pdo_account.php";

    $VIEW_NAME = "sign-up.php";
    if(isset($_GET['btn_process'])){
        $VIEW_NAME = "process.php";
    }
    require "../index.php";
    
?>