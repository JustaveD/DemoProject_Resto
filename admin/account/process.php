<?php 
    if(isset($_GET['btn_process'])){
        $action = $_GET['btn_process'];
        switch($action){
            case 'edit':{
                
                extract($_POST);
                $cus_name = explode(" ",$cus_name);

                $last_name = array_pop($cus_name);
        

                $first_name = $cus_name;
                $first_name = implode(' ',$first_name);

                // check password if is it changed
                $cus = customer_get_one($_SESSION['login_id']);
                $encode_password = $cus['password'];
                if($cus['password'] !== $password){
                    $encode_password = sha1($password);
                }
                
                echo $last_name;
                $cus_id = $_GET['cus_id'];
                
                $cus_avatar_file = $_FILES['cus_avatar_file'];
                
                $old_avatar = $cus['cus_avatar'];
               
                if(cus_update($first_name,$last_name,$encode_password,$cus_phone,$cus_address,$cus_id,$cus_avatar_file,$old_avatar)){
                    $message = "Updated!";
                    $status = true;
                    header("location:../account?message=$message&status=$status");
                }
                else{
                    $message = "Something wrong here!";
                    $status = false;
                    header("location:../account?message=$message&status=$status");
                };
                break;
            }
        }
    }


?>