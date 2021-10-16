<?php 
session_start();

    require "../../global.php";
    require "../../dao/pdo.php";
    require "../../dao/pdo_food.php";
    require "../../dao/pdo_food_categories.php";
    
    $VIEW_NAME = "detail.php";
    food_increase_view($_GET['food_id']);

    require "../index.php";
?>