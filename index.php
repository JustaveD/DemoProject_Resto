<?php 
session_start();

if(isset($_SESSION['login'])){
    if($_SESSION['login'] === true){
        $_SESSION['login'] = true;
        $_SESSION['login_id'] = $_SESSION['login_id'];
    }else{
        $_SESSION['login'] = false;
        $_SESSION['login_id'] = '';
    }
}
else{
    $_SESSION['login'] = false;
    $_SESSION['login_id'] = '';
}

header("location: site/home/index.php");
