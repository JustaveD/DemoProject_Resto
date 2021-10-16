<?php 
  session_start();
  if($_SESSION['login'] !==true){
      header("location:../../");
  }
    require "../../global.php";
    require "../../dao/pdo.php";
    require "../../dao/pdo_customer.php";
    require "../../dao/pdo_food.php";
    
    $VIEW_NAME = "dashboard/home.php";

    require "../index.php";
    
?>