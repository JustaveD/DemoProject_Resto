<?php
// sign up
function account_signup($username, $password, $first_name, $last_name, $cus_phone, $cus_address, $cus_email, $cus_date_resgister, $cus_avatar_file)
{

    // analyze images
    $cus_avatar = "";
    $target_dir = "../../content/images/user/";
    $target_file  = $target_dir . basename($cus_avatar_file["name"]);

    $check = getimagesize($cus_avatar_file["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($cus_avatar_file["tmp_name"], $target_file)) {
            $target_dir = "/content/images/user/";
            $cus_avatar = $target_dir . basename($cus_avatar_file["name"]);
        }
    } else {
        $cus_avatar = '/content/images/error.jpg';
    }
    $sql = "insert into customer (username,password,first_name,last_name,cus_phone,cus_address,cus_email,cus_date_resgister,cus_avatar) values (?,?,?,?,?,?,?,?,?)";
    if (pdo_execute($sql, $username, $password, $first_name, $last_name, $cus_phone, $cus_address, $cus_email, $cus_date_resgister, $cus_avatar)) {
        $_SESSION['login'] = true;
    }
}
// get all account
function account_get_all()
{
    $sql = "select * from customer";
    return pdo_get_all_rows($sql);
}
// get one account
function account_get_one($cus_id)
{
    $sql = "select * from customer where cus_id = ?";
    return pdo_get_one_row($sql, $cus_id);
}
// ban account
function account_ban($cus_id)
{
    $sql = "update customer set cus_ban = 1 where cus_id = ?";
    return pdo_execute($sql, $cus_id);
}
// delete account
function account_delete($cus_id)
{

    // delete image
    $cus = account_get_one($cus_id);
    $file_name = $cus['cus_avatar'];
    $file_name = "../.." . $file_name;
    unlink($file_name);

    // delete info
    $sql = "delete from customer where cus_id = ?";
    return pdo_execute($sql, $cus_id);
}
// ban account
function account_freedom($cus_id)
{
    $sql = "update customer set cus_ban = 0 where cus_id = ?";
    return pdo_execute($sql, $cus_id);
}
