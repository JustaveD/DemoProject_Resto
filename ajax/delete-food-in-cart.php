<?php
session_start();
require "../dao/pdo.php";

// trạng thái của sql
$result = ['status' => ''];

// Kết nối database
$conn = pdo_get_connection();

$cart_id = $_GET['cart_id'];


$sql = "delete from shopping_cart where cart_id = ?";
$result['status'] = pdo_execute($sql,$cart_id);

// Nếu là request ajax thì trả kết quả JSON
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Mình sleep 1 giây để các bạn check nhé, khi sử dụng thì bỏ đoạn sleep này đi
    sleep(0.3);

    // Trả kết quả về cho ajax
    die(json_encode($result));
}
