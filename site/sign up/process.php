<?php 

    if(isset($_GET['btn_process'])){
        $action = $_GET['btn_process'];
        switch($action){
            case 'signup':{
                extract($_POST);
                
                $accounts = account_get_all();
                $message = 'Sign up succsessfully!';
                $status = true;
                $cus_avatar_flie = $_FILES['cus_avatar_file'];
                $cus_address = $cus_provice .",". $cus_district .",". $cus_wards .",". $cus_specific;
                foreach($accounts as $acc){
                    
                    // check username is exist
                    if($_POST['username'] === $acc['username']){
                        $status = false;
                        $message = 'username is esixted!';
                        break;
                    }
                    if($_POST['cus_email'] === $acc['cus_email']){
                        $status = false;
                        $message = 'email is esixted!';
                        break;
                    }
                    if($_POST['cus_phone'] === $acc['cus_phone']){
                        $status = false;
                        $message = 'phone is esixted!';
                        break;
                    }
                }
                
                // encoding password
                $encode_password = sha1($password);
                date_default_timezone_set('UTC');
                $cus_date_resgister = date("Y-m-d",time()+3600*7);
                
                if(!$status){
                    header("location:index.php?message=$message&status=$status");
                }
                else{
                    account_signup($username,$encode_password,$first_name,$last_name,$cus_phone,$cus_address,$cus_email,$cus_date_resgister,$cus_avatar_flie);
                    header("location:../login?message=$message&status=true");
                }
                break;
            }
        }
    }



?>