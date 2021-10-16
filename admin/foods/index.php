<?php 

session_start();
if($_SESSION['login'] !==true){
    header("location:../../");
}
    require "../../global.php";
    require "../../dao/pdo.php";
    require "../../dao/pdo_food.php";
    require "../../dao/pdo_food_categories.php";
    extract($_REQUEST);
    if(exist_param("btn_list")){
        $VIEW_NAME = "list.php";
    }
    else if(exist_param("btn_edit")){
        $VIEW_NAME = "edit.php";
    }
    else if(exist_param("btn_process")){
        $VIEW_NAME = "process.php";
    }
    else{
        $VIEW_NAME = "add.php";
    }

    require "../index.php";
?>