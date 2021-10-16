<?php
$action = $_GET['btn_process'];
switch($action){
    case 'ban':{
        extract($_GET);
        account_ban($id);
        header("location:?btn_list");
        break;
    }
    case 'delete':{
        extract($_GET);
        account_delete($id);
        header("location:?btn_list");
        break;
    }
    case 'freedom':{
        extract($_GET);
        account_freedom($id);
        header("location:?btn_list");
        break;
    }
}