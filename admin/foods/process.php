<?php 
    
    if(isset($_GET['btn_process'])){
        $action = $_GET['btn_process'];

        switch($action){
            case 'add':{
                extract($_POST);
                $food_image_file = $_FILES["food_image_file"];
                
                food_insert($food_name, $cat_id, $food_des, $food_price,$food_image_file);
                header("location:index.php");
                break;
            }
            case 'update':{
                extract($_POST);
                $food_image_file = $_FILES["food_image_file"];
                $food_id = $_GET['id'];
                food_update($food_id,$food_name, $cat_id, $food_des, $food_price,$food_image_file);
                header("location:?btn_list");
                break;
            }
            case 'delete':{
                food_delete($_GET['id']);
                header("location:?btn_list");
                break;
            }
        }
    }


?>