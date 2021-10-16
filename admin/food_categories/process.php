<?php 
    
    if(isset($_GET['btn_process'])){
        $action = $_GET['btn_process'];

        switch($action){
            case 'add':{
                extract($_POST);
                category_add_new($cat_name);
                header("location:index.php");
                break;
            }
            case 'update':{
                extract($_POST);
                extract($_GET);
                category_update($id,$cat_name);
                header("location:?btn_list");
                break;
            }
            case 'delete':{
                category_delete($_GET['id']);
                header("location:?btn_list");
                break;
            }
        }
    }


?>