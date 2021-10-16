<?php 
// get all customer
function customer_get_all(){
    $sql = "select * from customer";
    return pdo_get_all_rows($sql);
}

// get one customer
function customer_get_one($cus_id){
    $sql = "select * from customer where cus_id = ?";
    return pdo_get_one_row($sql,$cus_id);
}

// total customer
function customer_total(){
    $sql = "select count(*) as cus_total from customer";
    return pdo_get_one_row($sql);
}

// change password
function customer_change_password($cus_password,$cus_email){
    $sql = "update customer set password = ? where cus_email = ?";
    $endoe_password = sha1($cus_password);
    return pdo_execute($sql,$endoe_password,$cus_email);
}

// cus update
function cus_update($first_name,$last_name,$password,$cus_phone,$cus_address,$cus_id,$cus_avatar_file,$old_avatar){

    // analyze image
    $file_name =  basename($cus_avatar_file["name"]);
    $cus_avatar = '';
    if($file_name != ''){
        $dir_upload = '../../content/images/user/' .$file_name;
        move_uploaded_file($cus_avatar_file['tmp_name'],$dir_upload );
        
        $cus_avatar = '/content/images/user/' . $file_name;
    
        $old_avatar = "../.." .$old_avatar;
        unlink($old_avatar);
    }
    else{
        $cus_avatar = $old_avatar;
    }
    

    $sql = "update customer set first_name = ? , last_name = ? , password = ? , cus_phone = ? , cus_address = ?, cus_avatar = ? where cus_id = ?";
    return pdo_execute($sql,$first_name,$last_name,$password,$cus_phone,$cus_address, $cus_avatar,$cus_id);
}