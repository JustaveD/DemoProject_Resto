<?php 
session_start();
if($_SESSION['login'] !==true){
    header("location:../../");
}
    require "../../global.php";
    require "../../dao/pdo.php";
    require "../../dao/pdo_food.php";
    require "../../dao/pdo_food_categories.php";
    require "../../dao/pdo_customer.php";

    


    $VIEW_NAME = "info.php";
    if(isset($_GET['btn_process'])){
        $VIEW_NAME = "process.php";
    }
    if(isset($_GET['btn_tools'])){
        $VIEW_NAME = "tools.php";
    }
    require "../index.php";
?>