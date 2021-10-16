<?php
session_start();
if ($_SESSION['login'] !== true) {
    header("location:../../");
}
require "../../global.php";
require "../../dao/pdo.php";
require "../../dao/pdo_food.php";
require "../../dao/pdo_food_categories.php";
require "../../dao/pdo_customer.php";

if (isset($_GET['message'])) {
    $message = $_GET['message'];
    $status = $_GET['status'];
    include "../message.php";
}


extract($_REQUEST);
$VIEW_NAME = "info.php";
if (exist_param('btn_process')) {
    $VIEW_NAME = "process.php";
}
require "../index.php";
