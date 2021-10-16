<?php 
session_start();

    require "../../global.php";
    require "../../dao/pdo.php";
    require "../../dao/pdo_food.php";
    require "../../dao/pdo_food_categories.php";
    // require "../../dao/pdo_favorite.php";

    $VIEW_NAME = "favorite.php";
    require "../index.php";
?>