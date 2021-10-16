<?php 
    session_start();
    require "../../global.php";
    require "../../dao/pdo.php";
    require "../../dao/pdo_food.php";
    require "../../dao/pdo_food_categories.php";
    

    $VIEW_NAME = "search_res.php";
    require "../index.php";
?>