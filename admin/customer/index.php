<?php 
session_start();
if($_SESSION['login'] !==true){
    header("location:../../");
}
    require "../../global.php";
    require "../../dao/pdo.php";
    require "../../dao/pdo_customer.php";
    require "../../dao/pdo_food.php";
    require "../../dao/pdo_account.php";
    
    $VIEW_NAME = "list.php";
    if(exist_param('btn_process')){
        $VIEW_NAME = "process.php";
    }
    
    

    require "../index.php";
?>