<?php 
    session_start();
    require "../../global.php";
    require "../../dao/pdo.php";
    require "../../dao/pdo_food.php";
    require "../../dao/pdo_food_categories.php";
    require "../../dao/pdo_account.php";
    require "../../dao/pdo_customer.php";

    $VIEW_NAME = "login.php";
    if(isset($_GET['btn_process'])){
        $VIEW_NAME = "process.php";
    }
    if(isset($_GET['btn_forgot'])){
        $VIEW_NAME = "forgot.php";
    }
    if(isset($_GET['btn_inputrest'])){
        $VIEW_NAME = "input_reset.php";
    }
    require "../index.php";
?>